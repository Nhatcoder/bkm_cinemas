<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Notifications\NotificationRequest;
use App\Services\Admin\Notifications\Interfaces\NotificationServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class NotificationController extends Controller
{
    private $notificationService;

    public function __construct(
        NotificationServiceInterface $notificationService
    ){
        $this->notificationService = $notificationService;
    }

    public function getByType(Request $request){
        $data = $this->notificationService->getByType($request->type);

        return response()->json([
            'success' => true,
            'message' => 'Thành công!',
            'data' => $data
        ], 200);
    }

    public function index(Request $request)
    {
        $data = $this->notificationService->filter($request);
        return view('admin.pages.notifications.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.notifications.create');
    }
    public function store(NotificationRequest $request)
    {
        $data = $request->notification;
        try {
            DB::beginTransaction();

            $this->notificationService->create($data);

            DB::commit();

            return redirect()->route('admin.notifications.index')->with('status_succeed', "Thêm thông báo thành công");
        } catch (\Exception $e) {

            DB::rollBack();
            Log::error('Message: ' . $e->getMessage() . ' ---Line: ' . $e->getLine());

            return back()->with(['status_failed' => 'Đã xảy ra lỗi, vui lòng thử lại sau.']);

        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = $this->notificationService->find($id);
        if (!$data) {
            return redirect()->route('admin.notifications.index')->with(['status_failed' => 'Không tìm thấy!']);
        }
        return view('admin.pages.notifications.edit', compact('data'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(NotificationRequest $request, string $id)
    {
        $data = $request->notification;
        try {
            DB::beginTransaction();
            if (!$this->notificationService->update($data, $id)) {
                return redirect()->route('admin.notifications.index')->with(['status_failed' => 'Không tìm thấy!']);
            }

            DB::commit();
            return redirect()->route('admin.notifications.index')->with('status_succeed', "Cập nhật thông báo thành công");
        } catch (\Throwable $e) {

            DB::rollBack();
            Log::error("Error updating notifications: {$e->getMessage()} at line {$e->getLine()}");
            return back()->with(['status_failed' => 'Đã xảy ra lỗi, vui lòng thử lại sau.']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            DB::beginTransaction();
            if (!$this->notificationService->delete($id)) {
                return redirect()->route('admin.notifications.index')->with(['status_failed' => 'Không tìm thấy!']);
            }
            DB::commit();
            return redirect()->route('admin.notifications.index')->with([
                'status_succeed' => 'Xóa thông báo thành công'
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
            $this->notificationService->deleteMultipleChecked($request);

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

    public function getByCinemaId(Request $request){
        $data = $this->notificationService->getByCinemaId($request->cinema_id);

        return response()->json([
            'success' => true,
            'message' => 'Thành công!',
            'data' => $data
        ], 200);
    }
}
