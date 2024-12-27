<?php

namespace App\Http\Controllers\Admin\Events;

use App\Http\Controllers\Controller;
use App\Http\Requests\Vouchers\VoucherRequest;
use App\Models\Voucher;
use App\Services\Admin\Vouchers\Interfaces\VoucherServiceInterface;
use App\Traits\RemoveImageTrait;
use Illuminate\Database\QueryException;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class VoucherController extends Controller
{
    use RemoveImageTrait;

    protected $voucherService;

    public function __construct(
        VoucherServiceInterface $voucherService
    ) {
        $this->voucherService = $voucherService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data = $this->voucherService->filter($request);
        return view('admin.pages.vouchers.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.vouchers.create');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(VoucherRequest $request)
    {

        $data = $request->voucher;
        try {
            DB::beginTransaction();

            $this->voucherService->create($data);

            DB::commit();

            return response()->json([
                'route' => route('admin.vouchers.index'),
                'message' => 'Thành công'
            ], 201);
        } catch (\Exception $e) {
            if (!empty($data['image'])) {
                $path = "public/vouchers/" . basename($data['image']);
                if (Storage::exists($path)) {
                    Storage::delete($path);
                }
            }
            DB::rollBack();
            Log::error('Message: ' . $e->getMessage() . ' ---Line: ' . $e->getLine());

          $response = response()->json([
                'message' => 'Có lỗi xảy ra, vui lòng thử lại!',
                'route'     => route('admin.vouchers.index'),
            ], 500);
            throw new HttpResponseException($response);
        }
    }

    /**
     * Display the specified resource.
     */
    // public function show(string $id)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = $this->voucherService->find($id);
        if (!$data) {
            return redirect()->route('admin.vouchers.index')->with(['status_failed' => 'Không tìm thấy!']);
        }
        return view('admin.pages.vouchers.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(VoucherRequest $request, string $id)
    {
        $data = $request->voucher;

        try {
            DB::beginTransaction();
            if (!$this->voucherService->update($data, $id)) {
                return response()->json([
                    'route' => route('admin.vouchers.index'),
                    'message' => 'Thât bại!'
                ], 400);
            }
            DB::commit();
            return response()->json([
                'route' => route('admin.vouchers.index'),
                'message' => 'Thành công'
            ], 200);
        } catch (\Exception $e) {
            if (!empty($data['image'])) {
                $path = "public/vouchers/" . basename($data['image']);
                if (Storage::exists($path)) {
                    Storage::delete($path);
                }
            }
            DB::rollBack();
            Log::error("Error updating voucher: {$e->getMessage()} at line {$e->getLine()}");
            $response = response()->json([
                'message' => 'Có lỗi xảy ra, vui lòng thử lại!',
                'route'     => route('admin.vouchers.index'),
            ], 500);
            throw new HttpResponseException($response);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            DB::beginTransaction();
            if (!$this->voucherService->delete($id)) {
                return redirect()->route('admin.vouchers.index')->with(['status_failed' => 'Không tìm thấy!']);
            }
            DB::commit();
            return redirect()->route('admin.vouchers.index')->with([
                'status_succeed' => 'Xóa voucher thành công'
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Message: ' . $e->getMessage() . ' ---Line: ' . $e->getLine());

            return back()->with([
                'status_failed' => 'Đã xảy ra lỗi khi xóa'
            ]);
        }
    }

    public function removeAvatarImage(Request $request)
    {
        $voucher = $this->removeImage($request, new Voucher, 'image', 'Vouchers');

        return response()->json(['avatar' => $voucher], 200);
    }


    public function deleteItemMultipleChecked(Request $request)
    {
        try {
            DB::beginTransaction();
            if (empty($request->selectedIds)) {
                return response()->json(['message' => 'Vui lòng chọn ít nhất 1 bản ghi'], 400);
            }
            $this->voucherService->deleteMultipleChecked($request);

            DB::commit();
            return response()->json(['message' => 'Xóa thành công!'], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Message: ' . $e->getMessage() . ' ---Line: ' . $e->getLine());

            return response()->json([
                'success' => false,
                'message' => 'Có lỗi xảy ra!',
            ], 500);
        }
    }

    public function getAccountByVoucher(Request $request)
    {
        $id = $request->id;

        try {
            if (empty($id)) {
                return response()->json(['message' => 'Không tìm thấy voucher'], 400);
            }
            $users =  $this->voucherService->getAccountByVoucher($request);

            return response()->json([
                'message' => 'Lấy dữ liệu thành công!',
                'data' => $users,
                ''
            ], 200);
        } catch (\Exception $e) {
            Log::error('Message: ' . $e->getMessage() . ' ---Line: ' . $e->getLine());

            return response()->json([
                'success' => false,
                'message' => 'Có lỗi xảy ra!',
            ], 500);
        }
    }

    public function searchUser(Request $request)
    {
        $id = $request->id;

        try {
            if (empty($id)) {
                return response()->json(['message' => 'Không tìm thấy voucher'], 400);
            }
            $users =  $this->voucherService->getAccountByKeyword($request);

            return response()->json([
                'message' => 'Lấy dữ liệu thành công!',
                'data' => $users

            ], 200);
        } catch (\Exception $e) {
            Log::error('Message: ' . $e->getMessage() . ' ---Line: ' . $e->getLine());

            return response()->json([
                'success' => false,
                'message' => 'Có lỗi xảy ra!',
            ], 500);
        }
    }
    public function giftVoucherAccount(Request $request)
    {
        try {

            $data = $this->voucherService->giftVoucherToAccount($request);

            return response()->json([
                'data' => $data
            ], 201);
        } catch (\Exception $e) {
            Log::error('Message: ' . $e->getMessage() . ' ---Line: ' . $e->getLine());

            return response()->json([
                'success' => false,
                'message' => 'Có lỗi xảy ra!',
            ], 500);
        }
    }
    public function changeActive(Request $request)
    {
        $item = $this->voucherService->changeActive($request);

        return response()->json(['newStatus' => $item->active]);
    }
}
