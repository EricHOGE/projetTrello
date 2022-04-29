<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Liste;

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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $list = [
            'category' => $request->input('category'),
        ];

        Liste::create($list);

        return redirect()
            ->route('home')
            ->with('message', 'Votre liste a bien été créée');
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
