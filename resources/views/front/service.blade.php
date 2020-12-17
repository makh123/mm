@extends('front.layout')
@section('header')
    <div class="header-wrapper sm-padding bg-grey">
        <div class="container">
            <h2>{{$news->title}}</h2>
            <ol class="breadcrumb">



                <li>خدمات</li>
                <li><a href="#">خانه</a></li>
            </ol>


        </div>
    </div>







@endsection
@section('content')


    <!-- header wrapper -->

    <!-- /header wrapper -->

    <!-- Container -->

    <div class="container">
        <div class="row">
            <div class="col-lg-12">


        <div class="blog-content">
            <ul class="blog-meta">


           





            </ul>
            <p>{!! $news->body !!}</p>
        </div>




        <!-- blog comments -->

            </div>
        </div>

    </div>
    </main>
    <!-- /Main -->



@endsection