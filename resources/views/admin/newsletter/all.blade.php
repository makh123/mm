@extends('admin.master.master')
@section('script')





@endsection
@section('scriptEnd')





@endsection
@section('content')


    <div class="panel panel-flat">


        <div class="panel-heading">
            <h2 class="panel-title">مدیریت خبرنامه</h2>
            <div class="heading-elements">
                <ul class="icons-list">
                    <li><a data-action="" ><i class="fas fa-upload"></i></a></li>
                    <li><a data-action="reload"></a></li>
                    <li><a data-action="close"></a></li>
                </ul>
            </div>
        </div>

        <div class="panel-body">

            @include('admin.master.error')

            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>ردیف</th>
                        <th> ایمیل </th>
                        <th> زبان</th>
                        <th>تنظیمات</th>
                    </tr>
                    @foreach($newsletters as $key=>$newsletter)
                        <tr>
                            <td>{{++$key}}</td>
                            <td>{{$newsletter->email}}</td>

                            <td>{{$langs->where('id',$newsletter->language_id)->pluck('name')}}</td>


                            <td>
                                <form action="{{route('newsletter.destroy',['id'=>$newsletter->id])}}" method="post">
                                    {{method_field('delete')}}
                                    {{csrf_field()}}

                                    <div class="btn-group btn-group-xs">
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

@endsection