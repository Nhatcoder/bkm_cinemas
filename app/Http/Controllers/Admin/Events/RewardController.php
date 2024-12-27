<?php

namespace App\Http\Controllers\Admin\Events;

use App\Http\Controllers\Controller;
use App\Http\Requests\Rewards\RewardRequest;
use App\Models\Reward;
use App\Services\Admin\Rewards\Interfaces\RewardServiceInterface;
use App\Traits\RemoveImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class RewardController extends Controller
{
    use RemoveImageTrait;
    protected $rewardService;

    public function __construct(
        RewardServiceInterface $rewardService
    ) {
        $this->rewardService = $rewardService;
    }
    public function index(Request $request)
    {
        $data = $this->rewardService->filter($request);
        return view('admin.pages.rewards.index', compact('data'));
    }
    public function create()
    {
        return view('admin.pages.rewards.create');
    }

    public function store(RewardRequest $request)
    {
        $data = $request->reward;
        try {
            DB::beginTransaction();

            $this->rewardService->create($data);

            DB::commit();

            return redirect()->route('admin.rewards.index')->with('status_succeed', "Thêm quà tặng thành công");
        } catch (\Exception $e) {
            if (!empty($data['image'])) {
                $path = "public/rewards/" . basename($data['image']);
                if (Storage::exists($path)) {
                    Storage::delete($path);
                }
            }
            DB::rollBack();
            Log::error('Message: ' . $e->getMessage() . ' ---Line: ' . $e->getLine());

            return back()->with(['status_failed' => 'Đã xảy ra lỗi, vui lòng thử lại sau.']);

        }
    }
    public function edit(string $id)
    {
        $data = $this->rewardService->find($id);
        if (!$data) {
            return redirect()->route('admin.rewards.index')->with(['status_failed' => 'Không tìm thấy!']);
        }
        return view('admin.pages.rewards.edit', compact('data'));

    }
    public function update(RewardRequest $request, string $id)
    {
        $data = $request->reward;
        try {
            DB::beginTransaction();
            if (!$this->rewardService->update($data, $id)) {
                return redirect()->route('admin.rewards.index')->with(['status_failed' => 'Không tìm thấy!']);
            }

            DB::commit();
            return redirect()->route('admin.rewards.index')->with('status_succeed', "Sửa diễn viên thành công");
        } catch (\Throwable $e) {
            if (!empty($data['image'])) {
                $path = "public/rewards/" . basename($data['image']);
                if (Storage::exists($path)) {
                    Storage::delete($path);
                }
            }
            DB::rollBack();
            Log::error("Error updating actors: {$e->getMessage()} at line {$e->getLine()}");
            return back()->with(['status_failed' => 'Đã xảy ra lỗi, vui lòng thử lại sau.']);
        }
    }
    public function removeAvatarImage(Request $request)
    {
        $reward = $this->removeImage($request, new Reward, 'image', 'rewards');

        return response()->json(['avatar' => $reward], 200);
    }
    public function destroy(string $id)
    {
        try {
            DB::beginTransaction();
            if (!$this->rewardService->delete($id)) {
                return redirect()->route('admin.rewards.index')->with(['status_failed' => 'Không tìm thấy!']);
            }
            DB::commit();
            return redirect()->route('admin.rewards.index')->with([
                'status_succeed' => 'Xóa quà tặng thành công'
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Message: ' . $e->getMessage() . ' ---Line: ' . $e->getLine());

            return back()->with([
                'status_failed' => 'Đã xảy ra lỗi khi xóa'
            ]);
        }
    }
    public function deleteItemMultipleChecked(Request $request)
    {
        try {
            DB::beginTransaction();
            if (empty($request->selectedIds)) {
                return response()->json(['message' => 'Vui lòng chọn ít nhất 1 bản ghi'], 400);
            }
            $this->rewardService->deleteMultipleChecked($request);

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
    public function changeActive(Request $request)
    {
        $item = $this->rewardService->changeActive($request);

        return response()->json(['newStatus' => $item->active]);
    }
}
