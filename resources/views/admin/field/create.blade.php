@extends('admin.master.master')

@section('script')

@endsection


@section('content')
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <div class="page-header head-section">
            <h2>ایجاد رشته</h2>
        </div>
        <form class="form-horizontal" action="{{ route('field.store') }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            @include('Admin.section.error')
            <div class="form-group">
                <div class="col-sm-12">
                    <label for="field_name" class="control-label">نام سمت</label>
                    <input type="text" class="form-control" name="field_name" id="field_name" placeholder="نام رشته را وارد کنید" value="{{ old('field_name') }}">
                </div>
            </div>


            <div class="form-group">
                <div class="col-sm-12">
                    <button type="submit" class="btn btn-danger">ارسال</button>
                </div>
            </div>
        </form>
    </div>
@endsection