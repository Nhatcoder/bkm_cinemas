<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Cities\CityRequest;
use App\Services\Admin\Cities\Interfaces\CityServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CityController extends Controller
{
    protected $cityService;

    public function __construct(
        CityServiceInterface $cityService
    ){
        $this->cityService =  $cityService;
    }

    public function index(Request $request)
    {
        $cities = $this->cityService->filter($request);
        return view('admin.pages.cities.index', compact('cities'));
    }

    public function create()
    {
        return view('admin.pages.cities.create');
    }

    public function store(CityRequest $request)
    {
        $data = $request->city;
        DB::beginTransaction();
        try {
            $this->cityService->create($data);
            DB::commit();
            return redirect()->route('admin.cities.index')->with('status_succeed', 'Thêm thành phố thành công');
        } catch (\Exception $e) {
            DB::rollBack();

            Log::error('Message: ' . $e->getMessage() . ' ---Line: ' . $e->getLine());

            return redirect()->route('admin.cities.create')->with('status_failed', 'Không thể tạo thành phố.');
        }
    }
    public function edit($id)
    {
            $city = $this->cityService->find($id);

            if (!$city) {
                return redirect()->route('admin.cities.index')->with(['status_failed' => 'Không tìm thấy!']);
            }
            return view('admin.pages.cities.edit', compact('city'));
    }

    public function update(CityRequest $request, $id)
    {
        $data = $request->city;
        DB::beginTransaction();
        try {
            $this->cityService->update($data, $id);
            DB::commit();
            return redirect()->route('admin.cities.index')->with('status_succeed', 'Cập nhật thành phố thành công');
        } catch (\Exception $e) {
            DB::rollBack();

            Log::error('Message: ' . $e->getMessage() . ' ---Line: ' . $e->getLine());

            return redirect()->route('admin.cities.edit', $id)->with('status_failed', 'Cập nhật thành phố không thành công.');
        }
    }

    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            $this->cityService->delete($id);
            DB::commit();
            return redirect()->route('admin.cities.index')->with('status_succeed', 'Xóa thành phố thành công');
        } catch (\Exception $e) {
            DB::rollBack();

            Log::error('Message: ' . $e->getMessage() . ' ---Line: ' . $e->getLine());

            return redirect()->route('admin.cities.index')->with('status_failed', 'Xóa thành phố không thành công.');
        }

    }
}
