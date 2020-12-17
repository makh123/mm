<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Unisharp\Laravelfilemanager\Events\ImageWasUploaded;


class UserController extends Controller
{
    public function index()
    {
        // return group::where(['id'=>$user->group_id])->pluck('group_name');


        //  $this->authorize('show-users');

        // $this->authorize('show-users');
        // ->middleware('can:show-users');
        $name=auth()->user()->name;

        $image=auth()->user()->images['thumb'];
        $users = User::latest()->paginate(2);

        // return  $groups=group::all()->pluck('group_name')->where('users.GroupID','=','groups.id');
        return view('admin.users.all' , compact('users','name','image'));
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

        $users = User::all();

        return view('admin.users.create',compact('users','name','image'));
    }
    public function store(Request $request,User $user)
    {

        $this->validate($request , [

            'name' => 'required',
            'family' => 'required',
            'email' =>  'required|string|email',
            'phoneNumber'=>'required|numeric',
            'username'=>'required',
            'password'=>'required',
            'images'=>'required',



        ]);

        $b= $request->get('password');

        $c= auth()->user()->id;



        $image=$request['images'];

        $parts1 = explode("/", $image);

        $filename1 = array_pop($parts1);

        $imagePath1 = implode("/", $parts1);

        $filePath1 = $imagePath1 . "/thumbs";

        $thumb = $filePath1 . "/" . $filename1;

        $imagesUrl['original'] = $image;
        $imagesUrl['thumb'] = $thumb;
        $imageResize = event(new ImageWasUploaded($image));



        $data['images'] = $imagesUrl;





        $data['name'] =  htmlspecialchars(  $request['name'], ENT_QUOTES, 'UTF-8');
        $data['family'] = htmlspecialchars(   $request['family'], ENT_QUOTES, 'UTF-8');
        $data['email'] =  htmlspecialchars(   $request['email'], ENT_QUOTES, 'UTF-8');
        $data['username'] =  htmlspecialchars(   $request['username'] , ENT_QUOTES, 'UTF-8');
        $data['phoneNumber'] =  htmlspecialchars(  $request['phoneNumber'], ENT_QUOTES, 'UTF-8');


        $password = bcrypt($b);

        $data['password']=$password;

        User::create($data );





        return redirect(route('users.index'));
    }
    public function edit(User $user)
    {


        $name=auth()->user()->name;
        $image=auth()->user()->images['thumb'];

        return view('admin.users.edit' , compact('user','name','image'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {

        $name=auth()->user()->name;
        $image=auth()->user()->images['thumb'];
        // $file = $request->file('images');



        if($request['images']) {

            $image=$request['images'];

            $parts1 = explode("/", $image);

            $filename1 = array_pop($parts1);

            $imagePath1 = implode("/", $parts1);

            $filePath1 = $imagePath1 . "/thumbs";

            $thumb = $filePath1 . "/" . $filename1;

            $imagesUrl['original'] = $image;
            $imagesUrl['thumb'] = $thumb;



        } else {
            $imagesUrl = $user->images;


        }







        $user->update([
            'name' =>$request['name'],
            'family' => $request['family'],
            'email'=>$request['email'],
            'phoneNumber'=>$request['phoneNumber'],
            'username'=> $request['username'],
            'password'=> $request['password'],
            'images'=>$imagesUrl,




        ]);

        return redirect(route('users.index',compact('name','image')));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $name=auth()->user()->name;
        $image=auth()->user()->images['thumb'];
        $user->delete();

        return redirect(route('users.index',compact('name','image')));
    }
}

