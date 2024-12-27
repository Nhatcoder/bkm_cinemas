<?php

namespace App\Http\Controllers\Admin\Foods;

use App\Http\Controllers\Controller;
use App\Http\Requests\FoodCombos\FoodComboRequest;
use App\Models\FoodCombo;
use App\Services\Admin\Foods\FoodComboService;
use App\Services\Admin\Foods\FoodService;
use App\Services\Admin\Foods\Interfaces\FoodComboServiceInterface;
use App\Services\Admin\Foods\Interfaces\FoodServiceInterface;
use App\Traits\RemoveImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Exceptions\HttpResponseException;


class FoodComboController extends Controller
{
    use RemoveImageTrait;
    protected $foodComboService;
    protected $foodService;
    public function __construct(
        FoodComboServiceInterface $foodComboService,
        FoodServiceInterface      $foodService
    ) {
        $this->foodComboService = $foodComboService;
        $this->foodService      = $foodService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data = $this->foodComboService->filter($request);
        return view('admin.pages.foodCombos.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $listFoods = $this->foodService->getAllActive();
        return view('admin.pages.foodCombos.create', compact('listFoods'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FoodComboRequest $request)
    {
        $data = $request->all();
        try {
            DB::beginTransaction();

            $this->foodComboService->create($data);

            DB::commit();

            return response()->json([
                'message' => 'Thêm combo thành công!',
                'url'     => route('admin.food-combos.index'),
            ], 201);
        } catch (\Exception $e) {
            if (!empty($data['food_combo']['image'])) {
                $path = "public/foodCombos/" . basename($data['food_combo']['image']);
                if (Storage::exists($path)) {
                    Storage::delete($path);
                }
            }
            DB::rollBack();
            Log::error('Message: ' . $e->getMessage() . ' ---Line: ' . $e->getLine());
            $response = response()->json([
                'message' => 'Có lỗi xảy ra, vui lòng thử lại!',
                'url'     => route('admin.food-combos.index'),
            ], 500);
            throw new HttpResponseException($response);
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
        $combo  = $this->foodComboService->find($id);
        if (!$combo) {
            return redirect()->route('admin.foodCombos.index')->with(['status_failed' => 'Không tìm thấy!']);
        }
        $listFoods = $this->foodService->getAllActive();
        return view('admin.pages.foodCombos.edit', compact('listFoods', 'combo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FoodComboRequest $request, string $id)
    {
        $data = $request->all();
        try {
            DB::beginTransaction();
            if (!$this->foodComboService->update($data, $id)) {
                return redirect()->route('admin.foodCombos.index')->with(['status_failed' => 'Không tìm thấy!']);
            }

            DB::commit();

            return response()->json([
                'message' => 'Sửa combo thành công!',
                'url'     => route('admin.food-combos.index'),
            ], 201);
        } catch (\Exception $e) {
            if (!empty($data['food_combo']['image'])) {
                $path = "public/foodCombos/" . basename($data['food_combo']['image']);
                if (Storage::exists($path)) {
                    Storage::delete($path);
                }
            }
            DB::rollBack();
            Log::error('Message: ' . $e->getMessage() . ' ---Line: ' . $e->getLine());
            $response = response()->json([
                'message' => 'Có lỗi xảy ra, vui lòng thử lại!',
                'url'     => route('admin.food-combos.index'),
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
            if (!$this->foodComboService->delete($id)) {
                return redirect()->route('admin.food-combos.index')->with(['status_failed' => 'Không tìm thấy!']);
            }
            DB::commit();
            return redirect()->route('admin.food-combos.index')->with([
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
        $foodCombo = $this->removeImage($request, new FoodCombo, 'image', 'foodCombos');

        return response()->json(['avatar' => $foodCombo], 200);
    }

    public function deleteItemMultipleChecked(Request $request)
    {
        try {
            DB::beginTransaction();
            if (empty($request->selectedIds)) {
                return response()->json(['message' => 'Vui lòng chọn ít nhất 1 bản ghi'], 400);
            }
            $this->foodComboService->deleteMultipleChecked($request);

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
            $data = $this->foodComboService->changeOrder($request);
            DB::commit();
            if (!$data) {
                return response()->json([
                    'success' => false,
                    'message' => 'Có lỗi xảy ra!'
                ], 400);
            }
            return response()->json(['newOrder' => $request->order], 200);
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
            $data = $this->foodComboService->changeActive($request);
            DB::commit();
            if (!$data) {
                return response()->json([
                    'success' => false,
                    'message' => 'Có lỗi xảy ra!'
                ], 400);
            }
            return response()->json(['newStatus' => $data->active], 200);
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
