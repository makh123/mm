@extends('front.layout')
@section('css')
    <link rel="stylesheet" href="/front/css/plyr.css">

@endsection
@section('endScript')
    <!--js for plyr-->
    <script src="/front/js/plyr.js"></script>
    <script>
        var i;
        for(i={{$videomin}}; i<={{$videomax}} ;i++) {
            const player = new Plyr('#player' + i);
        }
    </script>


@endsection
@section('header')
    <div class="header-wrapper sm-padding bg-grey">
        <div class="container">
            <h2>قطعات برج خنک کننده</h2>
            <ul class="breadcrumb">

                <li class="breadcrumb-item">قطعات</li>

            </ul>
        </div>
    </div>
@endsection


@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12" style="direction: rtl">
                @foreach($news as $newss)

                    <div class="blog-post-item col-md-3 col-sm-6">

                            <!-- OWL SLIDER -->


                                <div class="margin-bottom-20">

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

