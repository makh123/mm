@extends('admin.master.master')
@section('css')

@endsection

@section('script')

    <script type="text/javascript" src="/assets/js/plugins/forms/selects/select2.min.js"></script>
    <script type="text/javascript" src="/assets/js/pages/form_select2.js"></script>

    <script type="text/javascript" src="/assets/js/pages/form_multiselect.js"></script>
    <script type="text/javascript" src="/assets/js/plugins/notifications/pnotify.min.js"></script>
    <script type="text/javascript" src="/assets/js/plugins/forms/styling/switchery.min.js"></script>
    <script type="text/javascript" src="assets/js/pages/form_checkboxes_radios.js"></script>



@endsection



@section('content')

    <div class="panel panel-flat">
        <div class="panel-heading">
            <h5 class="panel-title"> ویرایش برچسب</h5>
        </div>

        <div class="panel-body">
            <form class="form-horizontal" action="{{route('tags.update',['id'=>$tag->id])}}" method="post" id="contact"  enctype="multipart/form-data">
                {{csrf_field()}}
                {{method_field('PATCH')}}
                @include('admin.master.error')

                <div class="form-group">
                    <label class="control-label col-lg-2"name="tag">نام برچسب</label>
                    <div class="col-lg-10">
                        <input type="text" name="tag" id="tag" class="form-control" maxlength="10" placeholder="نام برچسب" value="{{$tag->name}}">
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-lg-2">نامک</label>
                    <div class="col-lg-10">
                        <div class="input-group">
                            <input type="text" class="form-control" id="slug" name="slug" value="{{$tag->slug}}" placeholder="نامک فقط شامل حروف انگلیسی و اعداد بدون فاصله می باشد...">
                            <span class="input-group-btn">
								<button class="btn bg-primary" type="submit">ارسال</button>
							</span>
                        </div>
                    </div>
                </div>


            </form>
        </div>
    </div>



    @endsection