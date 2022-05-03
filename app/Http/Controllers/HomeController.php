<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Liste;
use App\Models\Ticket;


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
        $categories = Liste::all();
        return view('home', compact('categories'));
        // $categories = Liste::all();
        // return view('home', compact('categories'));



    }
    public function show($liste_id)
    {
        $categories = Liste::all();
        $tickets = Ticket::where('liste_id', $liste_id)->get();
        return view('home', compact('tickets', 'categories'));
    }
}
