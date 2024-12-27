<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SeatLayout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class SeatLayoutController extends Controller
{
    public function index()
    {
        $seatLayouts = SeatLayout::paginate(3);
        return view('admin.pages.room-manager.seat-layout.index', [
            'seatLayouts' => $seatLayouts
        ]);
    }

    public function create()
    {
        return view('admin.pages.room-manager.seat-layout.create');
    }

    public function store(Request $request)
    {
        // Logic to store the seat layout
        // Example: SeatLayout::create($request->all());
        return redirect()->route('seat-layouts.index')->with('message', 'Tạo sơ đồ ghế thành công');
    }

    public function edit(SeatLayout $seatLayout)
    {
        return view('admin.pages.room-manager.seat-layout.edit', [
            'seatLayout' => $seatLayout
        ]);
    }

    public function update(Request $request, SeatLayout $seatLayout)
    {
        // Logic to update the seat layout
        // Example: $seatLayout = SeatLayout::find($id);
        // $seatLayout->update($request->all());
        // return redirect()->route('admin.seat-layouts.index')->with('message', 'Cập nhật sơ đồ ghế thành công');
    }

    public function destroy(SeatLayout $seatLayout)
    {
        if ($seatLayout->image) {
            Storage::disk('public')->delete($seatLayout->image);
        }
        $seatLayout->delete();
        return redirect()->route('admin.seat-layouts.index')->with('message', 'Xóa sơ đồ ghế thành công');
    }
}
