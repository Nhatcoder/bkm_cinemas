<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Services\Admin\Areas\Interfaces\AreaServiceInterface;
use App\Services\Admin\Cinemas\Interfaces\CinemaServiceInterface;
use App\Services\Admin\Cities\Interfaces\CityServiceInterface;
use App\Services\Admin\Dashboards\Interfaces\DashboardServiceInterface;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    protected $dashboardService;

    protected $cityService;

    protected $areaService;

    protected $cinemaService;

    public function __construct(
        DashboardServiceInterface   $dashboardService,
        CityServiceInterface        $cityService,
        AreaServiceInterface        $areaService,
        CinemaServiceInterface      $cinemaService
    )
    {
        $this->dashboardService = $dashboardService;
        $this->cityService = $cityService;
        $this->areaService = $areaService;
        $this->cinemaService = $cinemaService;
    }

    public function dashboard()
    {
        $data['posts'] = $this->dashboardService->posts();

        $data['users'] = $this->dashboardService->getAllUsers();

        $data['movies'] = $this->dashboardService->getAllMovies();

        $data['cities'] = $this->cityService->getAll();

        $data['cinemas'] = $this->dashboardService->getAllCinemas();

        $data['totalTicketsInMonth'] = $this->dashboardService->getTotalTicketsInMonth();

        $data['totalTicketsCompleted'] = $this->dashboardService->getTotalTicketsCompleted();

        $data['totalTicketsWaitingForCancellation'] = $this->dashboardService->getTotalTicketsWaitingForCancellation();

        $data['totalTicketsCancelled'] = $this->dashboardService->getTotalTicketsCancelled();

        $data['totalTicketsRejected'] = $this->dashboardService->getTotalTicketsRejected();

        $data['top10PostLatest'] = $this->dashboardService->top10PostLatest();

        $data['cinemas'] = $this->cinemaService->getAllActive();

        $data['top5Movies'] = $this->dashboardService->getTop5MoviesByViewCount();

        $data['top5Cinemas'] = $this->dashboardService->getTop5Cinemas();

        $data['top1Movie'] = $this->dashboardService->getTop1MovieByRevenue();

        return view('admin.pages.dashboard', compact('data'));
    }

    public function getRevenueAndTicketData(Request $request)
    {
        $data['chart'] = $this->dashboardService->getRevenueAndTicketData($request);

        return response()->json([
            'chart'                                 => $data['chart']['chart_data'],
            'topMovies'                             => $data['chart']['top_movies'],
            'cinemaId'                              => $data['chart']['cinema_id'],
            'totalTicketsInMonth'                   => $data['chart']['totalTicketsInMonth'],
            'totalTicketsCompleted'                 => $data['chart']['totalTicketsCompleted'],
            'totalTicketsWaitingForCancellation'    => $data['chart']['totalTicketsWaitingForCancellation'],
            'totalTicketsCancelled'                 => $data['chart']['totalTicketsCancelled'],
            'totalTicketsRejected'                  => $data['chart']['totalTicketsRejected'],
        ]);
    }

    public function getAreaByCity(Request $request)
    {
        $data['areas'] = $this->areaService->getByCityId($request->city_id);

        return response()->json([
            'areas' => $data['areas'],
        ]);
    }

    public function getCinemaByArea(Request $request)
    {
        $data['cinemas'] = $this->cinemaService->getCinemaByArea($request->area_id);

        return response()->json([
            'cinemas' => $data['cinemas'],
        ]);
    }
}
