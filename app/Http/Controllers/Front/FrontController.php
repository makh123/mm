<?php

namespace App\Http\Controllers\front;

use App\Category;
use App\collaboration;
use App\Contact;
use App\Language;
use App\Post;
use App\Service;
use App\slogan;
use App\User;
use SEO;
use Conner\Tagging\Model\Tag;
use Hekmatinasser\Verta\Verta;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Vinkla\Hashids\Facades\Hashids;

class FrontController extends Controller
{


    public function form()
    {

        return view('index');
    }
    public function showContact()
    {



        return view('front.contact');
    }

    public function allcontact()
    {
        $name=auth()->user()->name;
        $image=auth()->user()->images['thumb'];
        $contact=Contact::latest()->paginate(4);
        return view('Admin.contact.all',compact('contact','name','image'));
    }




    /**

     * Create a new controller instance.

     *

     * @return void

     */

    public function myCaptchaPost(Request $request)

    {

        request()->validate([

            'email' => 'required|email',

            'password' => 'required',

            'captcha' => 'required|captcha'

        ],

            ['captcha.captcha'=>'Invalid captcha code.']);

        dd("You are here :) .");

    }


    /**

     * Create a new controller instance.

     *

     * @return void

     */

    public function refreshCaptcha()

    {

        return response()->json(['captcha'=> captcha_img()]);

    }







public function activation($token)
{
    return $token;
}



