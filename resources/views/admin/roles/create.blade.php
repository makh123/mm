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
    <script src="/js/bootstrap-select.min.js"></script>

    <script>
        $('#category').selectpicker();
    </script>
    <link href="/css/bootstrap-select.min.css" rel="stylesheet">
@endsection
@section('content')


    <div class="panel panel-flat">


        <div class="panel panel-flat">
            <div class="panel-heading">
                <h2 class="panel-title"> ایجاد نقش</h2>
                <div class="heading-elements">
                    <ul class="icons-list">
                        <li><a  href="{{route('permissions.create')}}" class="tooltip"><i class="glyphicon glyphicon-plus"></i> <span class="tooltiptext"> ایجاد دسترسی</span></a></li>

                        <li><a data-action="reload"></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="panel panel-flat">
        <div class="panel-body">


                <form class="form-horizontal" action="{{ route('roles.store') }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    @include('Admin.section.error')
                    <div class="form-group">
                        <div class="col-sm-12">
                            <label for="role_name" class="control-label">عنوان نقش</label>
                            <input type="text" class="form-control" name="role_name" id="role_name" placeholder="عنوان را وارد کنید" value="{{ old('role_name') }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <label for="permission_id" class="control-label">دسترسی ها</label>
                            <select class="form-control" name="permission_id[]" id="permission_id" multiple>
                                @foreach(\App\Permission::latest()->get() as $permission)
                                    <option value="{{ $permission->id }}">{!! $permission->permission_name  !!} - {!! $permission->label !!}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <label for="label" class="control-label">توضیحات کوتاه</label>
                            <textarea rows="5" class="form-control" name="label" id="label" placeholder="توضیحات را وارد کنید">{!!  old('label') !!}</textarea>
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
    </div>

@endsection