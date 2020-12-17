@extends('admin.master.master')
@section('script')

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






        <div class="panel panel-flat">
            <div class="panel-heading">
                <h2 class="panel-title">مدیریت دسترسی ها</h2>
                <div class="heading-elements">
                    <ul class="icons-list">
                        <li><a  href="{{route('permissions.create')}}" class="tooltip"><i class="glyphicon glyphicon-plus"></i> <span class="tooltiptext">ایجاد دسترسی </span></a></li>

                        <li><a data-action="reload"></a></li>
                    </ul>
                </div>
            </div>
        </div>


        <div class="panel panel-flat">
        <div class="panel-body">


                </div>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>نام دسترسی</th>
                            <th>توضیحات</th>
                            <th>تنظیمات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($permissions as $permission)
                            <tr>
                                <td>{!! $permission->permission_name !!}</td>
                                <td>{!!  $permission->label !!}</td>
                                <td>
                                    <form action="{{ route('permissions.destroy'  , ['id' => $permission->id]) }}" method="post">
                                        {{ method_field('delete') }}
                                        {{ csrf_field() }}
                                        <div class="btn-group btn-group-xs">
                                            <a href="{{ route('permissions.edit' , ['id' => $permission->id]) }}"  class="btn btn-primary">ویرایش</a>
                                            <button type="submit" class="btn btn-danger">حذف</button>
                                        </div>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

            </div>

        </div>
    </div>

@endsection