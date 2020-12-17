@extends('admin.master.master')

@section('content')
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <div class="page-header head-section">
            <h2>رشته ها</h2>
            <div class="btn-group">
                <a href="{{ route('field.create') }}" class="btn btn-sm btn-danger">ایجاد رشته</a>

            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>نام رشته</th>
                    <th>تنظیمات</th>
                </tr>
                </thead>
                <tbody>
                @foreach($fields as $field)
                    <tr>
                        <td>{{ $field->field_name }}</td>

                        <td>
                            <form action="{{ route('field.destroy'  , ['id' => $field->id]) }}" method="post">
                                {{ method_field('delete') }}
                                {{ csrf_field() }}
                                <div class="btn-group btn-group-xs">
                                    <a href="{{ route('field.edit' , ['id' => $field->id]) }}"  class="btn btn-primary">ویرایش</a>
                                    <button type="submit" class="btn btn-danger">حذف</button>
                                </div>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

    </div>
@endsection