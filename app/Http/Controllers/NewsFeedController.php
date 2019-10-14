<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsFeedController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('news');
    }
}
