@extends('front.layout')
@section('header')
    <div class="header-wrapper sm-padding bg-grey">
        <div class="container">
            <div class="blog-content">    <h2 style="direction: rtl; font-family: 'B nazanin'">{{$news->title}}</h2></div>
            <ol class="breadcrumb">

                @for ($i = count($parentCat)-1; $i >0; $i--)


                    <li><a href="{{route('newscategory.show',['slug'=>\App\Category::where('id',$parentCat[$i])->pluck('slug')->first()])}}">{{\App\Category::where('id',$parentCat[$i])->pluck('name')->first()}}</a></li>
                @endfor
                <li class="active"><a href="{{route('newscategory.show',['slug'=> $categoriesid])}}">{{\App\Category::where('id',$parentCat[0])->pluck('name')->first()}}</a></li>
                <li><a href="#">خانه</a></li>
            </ol>


        </div>
    </div>
@endsection
@section('content')


    <!-- header wrapper -->

    <!-- /header wrapper -->

    <!-- Container -->

    <div class="blog">
        <h3 style="font-family: B Mitra">{!! $news->title !!}</h3>

        <div class="blog-content">
            <ul class="blog-meta">
                <li><i class="fa fa-clock-o"></i>{{ $date1}}</li>

                <li><i class="fa fa-comments"></i>{{ $count }}</li>

                <li><i class="fa fa-user"></i>{!! \App\User::where(['id'=>$news->user_id])->value('name')!!}</li>

                <div class="blog-img">

                    @if($news->type==1)



                        <div class="owl-carousel buttons-autohide controlls-over height-400"
                             data-plugin-options='{"items": 1, "autoPlay": 4500, "autoHeight": false, "navigation": true, "pagination": true, "transitionStyle":"fadeUp", "progressBar":"false"}'>

                            <img class="img-responsive" src="{{$news->images[0]['original']}}" alt=""/>
                            <img class="img-responsive" src="{{$news->images[1]['original']}}" alt=""/>
                            <img class="img-responsive" src="{{$news->images[2]['original']}}" alt=""/>

                        </div>

                    @endif



                    @if($news->type==2)
                        <img class="img-responsive" src="{{$news->images['original']}}" alt=""/>

                    @endif
                    @if($news->type==0)




                    <!-- VIDEO -->


                        <video poster="{{$news->images['original']}}"  style="height: 500px" id="player" playsinline controls>
                            <source src="{{$news->images['a']}}"   type="video/mp4">

                            <track kind="captions" label="English captions" src="/path/to/captions.vtt" srclang="en" default>




                            <!-- Captions are optional -->

                        </video>
                        <!-- /VIDEO -->


                    @endif
                </div>





            </ul>

            <p>{!! $news->body !!}</p>
        </div>

        <!-- blog tags -->
        <div class="blog-tags">
            <h5>برچسب ها :</h5>
            @foreach($tags as $tag)
                <a href="{{route('tagss.show',['id'=>$tag->id])}}"><i class="fa fa-tag"></i>{{$tag->name}} </a>
            @endforeach

        </div>


        <!-- blog comments -->
        <div class="blog-comments">
            <h3 class="title">{{$count}} نظر </h3>

            <!-- comment -->
            @foreach($comment as $comments)
                <div class="media">
                    <div class="media-left">
                        <img class="media-object" src="/front/img/comment.gif" alt="">
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading"> {{$comments->name}} <span class="time">{{ $date1}}</spah4>
                                <p>  {!! $comments->body !!}     </p>
                    </div>
                </div>
        @endforeach
        <!-- /comment -->





        </div>
        <!-- /blog comments -->

        <!-- reply form -->
        <div class="reply-form">
            <h3 class="title">نظر دهید</h3>
            <form action="{{route('comment.store',['slug'=>$news->slug])}}" method="post">
                {{ csrf_field() }}
                @include('admin.section.error')
                <input class="input" type="text" name="name" id="name" placeholder="نام">
                <input class="input" type="email" name="email" id="email" placeholder="پست الکترونیک">
                <textarea name="body" id="body" placeholder="نظر خود را بنویسید ..."></textarea>
                <button type="submit" class="main-btn">ارسال</button>
            </form>
        </div>
        <!-- /reply form -->
    </div>
    </main>
    <!-- /Main -->
    <!-- Aside -->
    <aside id="aside" class="col-md-3">

        <!-- Search -->
        <div class="widget">
            <div class="widget-search">
                <form action="{{route('news.search')}}" method="get" class="widget_search">
                    <input class="search-input" id="search" name="search"  type="text" placeholder="جستجو">
                    <button class="search-btn" type="submit"><i class="fa fa-search"></i></button>


                </form>
            </div>
        </div>









        <!-- /Search -->

        <!-- Category -->
        <div class="widget">
            <h3 class="title">دسته بندی</h3>
            <div class="widget-category">
                @foreach($categories as $categoriess)
                    <a href="{{route('shows',['slug'=>$categoriess->slug])}}">{{$categoriess->name}}<span></span></a>
                @endforeach

            </div>
        </div>
        <!-- /Category -->

        <!-- Posts sidebar -->

        <!-- Posts sidebar -->
        <div class="widget">
            <h3 class="title"> پربازدیدترین مطالب</h3>

            <!-- single post -->



        @foreach($mostview as $mostviews)
            <!-- single post -->
                <div class="widget-post">
                    @if($mostviews->type==0 )
                        <a href="{{route('news.show',['slug'=> $mostviews->slug])}}">
                            <img src="{{$mostviews->images['thumb']}}" style="width: 50px; height: 50px" alt=""> {!! $mostviews->title !!}
                        </a>
                    @elseif($mostviews->type==2)
                        <a href="{{route('news.show',['slug'=> $mostviews->slug])}}">
                            <img src="{{$mostviews->images['thumb']}}" style="width: 50px; height: 50px" alt=""> {!! $mostviews->title !!}
                        </a>
                    @else
                        <a href="{{route('news.show',['slug'=> $mostviews->slug])}}">
                            <img src="{{$mostviews->images[0]['thumb']}}" style="width: 50px; height: 50px" alt=""> {!! $mostviews->title !!}
                        </a>
                    @endif
                    <ul class="blog-meta">
                        <li>{{(date('F d,Y',strtotime($mostviews->created_at)))}}</li>
                    </ul>
                </div>
                <!-- /single post -->
            @endforeach


        </div>
        <!-- /Posts sidebar -->


        <!-- /Posts sidebar -->
        <!-- /Posts sidebar -->

        <!-- Tags -->
        <div class="widget">
            <h3 class="title">برچسب ها</h3>
            <div class="widget-tags">
                @foreach($tags as $tag)
                    <a href="{{route('tagss.show',['id'=>$tag->id])}}">{{$tag->name}}</a>
                @endforeach

            </div>
        </div>
        <!-- /Tags -->

    </aside>
    <!-- /Aside -->


@endsection