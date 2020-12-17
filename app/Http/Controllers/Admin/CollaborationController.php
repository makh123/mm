<?php

namespace App\Http\Controllers\Admin;

use App\collaboration;
use App\field;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CollaborationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $collaborates = collaboration::all();

        return view('admin.collaboration.all' , compact('collaborates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $collaborates = collaboration::all();
       return view('front.Cooperation',compact('collaborates'));
    }
    public function request()
    {
        $fields=field::all();

        return view('front.request',compact('fields'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\collaboration  $collaboration
     * @return \Illuminate\Http\Response
     */
    public function show(collaboration $collaboration)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\collaboration  $collaboration
     * @return \Illuminate\Http\Response
     */
    public function edit(collaboration $collaboration)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\collaboration  $collaboration
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, collaboration $collaboration)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\collaboration  $collaboration
     * @return \Illuminate\Http\Response
     */
    public function destroy(collaboration $collaboration)
    {
        //
    }
}
