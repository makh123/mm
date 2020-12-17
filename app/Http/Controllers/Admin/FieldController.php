<?php

namespace App\Http\Controllers\Admin;

use App\field;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FieldController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fields = field::latest()->paginate(2);
        return view('admin.field.all' ,  compact('fields'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.field.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request , [

            'field_name' => 'required|regex:/^[a-z\x{0600}-\x{06ff}]+$/u',

        ]);
        $field_name = request('field_name');
        $safefield=htmlspecialchars(  $field_name, ENT_QUOTES, 'UTF-8');
        $field = field::create([  'field_name'=>$safefield]);

        alert()->success(' ثبت رشته تحصیلی با موفقیت انجام شد');
        return redirect(route('field.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\field  $field
     * @return \Illuminate\Http\Response
     */
    public function show(field $field)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\field  $field
     * @return \Illuminate\Http\Response
     */
    public function edit(field $field)
    {
        return view('admin.field.edit' , compact('field'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\field  $field
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, field $field)
    {
        $this->validate($request , [

            'field_name' => 'required',

        ]);
        $field_name = request('field_name');
        $safefield=htmlspecialchars(  $field_name, ENT_QUOTES, 'UTF-8');
        $field->update([  'field_name'=>$safefield]);

        alert()->success(' ویرایش رشته تحصیلی با موفقیت انجام شد');
        return redirect(route('field.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\field  $field
     * @return \Illuminate\Http\Response
     */
    public function destroy(field $field)
    {
        $field->delete();
        alert()->success(' حذف رشته تحصیلی با موفقیت انجام شد');
        return back();
    }
}
