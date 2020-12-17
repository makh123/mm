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

@section('content')


    <div class="panel panel-flat">


        <div class="panel panel-flat">
            <div class="panel-heading">
                <h2 class="panel-title">مدیریت دسترسی ها</h2>

            </div>
        </div>

        <div class="panel-body">



            <form class="form-horizontal" action="{{ route('level.store') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                @include('Admin.section.error')
                <div class="form-group">
                    <div class="col-sm-12">
                        <label for="user_id" class="control-label">کاربران</label>
                        <select class="form-control" name="user_id" id="user_id" data-live-search="true">
                            @foreach(\App\User::all() as $user)
                                <option value="{{ $user->id }}">{{ $user->email }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <label for="role_id" class="control-label">مقام ها</label>
                        <select class="form-control" name="role_id[]" id="role_id"  data-live-search="true">
                            @foreach(\App\Role::all() as $role)
                                <option value="{{ $role->id }}">{!! $role->role_name !!}</option>
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




        </div>
    </div>

@endsection