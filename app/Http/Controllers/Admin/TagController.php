<?php

namespace App\Http\Controllers\Admin;

use App\Language;
use Conner\Tagging\Model\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TagController extends Controller
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
        $tags= Tag::all();
        // $tags=Gallery::existingTags();
        return view('admin.tag.all',compact('tags','name','image'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'slug' => 'required|max:10|regex:/^(?i)[A-Za-z]+$/u',
            'tag' => 'required|max:15',
        ]);

        Tag::create([
            'name'=> htmlspecialchars($request['tag']),
            'slug'=> htmlspecialchars($request['slug']),
        ]);
        return redirect(route('tags.index'));
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
        $name=auth()->user()->name;
        $image=auth()->user()->images['thumb'];
        $tag= Tag::where('id', $id)->first();
        return view('admin.tag.tagEdit',compact('tag','name','image'));
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
        $request->validate([
            'slug' => 'required|max:10|regex:/^(?i)[A-Za-z]+$/u',
            'tag' => 'required|max:10',
        ]);
        $tag= Tag::where('id', $id)->first();
        $tag->update([
            'name'=> $request['tag'],
            'slug'=> $request['slug'],
        ]);
        return redirect(route('tags.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        Tag::where('id', $id)->delete();
        return redirect(route('tags.index'));
    }
}
