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
        return view('tickets.index', compact('tickets'));
    }


    public function create()
    {
        return view('tickets.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ticket = [
            'content' => $request->input('content'),
            'liste_id' => $request->input('liste_id')
        ];

        Ticket::create($ticket);

        return redirect()
            ->route('tickets.show', ["ticket" => $ticket["liste_id"]]);
    }


    public function show($liste_id)
    {
        $tickets = Ticket::where('liste_id', $liste_id)->get();
        return view('tickets.index', compact('tickets', 'liste_id'));
    }


    public function edit($id)
    {
        $ticket = Ticket::findOrfail($id);

        return view('tickets.edit', compact('ticket'));
    }

    public function update(Request $request, $id)
    {

        $ticket = Ticket::findOrfail($id);
        $ticket->content = $request->input('content');
        $ticket->save();

        return redirect()->route('tickets.index');
    }


    public function destroy($id)
    {
        $ticket = Ticket::findOrfail($id);
        $ticket->delete();

        return redirect()->route('tickets.show', ["ticket" => $ticket["liste_id"]]);
    }
}
