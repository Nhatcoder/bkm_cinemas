<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rooms = Room::with('seats')
            ->when(auth()->user()->cinema_id, function ($query, $cinemaId) {
                $query->where('cinema_id', $cinemaId);
            })
            ->paginate(10);

        return view('admin.pages.room-manager.room.index', compact('rooms'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.room-manager.room.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Room $room)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Room $room)
    {
        if (!empty(auth()->user()->cinema_id) && $room->cinema_id != auth()->user()->cinema_id) {
            abort(403);
        }
        return view('admin.pages.room-manager.room.edit', [
            'room' => $room->load('seats')
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Room $room)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Room $room)
    {
        if ($room->image) {
            Storage::disk('public')->delete($room->image);
        }
        $room->showtimes()->delete();
        $room->seats()->delete();
        $room->movies()->detach();
        $room->delete();
        return redirect()->route('admin.rooms.index')->with('message', 'Xóa phòng thành công');
    }
}