    public function storeContact(Request $request)
    {

        request()->validate([

            'name_family' => 'required|max:250|regex:/^(?i)[a-z\s\d\x{0600}-\x{06ff}]+$/u',
            'email' =>  'required|string|email',
            'subject' => 'required|max:250|regex:/^(?i)[a-z\s\'\"\:\)\(\d\x{0600}-\x{06ff}]+$/u',
            'message'=> 'required|regex:/^(?i)[a-z\s\'\"\:\)\(\d\x{0600}-\x{06ff}]+$/u',
            'captcha' => 'required|captcha'

        ]

            );





        Contact::create([
            'name_family'=>htmlspecialchars($request['name_family'], ENT_QUOTES, 'UTF-8'),
            'email'=>htmlspecialchars($request['email'], ENT_QUOTES, 'UTF-8'),
            'subject'=>htmlspecialchars($request['subject'], ENT_QUOTES, 'UTF-8'),
            'message'=> htmlspecialchars($request['message'], ENT_QUOTES, 'UTF-8'),
        ]);


        alert()->success(' پیام شما با موفقیت ثبت شد');


        return back();

    }
    public  function cooperation()
    {
        $collaboration=collaboration::all();
        return view('front.Cooperation',compact('collaboration'));

    }
    public  function index()
    {
        SEO::setTitle('وب سایت امن آگین گستران پیشرو');
        SEO::setDescription('وب سایت امنیتی');
        $news=Post::where('post_type','=',2)->latest()->take(3)->get();
        $slogan=slogan::all();
          $locale=app()->getLocale();
         $locale=Language::where('alias',$locale)->latest()->first();
       $latestpost=Post::where('language_id',$locale->id)->where('post_type','=',1)->latest()->take(3)->get();
//        $latestpost=Post::where('post_type','=',1)->latest()->take(3)->get();
        $service=Service::latest()->get();
         #$service=Post::where('post_type','=',3)->get();
        return view('front.index',compact('news','latestpost','service','slogan','locale'));
    }
    public function allnews()
    {
        $news=Post::where('post_type','=','1')->latest()->paginate(4);
        $videomin=Post::where('type','=','0')->min('id');
        $videomax=Post::where('type','=','0')->max('id');
        return view('front.news',compact('news','videomin','videomax'));
    }

public function main()
{
    return view('front.main');
}
public function dashboard()

{

    return view('front.dashboard');
}
public function dashboardLogin()
{
    return view('newpanel.login');
}
    public function showvideos()
    {
        $news=Post::latest()->paginate(4);
        $videomin=Post::where('type','=','0')->min('id');
        $videomax=Post::where('type','=','0')->max('id');

        return view('front.video',compact('news','videomin','videomax'));



    }
    public function register()
    {

        return view('front.register');
    }
    public function storeRegister(Request $request)
    {
        return $request;
        $data['name'] =  htmlspecialchars(  $request['name'], ENT_QUOTES, 'UTF-8');
        $data['family'] = htmlspecialchars(   $request['family'], ENT_QUOTES, 'UTF-8');
        $data['email'] =  htmlspecialchars(   $request['email'], ENT_QUOTES, 'UTF-8');
        $data['username'] =  htmlspecialchars(   $request['username'] , ENT_QUOTES, 'UTF-8');
        $data['password'] =  htmlspecialchars(   $request['password'] , ENT_QUOTES, 'UTF-8');
        $data['phoneNumber'] =  htmlspecialchars(  $request['phoneNumber'], ENT_QUOTES, 'UTF-8');


        $password = bcrypt($data['password']);

        $data['password']=$password;

        User::create($data );

        return back();
    }
    public function articles()
    {
        $news=Post::where('post_type','=','2')->latest()->paginate(4);
        $videomin=Post::where('type','=','0')->min('id');
        $videomax=Post::where('type','=','0')->max('id');
        return view('front.article',compact('news','videomin','videomax'));
    }
    public function aboutUs(Post $news)
    {

        return view('front.aboutUs',compact('news'));
    }
    public function vision()
    {
        return view('front.vision');
    }
    public function about()
    {
        return view('front.about');
    }
    public function service(Service $news,Request $request)
    {




        $date= Verta($news->created_at)->format('%d %B %Y');
        $date1=Verta::persianNumbers($date);
        //$someposts = Post::where('title', '=', $news->title)->simplePaginate(15);
        $countvideo= count($videocount=Post::where('type','=','0')->get());
        // get previous user id
        $previous1 = Post::where('id', '<', $news->id)->max('id');
        $previous=Post::where('id','=',$previous1)->pluck('slug')->first();
        // get next user id
        $next1 = Service::where('id', '>', $news->id)->min('id');
        $next=Service::where('id','=',$next1)->pluck('slug')->first();

        $countvideo= count($videocount=Post::where('type','=','0')->get());



        $name=User::where('id','=',$news->user_id)->value('id');




        $latest= Service::latest()->take(3)->get();
        $categories1=Category::where(['id'=>$news->category_id])->value('name');
        $categoriesid=Category::where('id','=',$news->category_id)->value('slug');




        $categories2=Category::where(['id'=>$news->category_id])->value('parent');
        $parent=Category::where(['id'=>$categories2])->value('name');
        $parentid=Category::where(['id'=>$categories2])->value('slug');



        $img=Service::where('imagetype','=','2')->pluck('images');
        $slideshow=Service::where('imagetype','=','1')->pluck('images');
        $video=Service::where('imagetype','=','0')->pluck('images');


        $mostview=Post::where('viewCount','>',10)->take(3)->get();

        // $mostview=Post::where('viewCount','>',10);

        $categories = Category::where('parent', '=', 0)->latest()->take(4)->get();



        $maincategory=Category::where(['id'=>$news->category_id])->where('parent','=','0')->value('id');
        $cat1=Category::where('parent','=', $maincategory)->value('name');
        // $post=Post::where('id',$news->id)->update([ 'commentCount'=>$count]);
        $i=1;
        $parentCat[0]=$news->category_id;
        $condition=Category::where('id',$parentCat[0])->pluck('parent')->first();
        if($condition!=0)
        {
            do{
                $parentCat[$i]=$condition; $i=$i+1;
                $condition=Category::where('id',$condition)->pluck('parent')->first();
            }while ($condition!=0);

        }

        //
        return view('front.service',compact('news','comment','categoriesid','parentid','count','name','result','latest','img','slideshow','video','mostview','p','latest','categories','date1','tags','fetch','cat1','categories1','parent','someposts','next','previous','menus','submenu','setting','quickMenus','languages','countvideo','parentCat','categories2'));

        // return view('front.shownews',compact('news'));

    }
    public function showNews(Post $news,Request $request)
    {



        $date= Verta($news->created_at)->format('%d %B %Y');
        $date1=Verta::persianNumbers($date);
        //$someposts = Post::where('title', '=', $news->title)->simplePaginate(15);
        $countvideo= count($videocount=Post::where('type','=','0')->get());
        // get previous user id
        $previous1 = Post::where('id', '<', $news->id)->max('id');
        $previous=Post::where('id','=',$previous1)->pluck('slug')->first();
        // get next user id
        $next1 = Post::where('id', '>', $news->id)->min('id');
        $next=Post::where('id','=',$next1)->pluck('slug')->first();
        $countvideo= count($videocount=Post::where('type','=','0')->get());
        $name=User::where('id','=',$news->user_id)->value('id');
        $latest= Post::latest()->take(3)->get();
        $categories1=Category::where(['id'=>$news->category_id])->value('name');
        $categoriesid=Category::where('id','=',$news->category_id)->value('slug');




        $categories2=Category::where(['id'=>$news->category_id])->value('parent');
        $parent=Category::where(['id'=>$categories2])->value('name');
        $parentid=Category::where(['id'=>$categories2])->value('slug');

        $comment = $news->Comments()->where('approved','=','1')->get();

        $img=Post::where('type','=','2')->pluck('images');
        $slideshow=Post::where('type','=','1')->pluck('images');
        $video=Post::where('type','=','0')->pluck('images');

        $count=$news->Comments()->where('approved','=','1')->count();
        $mostview=Post::where('viewCount','>',10)->take(3)->get();

        // $mostview=Post::where('viewCount','>',10);
        $news->increment('viewCount');
        $p= $news->viewCount;
        $categories = Category::where('parent', '=', 0)->latest()->take(4)->get();

        $tags=Tag::all();

        $maincategory=Category::where(['id'=>$news->category_id])->where('parent','=','0')->value('id');
        $cat1=Category::where('parent','=', $maincategory)->value('name');
        // $post=Post::where('id',$news->id)->update([ 'commentCount'=>$count]);
        $i=1;
        $parentCat[0]=$news->category_id;
        $condition=Category::where('id',$parentCat[0])->pluck('parent')->first();
        if($condition!=0)
        {
            do{
                $parentCat[$i]=$condition; $i=$i+1;
                $condition=Category::where('id',$condition)->pluck('parent')->first();
            }while ($condition!=0);

        }

        return view('front.shownews',compact('news','comment','categoriesid','parentid','count','name','result','latest','img','slideshow','video','mostview','p','latest','categories','date1','tags','fetch','cat1','categories1','parent','someposts','next','previous','menus','submenu','setting','quickMenus','languages','countvideo','parentCat','categories2'));

    }







