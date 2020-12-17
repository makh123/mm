@extends('admin.master.master')


@section('css')

    <style>

        .starter-template {
            padding: 40px 15px;
            text-align: center;
        }
    </style>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/nestable2/1.5.0/jquery.nestable.min.css">
    <link rel="stylesheet" href="/css/admin/nest.css">
    <link href="/css/admin/tooltip.css" rel="stylesheet">


@endsection

@section('script')
    <script type="text/javascript" src="/assets/js/pages/form_multiselect.js"></script>
    <script type="text/javascript" src="/assets/js/plugins/notifications/pnotify.min.js"></script>
    @endsection

@section('content')


    <div class="panel panel-flat">
        <div class="panel-heading">
            <h2 class="panel-title">مدیریت دسته بندی</h2>
            <div class="heading-elements">
                <ul class="icons-list">
                    <li><a  href="{{route('categories.create')}}" class="tooltip"><i class="glyphicon glyphicon-plus"></i> <span class="tooltiptext">افزودن گزینه</span></a></li>
                    <li><a  href="{{route('newscat.edit')}}" class="tooltip" ><i class="glyphicon glyphicon-edit"></i> <span class="tooltiptext">ویرایش دسته بندی</span></a></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-flat">


        <div class="cf nestable-lists">
            <div class="dd" id="nestable2"></div>

            <div class="dd" id="nestable3">
                <ol class="dd-list">
                    @foreach($categories as $category)

                        <li class="dd-item dd3-item" data-id="{{ $category->id }}">
                            <div class="dd-handle dd3-handle">Drag</div>
                            <div class="dd3-content ">

                                    <form action="{{route('categories.destroy',['slug'=>$category->slug])}}" method="post">
                                    {{method_field('delete')}}
                                    {{csrf_field()}}

                                        {{ $category->name }}|

                                        <button type="submit" class="" style="  color: red;  background-color: Transparent;
                                        background-repeat:no-repeat;
                                        border: none;
                                        cursor:pointer;
                                        overflow: hidden;
                                        outline:none;">
                                            حذف

                                        </button>



                                </form>

                            </div>
                            @if(count($category->subcategories))
                                @include('admin.categories.menuMoveFunction1',['childs' => $category->subcategories])
                            @endif

                        </li>
                    @endforeach

                </ol>
            </div>
        </div>

            </div>



    </div>
    </div></div>
@endsection





