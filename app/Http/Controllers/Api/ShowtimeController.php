<?php

namespace App\Http\Controllers\Api;

use App\Constants\SeatType as ConstantsSeatType;
use App\Events\BookSeat;
use App\Http\Controllers\Controller;
use App\Jobs\ResetSeatStatus;
use App\Models\Area;
use App\Models\Cinema;
use App\Models\Room;
use App\Models\SeatType;
use App\Models\Showtime;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;

class ShowtimeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $showtimes = Showtime::all();
        return response()->json($showtimes);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'start_time' => 'required|date',
            'end_time' => 'required|date',
            'room_id' => 'required|integer|exists:rooms,id',
        ]);
        $data = $request->all();
        $showtime = Showtime::create([
            'cinema_id' => auth()->user()->cinema_id,
            'start_time' => $data['start_time'],
            'end_time' => $data['end_time'],
            'room_id' => $data['room_id'],
        ]);
        return response()->json($showtime, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $showtime = Showtime::findOrFail($id);
        return response()->json($showtime);
    }

    public function getShowtimeDetailById(Showtime $showtime)
    {
        $seats = Cache::get("showtime.$showtime->id.seats");
        if ($seats) {
            $seats = $seats->values();
        }
        if (!$seats) {
            $seats = DB::select("
            SELECT s.*,
            IF(s.type = 'empty-seat', 'unavailable',
                IF(
                    EXISTS (SELECT 1
                    FROM bookings b
                    JOIN booking_seats bs ON bs.booking_id = b.id
                    WHERE b.showtime_id = st.id AND b.status = 'completed' OR b.status = 'rejected'
                    AND bs.seat_id = s.id), 'booked', 'available')
            ) AS status,
            (SELECT b.user_id FROM bookings b JOIN booking_seats bs ON bs.booking_id = b.id WHERE b.showtime_id = st.id AND bs.seat_id = s.id LIMIT 1) AS user_id FROM showtimes st JOIN rooms r ON r.id = st.room_id LEFT JOIN seats s ON s.room_id = r.id
            WHERE st.id = ? and s.deleted_at is null;
            ", [$showtime->id]);
            Cache::put("showtime.$showtime->id.seats", collect($seats)->keyBy('seat_number'));
        }

        $seatTypes = collect($seats)
            ->filter(fn($seat) => $seat->type !== ConstantsSeatType::EMPTY_SEAT)
            ->map(fn($seat) => $seat->type)->unique()->values()->toArray();
        $seatTypes = SeatType::whereIn('code', $seatTypes)->get();
        $room = Room::find($showtime->room_id);
        $room->seats = $seats;
        $room->seat_types = $seatTypes;
        $showtime->room = $room;
        $showtime->load(['movie', 'cinema']);
        return response()->json($showtime);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $showtime = Showtime::findOrFail($id);
        $showtime->update($request->all());
        return response()->json($showtime, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $showtime = Showtime::findOrFail($id);
        $showtime->delete();
        return response()->json(null, 204);
    }

    public function getShowtimesByDayAndRoomId(Request $request)
    {
        $request->validate([
            'start_date' => 'required|date',
            'room_id' => 'required|integer|exists:rooms,id',
            'cinema_id' => 'nullable|integer|exists:cinemas,id',
        ]);
        $cinemaId = $request->cinema_id ?? auth()->user()->cinema_id;

        $startDate = $request->start_date;
        $showtimes = Showtime::whereDate('start_time', '=', Carbon::parse($startDate)->toDateString())
            ->where('room_id', '=', $request->room_id)
            ->where('cinema_id', '=', $cinemaId)
            ->with('movie')
            ->get();
        return response()->json($showtimes);
    }

    public function clearShowtimeMovie(Showtime $showtime)
    {
        $showtime->movie_id = null;
        $showtime->save();
        return response()->json($showtime, 200);
    }

    public function updateShowtimeMovie(Request $request, Showtime $showtime)
    {
        $showtime->movie_id = $request->movie_id;
        $showtime->save();
        $showtime->load('movie');
        return response()->json($showtime, 200);
    }

    public function bookSeat(Request $request, Showtime $showtime)
    {
        if ($request->seat_number) {
            BookSeat::dispatch($showtime->id, [$request->seat_number]);
        }
    }

    public function getShowtimeDetailForMovie(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
            'movie_id' => 'required|integer',
            'city_id' => 'required|integer'
        ]);
        $cinemas = Cinema::whereHas('area.city', function ($query) use ($request) {
            $query->where('id', $request->city_id);
        })
            ->whereHas('showtimes', function ($query) use ($request) {
                $query->where('movie_id', $request->movie_id)
                    ->whereDate('start_time', Carbon::parse($request->date)->toDateString());
            })
            ->with(['area', 'city', 'showtimes' => function ($query) use ($request) {
                $query->where('movie_id', $request->movie_id)
                    ->whereDate('start_time', Carbon::parse($request->date)->toDateString());
            }])->get();
        return response()->json($cinemas);
    }
}
