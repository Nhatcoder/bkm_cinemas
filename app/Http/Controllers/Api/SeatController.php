<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Seat;
use Illuminate\Http\Request;

class SeatController extends Controller
{
    public function index()
    {
        $seats = Seat::all();
        return response()->json($seats, 200);
    }

    public function show($id)
    {
        $seat = Seat::findOrFail($id);
        return response()->json($seat, 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            '*.type' => 'required|string',
            '*.slot' => 'required|integer',
            '*.sort' => 'required|integer',
            '*.visible' => 'required|boolean',
            '*.seat_number' => 'required|string',
            '*.merged_seats' => 'nullable|array'
        ]);

        $seats = Seat::insert($request->all());

        return response()->json(['message' => 'Seats added successfully'], 201);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'type' => 'required|string',
            'slot' => 'required|integer',
            'sort' => 'required|integer',
            'visible' => 'required|boolean',
            'seat_number' => 'required|string',
            'merged_seats' => 'nullable|array'
        ]);

        $seat = Seat::findOrFail($id);
        $seat->update($request->all());

        return response()->json(['message' => 'Seat updated successfully'], 200);
    }

    public function destroy($id)
    {
        $seat = Seat::findOrFail($id);
        $seat->delete();

        return response()->json(['message' => 'Seat deleted successfully'], 200);
    }
}