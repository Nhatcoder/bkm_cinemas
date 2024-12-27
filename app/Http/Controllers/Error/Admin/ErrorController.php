<?php

namespace App\Http\Controllers\Error\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ErrorController extends Controller
{
    public function authorizeError()
    {
        return view('error.admin.authorize-error');
    }

    public function notFound()
    {
        return view('error.admin.404');
    }
}
