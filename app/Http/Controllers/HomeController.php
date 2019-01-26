<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Flyer;

class HomeController extends Controller
{
     

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $flyers = Flyer::paginate(10);
        return view('pages.home', compact('flyers'));
    }
}
