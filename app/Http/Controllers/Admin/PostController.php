<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Comment;

use App\Language;
use App\Post;
use Conner\Tagging\Model\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use UniSharp\LaravelFilemanager\Events\ImageWasUploaded;



class PostController extends AdminController
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
        $categories = Category::where('parent', '=', 0)->get();
        $allCategories = Category::pluck('name','id')->all();
        $news=Post::latest()->paginate(5);


        return view('admin.news.all', compact('news','categories','allCategories','name','image'));

    }




    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$this->authorize('create-post');


        $name=auth()->user()->name;
        $image=auth()->user()->images['thumb'];



        $categories =Category::all();
        $languages=Language::all();
        //$posttag = Post::with('tagged')->first();

        $tags=Tag::all();

        return view('admin.news.create',compact('categories','posttag','tags','name','image','languages'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {



        //auth()->loginUsingId(1);
        $image=$request['image'];
        $image2=$request['image2'];
        $image3=$request['image3'];
        $video=$request['video'];


        if($request['myCheck']==2)
        {

            $parts4 = explode("/", $image);

            $filename4 = array_pop($parts4);

            $imagePath4 = implode("/", $parts4);

            $filePath4 = $imagePath4 . "/thumbs";

            $thumb = $filePath4 . "/" . $filename4;

            $imagesUrl['original'] = $image;
            $imagesUrl['thumb'] = $thumb;
            $imagesUrl['a']=$video;

            /*  $imageResize = event(new ImageWasUploaded($image));


              $imagesUrl['minimal'] = $imageResize[0]['minimal'];
              $imagesUrl['more'] = $imageResize[0]['more'];
              $imagesUrl['big'] = $imageResize[0]['big'];
              $imagesUrl['a']=$video;*/





            $a=$imagesUrl;
            $type=0;

        }
        else if($request['myCheck']==1) {



            $parts1 = explode("/", $image);

            $filename1 = array_pop($parts1);

            $imagePath1 = implode("/", $parts1);

            $filePath1 = $imagePath1 . "/thumbs";

            $thumb = $filePath1 . "/" . $filename1;

            $imagesUrl[0]['original'] = $image;
            $imagesUrl[0]['thumb'] = $thumb;


            //--------------------------------------

            $parts2 = explode("/", $image2);

            $filename2 = array_pop($parts2);

            $imagePath2 = implode("/", $parts2);

            $filePath2 = $imagePath2 . "/thumbs";

            $thumb2 = $filePath2 . "/" . $filename2;

            $imagesUrl[1]['original'] = $image2;
            $imagesUrl[1]['thumb'] = $thumb2;
            //--------------------------------------
            $parts3 = explode("/", $image3);

            $filename3 = array_pop($parts3);

            $imagePath3 = implode("/", $parts3);

            $filePath3 = $imagePath3 . "/thumbs";

            $thumb3 = $filePath3 . "/" . $filename3;

            $imagesUrl[2]['original'] = $image3;
            $imagesUrl[2]['thumb'] = $thumb3;
            //-------------------------------------
            /*   $imageResize = event(new ImageWasUploaded($image));


               $imagesUrl[0]['minimal'] = $imageResize[0]['minimal'];
               $imagesUrl[0]['more'] = $imageResize[0]['more'];
               $imagesUrl[0]['big'] = $imageResize[0]['big'];
               //-----
               $imageResize1 = event(new ImageWasUploaded($image2));


               $imagesUrl[1]['minimal'] = $imageResize1[0]['minimal'];
               $imagesUrl[1]['more'] = $imageResize1[0]['more'];
               $imagesUrl[1]['big'] = $imageResize1[0]['big'];
               //----
               $imageResize2 = event(new ImageWasUploaded($image3));


               $imagesUrl[2]['minimal'] = $imageResize2[0]['minimal'];
               $imagesUrl[2]['more'] = $imageResize2[0]['more'];
               $imagesUrl[2]['big'] = $imageResize2[0]['big'];*/
            $a=$imagesUrl;
            $type=1;
        }
        else
        {
            $parts1 = explode("/", $image);

            $filename1 = array_pop($parts1);

            $imagePath1 = implode("/", $parts1);

            $filePath1 = $imagePath1 . "/thumbs";

            $thumb = $filePath1 . "/" . $filename1;

            $imagesUrl['original'] = $image;
            $imagesUrl['thumb'] = $thumb;
            /*  $imageResize = event(new ImageWasUploaded($image));


              $imagesUrl['minimal'] = $imageResize[0]['minimal'];
              $imagesUrl['more'] = $imageResize[0]['more'];
  */




            $type=2;
            $a=$imagesUrl;
        }
        $body=$request['body'];
        if ($request['slideShow'])
        {
            $slideShow=$request['slideShow'];
        }
        else
        {
            $slideShow=false;
        }

        $news= auth()->user()->post()->create([
            'title' => htmlspecialchars($request['title']),
            'body' => $request['body'],
            'description'=>htmlspecialchars($request['description']),
            'images'=> $a,
            'category_id'=>$request['category'],
            'type'=>$type,
            'slideShow'=>$slideShow,
            'post_type'=>$request['post_type'],
            'language_id'=>$request['language'],

        ]);

        $news->tag($request['tags']);





        return redirect(route('news.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $news)
    {
        // $this->authorize('edit-post');
        $name=auth()->user()->name;
        $image=auth()->user()->images['thumb'];
        $categories = Category::all();
        $allCategories = Category::pluck('name','id')->all();

        $tags=Tag::all();
        foreach($news->tags as $tag) {
            $newstag[] = $tag->name;
        }


        return view('admin.news.edit',compact('news','categories','allCategories','newstag','tags','name','image'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $news)
    {

        $image=$request['image'];
        $image2=$request['image2'];
        $image3=$request['image3'];
        $video=$request['video'];
        $imagesUrl['a']=$video;

        $language_type=$request['language'];

        if($request['image'])
        {

            $parts1 = explode("/", $image);


            $filename1 = array_pop($parts1);

            $imagePath1 = implode("/", $parts1);

            $filePath1 = $imagePath1 . "/thumbs";

            $thumb = $filePath1 . "/" . $filename1;

            $imagesUrl['original'] = $image;
            $imagesUrl['thumb'] = $thumb;
            $imageResize = event(new ImageWasUploaded($image));


            $imagesUrl['minimal'] = $imageResize[0]['minimal'];
            $imagesUrl['more'] = $imageResize[0]['more'];
        }
        else
        {
            $imagesUrl = $news->images;
        }
        if($request['video'])
        {





            $imagesUrl['a']=$video;

        }
        else{
            $imagesUrl = $news->images;
        }

        if($request['image2'])
        {
            $parts1 = explode("/", $image);

            $filename1 = array_pop($parts1);

            $imagePath1 = implode("/", $parts1);

            $filePath1 = $imagePath1 . "/thumbs";

            $thumb = $filePath1 . "/" . $filename1;

            $imagesUrl[0]['original'] = $image;
            $imagesUrl[0]['thumb'] = $thumb;


            //--------------------------------------

            $parts2 = explode("/", $image2);

            $filename2 = array_pop($parts2);

            $imagePath2 = implode("/", $parts2);

            $filePath2 = $imagePath2 . "/thumbs";

            $thumb2 = $filePath2 . "/" . $filename2;

            $imagesUrl[1]['original'] = $image2;
            $imagesUrl[1]['thumb'] = $thumb2;
            //--------------------------------------
            $parts3 = explode("/", $image3);

            $filename3 = array_pop($parts3);

            $imagePath3 = implode("/", $parts3);

            $filePath3 = $imagePath3 . "/thumbs";

            $thumb3 = $filePath3 . "/" . $filename3;

            $imagesUrl[2]['original'] = $image3;
            $imagesUrl[2]['thumb'] = $thumb3;
            //-------------------------------------

            $imageResize = event(new ImageWasUploaded($image));


            $imagesUrl[0]['minimal'] = $imageResize[0]['minimal'];
            $imagesUrl[0]['more'] = $imageResize[0]['more'];
            $imagesUrl[0]['big'] = $imageResize[0]['big'];
            //-----
            $imageResize1 = event(new ImageWasUploaded($image2));


            $imagesUrl[1]['minimal'] = $imageResize1[0]['minimal'];
            $imagesUrl[1]['more'] = $imageResize1[0]['more'];
            $imagesUrl[1]['big'] = $imageResize1[0]['big'];
            //----
            $imageResize2 = event(new ImageWasUploaded($image3));


            $imagesUrl[2]['minimal'] = $imageResize2[0]['minimal'];
            $imagesUrl[2]['more'] = $imageResize2[0]['more'];
            $imagesUrl[2]['big'] = $imageResize2[0]['big'];
        }
        else{

            $imagesUrl = $news->images;
        }

        if($request['image3'])
        {
            $parts1 = explode("/", $image);

            $filename1 = array_pop($parts1);

            $imagePath1 = implode("/", $parts1);

            $filePath1 = $imagePath1 . "/thumbs";

            $thumb = $filePath1 . "/" . $filename1;

            $imagesUrl[0]['original'] = $image;
            $imagesUrl[0]['thumb'] = $thumb;


            //--------------------------------------

            $parts2 = explode("/", $image2);

            $filename2 = array_pop($parts2);

            $imagePath2 = implode("/", $parts2);

            $filePath2 = $imagePath2 . "/thumbs";

            $thumb2 = $filePath2 . "/" . $filename2;

            $imagesUrl[1]['original'] = $image2;
            $imagesUrl[1]['thumb'] = $thumb2;
            //--------------------------------------
            $parts3 = explode("/", $image3);

            $filename3 = array_pop($parts3);

            $imagePath3 = implode("/", $parts3);

            $filePath3 = $imagePath3 . "/thumbs";

            $thumb3 = $filePath3 . "/" . $filename3;

            $imagesUrl[2]['original'] = $image3;
            $imagesUrl[2]['thumb'] = $thumb3;
            //-------------------------------------

            $imageResize = event(new ImageWasUploaded($image));


            $imagesUrl[0]['minimal'] = $imageResize[0]['minimal'];
            $imagesUrl[0]['more'] = $imageResize[0]['more'];
            $imagesUrl[0]['big'] = $imageResize[0]['big'];
            //-----
            $imageResize1 = event(new ImageWasUploaded($image2));


            $imagesUrl[1]['minimal'] = $imageResize1[0]['minimal'];
            $imagesUrl[1]['more'] = $imageResize1[0]['more'];
            $imagesUrl[1]['big'] = $imageResize1[0]['big'];
            //----
            $imageResize2 = event(new ImageWasUploaded($image3));


            $imagesUrl[2]['minimal'] = $imageResize2[0]['minimal'];
            $imagesUrl[2]['more'] = $imageResize2[0]['more'];
            $imagesUrl[2]['big'] = $imageResize2[0]['big'];
        }
        else{

            $imagesUrl = $news->images;
        }
        // htmlspecialchars($request['title']);
        $news->update([
            'title' =>$request['title'],
            'body' => $request['body'],
            'description'=>htmlspecialchars($request['description']),
            'category_id'=>$request['category'],
            'images'=> $imagesUrl,




        ]);


        $news->untag();
        $tags = $request->tags;
        $news->tag($tags);


        return redirect(route('news.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $news)
    {
        //  $this->authorize('create-post');
        $news->delete();

        return redirect(route('news.index'));
    }
}

