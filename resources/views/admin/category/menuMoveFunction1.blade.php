<ol class="dd-list">
    @foreach($childs as $child)

        <li class="dd-item dd3-item" data-id="{{ $child->id }}">
            <div class="dd-handle dd3-handle">Drag</div>
            <div class="dd3-content">
                <form action="{{route('newsCategory.destroy',['slug'=>$child->slug])}}" method="post">
                    {{method_field('delete')}}
                    {{csrf_field()}}

                    {{ $child->name }}|

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


        @if(count($child->subcategories))
            @include('admin.category.menuMoveFunction1',['childs' => $child->subcategories])
        @endif
        </li>
    @endforeach

</ol>


