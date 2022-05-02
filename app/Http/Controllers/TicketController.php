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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        ];

        Ticket::create($ticket);

        return redirect()
            ->route('tickets.index');
    }

 
    public function show($id, $liste_id)
    {
        Liste::with('tickets')->get();
        $ticket = Ticket::findOrfail($id);
        $ticket = Ticket::with('content')
            ->where('liste_id',$id)
            ->first();

        return view('tickets.show', compact('content'));
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

        return redirect()->route ('tickets.index');


    }


    public function destroy($id)
    {
        $ticket = Ticket::findOrfail($id);
        $ticket->delete();

        return redirect()->route('tickets.index');
    }
}