    public function masterSidebar(Post $news,Request $request)
    {


        //$post=Post::where('language_id',$locale->id)->get();

        $date = Verta($news->created_at)->format('%d %B %Y');
        $date1 = Verta::persianNumbers($date);
        //$someposts = Post::where('title', '=', $news->title)->simplePaginate(15);
        $countvideo = count($videocount = Post::where('type', '=', '0')->get());
        // get previous user id
        $previous1 = Post::where('id', '<', $news->id)->max('id');
        $previous = Post::where('id', '=', $previous1)->pluck('slug')->first();
        // get next user id
        $next1 = Post::where('id', '>', $news->id)->min('id');
        $next = Post::where('id', '=', $next1)->pluck('slug')->first();

        $countvideo = count($videocount = Post::where('type', '=', '0')->get());


        $name = User::where('id', '=', $news->user_id)->value('id');


        $latest = Post::latest()->take(3)->get();
        $categories1 = Category::where(['id' => $news->category_id])->value('name');
        $categoriesid = Category::where('id', '=', $news->category_id)->value('slug');


        $categories2 = Category::where(['id' => $news->category_id])->value('parent');
        $parent = Category::where(['id' => $categories2])->value('name');
        $parentid = Category::where(['id' => $categories2])->value('slug');

        $comment = $news->Comments()->where('approved', '=', '1')->get();

        $img = Post::where('type', '=', '2')->pluck('images');
        $slideshow = Post::where('type', '=', '1')->pluck('images');
        $video = Post::where('type', '=', '0')->pluck('images');

        $count = $news->Comments()->where('approved', '=', '1')->count();
        $mostview = Post::where('viewCount', '>', 10)->take(3)->get();

        // $mostview=Post::where('viewCount','>',10);
        $news->increment('viewCount');
        $p = $news->viewCount;
        $categories = Category::where('parent', '=', 0)->latest()->take(4)->get();

        $tags = Tag::all();

        $maincategory = Category::where(['id' => $news->category_id])->where('parent', '=', '0')->value('id');
        $cat1 = Category::where('parent', '=', $maincategory)->value('name');
        // $post=Post::where('id',$news->id)->update([ 'commentCount'=>$count]);
        $i = 1;
        $parentCat[0] = $news->category_id;
        $condition = Category::where('id', $parentCat[0])->pluck('parent')->first();
        if ($condition != 0) {
            do {
                $parentCat[$i] = $condition;
                $i = $i + 1;
                $condition = Category::where('id', $condition)->pluck('parent')->first();
            } while ($condition != 0);

        }

        //
        return view('front.shownews', compact('news', 'comment', 'categoriesid', 'parentid', 'count', 'name', 'result', 'latest', 'img', 'slideshow', 'video', 'mostview', 'p', 'latest', 'categories', 'date1', 'locale', 'tags', 'fetch', 'cat1', 'categories1', 'parent', 'someposts', 'next', 'previous', 'menus', 'submenu', 'setting', 'quickMenus', 'languages', 'countvideo', 'parentCat', 'categories2'));
    }
    // return view('front.shownews',compact('news'));

