<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Liste;
use App\Models\Ticket;

class ListController extends Controller
{

    public function index()
    {
        // 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('lists.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'category' => 'required|string|max:255'
        ]);

        $list = [
            'category' => $request->input('category'),
            'user_id' => $request->input('user_id'),
            'auth_email' => $request->input('auth_email')
        ];

        Liste::create($list);

        return redirect()
            ->route('home')
            ->with('message', 'Votre liste a bien été créée');
    }


    public function show($id)
    {
        // 
    }


    public function edit($id)
    {
        $list =Liste::findOrfail($id);

        return view('lists.edit', compact('list'));
    }

    public function update(Request $request, $id)
    {
        
        $list = Liste::findOrfail($id);
        $list->category = $request->input('category');
        $list->save();

        return redirect()->route ('home');


    }


    public function destroy($id)
    {
        $list = Liste::findOrfail($id);
        $list->delete();

        return redirect()->route('home');
    }
}
