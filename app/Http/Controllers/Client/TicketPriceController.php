<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Services\Client\Movies\Interfaces\MovieServiceInterface;
use App\Services\Client\Systems\Interfaces\SystemServiceInterface;

class TicketPriceController extends Controller
{
    private $systemService;
    private $movieService;

    public function __construct(
        SystemServiceInterface $systemService,
        MovieServiceInterface $movieService
    ){
        $this->systemService = $systemService;
        $this->movieService = $movieService;
    }

    public function index()
    {
        $ticketPrice = $this->systemService->getSytemBySlug('gia-ve');

        if (empty($ticketPrice) || $ticketPrice->childs->isEmpty()) return view('error.client.404');

        $movieIsShowing = $this->movieService->movieIsShowing();

        return view('client.pages.ticket-price', compact( 'ticketPrice', 'movieIsShowing'));
    }
}
