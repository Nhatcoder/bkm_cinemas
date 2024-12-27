<?php

namespace App\Http\Controllers\Admin\Foods;

use App\Http\Controllers\Controller;
use App\Http\Requests\FoodTypes\FoodTypeRequest;
use App\Services\Admin\Foods\FoodTypeService;
use App\Services\Admin\Foods\Interfaces\FoodTypeServiceInterFace;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;

class FoodTypeController extends Controller
{
    protected $foodTypeService;

    public function __construct(
        FoodTypeServiceInterFace $foodTypeService
    ) {
        $this->foodTypeService = $foodTypeService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data = $this->foodTypeService->filter($request);
        return view('admin.pages.foodTypes.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.foodTypes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FoodTypeRequest $request)
    {
        $data = $request->foodType;
        try {
            DB::beginTransaction();

            $this->foodTypeService->create($data);

            DB::commit();

            return redirect()->route('admin.food-types.index')->with('status_succeed', "Thêm loại đồ ăn thành công");
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
        $data = $this->foodTypeService->find($id);
        if (!$data) {
            return redirect()->route('admin.food-types.index')->with(['status_failed' => 'Không tìm thấy!']);
        }
        return view('admin.pages.foodTypes.edit', compact('data'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FoodTypeRequest $request, string $id)
    {
        $data = $request->foodType;
        try {
            DB::beginTransaction();
            if (!$this->foodTypeService->update($data, $id)) {
                return redirect()->route('admin.food-types.index')->with(['status_failed' => 'Không tìm thấy!']);
            }

            DB::commit();
            return redirect()->route('admin.food-types.index')->with('status_succeed', "Sửa loại đồ ăn thành công");
        } catch (\Throwable $e) {
            DB::rollBack();
            Log::error("Error updating food type: {$e->getMessage()} at line {$e->getLine()}");
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
            if (!$this->foodTypeService->delete($id)) {
                return redirect()->route('admin.food-types.index')->with(['status_failed' => 'Không tìm thấy!']);
            }
            DB::commit();
            return redirect()->route('admin.food-types.index')->with([
                'status_succeed' => 'Xóa loại đồ ăn thành công'
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Message: ' . $e->getMessage() . ' ---Line: ' . $e->getLine());

            return back()->with([
                'status_failed' => 'Đã xảy ra lỗi khi xóa'
            ], 500);
        }
    }

    public function deleteItemMultipleChecked(Request $request)
    {
        try {
            DB::beginTransaction();
            if (empty($request->selectedIds)) {
                return response()->json(['message' => 'Vui lòng chọn ít nhất 1 bản ghi'], 400);
            }
            $this->foodTypeService->deleteMultipleChecked($request);

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

    public function changeOrder(Request $request)
    {
        try {
            DB::beginTransaction();
            $data = $this->foodTypeService->changeOrder($request);
            DB::commit();
            if (!$data) {
                return response()->json([
                    'success' => false,
                    'message' => 'Có lỗi xảy ra!'
                ], 400);
            }
            return response()->json(['newOrder' => $request->order]);
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
        try {
            DB::beginTransaction();
            $data = $this->foodTypeService->changeActive($request);
            DB::commit();
            if (!$data) {
                return response()->json([
                    'success' => false,
                    'message' => 'Có lỗi xảy ra!'
                ], 400);
            }
            return response()->json(['newStatus' => $data->active]);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Message: ' . $e->getMessage() . ' ---Line: ' . $e->getLine());
            return response()->json([
                'success' => false,
                'message' => 'Có lỗi xảy ra!',
            ], 500);
        }
    }
}