    public function search(Request $request)
    {

return $request;
        $category1 = Category::where('parent', '=', 0)->get();

        $countvideo= count($videocount=Post::where('type','=','0')->get());

        $news=Post::where('title','LIKE','%'.$request['search']. '%')->orwhere('description','LIKE','%'.$request['search']. '%')->latest()->paginate(5);
        // $galleries=Gallery::where('name','LIKE','%'.$request['search']. '%')->orwhere('body','LIKE','%'.$request['search']. '%')->where('language_id',$locale->id)->latest()->paginate(5);
        //  $videos=Video::where('name','LIKE','%'.$request['search']. '%')->orwhere('body','LIKE','%'.$request['search']. '%')->where('language_id',$locale->id)->latest()->paginate(5);
        $videomin=Post::where('type','=','0')->min('id');
        $videomax=Post::where('type','=','0')->max('id');

        return view('front.news_search',compact('news','img','videomin','videomax','category1','galleries','slideshow','video','keyword','setting','menus','submenu','quickMenus','languages','countvideo','image','video1','videos'));
    }
    public function showposttag(Tag $tag)
    {
        $user=null;
        $showcat=null;
        $parentCat[]=0;
        $categoriesid=null;


        $img=Post::where('type','=','2')->pluck('images');
        $slideshow=Post::where('type','=','1')->pluck('images');
        $video=Post::where('type','=','0')->pluck('images');
        //   $com= Comment::all()->values('id');
        $news=Post::withAnyTag($tag->slug)->latest()->paginate(5);
        $countvideo= count($videocount=Post::where('type','=','0')->get());
        $videomin=Post::where('type','=','0')->min('id');
        $videomax=Post::where('type','=','0')->max('id');

        return view('front.news',compact('news','count','user','categoriesid','parentCat','videomin','videomax','img','slideshow','video','languages','setting','menus','submenu','quickMenus','countvideo','showcat','tag'));



    }

    public function category(Category $showcat)
    {
        $user=null;
        $tag=null;
        $i=1;
        $parentCat[0]=$showcat->id;

        $condition=Category::where('id',$parentCat[0])->pluck('parent')->first();
        if($condition!=0)
        {
            do{
                $parentCat[$i]=$condition; $i=$i+1;
                $condition=Category::where('id',$condition)->pluck('parent')->first();
            }while ($condition!=0);

        }
        $categoriesid=Category::where('id','=',$parentCat[0])->value('slug');

        $news=Post::where('category_id','=',$showcat->id)->latest()->paginate(5);

        $img=Post::where('type','=','2')->pluck('images');
        $slideshow=Post::where('type','=','1')->pluck('images');
        $video=Post::where('type','=','0')->pluck('images');
        $countvideo= count($videocount=Post::where('type','=','0')->get());
        $videomin=Post::where('type','=','0')->min('id');
        $videomax=Post::where('type','=','0')->max('id');


        return view('front.fa.news',compact('news','count','showcat','categoriesid','parentCat','img','slideshow','video','setting','menus','submenu','quickMenus','languages','countvideo','videomin','videomax','tag','user'));


    }

    public function showcat(Category $category)
    {




        $i=1;
        $parentCat[0]=$category->id;
        $condition=Category::where('id',$parentCat[0])->pluck('parent')->first();
        if($condition!=0)
        {
            do{
                $parentCat[$i]=$condition; $i=$i+1;
                $condition=Category::where('id',$condition)->pluck('parent')->first();
            }while ($condition!=0);

        }


        $img=Post::where('type','=','2')->pluck('images');
        $slideshow=Post::where('type','=','1')->pluck('images');
        $video=Post::where('type','=','0')->pluck('images');


        $news=Post::where('category_id','=',$category->id)->latest()->paginate(5);

        $countvideo= count($videocount=Post::where('type','=','0')->get());

        $videomin=Post::where('type','=','0')->min('id');
        $videomax=Post::where('type','=','0')->max('id');

        //   $com= Comment::all()->values('id');

        // $news1 = Post::where('id', '=',$com )->get();
        //  $count=$news1->Comments()->where('approved','=','1')->count();
        return view('front.fa.newsCat',compact('news','parentCat','count','img','slideshow','video','news1','category','languages','setting','menus','submenu','quickMenus','countvideo','videomin','videomax'));






        // return $cat=Category::where('parent','=', $category->id)->pluck('id');
//return $cat->id;


//

    }
    public  function newsname(User $user)
    {


        $tag=null;
        $categoriesid =null;
        $patentCat=null;
        $showcat='name';
        $news=Post::where('user_id','=',$user->id)->latest()->paginate(5);

        $img=Post::where('type','=','2')->pluck('images');
        $slideshow=Post::where('type','=','1')->pluck('images');
        $video=Post::where('type','=','0')->pluck('images');
        $countvideo= count($videocount=Post::where('type','=','0')->get());
        $videomin=Post::where('type','=','0')->min('id');
        $videomax=Post::where('type','=','0')->max('id');


        return view('front.fa.news',compact('news','showcat','count','tag','img','slideshow','video','setting','menus','submenu','quickMenus','languages','countvideo','videomin','videomax','user','tag','categoriesid','parentCat'));

    }


}
