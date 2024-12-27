<?php

namespace App\Services\Admin\Dashboards\Services;

use App\Repositories\Admin\Dashboards\Interfaces\DashboardInterface;
use App\Repositories\Admin\Dashboards\Repositories\DashboardRepository;
use App\Services\Admin\Dashboards\Interfaces\DashboardServiceInterface;
use App\Services\Base\BaseService;

class DashboardService extends BaseService implements DashboardServiceInterface
{
    public function getRepository()
    {
        return DashboardInterface::class;
    }

    public function posts()
    {
        return $this->repository->posts();
    }

    public function top10PostLatest()
    {
        return $this->repository->top10PostLatest();
    }

    public function getAllUsers()
    {
        return $this->repository->getAllUsers();
    }

    public function getAllMovies()
    {
        return $this->repository->getAllMovies();
    }

    public function getAllCinemas()
    {
        return $this->repository->getAllCinemas();
    }

    public function getTotalTicketsInMonth()
    {
        return $this->repository->getTotalTicketsInMonth();
    }

    public function getTotalTicketsCompleted()
    {
        return $this->repository->getTotalTicketsCompleted();
    }

    public function getTotalTicketsWaitingForCancellation()
    {
        return $this->repository->getTotalTicketsWaitingForCancellation();
    }

    public function getTotalTicketsCancelled()
    {
        return $this->repository->getTotalTicketsCancelled();
    }

    public function getTotalTicketsRejected()
    {
        return $this->repository->getTotalTicketsRejected();
    }

    public function getRevenueAndTicketData($request)
    {
        return $this->repository->getRevenueAndTicketData($request);
    }

    public function getTop5MoviesByViewCount()
    {
        return $this->repository->getTop5MoviesByViewCount();
    }

    public function getTop5Cinemas()
    {
        return $this->repository->getTop5Cinemas();
    }

    public function getTop1MovieByRevenue()
    {
        return $this->repository->getTop1MovieByRevenue();
    }
}
