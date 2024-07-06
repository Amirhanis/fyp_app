<?php

namespace App\Http\Controllers;

use App\Models\State;
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $states = State::select()->orderBy('id','asc')->get();

        return view('home', compact('states'));
    }
}