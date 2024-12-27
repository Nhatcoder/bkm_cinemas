<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Movie;
use App\Models\Showtime;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ShowScheduleController extends Controller
{
    public function index()
    {
        $times = $this->getTime();
        $data = [];

        foreach ($times as $day) {
            $movies = Movie::whereHas('showtimes', function ($query) use ($day) {
                $query->whereDate('start_time', $day['time']);
            })->with(['showtimes' => function ($query) use ($day) {
                $query->whereDate('start_time', $day['time']);
            }])->get();

            $data[$day['time']] = $movies;
        }

        return view('client.pages.showtime', compact('times', 'data'));
    }

    public function getTime()
    {
        $today = Carbon::today();
        $endOfWeek = $today->copy()->endOfWeek(Carbon::SUNDAY);

        $dates = [];
        $currentDate = $today->copy();

        while ($currentDate->lte($endOfWeek)) {
            $dates[] = [
                'time' => $currentDate->format('Y-m-d'),
                'day' => $currentDate->isSameDay($today) ? 'Hôm nay' : $currentDate->translatedFormat('l'),
                'date' => $currentDate->day,
                'month' => $currentDate->month
            ];
            $currentDate->addDay();
        }

        return $dates;
    }
}

