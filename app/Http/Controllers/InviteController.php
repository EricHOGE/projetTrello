<?php

namespace App\Http\Controllers;

use App\Models\Invite;
use App\Models\User;
use App\Mail\WelcomeEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class InviteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $invites = Invite::where("user_email", "=", Auth::user()->email);
        // return view('invite.invite', compact("invites"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $invites = Invite::where("user_email", "=", Auth::email())->get();
        // return view('invite.invite', compact("invites"));
        return view('invites.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_email' => 'required|string|max:255'
        ]);

        $user = User::where("email", "=", $request->user_email)->get();

        if (count($user) == 0) {
            return redirect()
                ->back()
                ->with('message', 'L\'utilisateur invité n\'existe pas');
        }

        $invite = [
            "user_email" => $request->user_email,
            'invite_email' => $request->invite_email
        ];

        Invite::create($invite);

        Mail::to($request->user_email)->send(new WelcomeEmail());
        

        return redirect()
            ->route('home')
            ->with('message', 'Votre invitation a bien été envoyée');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
