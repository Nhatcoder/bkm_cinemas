<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SeatLayout;
use Illuminate\Support\Facades\Storage;

class SeatLayoutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $seatLayouts = SeatLayout::all()->map(function ($seatLayout) {
            $seatLayout->image = Storage::url($seatLayout->image);
            return $seatLayout;
        });
        return response()->json($seatLayouts, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'col_count' => 'required|integer',
            'row_count' => 'required|integer',
            'seats' => 'required|json',
            'image' => 'nullable|image',
        ]);

        $seatLayout = new SeatLayout();
        $seatLayout->name = $validatedData['name'];
        $seatLayout->col_count = $validatedData['col_count'];
        $seatLayout->row_count = $validatedData['row_count'];
        $seatLayout->seats = json_decode($validatedData['seats'], true);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('seat_layouts', 'public');
            $seatLayout->image = $path;
        }
        $seatLayout->save();
        return response()->json($seatLayout, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $seatLayout = SeatLayout::find($id);
        return response()->json($seatLayout, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'col_count' => 'required|integer',
            'row_count' => 'required|integer',
            'seats' => 'required|json',
            'image' => 'nullable|image',
        ]);

        $seatLayout = SeatLayout::findOrFail($id);
        $seatLayout->name = $validatedData['name'];
        $seatLayout->col_count = $validatedData['col_count'];
        $seatLayout->row_count = $validatedData['row_count'];
        $seatLayout->seats = json_decode($validatedData['seats'], true);

        if ($request->hasFile('image')) {
            if ($seatLayout->image) {
                Storage::disk('public')->delete($seatLayout->image);
            }
            $path = $request->file('image')->store('seat_layouts', 'public');
            $seatLayout->image = $path;
        }
        $seatLayout->save();
        return response()->json($seatLayout, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $seatLayout = SeatLayout::findOrFail($id);
        if ($seatLayout->image) {
            Storage::disk('public')->delete($seatLayout->image);
        }
        $seatLayout->delete();
        return response()->json(['message' => 'Thao tác thành công'], 200);
    }
}
