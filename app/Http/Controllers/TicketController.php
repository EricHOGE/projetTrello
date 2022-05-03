<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\Liste;

class TicketController extends Controller
{

    public function index()
    {
        $tickets = Ticket::all();
        return view('home', compact('tickets'));
    }


    public function create()
    {
        return view('tickets.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required|string|max:255'
        ]);
        
        $ticket = [
            'content' => $request->input('content'),
            'liste_id' => $request->input('liste_id')
        ];

        Ticket::create($ticket);

        return redirect()
            ->route('home');
          
    }


    public function show($liste_id)
    {
        $tickets = Ticket::where('liste_id', $liste_id)->get();
        return view('home', compact('tickets', 'liste_id'));
    }


    public function edit($id)
    {
        $ticket = Ticket::findOrfail($id);

        return view('tickets.edit', compact('ticket','id'));
    }

    public function update(Request $request, $id)
    {

        $ticket = Ticket::findOrfail($id);
        $ticket->content = $request->input('content');
        $ticket->save();

        return redirect()->route('home');
    }


    public function destroy($id)
    {
       
        $ticket = Ticket::findOrfail($id);
        $ticket->delete();

        return redirect()->back();
    }
}
