
@extends('admin.master.master')

@section('css')
    <link href="/css/admin/tooltip.css" rel="stylesheet">
@endsection

@section('script')

    <script type="text/javascript" src="/assets/js/plugins/forms/selects/select2.min.js"></script>
    <script type="text/javascript" src="/assets/js/pages/form_select2.js"></script>

@endsection

@section('content')


    <div class="panel panel-flat">
        <div class="panel-heading">
            <h2 class="panel-title">مدیریت برچسب</h2>
            <div class="heading-elements">
                <ul class="icons-list">

                </ul>
            </div>
        </div>
    </div>


    <div class="panel panel-flat">
        <div class="panel-heading">
            <h5 class="panel-title">افزودن بر چسب</h5>
        </div>

        <div class="panel-body">
            <form class="form-horizontal" action="{{route('tags.store')}}" method="post" id="contact"  enctype="multipart/form-data">
                {{csrf_field()}}
                     @include('admin.master.error')



                <div class="form-group">
                    <label class="control-label col-lg-2"name="tag">نام برچسب</label>
                    <div class="col-lg-10">
                        <input type="text" name="tag" id="tag" class="form-control" maxlength="18" placeholder="نام برچسب" value="{{old('tag')}}">
                    </div>
                </div>

                    <div class="form-group">
                    <label class="control-label col-lg-2">نامک</label>
                    <div class="col-lg-10">
                        <div class="input-group">
                            <input type="text" class="form-control" id="slug" name="slug" maxlength="10" value="{{old('slug')}}" placeholder="نامک فقط شامل حروف انگلیسی و اعداد بدون فاصله می باشد...">
                            <span class="input-group-btn">
								<button class="btn bg-primary" type="submit">ارسال</button>
							</span>
                        </div>
                    </div>
                </div>


            </form>
        </div>
    </div>



    <div class="panel panel-flat">

    <div class="panel-body">

            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>ردیف</th>
                        <th> نام برچسب </th>
                        <th> تعداد</th>
                        <th>تنظیمات</th>
                    </tr>
                    @foreach($tags as $key=>$tag)
                        <tr>
                            <td>{{++$key}}</td>
                            <td>{{$tag->name}}</td>

                            <td>{{$tag->count}}</td>

                            <td>
                                <form action="{{route('tags.destroy',['id'=>$tag->id])}}" method="post">
                                    {{method_field('delete')}}
                                    {{csrf_field()}}

                                    <div class="btn-group btn-group-xs">
                                        <a href="{{route('tags.edit',['id'=>$tag->id])}}" class="btn btn-primary">ویرایش</a>

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


