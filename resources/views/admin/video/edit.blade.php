@extends('admin.master.master')
@section('script')

    <script type="text/javascript" src="/assets/js/plugins/forms/selects/select2.min.js"></script>

    <script type="text/javascript" src="/assets/js/pages/form_select2.js"></script>
    <script type="text/javascript" src="/assets/js/pages/form_multiselect.js"></script>
    <script type="text/javascript" src="/assets/js/plugins/notifications/pnotify.min.js"></script>
    <script type="text/javascript" src="/assets/js/plugins/forms/styling/switchery.min.js"></script>
    <script type="text/javascript" src="assets/js/pages/form_checkboxes_radios.js"></script>

    <script type="text/javascript">

        $(document).on("change", "input[type=radio]", function () {
            var langID = $('[name="lang"]:checked').val();
            if (langID) {
                $.ajax({
                    type: "GET",
                    url: "{{route('category.list')}}?language_id=" + langID,
                    success: function (res) {

                        if (res) {
                            //console.log(res);
                            $("#tag").empty();
                            $("#tag").append('<option disabled selected>انتخاب کنید...</option>');
                            $.each(res, function (key, value) {
                                $("#tag").append('<option value="' + key + '">' + value + '</option>');
                            });

                        } else {
                            $("#tag").empty();
                        }
                    }
                });
            } else {
                $("#tag").empty();

            }
        });
    </script>



@endsection
@section('scriptEnd')


    <script src="/js/select2.full.min.js"></script>
    <script type="text/javascript" src="/ckeditor/ckeditor.js"></script>

    <script src="/vendor/laravel-filemanager/js/lfm.js"></script>


    <script>
        var options = {
            filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
            filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
            filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
            filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
        };
    </script>
    <script>
        CKEDITOR.replace( 'body' );
    </script>
    <script>
        $('#lfm').filemanager('image', {prefix: '/fa/laravel-filemanager'});
    </script>
    <script>
        $('#lfm2').filemanager('image', {prefix: '/fa/laravel-filemanager'});
    </script>
    <script>
        $('#lfm3').filemanager('image', {prefix: '/fa/laravel-filemanager'});
    </script>

    <script>
        $('#lfm4').filemanager('file', {prefix: '/fa/laravel-filemanager'});
    </script>

