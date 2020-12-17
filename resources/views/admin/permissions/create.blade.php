@extends('admin.master.master')
@section('css')

    <style>

        .starter-template {
            padding: 40px 15px;
            text-align: center;
        }
    </style>
    <link href="/css/admin/show.css" rel="stylesheet">
    <link href="/css/admin/tooltip.css" rel="stylesheet">
@endsection
@section('script')





@endsection
@section('scriptEnd')

    <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'body' );
    </script>


    <script src="/vendor/laravel-filemanager/js/lfm.js"></script>
    <script>
        $('#lfm').filemanager('image');
    </script>
    <script>
        $(document).ready(function () {
            $('#permission_id').selectpicker();
        })
    </script>

@endsection
@section('content')


    <div class="panel panel-flat">


        <div class="panel panel-flat">
            <div class="panel-heading">
                <h2 class="panel-title">مدیریت دسترسی ها</h2>

            </div>
        </div>

        <div class="panel-body">





                <form class="form-horizontal" action="{{ route('permissions.store') }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    @include('Admin.section.error')
                    <div class="form-group">
                        <div class="col-sm-12">
                            <label for="permission_name" class="control-label">عنوان دسترسی</label>
                            <input type="text" class="form-control" name="permission_name" id="permission_name" placeholder="عنوان را وارد کنید" value="{{ old('permission_name') }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <label for="label" class="control-label">توضیحات کوتاه</label>
                            <textarea rows="5" class="form-control" name="label" id="label" placeholder="توضیحات را وارد کنید">{!! old('label') !!}</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <button type="submit" class="btn btn-danger">ارسال</button>
                        </div>
                    </div>
                </form>


        </div>
    </div>

@endsection