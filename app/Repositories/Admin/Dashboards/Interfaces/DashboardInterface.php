<?php

namespace App\Repositories\Admin\Dashboards\Interfaces;

interface DashboardInterface
{
    public function posts();

    public function top10PostLatest();

    public function getAllUsers();

    public function getAllMovies();

    public function getAllCinemas();

    public function getTotalTicketsInMonth();

    public function getTotalTicketsCompleted();

    public function getTotalTicketsWaitingForCancellation();

    public function getTotalTicketsCancelled();

    public function getTotalTicketsRejected();

    public function getRevenueAndTicketData($request);

    public function getTop5MoviesByViewCount();

    public function getTop5Cinemas();
}
