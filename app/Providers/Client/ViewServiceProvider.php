<?php

namespace App\Providers\Client;

use App\Services\Client\Movies\Interfaces\MovieServiceInterface;
use App\Services\Client\Views\Interfaces\ViewServiceInterface;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    protected $viewDataService;
    protected $movieService;

    public function boot(): void
    {
        $this->viewDataService  = App::make(abstract: ViewServiceInterface::class);
        $this->movieService     = App::make(MovieServiceInterface::class);

        View::composer('client.partials.*', function ($view) {
            $notifications = $this->viewDataService->getNotifications();
            $customerCare  = $this->viewDataService->getSytemBySlug('cham-soc-khach-hang');
            $connectWithUs = $this->viewDataService->getSytemBySlug('ket-noi-voi-chung-toi');
            $rightFooter   = $this->viewDataService->getSytemBySlug('right-footer');
            $view->with([
                'notifications' => $notifications,
                'customerCare' => $customerCare,
                'connectWithUs' => $connectWithUs,
                'rightFooter' => $rightFooter,
            ]);
        });

        View::composer('client.components.movie-showing-sidebar', function ($view) {
            $movieIsShowing = $this->movieService->movieIsShowing();
            $view->with([
                'movieIsShowing' => $movieIsShowing
            ]);
        });
    }
}
