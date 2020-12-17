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
                <h2 class="panel-title">مدیریت  نقش ها</h2>
                <div class="heading-elements">
                    <ul class="icons-list">
                        <li><a  href="{{route('roles.create')}}" class="tooltip"><i class="glyphicon glyphicon-plus"></i> <span class="tooltiptext">ایجاد نقش </span></a></li>

                        <li><a data-action="reload"></a></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="panel-body">



            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>نام نقش</th>
                        <th>توضیحات</th>
                        <th>دسترسی ها</th>
                        <th>تنظیمات</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($roles as $role)
                        <tr>
                            <td>{{ $role->role_name }}</td>

                            <td>{!! $role->label !!}  </td>
                            <td><a href="{{route('roles.show',  ['id' => $role->id])}}">مشاهده دسترسی ها</a></td>
                            <td>
                                <form action="{{ route('roles.destroy'  , ['id' => $role->id]) }}" method="post">
                                    {{ method_field('delete') }}
                                    {{ csrf_field() }}
                                    <div class="btn-group btn-group-xs">
                                        <a href="{{ route('roles.edit' , ['id' => $role->id]) }}"  class="btn btn-primary">ویرایش</a>
                                        <button type="submit" class="btn btn-danger">حذف</button>
                                    </div>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <br>
                <br>
            </div>




        </div>
    </div>

@endsection