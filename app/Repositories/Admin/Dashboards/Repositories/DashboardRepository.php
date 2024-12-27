<?php

namespace App\Repositories\Admin\Dashboards\Repositories;

use App\Models\Booking;
use App\Models\Cinema;
use App\Models\Movie;
use App\Models\Post;
use App\Models\User;
use Carbon\Carbon;
use App\Repositories\Admin\Dashboards\Interfaces\DashboardInterface;
use App\Repositories\Base\BaseRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardRepository extends BaseRepository implements DashboardInterface
{
    protected $booking;

    protected $movie;

    protected $user;

    protected $cinema;

    public function __construct(
        Booking $booking,
        Movie $movie,
        User $user,
        Cinema $cinema
    ) {
        parent::__construct();
        $this->booking = $booking;
        $this->movie = $movie;
        $this->user = $user;
        $this->cinema = $cinema;
    }

    public function getModel()
    {
        return Post::class;
    }

    public function posts()
    {
        return $this->model->get();
    }

    public function top10PostLatest()
    {
        return $this->model->orderBy('id', 'desc')->take(10)->get();
    }

    public function getAllUsers()
    {
        return $this->user->where('status', 1)->get();
    }

    public function getAllMovies()
    {
        return $this->movie->get();
    }

    public function getAllCinemas()
    {
        return $this->cinema->get();
    }

    public function getTotalTicketsInMonth()
    {
        $query = $this->booking->where('code', '!=', null)
            ->where('status', 'completed')
            ->where('payment_status', 'completed')
            ->whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year);

        if (Auth::user()->cinema_id !== null) {
            $query->where('cinema_id', Auth::user()->cinema_id);
        }

        return $query->count();
    }

    public function getTotalTicketsCompleted()
    {
        $query = $this->booking->where('code', '!=', null)
            ->where('status', 'completed')
            ->where('payment_status', 'completed');

        if (Auth::user()->cinema_id !== null) {
            $query->where('cinema_id', Auth::user()->cinema_id);
        }

        $totalTickets = $query->count();

        return $totalTickets;
    }

    public function getTotalTicketsWaitingForCancellation()
    {
        $query = $this->booking->where('code', '!=', null)
            ->where('status', 'waiting_for_cancellation');

        if (Auth::user()->cinema_id !== null) {
            $query->where('cinema_id', Auth::user()->cinema_id);
        }

        $totalTickets = $query->count();

        return $totalTickets;
    }

    public function getTotalTicketsCancelled()
    {
        $query = $this->booking->where('code', '!=', null)
            ->where('status', 'cancelled');

        if (Auth::user()->cinema_id !== null) {
            $query->where('cinema_id', Auth::user()->cinema_id);
        }

        $totalTickets = $query->count();

        return $totalTickets;
    }

    public function getTotalTicketsRejected()
    {
        $query = $this->booking->where('code', '!=', null)
            ->where('status', 'rejected');

        if (Auth::user()->cinema_id !== null) {
            $query->where('cinema_id', Auth::user()->cinema_id);
        }

        $totalTickets = $query->count();

        return $totalTickets;
    }

    public function getRevenueAndTicketData($request)
    {
        $filter = $request->filter;
        $startDate = $request->start_date;
        $endDate = $request->end_date;
        $month = $request->month;
        $year = $request->yearMonth;
        $yearFilter = $request->year_filter;

        $userCinemaId = Auth::user()->cinema_id;
        $userType = Auth::user()->type;
        $requestedCinemaId = $request->cinema_id;

        $query = $this->booking->with('movie')
            ->where('code', '!=', null)
            ->where('status', 'completed')
            ->where('payment_status', 'completed');

        if ($userCinemaId === null && $userType === 'admin') {
            if ($requestedCinemaId) {
                $query->where('cinema_id', $requestedCinemaId);
            }
        } elseif ($requestedCinemaId) {
            $query->where('cinema_id', $userCinemaId);
        }

        if ($filter === 'day' && $request->has('date')) {
            $date = Carbon::parse($request->date)->startOfDay();
            $query->whereDate('created_at', $date);
        }

        if ($filter === 'month' && $month && $year) {
            $query->whereMonth('created_at', $month)->whereYear('created_at', $year);
        }

        if ($filter === 'year' && $yearFilter) {
            $query->whereYear('created_at', $yearFilter);
        }

        if ($filter === 'range' && $startDate && $endDate) {
            $startDate = Carbon::parse($startDate)->startOfDay();
            $endDate = Carbon::parse($endDate)->endOfDay();
            $query->whereBetween('created_at', [$startDate, $endDate]);
        }

        $bookings = $query->get();

        $totalTicketsInMonth = $this->getTotalTicketsInMonth();
        $totalTicketsCompleted = $this->getTicketCount('completed', $filter, $startDate, $endDate, $month, $year, $yearFilter, $requestedCinemaId, $userCinemaId);
        $totalTicketsWaitingForCancellation = $this->getTicketCount('waiting_for_cancellation', $filter, $startDate, $endDate, $month, $year, $yearFilter, $requestedCinemaId, $userCinemaId);
        $totalTicketsCancelled = $this->getTicketCount('cancelled', $filter, $startDate, $endDate, $month, $year, $yearFilter, $requestedCinemaId, $userCinemaId);
        $totalTicketsRejected = $this->getTicketCount('rejected', $filter, $startDate, $endDate, $month, $year, $yearFilter, $requestedCinemaId, $userCinemaId);

        $topMovies = $this->getTopMovies($bookings, $requestedCinemaId, $userCinemaId, $userType);

        $chartData = $bookings->groupBy(function ($booking) {
            return $booking->created_at->format('d/m/Y') . ' - ' . $booking->movie->title;
        })
            ->map(function ($bookings, $movieNameAndDate) {
                return [
                    'movie_name_and_date' => $movieNameAndDate,
                    'total_revenue' => $bookings->sum('final_price'),
                    'movie_count' => $bookings->count(),
                ];
            })
            ->values();

        return [
            'chart_data' => $chartData,
            'top_movies' => $topMovies,
            'cinema_id' => $requestedCinemaId ?: null,
            'totalTicketsInMonth' => $totalTicketsInMonth,
            'totalTicketsCompleted' => $totalTicketsCompleted,
            'totalTicketsWaitingForCancellation' => $totalTicketsWaitingForCancellation,
            'totalTicketsCancelled' => $totalTicketsCancelled,
            'totalTicketsRejected' => $totalTicketsRejected,
        ];
    }

    public function getTicketCount($status, $filter, $startDate, $endDate, $month, $year, $yearFilter, $cinemaId, $userCinemaId)
    {
        $query = $this->booking->where('code', '!=', null)
            ->where('status', $status);

        if ($cinemaId || $userCinemaId) {
            $query->where('cinema_id', $cinemaId ?: $userCinemaId);
        }

        if ($filter === 'day' && request()->has('date')) {
            $date = Carbon::parse(request()->date)->startOfDay();
            $query->whereDate('created_at', $date);
        }

        if ($filter === 'month' && $month && $year) {
            $query->whereMonth('created_at', $month)->whereYear('created_at', $year);
        }

        if ($filter === 'year' && $yearFilter) {
            $query->whereYear('created_at', $yearFilter);
        }

        if ($filter === 'range' && $startDate && $endDate) {
            $query->whereBetween('created_at', [Carbon::parse($startDate)->startOfDay(), Carbon::parse($endDate)->endOfDay()]);
        }

        return $query->count();
    }

    public function getTopMovies($bookings, $requestedCinemaId, $userCinemaId, $userType)
    {
        if ($userType !== 'admin' && !$requestedCinemaId && !$userCinemaId) {
            $groupedByMovie = $bookings->groupBy('movie.id')
                ->map(function ($movieBookings) {
                    return [
                        'movie_name' => $movieBookings->first()->movie->title,
                        'total_revenue' => $movieBookings->sum('final_price'),
                        'total_tickets' => $movieBookings->count(),
                    ];
                }); 

            return $groupedByMovie->sortByDesc('total_revenue')->take(5)->values();
        }

        $groupedByMovie = $bookings->groupBy('movie.id')
            ->map(function ($movieBookings) {
                return [
                    'movie_name' => $movieBookings->first()->movie->title,
                    'total_revenue' => $movieBookings->sum('final_price'),
                    'total_tickets' => $movieBookings->count(),
                ];
            });
        $groupedByMovie = $groupedByMovie->sortByDesc('total_revenue')->take(5)->values();

        return $groupedByMovie;
    }


    public function getTop5MoviesByViewCount()
    {
        $topMovies = $this->booking->select('movie_id', DB::raw('count(*) as views_count'))
            ->groupBy('movie_id')
            ->orderByDesc('views_count')
            ->limit(5)
            ->get();

        $movies = $this->movie->whereIn('id', $topMovies->pluck('movie_id'))
            ->get();

        return $movies;
    }

    public function getTop5Cinemas()
    {
        $conditions = function ($query) {
            $query->whereNotNull('code')
                ->whereIn('status', ['completed', 'rejected'])
                ->where('payment_status', 'completed');
        };

        $top5Cinemas = Cinema::withCount([
            'bookings as total_tickets' => $conditions,
        ])
        ->withSum([
            'bookings as total_revenue' => $conditions,
        ], 'final_price')
        ->having('total_tickets', '>', 0)
        ->having('total_revenue', '>', 0)
        ->orderByDesc('total_revenue')
        ->orderByDesc('total_tickets')
        ->take(5)
        ->get(['id', 'name']);

        return $top5Cinemas;
    }

    public function getTop1MovieByRevenue()
    {
        $topMovie = Movie::withCount([
            'bookings as total_tickets' => function ($query) {
                $query->where('code', '!=', null)
                    ->where('status', 'completed')
                    ->where('payment_status', 'completed');

                if (Auth::user()->cinema_id !== null) {
                    $query->where('cinema_id', Auth::user()->cinema_id);
                }
            }
        ])
            ->withSum([
                    'bookings as total_revenue' => function ($query) {
                        $query->where('code', '!=', null)
                            ->where('status', 'completed')
                            ->where('payment_status', 'completed');

                        if (Auth::user()->cinema_id !== null) {
                            $query->where('cinema_id', Auth::user()->cinema_id);
                        }
                    }
                ], 'final_price')
            ->orderByDesc('total_revenue')
            ->orderByDesc('total_tickets')
            ->limit(1)
            ->first();

        return $topMovie;
    }
}
