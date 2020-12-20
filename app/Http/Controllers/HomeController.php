<?php

namespace App\Http\Controllers;

use App\Line;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $activeLine = Line::query()->where('active', true)->first();

        $lines = Line::query()->get();

        return view('home', compact('activeLine', 'lines'));
    }
}
