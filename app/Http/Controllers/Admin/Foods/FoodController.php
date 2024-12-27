<?php

namespace App\Http\Controllers\Admin\Foods;

use App\Http\Controllers\Controller;
use App\Http\Requests\Foods\FoodRequest;
use App\Models\Food;
use App\Services\Admin\Foods\Interfaces\FoodServiceInterface;
use App\Services\Admin\Foods\Interfaces\FoodTypeServiceInterFace;
use Illuminate\Http\Request;
use App\Traits\RemoveImageTrait;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class FoodController extends Controller
{
    use RemoveImageTrait;

    protected $foodService;
    protected $foodTypeService;

    public function __construct(
        FoodServiceInterface $foodService,
        FoodTypeServiceInterFace $foodTypeService
    ) {
        $this->foodService = $foodService;
        $this->foodTypeService = $foodTypeService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data = $this->foodService->filter($request);
        $listFoodTypes = $this->foodTypeService->getAllActive();
        return view('admin.pages.foods.index', compact('data', 'listFoodTypes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $listFoodTypes = $this->foodTypeService->getAllActive();
        return view('admin.pages.foods.create', compact('listFoodTypes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FoodRequest $request)
    {
        $data = $request->food;
        try {
            DB::beginTransaction();

            $this->foodService->create($data);

            DB::commit();

            return redirect()->route('admin.foods.index')->with('status_succeed', "Thêm đồ ăn thành công");
        } catch (\Exception $e) {
            if (!empty($data['image'])) {
                $path = "public/foods/" . basename($data['image']);
                if (Storage::exists($path)) {
                    Storage::delete($path);
                }
            }
            DB::rollBack();
            Log::error('Message: ' . $e->getMessage() . ' ---Line: ' . $e->getLine());

            return back()->with(['status_failed' => $e->getMessage()]);
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
        $data = $this->foodService->find($id);
        if (!$data) {
            return redirect()->route('admin.foods.index')->with(['status_failed' => 'Không tìm thấy!']);
        }
        $listFoodTypes = $this->foodTypeService->getAllActive();
        return view('admin.pages.foods.edit', compact('data', 'listFoodTypes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FoodRequest $request, string $id)
    {
        $data = $request->food;
        try {
            DB::beginTransaction();
            if (!$this->foodService->update($data, $id)) {
                return redirect()->route('admin.foods.index')->with(['status_failed' => 'Không tìm thấy!']);
            }

            DB::commit();
            return redirect()->route('admin.foods.index')->with('status_succeed', "Sửa đồ ăn thành công");
        } catch (\Throwable $e) {
            if (!empty($data['image'])) {
                $path = "public/foods/" . basename($data['image']);
                if (Storage::exists($path)) {
                    Storage::delete($path);
                }
            }
            DB::rollBack();
            Log::error("Error updating food: {$e->getMessage()} at line {$e->getLine()}");
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
            if (!$this->foodService->delete($id)) {
                return redirect()->route('admin.foods.index')->with(['status_failed' => 'Không tìm thấy!']);
            }
            DB::commit();
            return redirect()->route('admin.foods.index')->with([
                'status_succeed' => 'Xóa đồ ăn thành công'
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
        $food = $this->removeImage($request, new Food, 'image', 'foods');

        return response()->json(['avatar' => $food], 200);
    }

    public function deleteItemMultipleChecked(Request $request)
    {
        try {
            DB::beginTransaction();
            if (empty($request->selectedIds)) {
                return response()->json(['message' => 'Vui lòng chọn ít nhất 1 bản ghi'], 400);
            }
            $this->foodService->deleteMultipleChecked($request);

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
            $data = $this->foodService->changeOrder($request);
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
            $data = $this->foodService->changeActive($request);
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
