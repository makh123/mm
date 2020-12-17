@extends('front.layout')
@section('header')
    <div class="header-wrapper sm-padding bg-grey">
        <div class="container">
            <h2>مقالات</h2>
            <ul class="breadcrumb">

                <li class="breadcrumb-item"><a href="index.html#blog">مقالات</a></li>
                <li class="breadcrumb-item active">خانه</li>
            </ul>
        </div>
    </div>
@endsection
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12" style="direction: rtl">
                @foreach($news as $newss)
                    @if($newss->post_type==2)
                        <div class=" col-md-3 col-sm-6">

                            <!-- OWL SLIDER -->
                            <div>

                            @if($newss->type==0)

                                <!-- VIDEO -->

                                    <video poster="{{$newss->images['thumb']}}"  id="player{{$newss->id}}" playsinline controls>
                                        <source src="{{$newss->images['a']}}"   type="video/mp4">

                                    </video>

                                    <!-- /VIDEO -->


                                @endif
                                @if($newss->type==1)
                                    <div class="margin-bottom-20">
                                        <img class="img-responsive" src="{{$newss->images[0]['thumb']}}" alt="">
                                    </div>

                                @endif

                                @if($newss->type==2)
                                    <div class="margin-bottom-20">
                                        <img class="img-responsive" src="{{$newss->images['thumb']}}" alt=""/>
                                    </div>




                                @endif

                            </div>
                            <!-- /OWL SLIDER -->

                            <div class="blog-content">
                                <ul class="blog-meta">

                                    <li><i class="fa fa-clock-o"></i> {{(date('F d,Y',strtotime($newss->created_at)))}}  </li>
                                    <li><i class="fa fa-comments"></i>  {{$newss->commentCount}}  </li>


                                </ul>
                                <h3>{{$newss->title}}</h3>
                                <p> {{$newss->description}}</p>

                                <div class="button-group-area mt-40">

                                    <a href="{{route('news.show',['slug'=> $newss->slug])}}">


                                        <button type="button" class="btn btn-primary btn-lg">بیشتر</button>
                                    </a>
                                </div>
                            </div>

                        </div>
                    @endif
                @endforeach
            </div>




            <div class="text-center">
                <!-- Pagination Default -->
                <ul class="pagination nomargin">
                    <li>
                        {!! $news->links('pagination.default') !!}
                    </li>

                </ul>
                <!-- /Pagination Default -->
            </div>
        </div>
    </div>

@endsection