@endsection
@section('content')


    <div class="panel panel-flat">


        <div class="panel-heading">
            <h2 class="panel-title">ویرایش پست </h2>
            <div class="heading-elements">
                <ul class="icons-list">
                    <li><a data-action="" ><i class="fas fa-upload"></i></a></li>
                    <li><a data-action="reload"></a></li>
                    <li><a data-action="close"></a></li>
                </ul>
            </div>
        </div>

        <div class="panel-body">





            <div class="page-header head-section">

            </div>

            <form class="form-horizontal" action="{{route('news.update',['slug'=>$news->slug])}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                {{method_field('PATCH')}}

                @include('admin.section.error')



                <div class="form-group">
                    <div class="col-sm-12">
                        <label for="title" class="control-label"> عنوان خبر</label>
                        <input type="text" class="form-control" name="title" id="title" placeholder="عنوان را وارد کنید."  value="{{$news->title}}">
                        <h5 id='result'></h5>
                    </div>
                </div>


                <div class="form-group">
                    <div class="col-sm-12">
                        <label for="description" class="control-label"> توضیحات</label>
                        <textarea rows="2" class="form-control" name="description" id="description" placeholder="توضیحات مختصر"> {{$news->description}}</textarea>
                        <h5 id='result2'></h5>
                    </div>
                </div>








                <div class="form-group">
                    <div class="col-sm-12">
                        <label for="body" class="control-label"> متن</label>
                        <textarea rows="6" class="form-control" name="body" id="body" placeholder="متن خود را وارد نمایید.">{!! $news->body !!}</textarea>
                    </div>
                </div>



                <div class="form-group">
                    <label for="category">دسته بندی</label>
                    <select  name="category"   class="form-control" id="category" title=" دسته بندی مورد نظر  را انتخاب کنید...">


                        @foreach($categories as $category)
                            <option  @if($category->id == $news->category_id)selected="selected" @endif value="{{$category->id}}" >{{$category->name}}</option>

                        @endforeach

                    </select>
                </div>


                <div class="form-group" >
                    <div class="col-md-2">
                        <label class="control-label" name="name">برچسب</label>
                    </div>
                    <div class="col-md-10">
                        <div >
                            <select class="select select-border-color" multiple="multiple" id="tags" name="tags[]"  >

                                @foreach($tags as $key=>$tag)
                                    @if(in_array($tag->name, $newstag))

                                        <option value="{{ $tag->name }}" selected="selected">{{ $tag->name }}</option >
                                    @else
                                        <option value="{{ $tag->name }}" >{{ $tag->name }}</option >

                                    @endif
                                @endforeach
                            </select>
                        </div>
                        @if ($errors->has('tags'))
                            <span class="text-danger">{{ $errors->first('tags') }}</span>
                        @endif
                    </div>
                </div>

                <div class="form-group">

                    <div class="col-sm-6">
                        <label for="body"  class="control-label">بارگذاری تصویر</label>

                        <div class="input-group">
                           <span class="input-group-btn">
                             <a id="lfm" data-input="thumbnail1" href="#" onclick="$('.cats').slideToggle(function(){$('#more').html($('.{{ 'cats' }}').is(':visible')?'تغییر تصویر':'تغییر تصویر');});" data-preview="holder" class="btn btn-primary">
                               <i class="fa fa-picture-o"></i> انتخاب تصویر
                             </a>
                           </span>
                            <input id="thumbnail1" class="form-control" type="text" name="image">
                        </div>
                        <img id="holder" style="margin-top:15px;max-height:100px;">
                    </div>


                    <div class="col-sm-6">
                        <label for="body"  style="display: none" class="control-label">بارگذاری تصویر</label>

                        <div class="input-group">
                           <span class="input-group-btn">
                             <a id="lfm2" data-input="thumbnail2" style="display: none" data-preview="holder" class="btn btn-primary">
                               <i class="fa fa-picture-o"></i> انتخاب تصویر دوم
                             </a>
                           </span>
                            <input id="thumbnail2" class="form-control" type="text" name="image2">
                        </div>
                        <img id="holder" style="margin-top:15px;max-height:100px;">
                    </div>





                    <div class="col-sm-6">
                        <label for="body" style="display: none" class="control-label">بارگذاری تصویر</label>

                        <div class="input-group">
                           <span class="input-group-btn">
                             <a id="lfm3" data-input="thumbnail3" style="display: none" data-preview="holder" class="btn btn-primary">
                               <i class="fa fa-picture-o"></i> انتخاب تصویر سوم
                             </a>
                           </span>
                            <input id="thumbnail3" class="form-control" type="text" name="image3">
                        </div>
                        <img id="holder" style="margin-top:15px;max-height:100px;">
                    </div>

                </div>


                <div class="form-group">

                    <div class="col-sm-6">
                        <label for="body" style="display: none" class="control-label">بارگذاری ویدیو</label>

                        <div class="input-group">
                           <span class="input-group-btn">
                             <a id="lfm4" data-input="thumbnail4" style="display: none" data-preview="holder" class="btn btn-primary">
                               <i class="fa fa-picture-o"></i> انتخاب ویدیو
                             </a>
                           </span>
                            <input id="thumbnail4" class="form-control" type="text" name="video">
                        </div>
                    </div>




                    @if($news->type==1)
                        <script>
                            lfm2.style.display = "block";
                            lfm3.style.display = "block";
                            lfm4.style.display = "none";
                        </script>
                    @endif
@if($news->type==0)
<script>
                        lfm4.style.display = "block";
                        lfm2.style.display = "none";
                        lfm3.style.display = "none";
</script>
    @endif



                </div>

                <div class="form-group">
                    <div class="col-sm-12">
                        <button type="submit" class="btn btn-primary">ویرایش</button>


                    </div>

                </div>

            </form>
        </div>





    </div>


@endsection