@extends('admin.master.master')
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


@endsection
@section('content')


    <div class="panel panel-flat">


        <div class="panel-heading">
            <h2 class="panel-title">ویرایش دسترسی</h2>
            <div class="heading-elements">
                <ul class="icons-list">
                    <li><a data-action="" ><i class="fas fa-upload"></i></a></li>
                    <li><a data-action="reload"></a></li>
                    <li><a data-action="close"></a></li>
                </ul>
            </div>
        </div>

        <div class="panel-body">

                <div class="page-header head-section">
                    <h2>ویرایش دسترسی</h2>
                </div>
                <form class="form-horizontal" action="{{ route('permissions.update' , ['id' => $permission->id ]) }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{ method_field('PATCH') }}
                    @include('Admin.section.error')
                    <div class="form-group">
                        <div class="col-sm-12">
                            <label for="permission_name" class="control-label">عنوان دسترسی</label>
                            <input type="text" class="form-control" name="permission_name" id="permission_name" placeholder="عنوان را وارد کنید" value="{{ $permission->permission_name or old('permission_name') }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <label for="label" class="control-label">توضیحات کوتاه</label>
                            <textarea rows="5" class="form-control" name="label" id="label" placeholder="توضیحات را وارد کنید">{{ $permission->label or old('label') }}</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <button type="submit" class="btn btn-danger">ویرایش</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>


@endsection