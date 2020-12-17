@extends('admin.master.master')




@section('content')


    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <div class="page-header head-section">
            <h2>فراخوان همکاری  </h2>


        </div>
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>نام</th>
                    <th>نام خانوادگی</th>
                    <th>ایمیل</th>
                    <th>تلفن همراه</th>
                    <th>متولد</th>
                    <th>آخرین مدرک تحصیلی</th>
                    <th>دانشگاه/ موسسه محل اخذ مدرک</th>
                    <th>رزومه</th>
                    <th>تنظیمات</th>

                </tr>
                </thead>
                <tbody>
                @foreach($collaborates as $collaborate)
                    <tr>
                        <td>{{ $collaborate->name }}</td>
                        <td>{{ $collaborate->family }}</td>
                        <td>{{ $collaborate->email }}</td>
                        <td>{{ $collaborate->phoneNumber }}</td>
                        <td>{{ $collaborate->birthYear }}</td>
                        <td>{{ $collaborate->DegreeName }}</td>
                        <td>{{ $collaborate->UniversityName }}</td>
                        <td><a href="{{$collaborate->Rezume}}" download="{{$collaborate->Rezume}}">مشاهده رزومه</a> </td>









                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>
    </div>


    @endsection