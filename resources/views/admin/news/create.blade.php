@extends('admin.master.master')
<link rel="stylesheet" href="/css/admin/select2.min.css">

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
                            $("#tags").empty();
                            $("#tags").append('<option disabled selected>انتخاب کنید...</option>');
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
            filebrowserImageBrowseUrl: '/fa/laravel-filemanager?type=Images',
            filebrowserImageUploadUrl: '/fa/laravel-filemanager/upload?type=Images&_token=',
            filebrowserBrowseUrl: '/fa/laravel-filemanager?type=Files',
            filebrowserUploadUrl: '/fa/laravel-filemanager/upload?type=Files&_token='
        };
    </script>
    <script>
        CKEDITOR.replace( 'body' , options

        );
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
            <h2 class="panel-title">مدیریت اخبار و مقالات</h2>
            <div class="heading-elements">
                <ul class="icons-list">
                    <li><a data-action="" ><i class="fas fa-upload"></i></a></li>
                    <li><a data-action="reload"></a></li>
                    <li><a data-action="close"></a></li>
                </ul>
            </div>
        </div>

        <div class="panel-body">




            <form class="form-horizontal" action="{{route('news.store')}}" method="post" id="contact"  enctype="multipart/form-data">
                {{csrf_field()}}

                @include('admin.section.error')



                <div class="form-group">
                    <div class="col-sm-12">
                        <label for="title" class="control-label"> عنوان پست</label>
                        <input type="text" class="form-control" name="title" id="title" placeholder="عنوان پست را وارد کنید." value="{{old('title')}}" maxlength="100">

                    </div>
                </div>


                <div class="form-group">
                    <div class="col-sm-12">
                        <label for="description" class="control-label"> توضیحات</label>
                        <textarea rows="2" maxlength="200" class="form-control" name="description" id="description" placeholder="توضیحات مختصر" maxlength="200">{{old('description')}}</textarea>

                    </div>
                </div>







                <div class="form-group">
                    <div class="col-sm-12">
                        <label for="body" class="control-label"> متن</label>
                        <textarea rows="6" id="body" name="body" class="form-control" placeholder="متن خود را وارد نمایید.">{!! old('body') !!}</textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-lg-2" name="lang">انتخاب زبان</label>
                    <div class="form-group">
                        @foreach($languages as $language)
                            <label class="radio-inline">
                                <input type="radio" name="language"
                                       class="styled" value="{{$language->id}}">
                                {{$language->name}}
                            </label>
                        @endforeach
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <input type="checkbox" name="slideShow" value="1"> <label>نمایش در اسلایدشو</label>
                    </div>
                </div>

                <div class="form-group">
                    <label for="category">دسته بندی </label>
                    <select  name="category" class="form-control" id="category" title=" دسته بندی موردنظر را انتخاب کنید...">
                        @foreach($categories as $category)
                            <option selected value="{{ $category->id }}">  {{ $category->name }}</option>
                        @endforeach



                    </select>
                </div>

                <div class="form-group">
                    <label for="post_type">درج پست به عنوان </label>
                    <select  name="post_type" class="form-control" id="post_type" title=" نوع پست موردنظر را انتخاب کنید...">

                            <option selected value="1"> خبر </option>
                        <option selected value="2"> مقاله </option>
                        <option selected value="3">خدمت  </option>



                    </select>
                </div>





                <div class="form-group">
                    <div class="col-md-2">
                        <label class="control-label" name="name">برچسب</label>
                    </div>
                    <div class="col-md-10">
                        <select class="select select-border-color" multiple="multiple" id="tags" name="tags[]"
                                data-placeholder="برچسب  را انتخاب کنید">
                            @foreach($tags as $key=>$tag)
                                <option value="{{ $tag->name }}">{{ $tag->name }}</option>
                            @endforeach
                        </select>


                    </div>
                </div>






<div>با انتخاب یکی از گزینه های ذیل نوع فایل ارسالی را مشخص کنید.</div>


                <div>
                    <input type="radio"  name="myCheck" id="myCheck" onclick="myFunction()" value="1">
                    آپلود اسلایدشو
                </div>
<div>

                <input type="radio"  name="myCheck" id="myCheck1" onclick="myFunction()" value="2">
    آپلود ویدیو
</div>
                <div>


                <input type="radio"  name="myCheck" id="myCheck2" onclick="myFunction()" value="3">
                    آپلود تصویر
                </div>

<script>

                    function myFunction() {
                        // Get the checkbox
                        var radio = document.getElementById("myCheck");
                        var radio1 = document.getElementById("myCheck1");
                        var radio2 = document.getElementById("myCheck2");
                        // Get the output text
                        var file = document.getElementById("lfm2");
                        var file = document.getElementById("lfm3");
                        var file = document.getElementById("lfm4");

                        // If the checkbox is checked, display the output text
                        if (radio.checked==true){
                            radio1.checked==false;
                            lfm2.style.display = "block";
                            lfm3.style.display = "block";
                            lfm4.style.display = "none";
                        }
                        else if (radio1.checked==true){
                            radio.checked==false;
                            lfm4.style.display = "block";
                            lfm2.style.display = "none";
                            lfm3.style.display = "none";

                        }
                        else if (radio2.checked==true){
                            radio.checked==false;
                            radio1.checked==false;
                            lfm4.style.display = "none";
                            lfm2.style.display = "none";
                            lfm3.style.display = "none";

                        }
                    }
                </script>

                <div class="form-group">

                    <div class="col-sm-6">
                        <label for="body"  class="control-label"> </label>

                        <div class="input-group">
                           <span class="input-group-btn">
                             <a id="lfm" data-input="thumbnail1"  data-preview="holder" class="btn btn-primary">
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





                </div>


                <div class="form-group">
                    <div class="col-sm-12" id="submit">
                        <button type="submit" class="btn btn-primary">ارسال</button>


                    </div>


                </div>

            </form>



        </div>

    </div>

@endsection

