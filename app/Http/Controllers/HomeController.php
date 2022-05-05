<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Liste;
use App\Models\Ticket;
use App\Models\Invite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

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
        $current_user = Auth::user();



        // Listes de l'utilisateur courant
        $categories = $current_user->lists()->get();

        // Utilisateur ayant partagée leur dashboard avec l'utilisateur courant
        $shared_users_email = Invite::where('user_email', "=", $current_user->email)->pluck("invite_email")->toArray();

        $shared_users = User::whereIn("email", $shared_users_email)->get();

        return view('home', compact('categories', 'shared_users'));
    }




    public function show($liste_id)
    {
        $categories = Liste::all();
        $invited = Invite::all();
        $tickets = Ticket::where('liste_id', $liste_id)->get();
        return view('home', compact('tickets', 'categories'));
    }
}
