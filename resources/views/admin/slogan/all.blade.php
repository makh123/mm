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





@endsection
@section('content')


    <div class="panel panel-flat">







        <div class="panel panel-flat">
            <div class="panel-heading">
                <h2 class="panel-title">مدیریت شعارها</h2>
                <div class="heading-elements">
                    <ul class="icons-list">
                        <li><a  href="{{route('slogan.create')}}" class="tooltip"><i class="glyphicon glyphicon-plus"></i> <span class="tooltiptext">افزودن شعار</span></a></li>

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
                        <th>نام شعار</th>
                        <th> متن </th>

                        <th>تنظیمات</th>
                    </tr>
                    @foreach($slogan as $slogans)
                        <tr>
                            <td>{!! $slogans->title !!}</td>


                            <td>{{$slogans->description}}</td>



                            <td>
                                <form action="{{route('slogan.destroy',['id'=>$slogans->id])}}" method="post">
                                    {{method_field('delete')}}
                                    {{csrf_field()}}

                                    <div class="btn-group btn-group-xs">
                                        <a href="{{route('slogan.edit',['id'=>$slogans->id])}}" class="btn btn-primary">ویرایش</a>
                                        <button type="submit" class="btn btn-danger">حذف</button>

                                    </div>


                                </form>


                            </td>

                        </tr>
                    @endforeach



                </table>
            </div>

        </div>
        </div>
        <div class="text-left">
            <!-- Pagination Default -->
            <ul class="pagination nomargin">
                <li>
                    {!! $slogan->links('pagination.default') !!}
                </li>

            </ul>
            <!-- /Pagination Default -->
        </div>
    </div>

@endsection