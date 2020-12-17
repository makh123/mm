<?php

namespace App\Http\Controllers\Admin;

use App\Comment;
use App\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommentController extends AdminController
{


    public function store(Request $request, Post $news)
    {
        $this->validate($request , [

            'name' => 'required',
            'body' => 'required',
            'email' =>  'required|string|email',




        ]);
        $body = request('body');
        $safebody=$this->clean($body);
        $comment = Comment::create([
            'post_id' => $news->id,
            'name' => htmlspecialchars( $request->get('name'), ENT_QUOTES, 'UTF-8'),

            'body' => $safebody,
            'email' => htmlspecialchars( $request->get('email'), ENT_QUOTES, 'UTF-8'),






        ]);

        $count = $news->Comments()->count();


        $post = Post::where('id', $news->id)->update(['commentCount' => $count]);
        alert()->success(' پیام شما با موفقیت ثبت شد');
        return back();


    }

    public function show()
    {
        $name=auth()->user()->name;
        $image=auth()->user()->images['thumb'];

        $news = Post::all();


        $comment = Comment::all();
        return view('admin.comment.all', compact('news','name','image'));
    }

    public function showcomment(Post $news)
    {

        $name=auth()->user()->name;
        $image=auth()->user()->images['thumb'];
        $comment = $news->Comments()->get();

        //  $comment = Comment::all();
        return view('admin.comment.show', compact('comment', 'news', 'com','name','image'));
    }

    public function update(Request $request)
    {

        $comment=$request->get( 'comments');
        foreach( $request->get( 'comments' )  as $comment_id => $approved )
        {
            Comment::findorfail( $comment_id )->update([
                'approved' => $approved

            ]);
        }
        return back();

    }




}
