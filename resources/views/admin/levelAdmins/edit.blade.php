@extends('admin.master.master')

@section('script')
    <script>
        $(document).ready(function () {
            $('#user_id').selectpicker();
            $('#role_id').selectpicker();
        })
    </script>
@endsection

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
                <h2 class="panel-title">تخصیص نقش به کاربران</h2>
                <div class="heading-elements">
                    <ul class="icons-list">
                        <li><a  href="{{route('level.create')}}" class="tooltip"><i class="glyphicon glyphicon-plus"></i> <span class="tooltiptext">تخصیص نقش </span></a></li>

                        <li><a data-action="reload"></a></li>
                    </ul>
                </div>
            </div>
        </div>


        <div class="panel panel-flat">
            <div class="panel-body">



                    <form class="form-horizontal" action="{{ route('level.update' , ['id' => $level->id]) }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {!! method_field('patch') !!}
                        @include('Admin.section.error')
                        <div class="form-group">
                            <div class="col-sm-12">
                                <label for="role_id" class="control-label"> نام کاربری:  {{ $level->username }}</label>
                                <div>
                                    <label for="role_id" class="control-label"> نقش ها </label></div>
                                <select class="form-control" name="role_id" id="role_id">
                                    @foreach(\App\Role::all() as $role)
                                        <option value="{{ $role->id }}" {{ $level->hasRole($role->role_name) ? 'selected' : '' }}>{{ $role->role_name }} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-danger">ارسال</button>
                            </div>
                        </div>
                    </form>

                @endsection


            </div>


        </div>

    </div>



@section('styles')
    <link href="/css/bootstrap-select.min.css" rel="stylesheet">
@endsection

@section('scripts')
    <script src="/js/bootstrap-select.min.js"></script>

    <script>
        $('#category').selectpicker();
    </script>
@endsection