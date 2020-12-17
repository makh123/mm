@extends('front.layout')
@section('header')
    <div class="header-wrapper sm-padding bg-grey">
        <div class="container">
            <h2>عضویت</h2>
            <ul class="breadcrumb">

                <li class="breadcrumb-item">عضویت</li>
                <li><a href="/">خانه</a></li>

            </ul>
        </div>
    </div>
@endsection
@section('content')
    <div style="">
    <div class="col-md-8 col-md-offset-4">
        <div style="direction: rtl">   @include('admin.section.error')</div>
        <form action="{{route('register.store')}}" method="post" class="contact-form" enctype="multipart/form-data">

            <input type="text" class="input"  name="family" id="family" placeholder="نام خانوادگی">
            <input type="text" class="input"  name="name" id="name" placeholder="نام">
            <input type="text" class="input"  name="email" id="email" placeholder="ایمیل ">
            <input type="text" class="input"  name="phoneNumber" id="phoneNumber" placeholder="شماره تلفن">
            <input type="text" class="input"  name="username" id="username" placeholder="نام کاربری">
            <input type="password" class="input"  name="password" id="password" placeholder="کلمه عبور ">

            {{ csrf_field() }}

            <button class="main-btn">عضویت</button>


        </form>
    </div>
    </div>
@endsection


