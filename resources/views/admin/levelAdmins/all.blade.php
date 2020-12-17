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
                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead>
                        <tr>

                            <th>ایمیل</th>
                            <th>نقش</th>
                            <th>تنظیمات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($roles as $role)
                            @if(count($role->users))
                                @foreach($role->users as $user)
                                    <tr>

                                        <td>{{ $user->email}}</td>
                                        <td>{{ $role->role_name }}</td>
                                        <td>
                                            <form action="{{ route('level.destroy'  , ['id' => $user->id]) }}" method="post">
                                                {{ method_field('delete') }}
                                                {{ csrf_field() }}
                                                <div class="btn-group btn-group-xs">
                                                    <a href="{{ route('level.edit' , ['id' => $user->id]) }}"  class="btn btn-primary">ویرایش</a>
                                                    <button type="submit" class="btn btn-danger">حذف</button>
                                                </div>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        @endforeach
                        </tbody>
                    </table>
                </div>

            </div>


        </div>

    </div>
    </div>

@endsection