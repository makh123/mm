@extends('front.layout')
@section('header')
    <div class="header-wrapper sm-padding bg-grey">
        <div class="container">
            <h2>فرصت های شغلی</h2>
            <ul class="breadcrumb">

                <li class="breadcrumb-item"><a href="index.html#blog">فرصت های شغلی</a></li>
                <li class="breadcrumb-item active"><a href="/">خانه</a></li>
            </ul>
        </div>
    </div>
@endsection
@section('content')





    <div id="colorlib-reservation">
        <!-- <div class="container"> -->
        <div class="row">
            <div class="search-wrap">

                <div class="container">

                    <ul class="nav nav-tabs">

                        <li class="active"><a data-toggle="tab" href="#flight"><i class="flaticon-plane"></i> کارشناس امنیت شبکه</a></li>
                        <li><a data-toggle="tab" href="#hotel"><i class="flaticon-resort"></i> کارشناس پشتیبان شبکه</a></li>
                        <li><a data-toggle="tab" href="#car"><i class="flaticon-car"></i> برنامه نویس PHP</a></li>
                        <li><a data-toggle="tab" href="#cruises"><i class="flaticon-boat"></i> برنامه نویس .NET</a></li>

                    </ul>

                </div>

                <div class="tab-content">
                    <div id="flight" class="tab-pane fade in active" style="direction: rtl";>
                        <div class="table-responsive">
                            <br>

                            <table class="table table-striped table-bordered" style="width: 500px; height: 200px; align-items: center">
                                <thead>
                                <tr>

                                    <th>مقطع تحصیلی</th>
                                    <th>کارشناسی</th>


                                </tr>
                                <tr>

                                    <th>رشته تحصیلی</th>
                                    <th>مهندسی فناوری اطلاعات</th>


                                </tr>
                                <tr>

                                    <th>سابقه کار مرتبط</th>
                                    <th>یک سال</th>


                                </tr>
                                <tr>

                                    <th>مهارت ها و توانایی ها</th>

                                    <th>Network+ , Security+, CCNA, LPIC1</th>
                                </tr>

                                </thead>
                                <tbody>








                                </tbody>
                            </table>




                        </div>
                    </div>







                    <div id="hotel" class="tab-pane fade" style="direction: rtl">
                        <form method="post" class="colorlib-form">
                            <div class="row">
                                <div class="col-md-2">

                                </div>

                                <div class="table-responsive">
                                    <br>

                                    <table class="table table-striped table-bordered" style="width: 500px; height: 200px; align-items: center">
                                        <thead>
                                        <tr>

                                            <th>مقطع تحصیلی</th>
                                            <th>کارشناسی</th>


                                        </tr>
                                        <tr>

                                            <th>رشته تحصیلی</th>
                                            <th>مهندسی فناوری اطلاعات</th>


                                        </tr>
                                        <tr>

                                            <th>سابقه کار مرتبط</th>
                                            <th>یک سال</th>


                                        </tr>
                                        <tr>

                                            <th>مهارت ها و توانایی ها</th>

                                            <th>Network+ , Security+, CCNA</th>
                                        </tr>

                                        </thead>
                                        <tbody>








                                        </tbody>
                                    </table>




                                </div>


                            </div>
                        </form>
                    </div>
                    <div id="car" class="tab-pane fade" style="direction: rtl">
                        <form method="post" class="colorlib-form">
                            <div class="row">


                                <div class="table-responsive">
                                    <br>

                                    <table class="table table-striped table-bordered" style="width: 500px; height: 200px; align-items: center">
                                        <thead>
                                        <tr>

                                            <th>مقطع تحصیلی</th>
                                            <th></th>


                                        </tr>
                                        <tr>

                                            <th>رشته تحصیلی</th>
                                            <th>مهندسی کامپیوتر</th>


                                        </tr>
                                        <tr>

                                            <th>سابقه کار مرتبط</th>
                                            <th>یک سال</th>


                                        </tr>
                                        <tr>

                                            <th>مهارت ها و توانایی ها</th>

                                            <th>مسلط به لینوکس , Python , C++ , PHP</th>
                                        </tr>

                                        </thead>
                                        <tbody>








                                        </tbody>
                                    </table>




                                </div>

                            </div>
                        </form>
                    </div>
                    <div id="cruises" class="tab-pane fade" style="direction: rtl">
                        <form method="post" class="colorlib-form">
                            <div class="row">


                                <div class="table-responsive">
                                    <br>

                                    <table class="table table-striped table-bordered" style="width: 500px; height: 200px; align-items: center">
                                        <thead>
                                        <tr>

                                            <th>مقطع تحصیلی</th>
                                            <th></th>


                                        </tr>
                                        <tr>

                                            <th>رشته تحصیلی</th>
                                            <th>مهندسی کامپیوتر</th>


                                        </tr>
                                        <tr>

                                            <th>سابقه کار مرتبط</th>
                                            <th>یک سال</th>


                                        </tr>
                                        <tr>

                                            <th>مهارت ها و توانایی ها</th>

                                            <th>تسلط بر #C و ASP.Net MVC</th>
                                        </tr>

                                        </thead>
                                        <tbody>








                                        </tbody>
                                    </table>




                                </div>

                            </div>
                        </form>
                    </div>
                    <div style="margin-right: 50px"> <a href="{{route('collaboration.request')}}"><button class="main-btn">درخواست همکاری </button></a></div>
                </div>

            </div>

        </div>

    </div>
















@endsection