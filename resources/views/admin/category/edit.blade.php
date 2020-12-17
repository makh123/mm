@extends('admin.master.master')


@section('css')



<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/nestable2/1.5.0/jquery.nestable.min.css">
<link rel="stylesheet" href="/css/admin/nest.css">

@endsection



@section('content')


    <div class="panel panel-flat">
        <div class="panel-heading">
            <h2 class="panel-title">ویرایش منو</h2>
            <div class="heading-elements">
                <ul class="icons-list">
                    <li><i class="far fa-edit"></i></li>
                    <li><a data-action="reload"></a></li>
                    <li><a data-action="close"></a></li>
                </ul>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-lg-12">

            <div class="panel panel-flat">
                <form action="{{route('newscat.update')}}" method="post" class="ac">
                    {{csrf_field()}}


        <div class="cf nestable-lists">
            <div class="dd" id="nestable2"></div>

            <div class="dd" id="nestable3">
                <ol class="dd-list">


                    @foreach($menu->sortBy('priority') as $menu1)

                        <li class="dd-item dd3-item" data-id="{{ $menu1->id }}">
                            <div class="dd-handle dd3-handle">Drag</div>
                            <div class="dd3-content ">
                                {{ $menu1->name }}

                                <a id="more" href="#" onclick="$('.{{ $menu1->id }}').slideToggle(function(){$('#more').html($('.{{ $menu1->id }}').is(':visible')?'ویرایش':'ویرایش');});">ویرایش</a>
                                <a href="{{route('menu.delete',['id'=>$menu1->id])}}" class="" style="color:red;">| حذف</a>

                            </div>
                            <div class="{{  $menu1->id }} " style="display:none">


                                    <label for="name" class="control-label"> نام منو</label>
                                    <input type="text"  name="name[{{ $menu1->id }}]" class="" value="{!! $menu1->name !!}">



                                <div class="form-group">
                                    <label class="control-label col-lg-2"name="lang">انتخاب زبان</label>
                                    <div class="form-group">
                                        @foreach($langs as $lang)
                                            <label class="radio-inline">
                                                <input type="radio" name="lang[{{ $menu1->id }}]" @if($lang->id == $menu1->language_id)checked="checked" @endif class="styled" value="{{$lang->id}}" >
                                                {{$lang->name}}
                                            </label>
                                        @endforeach
                                    </div>
                                </div>

                    <input type="hidden"  name="id[{{ $menu1->id }}]" class="" value="{!! $menu1->id !!}">

                                <br>

                            </div>

                            @if(count($menu1->subcategories))
                                @include('admin.menu.menuMoveFunction2',['childs' => $menu1->subcategories])
                            @endif

                        </li>
                    @endforeach


                </ol>
            </div>
            <input id="nestable3-output" type="hidden">
        </div>



                    <div class="text-right">
                        <button type="submit" name="submit" class="btn btn-primary" onclick="$('#example3b').val( $('#nestable3-output').val() )" >اعمال تغییرات <i class="icon-arrow-right14 position-right"></i></button>
                    </div>

                    <input type="hidden" id="example3b" name="info" type="text" />

                </form>

        @section('script')
            <script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
            <script src="//cdnjs.cloudflare.com/ajax/libs/nestable2/1.5.0/jquery.nestable.min.js"></script>
            <script>

                $(document).ready(function() {

                    var updateOutput = function(e) {
                        var list = e.length ? e : $(e.target),
                            output = list.data('output');
                        if(window.JSON) {
                            output.val(window.JSON.stringify(list.nestable('serialize')));//, null, 2));
                        }
                        else {
                            output.val('JSON browser support required for this demo.');
                        }
                    };
                    var json = [];

                    var lastId = 12;

                    // activate Nestable for list 1
                    $('#nestable').nestable({
                        group: 1,
                        json: json,
                        contentCallback: function(item) {
                            var content = item.content || '' ? item.content : item.id;
                            content += ' <i>(id = ' + item.id + ')</i>';

                            return content;
                        }
                    }).on('change', updateOutput);

                    // activate Nestable for list 2
                    $('#nestable3').nestable({
                        group: 1
                    }).on('change', updateOutput);

                    // output initial serialised data

                    updateOutput($('#nestable3').data('output', $('#nestable3-output')));

                    $('#nestable-menu').on('click', function(e) {
                        var target = $(e.target),
                            action = target.data('action');
                        if(action === 'expand-all') {
                            $('.dd').nestable('expandAll');
                        }
                        if(action === 'collapse-all') {
                            $('.dd').nestable('collapseAll');
                        }
                        if(action === 'add-item') {
                            var newItem = {
                                "id": ++lastId,
                                "content": "Item " + lastId,
                                "children": [
                                    {
                                        "id": ++lastId,
                                        "content": "Item " + lastId,
                                        "children": [
                                            {
                                                "id": ++lastId,
                                                "content": "Item " + lastId
                                            }
                                        ]
                                    }
                                ]
                            };
                            $('#nestable').nestable('add', newItem);
                        }
                        if(action === 'replace-item') {
                            var replacedItem = {
                                "id": 10,
                                "content": "New item 10",
                                "children": [
                                    {
                                        "id": ++lastId,
                                        "content": "Item " + lastId,
                                        "children": [
                                            {
                                                "id": ++lastId,
                                                "content": "Item " + lastId
                                            }
                                        ]
                                    }
                                ]
                            };
                            $('#nestable').nestable('replace', replacedItem);
                        }
                    });



                });
            </script>





        @endsection



    </div>
    </div></div>
@endsection





