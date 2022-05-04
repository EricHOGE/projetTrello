<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Liste;
use App\Models\Ticket;
use App\Models\Invite;
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
        $categories = Liste::all();
        
     
        $invited = Invite::all();
        // $invites_id = Invite::where('id')->get();
        // foreach ($invited as $invite) {
            
            // $result = $invite->id;
            // $result_user = $invite->user_email;
            // $result_invite = $invite->invite_email;
        // }
        // $invite = Invite::where('id')->get();
        // dd($invite->user_email);
        // if ($invited->id  == $connected->id) {
        // dd('coucou');
        return view('home', compact('categories'));
        }



    
    public function show($liste_id)
    {
        $categories = Liste::all();
        $tickets = Ticket::where('liste_id', $liste_id)->get();
        return view('home', compact('tickets', 'categories'));
    }
}
