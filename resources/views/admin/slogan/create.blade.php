@extends('admin.master.master')
<link rel="stylesheet" href="/css/admin/select2.min.css">

@section('script')


    <script type="text/javascript" src="/assets/js/plugins/forms/selects/select2.min.js"></script>

    <script type="text/javascript" src="/assets/js/pages/form_select2.js"></script>
    <script type="text/javascript" src="/assets/js/pages/form_multiselect.js"></script>
    <script type="text/javascript" src="/assets/js/plugins/notifications/pnotify.min.js"></script>
    <script type="text/javascript" src="/assets/js/plugins/forms/styling/switchery.min.js"></script>
    <script type="text/javascript" src="assets/js/pages/form_checkboxes_radios.js"></script>


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
        $('#lfm').filemanager('image', {prefix: '/laravel-filemanager'});
    </script>
    <script>
        $('#lfm2').filemanager('image', {prefix: '/laravel-filemanager'});
    </script>
    <script>
        $('#lfm3').filemanager('image', {prefix: '/laravel-filemanager'});
    </script>

    <script>
        $('#lfm4').filemanager('file', {prefix: '/laravel-filemanager'});
    </script>

@endsection
@section('content')


    <div class="panel panel-flat">


        <div class="panel-heading">
            <h2 class="panel-title">مدیریت شعارهای سایت</h2>
            <div class="heading-elements">
                <ul class="icons-list">
                    <li><a data-action="" ><i class="fas fa-upload"></i></a></li>
                    <li><a data-action="reload"></a></li>
                    <li><a data-action="close"></a></li>
                </ul>
            </div>
        </div>

        <div class="panel-body">




            <form class="form-horizontal" action="{{route('slogan.store')}}" method="post" id="contact"  enctype="multipart/form-data">
                {{csrf_field()}}

                @include('admin.section.error')



                <div class="form-group">
                    <div class="col-sm-12">
                        <label for="title" class="control-label"> عنوان </label>
                        <input type="text" class="form-control" name="title" id="title" placeholder="عنوان پست را وارد کنید." value="{{old('title')}}" maxlength="50">

                    </div>
                </div>


                <div class="form-group">
                    <div class="col-sm-12">
                        <label for="description" class="control-label"> توضیحات</label>
                        <textarea rows="2" maxlength="200" class="form-control" name="description" id="description" placeholder="توضیحات مختصر" maxlength="200">{{old('description')}}</textarea>

                    </div>
                </div>
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

