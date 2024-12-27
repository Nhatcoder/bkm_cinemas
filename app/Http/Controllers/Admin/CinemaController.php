<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\Cinemas\CinemaRequest;
use App\Models\Cinema;
use App\Services\Admin\Areas\Interfaces\AreaServiceInterface;
use App\Services\Admin\Cinemas\Interfaces\CinemaServiceInterface;
use App\Services\Admin\Cities\Interfaces\CityServiceInterface;
use App\Traits\RemoveImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class CinemaController extends Controller
{
    use RemoveImageTrait;
    protected $cinemaService;
    protected $areaService;
    protected $cityService;

    public function __construct(
        CinemaServiceInterface $cinemaService,
        AreaServiceInterface $areaService,
        CityServiceInterface $cityService,
    ) {
        $this->cinemaService = $cinemaService;
        $this->areaService = $areaService;
        $this->cityService = $cityService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data = $this->cinemaService->filter($request);
        if (!empty($request->city_id)) {
            $areas = $this->areaService->getByCityId($request->city_id);
        }else{
            $areas = $this->areaService->getAll();
        }
        $cities = $this->cityService->getAll();
        return view('admin.pages.cinemas.index', compact('data', 'areas', 'cities'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $areas = $this->areaService->getAll();
        return view('admin.pages.cinemas.create', compact('areas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CinemaRequest $request)
    {
        $data = $request->cinema;
        try {
            DB::beginTransaction();

            $this->cinemaService->create($data);

            DB::commit();

            return redirect()->route('admin.cinemas.index')->with('status_succeed', "Thêm rạp thành công");
        } catch (\Exception $e) {
            if (!empty($data['image'])) {
                $path = "public/cinemas/" . basename($data['image']);
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
        $data = $this->cinemaService->find($id);
        $areas = $this->areaService->getAll();
        if (!$data) {
            return redirect()->route('admin.cinemas.index')->with(['status_failed' => 'Không tìm thấy!']);
        }
        return view('admin.pages.cinemas.edit', compact('data', 'areas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CinemaRequest $request, string $id)
    {
        $data = $request->cinema;
        try {
            DB::beginTransaction();
            if (!$this->cinemaService->update($data, $id)) {
                return redirect()->route('admin.cinemas.index')->with(['status_failed' => 'Không tìm thấy!']);
            }
            DB::commit();
            return redirect()->route('admin.cinemas.index')->with('status_succeed', "Sửa rạp thành công");
        } catch (\Throwable $e) {
            if (!empty($data['image'])) {
                $path = "public/cinemas/" . basename($data['image']);
                if (Storage::exists($path)) {
                    Storage::delete($path);
                }
            }
            DB::rollBack();
            Log::error("Error updating cinema: {$e->getMessage()} at line {$e->getLine()}");
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
            if (!$this->cinemaService->delete($id)) {
                return redirect()->route('admin.cinemas.index')->with(['status_failed' => 'Không tìm thấy!']);
            }
            DB::commit();
            return redirect()->route('admin.cinemas.index')->with([
                'status_succeed' => 'Xóa rạp thành công'
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
        $cinema = $this->removeImage($request, new Cinema, 'image', 'cinemas');

        return response()->json(['avatar' => $cinema], 200);
    }

    public function deleteItemMultipleChecked(Request $request)
    {
        try {
            DB::beginTransaction();
            if (empty($request->selectedIds)) {
                return response()->json(['message' => 'Vui lòng chọn ít nhất 1 bản ghi'], 400);
            }
            $this->cinemaService->deleteMultipleChecked($request);

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
            $data = $this->cinemaService->changeOrder($request);
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
            $data = $this->cinemaService->changeActive($request);
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

    public function ajaxGetAreaByCityId(Request $request)
    {
        if (!empty($request->city_id)) {
            $areas = $this->areaService->getByCityId($request->city_id);
        }else{
            $areas = $this->areaService->getAll();
        }
        return response()->json([
            'areas' => $areas,
            'message' => 'Thành công!',
        ], 200 );
    }
}
