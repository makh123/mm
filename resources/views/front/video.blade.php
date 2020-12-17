@extends('front.layout')
@section('css')
    <link rel="stylesheet" href="/front/css/plyr.css">

@endsection
@section('endScript')
    <!--js for plyr-->
    <script src="/front/js/plyr.js"></script>
    <script>

        const player1 = new Plyr('#player1');
        const player2 = new Plyr('#player2');
        const player3 = new Plyr('#player3');

    </script>


@endsection
@section('header')
    <div class="header-wrapper sm-padding bg-grey">
        <div class="container">
            <h2>اخبار امنیتی</h2>
            <ul class="breadcrumb">

                <li class="breadcrumb-item">اخبار و رویدادها</li>

            </ul>
        </div>
    </div>
@endsection


@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12" style="direction: rtl">
                @foreach($news as $newss)



                        <!-- OWL SLIDER -->



                        @if($newss->type==0)

                            <!-- VIDEO -->

                                <video poster="{{$newss->images['thumb']}}"  id="player1" playsinline controls>
                                    <source src="{{$newss->images['a']}}"   style="height: 500px; width: 500px"  type="video/mp4">

                                </video>

                                <!-- /VIDEO -->







                            @endif




                        <!-- /OWL SLIDER -->




                @endforeach
            </div>





        </div>
    </div>

@endsection

