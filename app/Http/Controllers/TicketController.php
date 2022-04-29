<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;

class TicketController extends Controller
{

    public function index()
    {
        $tickets = Liste::all();
        return view('home', compact('tickets'));
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $list = Liste::findOrfail($id);

        // return view
    }


    public function edit($id)
    {
        $ticket = Ticket::findOrfail($id);

        return view('tickets.edit', compact('ticket'));
    }

    public function update(Request $request, $id)
    {
        
        $ticket = Ticket::findOrfail($id);
        $ticket->category = $request->input('content');
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
