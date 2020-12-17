@extends('admin.master.master')
@section('script')





@endsection
@section('scriptEnd')





    <script src="/vendor/laravel-filemanager/js/lfm.js"></script>
    <script>
        $('#lfm').filemanager('image');
    </script>


@endsection
@section('content')


    <div class="panel panel-flat">


        <div class="panel-heading">
            <h2 class="panel-title">مشاهده نظرات </h2>
            <div class="heading-elements">
                <ul class="icons-list">
                    <li><a data-action="" ><i class="fas fa-upload"></i></a></li>
                    <li><a data-action="reload"></a></li>
                    <li><a data-action="close"></a></li>
                </ul>
            </div>
        </div>

        <div class="panel-body">
            <form action="{{ route('comment.update',['slug'=>$news->slug])}}" method="post" enctype="multipart/form-data">
                {{method_field('PATCH')}}
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group">
                    <label for="title">عنوان پست</label>
                    <input type="text" name="title" class="form-control" id="title" value="{!! $news->title !!}">
                </div>

                <div class="form-group">
                    <label for="body">متن</label>
                    <textarea class="form-control" name="body"  id="body" placeholder="متن را وارد کنید"  rows="7">{!! $news->body !!}</textarea>

                </div>






                <h2 class="panel-title"> نظرات </h2>



                @foreach($comment as $comments)
                    <div class="comment-item">

                        <!-- user-avatar -->
                        <span class="user-avatar">




                                    <img class="media-object" src="/front/images/comment.gif" width="64"
                                         height="64" alt="">
									</span>

                        <div class="media-body">

                            <h4 class="media-heading bold">{{$comments->name}}</h4>
                            {{$comments->body}}




                                               </div>
                        <select name="comments[{{ $comments->id }}]">
                            <option @if( $comments->approved == 0) selected @endif value="0">عدم تایید </option>
                            <option @if( $comments->approved == 1) selected @endif value="1">تایید</option>
                        </select>
                        <br><br>
                    </div>
                @endforeach

                <div class="form-group">
                    <div class="col-sm-12" id="submit">
                        <button type="submit" class="btn btn-primary">ارسال</button>


                    </div>


                </div>

            </form>





        </div>
    </div>

@endsection