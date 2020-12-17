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
            <h2 class="panel-title">مدیریت تماس ها</h2>
            <div class="heading-elements">
                <ul class="icons-list">
                    <li><a data-action="" ><i class="fas fa-upload"></i></a></li>
                    <li><a data-action="reload"></a></li>
                    <li><a data-action="close"></a></li>
                </ul>
            </div>
        </div>

        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>نام و نام خانوادگی</th>
                        <th> ایمیل  </th>
                        <th> تلفن همراه  </th>
                        <th> موضوع   </th>
                        <th> پیغام   </th>
                        <th>تنظیمات</th>
                    </tr>
                    @foreach($contact as $contacts)
                        <tr>
                            <td>{{$contacts->name_family}}</td>


                            <td>{{$contacts->email}}</td>
                            <td>{{$contacts->phoneNumber}}</td>
                            <td>{!! $contacts->subject !!}</td>
                            <td>{!! $contacts->message !!}</td>


                            <td>
                                <form action="{{route('Contact.destroy',['id'=>$contacts->id])}}" method="post">

                                    {{ method_field('delete') }}
                                    {{ csrf_field() }}

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
        <br>
        <br>
        <div class="text-left">
            <!-- Pagination Default -->
            <ul class="pagination nomargin">
                <li>
                    {!! $contact->render('pagination.default') !!}
                </li>

            </ul>
            <!-- /Pagination Default -->
        </div>
    </div>

@endsection