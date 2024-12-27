<?php

namespace App\Repositories\Admin\Vouchers\Repositories;

use App\Events\Admin\GiftVoucherEvent;
use App\Models\User;
use App\Models\Voucher;
use App\Models\VoucherUser;
use App\Repositories\Admin\Vouchers\Interfaces\VoucherInterface;
use App\Repositories\Base\BaseRepository;
use Carbon\Carbon;

class VoucherRepository extends BaseRepository implements VoucherInterface
{
    public function getModel()
    {
        return \App\Models\Voucher::class;
    }

    public function filter($request)
    {
        $data = $this->model->newQuery();
        $data = $this->filterByNameOrCode($data);
        $data = $this->applyOrdering($data, $request);
        $data = $data->paginate(self::PAGINATION);

        return $data->appends([
            'name' => $request->name,
            'order_with' => $request->order_with,
        ]);
    }



    public function delete($id)
    {
        $result = $this->find($id);
        if ($result) {
            $result->delete();
            return true;
        }
        return false;
    }

    public function deleteMultiple(array $ids)
    {
        collect($ids)->chunk(1000)->each(function ($chunk) {
            $this->model->whereIn('id', $chunk)->delete();
        });
        return true;
    }

    protected function filterByNameOrCode($query)
    {
        $searchTerm = request()->name;

        if (!empty($searchTerm)) {
            return $query->where(function ($query) use ($searchTerm) {
                $query->where('name', 'like', '%' . $searchTerm . '%')
                    ->orWhere('code', 'like', '%' . $searchTerm . '%');
            });
        }

        return $query;
    }



    protected function applyOrdering($query, $request)
    {
        if (!empty($request->order_with)) {
            switch ($request->order_with) {
                case 'dateASC':
                    return $query->orderBy('created_at', 'asc');
                case 'dateDESC':
                    return $query->orderBy('created_at', 'desc');
            }
        }
        return $query;
    }

    public function getAccountByVoucher($request)
    {
        $voucher = $this->model->find($request->id);
        if ($voucher->discount_condition == 'all') {
            $users = $this->getAllUser();
        } else if ($voucher->discount_condition == 'condition') {
            if ($voucher->condition_type == 'new_member') {
                $users = $this->getNewMember();
            } else if ($voucher->condition_type == 'level_up') {
                if ($voucher->level_type == 'vip') {
                    $users = $this->getMemberVip();
                } else if ($voucher->level_type == 'vvip') {
                    $users = $this->getMemberVvip();
                }
            }
        }
        foreach ($users as $user) {
            // Kiểm tra xem người dùng đã được tặng voucher chưa
            $hasVoucher = VoucherUser::where('voucher_id', $request->id)
                ->where('user_id', $user->id)
                ->exists();

            // Thêm thuộc tính 'hasVoucher' vào mỗi đối tượng user
            $user->hasVoucher = $hasVoucher;
        }

        return $users;
    }


    public function getAccountByKeyword($request)
    {
        $userOrigin = $this->getAccountByVoucher($request);
        $users = $userOrigin->toArray();

        if (!empty($request->keyword)) {
            $keyword = strtolower(trim($request->keyword));
            $users = array_filter($users, function ($user) use ($keyword) {
                $nameMatch = stripos(strtolower(trim($user['name'])), $keyword) !== false;
                $emailMatch = stripos(strtolower(trim($user['email'])), $keyword) !== false;

                return $nameMatch || $emailMatch;
            });

            $users = array_values($users);
        }

        return $users;
    }


    protected function getAllUser()
    {
        $users = User::where('status', 1)
            ->where('id', '!=', auth()->id()) // Loại trừ tài khoản đang đăng nhập
            ->orderBy('created_at', 'desc')
            ->get();
        return $users;
    }
    protected function getNewMember()
    {
        $users = User::where('is_new_member', 1)

            ->where('id', '!=', auth()->id()) // Loại trừ tài khoản đang đăng nhập->where('status', 1)
            ->orderBy('created_at', 'desc')
            ->get();
        return $users;
    }
    protected function getMemberVip()
    {
        $users = User::where('membership_level', 'vip')
            ->where('id', '!=', auth()->id()) // Loại trừ tài khoản đang đăng nhập
            ->where('status', 1)
            ->orderBy('created_at', 'desc')
            ->get();
        return $users;
    }
    protected function getMemberVvip()
    {
        $users = User::where('membership_level', 'vvip')->where('status', 1)
            ->where('id', '!=', auth()->id()) // Loại trừ tài khoản đang đăng nhập
            ->orderBy('created_at', 'desc')
            ->get();
        return $users;
    }

    public function giftVoucherToAccount($request)
    {
        if (empty($request->voucherId)) {
            return response()->json([
                'status' => 'faile',
                'message' => 'Voucher không tồn tại!'
            ]);
        }
        $voucher = Voucher::find($request->voucherId);
        if($voucher -> active == 0){
            return response()->json([
                'status' => 'faile',
                'message' => 'Voucher không hợp lệ!'
            ]);
        }
        
        if (!empty($request->userIds)) {
            $userVoucher = VoucherUser::where('voucher_id', $voucher->id)->get();  // Lấy các người dùng đã tặng voucher
            // Kiểm tra số lượng voucher có đủ không (voucher còn lại tính từ tổng - số người đã được tặng)
            if ($voucher->quantity < (count($request->userIds) - count($userVoucher))) {
                return response()->json([
                    'status' => 'faile',
                    'message' => 'Số lượng voucher không đủ'
                ]);
            }

            // Lưu lại số lượng ban đầu của voucher
            $originQuantity = $voucher->quantity;

            // Lấy ra danh sách người dùng đã được tặng voucher trước đó
            $oldUserIds = $voucher->users()->pluck('user_id')->toArray();
            $filteredUserIds = array_diff($request->userIds, $oldUserIds);
            GiftVoucherEvent::dispatch($filteredUserIds, $voucher);

            // Xóa tất cả voucher đã được gắn cho user
            $voucher->users()->detach();

            // Tính toán lại số lượng cần cộng lại (số lượng voucher cũ đã tặng, cần phải cộng lại số đã xóa)
            $quantityToRestore = count($oldUserIds) - count($request->userIds);
            $voucher->quantity = $originQuantity + $quantityToRestore; // Cộng lại số lượng đã bị xóa

            // Tặng voucher cho các user mới được chọn
            $voucher->users()->attach($request->userIds);

            // Lưu lại số lượng mới vào database

            $voucher->save();
            return response()->json([
                'status' => 'success',
                'message' => 'Thành công'
            ]);
        } else {
            // Xóa tất cả voucher đã được gắn cho user
            $voucher->users()->detach();
            return response()->json([
                'status' => 'success',
                'message' => 'Thành công'
            ]);
        }
    }
    public function changeActive($id)
    {
        $result = $this->model->find($id)->first();
        if ($result) {
            $result->active ^= 1;
            $result->save();
            return $result;
        }
        return false;
    }
}
