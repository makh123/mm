@extends('front.layout')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12" style="direction: rtl">
    <form class="form-horizontal" action="#" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        @include('Admin.section.error')
        <div class="form-group">
            <div class="col-sm-12">
                <label for="name" class="control-label">نام </label>
                <input type="text" class="form-control" name="name" id="name" placeholder="نام را وارد کنید" value="{{ old('name') }}">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-12">
                <label for="family" class="control-label">نام خانوادگی </label>
                <input type="text" class="form-control" name="family" id="family" placeholder="نام خانوادگی را وارد کنید" value="{{ old('family') }}">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-12">
                <label for="email" class="control-label">ایمیل </label>
                <input type="text" class="form-control" name="email" id="title" placeholder="ایمیل را وارد کنید" value="{{ old('email') }}">
            </div>
        </div>


        <div class="form-group">
            <div class="col-sm-12">
                <label for="phoneNumber" class="control-label">تلفن همراه </label>
                <input type="text" class="form-control" name="phoneNumber" id="phoneNumber" placeholder="تلفن همراه را وارد کنید" value="{{ old('phoneNumber') }}">
            </div>
        </div>

        <div class="form-group">
            <label for="degreeName">آخرین مدرک تحصیلی</label>
            <select  name="degreeName"   class="form-control" title=" تحصیلات مورد نظر  را انتخاب کنید...">
                <option selected value="دیپلم">دیپلم</option>
                <option selected value="کاردانی">کاردانی</option>
                <option selected value="کارشناسی">کارشناسی</option>
                <option selected value="کارشناسی ارشد">کارشناسی ارشد</option>
                <option selected value="دکتری ">دکتری</option>
            </select>
        </div>









        <div class="form-group">
            <label for="field">رشته تحصیلی</label>
            <select  name="field" class="form-control" id="field" title=" رشته تحصیلی موردنظر را انتخاب کنید...">
                @foreach($fields as $field)
                    <option selected value="{{$field->id}}">{{$field->field_name}}</option>
                @endforeach





            </select>
        </div>













        <div class="col-sm-6">
            <label for="Rezume" class="control-label">رزومه</label>
            <input type="file" class="form-control" name="Rezume" id="Rezume" placeholder="رزومه را وارد کنید">
        </div>


        <div class="form-group">
            <div class="col-sm-12">
                <button type="submit" class="btn btn-danger">ارسال</button>
            </div>
        </div>
    </form>



</div>
        </div>
    </div>





@endsection