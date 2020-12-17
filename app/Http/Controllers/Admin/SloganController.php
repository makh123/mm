<?php

namespace App\Http\Controllers\Admin;

use App\slogan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SloganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $name=auth()->user()->name;
        $image=auth()->user()->images['thumb'];
        $slogan=slogan::latest()->paginate(5);
        return view('admin.slogan.all',compact('name','image','slogan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $name=auth()->user()->name;
        $image=auth()->user()->images['thumb'];
       return view('admin.slogan.create',compact('name','image'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $image=$request['image'];
        $parts1 = explode("/", $image);

        $filename1 = array_pop($parts1);

        $imagePath1 = implode("/", $parts1);

        $filePath1 = $imagePath1 . "/thumbs";

        $thumb = $filePath1 . "/" . $filename1;

        $imagesUrl['original'] = $image;
        $imagesUrl['thumb'] = $thumb;
        $slogan= slogan::create([
            'title' => $request['title'],
            'description'=>$request['description'],
            'images'=>$imagesUrl,

        ]);
        return redirect(route('slogan.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\slogan  $slogan
     * @return \Illuminate\Http\Response
     */
    public function show(slogan $slogan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\slogan  $slogan
     * @return \Illuminate\Http\Response
     */
    public function edit(slogan $slogan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\slogan  $slogan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, slogan $slogan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\slogan  $slogan
     * @return \Illuminate\Http\Response
     */
    public function destroy(slogan $slogan)
    {
        //
    }
}
