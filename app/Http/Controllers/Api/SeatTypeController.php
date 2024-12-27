<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SeatType;

class SeatTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $seatTypes = SeatType::all();
        return response()->json($seatTypes);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'code' => 'required|string|unique:seat_types,code',
            'bonus_price' => 'required|numeric',
            'text' => 'nullable|string',
            'color' => 'nullable|string',
            'icon' => 'nullable|string',
            'is_system' => 'boolean',
        ]);

        $seatType = SeatType::create($validatedData);
        return response()->json($seatType);
    }

    /**
     * Display the specified resource.
     */
    public function show(SeatType $seatType)
    {
        return response()->json($seatType);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SeatType $seatType)
    {
        $validatedData = $request->validate([
            'code' => 'required|string|unique:seat_types,code,' . $seatType->id,
            'bonus_price' => 'required|numeric',
            'text' => 'nullable|string',
            'color' => 'nullable|string',
            'icon' => 'nullable|string',
            'is_system' => 'boolean',
        ]);

        $seatType->update($validatedData);
        return response()->json($seatType);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SeatType $seatType)
    {
        $seatType->delete();
        return response()->json(['message' => 'Seat type deleted successfully']);
    }

    public function getSeatTypesKeyByCode()
    {
        $seatTypes = SeatType::all()->keyBy('code');
        return response()->json($seatTypes);
    }
}
