@extends('admin.master.master')
<link rel="stylesheet" href="/css/admin/select2.min.css">


@section('scriptEnd')

    <script src="/js/select2.full.min.js"></script>
    <script type="text/javascript" src="/ckeditor/ckeditor.js"></script>

    <script src="/vendor/laravel-filemanager/js/lfm.js"></script>


    <script>
        var options = {
            filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
            filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
            filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
            filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
        };
    </script>
    <script>
        CKEDITOR.replace( 'body' );
    </script>
    <script>
        $('#lfm').filemanager('images', {prefix: '/laravel-filemanager'});
    </script>


@endsection
@section('content')


    <div class="panel panel-flat">


        <div class="panel-heading">
            <h2 class="panel-title">ویرایش اطلاعات کاربر</h2>
            <div class="heading-elements">
                <ul class="icons-list">
                    <li><a data-action="" ><i class="fas fa-upload"></i></a></li>
                    <li><a data-action="reload"></a></li>
                    <li><a data-action="close"></a></li>
                </ul>
            </div>
        </div>

        <div class="panel-body">


            <form class="form-horizontal" action="{{ route('users.update' , ['id' => $user->id]) }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                {{method_field('PATCH')}}
                @include('Admin.section.error')
                <div class="form-group">
                    <div class="col-sm-12">
                        <label for="name" class="control-label">نام</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="نام را وارد کنید" value="{{ $user->name }}">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <label for="family" class="control-label">نام خانوادگی</label>
                        <input type="text" class="form-control" name="family" id="family" placeholder="نام خانوادگی را وارد کنید" value="{{ $user->family }}">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <label for="email" class="control-label">ایمیل</label>
                        <input type="text" class="form-control" name="email" id="email" placeholder="ایمیل را وارد کنید" value="{{ $user->email }}">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <label for="phoneNumber" class="control-label">تلفن همراه</label>
                        <input type="text" class="form-control" name="phoneNumber" id="phoneNumber" placeholder="تلفن همراه را وارد کنید" value="{{ $user->phoneNumber }}" >
                    </div>
                </div>




                <div class="form-group">
                    <div class="col-sm-12">
                        <label for="username"  class="control-label">نام کاربری </label>
                        <input type="text"  class="form-control"  name="username" id="username" placeholder="نام کاربری را وارد کنید" value="{{ $user->username }}">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <label for="password"   class="control-label">کلمه عبور </label>
                        <input type="password"    class="form-control"  name="password" id="password" placeholder="کلمه عبور را وارد کنید" value="{{  $user->password }}">
                    </div>
                </div>


                <div class="input-group">
                           <span class="input-group-btn">
                             <a id="lfm" data-input="thumbnail1"  data-preview="holder" class="btn btn-primary">
                               <i class="fa fa-picture-o"></i> انتخاب تصویر
                             </a>
                           </span>
                    <input id="thumbnail1" class="form-control" type="text" name="images">
                </div>
                <img id="holder" style="margin-top:15px;max-height:100px;">


                <div class="form-group">
                    <div class="col-sm-12">
                        <button type="submit" class="btn btn-danger">ارسال</button>
                    </div>
                </div>
            </form>



        </div>
    </div>

@endsection