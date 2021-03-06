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
            <h2 class="panel-title">مدیریت نظرات</h2>
            <div class="heading-elements">
                <ul class="icons-list">
                    <li><a data-action="" ><i class="fas fa-upload"></i></a></li>
                    <li><a data-action="reload"></a></li>
                    <li><a data-action="close"></a></li>
                </ul>
            </div>
        </div>

        <div class="panel-body">
            <table class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>عنوان خبر</th>
                    <th>مشاهده نظرات</th>
                    <th>تعداد نظرات</th>


                </tr>
                </thead>
                <tbody>
                @foreach($news as $newss)
                    <tr>
                        <td>{{$newss->title}}</td>
<td><a href="{{route('comment.show', ['slug'=>$newss->slug])}}">مشاهده نظرات</a> </td>
                        <td>{!!  $newss->Comments()->count() !!}</td>













                    </tr>
                @endforeach







                </tbody>
            </table>

            <div class="table-responsive">

            </div>




        </div>
    </div>

@endsection