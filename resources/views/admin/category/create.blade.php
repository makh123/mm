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
                            $("#category").empty();
                            $("#category").append('<option disabled selected>انتخاب کنید...</option>');
                            $("#category").append('<option value="0">دسته اصلی</option>');

                            $.each(res, function (key, value) {
                                $("#category").append('<option value="' + key + '">' + value + '</option>');
                            });

                        } else {
                            $("#category").empty();
                        }
                    }
                });
            } else {
                $("#category").empty();

            }
        });
    </script>

@endsection


@section('content')

    <div class="panel panel-flat">
        <div class="panel-heading">
            <h2 class="panel-title">مدیریت دسته بندی</h2>
            <div class="heading-elements">
                <ul class="icons-list">

                </ul>
            </div>
        </div>
    </div>

    <!-- farsi gallery -->
    <div class="panel panel-flat">


        <div class="panel-body">
            <form class="form-horizontal" action="{{route('categories.store')}}" method="post" id="contact"
                  enctype="multipart/form-data">
                {{csrf_field()}}
                @include('admin.section.error')








                <div class="form-group">
                    <label class="control-label col-lg-2" name="name">نام دسته</label>
                    <div class="col-lg-10">
                        <input type="text" name="name" id="name" class="form-control" maxlength="20"
                               placeholder="نام دسته ..." value="{{old('name')}}">
                    </div>
                </div>



                <div class="form-group">
                    <label class="control-label col-lg-2" name="name">دسته بندی</label>
                    <div class="col-lg-10">
                        <select id="category" name="category" class="select-search">
                        </select>
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