
@foreach($childs as $child)

    @foreach(\App\Post::where('category_id',$child->id)->get() as $subnews)
        <div class="blog-post-item col-md-3 col-sm-6">

            <!-- OWL SLIDER -->
            <div class="margin-bottom-20">

                @if($subcategory->type==1)
                    <img class="img-responsive" src="{{$subnews->images[0]['thumb']}}" alt="">

                @endif

                @if($subnews->type==2)
                    <img class="img-responsive"  src="{{$subnews->images['thumb']}}" alt=""/>

                @endif
                    @if($subnews->type==0)

                    <!-- VIDEO -->

                        <video poster="{{$subnews->images['thumb']}}"  id="player{{$subnews->id}}" playsinline controls>
                            <source src="{{$subnews->images['a']}}"   type="video/mp4">




                            <!-- Captions are optional -->

                            <!-- Captions are optional -->

                        </video>
                        <!-- /VIDEO -->


                    @endif
            </div>
            <!-- /OWL SLIDER -->

            <h3><a href="">{{$subnews->title}} </a></h3>

            <ul class="blog-post-info list-inline">
                <li>
                    <a href="#">
                        <i class="fa fa-clock-o"></i>


                        <span class="font-lato">{{(date('F d,Y',strtotime($subnews->created_at)))}}</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-comment-o"></i>

                        <span class="font-lato">{{$subnews->commentCount}} </span>
                    </a>
                </li>
            </ul>

            <p>{{$subnews->description}}</p>
            <a href="{{route('news.show',['slug'=> $subnews->slug])}}" class="btn btn-reveal btn-default">
                <i class="fa fa-plus"></i>
                <span>بیشتر</span>
            </a>


        </div>
    @endforeach
    @if(count($child->subcategories))
        @include('admin.news.functional1',['childs' => $child->subcategories])
    @endif

@endforeach

