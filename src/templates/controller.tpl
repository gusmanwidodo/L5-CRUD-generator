<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{{model}};

class {{class}} extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        ${{list}} = {{model}}::all();

        return view('{{view}}.index', compact('{{list}}'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('{{view}}.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        {{model}}::create($request->all());

        return back()->with('success', 'success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        ${{single}} = {{model}}::find($id);

        return view('{{view}}.show', compact('{{single}}'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        ${{single}} = {{model}}::find($id);

        return view('{{view}}.edit', compact('{{single}}'));
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
        {{model}}::update($request->all());

        return back()->with('success', 'success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ${{single}} = {{model}}::find($id);

        ${{single}}->delete();

        return back()->with('success', 'success');
    }
}
