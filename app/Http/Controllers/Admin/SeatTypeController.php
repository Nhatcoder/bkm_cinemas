<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SeatType;
use Illuminate\Http\Request;

class SeatTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.pages.room-manager.seat-type.index', [
            'seatTypes' => SeatType::paginate(5)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.room-manager.seat-type.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     */
    public function show(SeatType $seatType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SeatType $seatType)
    {
        return view('admin.pages.room-manager.seat-type.edit', [
            'seatType' => $seatType
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SeatType $seatType)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
        ]);

        $seatType->name = $request->name;
        $seatType->description = $request->description;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SeatType $seatType)
    {
        $seatType->delete();
        return redirect()->route('admin.seat-types.index')->with('success', 'Loại ghế đã được xóa thành công');
    }
}
