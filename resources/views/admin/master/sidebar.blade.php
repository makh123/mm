<div class="sidebar sidebar-main sidebar-default">
    <div class="sidebar-content">

        <!-- Main navigation -->
        <div class="sidebar-category sidebar-category-visible">
            <div class="sidebar-user-material">
                <div class="category-content">
                    <div class="sidebar-user-material-content">
                        <a href="#"><img src="" class="img-circle img-responsive" alt=""></a>
                        <h6></h6>

                    </div>

                    <div class="sidebar-user-material-menu">
                        <a href="#user-nav" data-toggle="collapse"><span>My account</span> <i class="caret"></i></a>
                    </div>
                </div>

                <div class="navigation-wrapper collapse" id="user-nav">
                    <ul class="navigation">
                        <li><a href="#"><i class="icon-user-plus"></i> <span>My profile</span></a></li>
                        <li><a href="#"><i class="icon-coins"></i> <span>My balance</span></a></li>
                        <li><a href="#"><i class="icon-comment-discussion"></i> <span><span class="badge bg-teal-400 pull-right">58</span> Messages</span></a></li>
                        <li class="divider"></li>
                        <li><a href="#"><i class="icon-cog5"></i> <span>Account settings</span></a></li>
                        <li><a href="#"><i class="icon-switch2"></i> <span>Logout</span></a></li>
                    </ul>
                </div>
            </div>

            <div class="category-content no-padding">
                <ul class="navigation navigation-main navigation-accordion">

                    <!-- Main -->
                    <li class="navigation-header"><span>Main</span> <i class="icon-menu" title="Main pages"></i></li>
                    <li class="active"><a href="{{route('dashboard')}}"><i class="icon-home4"></i> <span>داشبورد</span></a></li>

                    <li>

                        <a href=""><i class="icon-stack2"></i> <span>مدیریت پست</span></a>
                        <ul>
                            <li><a href="{{route('news.index')}}">اخبار و مقالات </a></li>
                            <li><a href="{{route('service.index')}}">سرویس ها</a></li>

                            <li>
                                <a href="{{route('categories.index')}}"><i class="icon-droplet2"></i> <span>  دسته ها</span></a>

                            </li>

                            <li>
                            <a href="{{route('comments.all')}}"><i class="icon-pencil3"></i> <span>مدیریت نظرات</span></a>
                            </li>

                        </ul>
                    </li>




                    <li>

                        <a href="{{route('tags.index')}}"><i class="icon-thumbs-up2"></i> <span>مدیریت برچسب</span></a>

                    </li>


                    <li>
                        <a href="#"><i class="icon-thumbs-up2"></i> <span>ایجاد صفحه</span></a>
                        <ul>
                            <li><a href="">مدیریت صفحات</a></li>
                        </ul>
                    </li>





                    <li>

                        <a href=""><i class="icon-file-css"></i> <span>مدیریت تصاویر ارسالی</span></a>

                        <ul>
                            <li><a href="">تصاویر ارسالی </a></li>

                        </ul>
                    </li>

                    <li>
                   <a href=""><i class="icon-footprint"></i> <span>مدیریت کاربران</span></a>
                        <ul>
                            <li>
                                <a href="{{route('users.index')}}"><i class="icon-droplet2"></i> <span>    کاربران</span></a>

                            </li>
                            <li>
                                <a href="{{route('roles.index')}}"><i class="icon-droplet2"></i> <span>  مدیریت نقش ها</span></a>

                            </li>
                            <li>
                                <a href="{{route('permissions.index')}}"><i class="icon-droplet2"></i> <span>   مدیریت دسترسی ها</span></a>

                            </li>
                            <li>
                                <a href="{{route('level.index')}}"><i class="icon-droplet2"></i> <span>    تخصیص نقش</span></a>

                            </li>

                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="icon-footprint"></i> <span>مدیریت عضویت</span></a>
                        <ul>
                            <li><a href="">مدیریت همایش ها</a></li>
                            <li><a href="wizard_form.html">مدیریت ثبت نام کنندگان</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="{{route('newsletter.index')}}"><i class="icon-footprint"></i> <span>مدیریت خبرنامه</span></a>

                    </li>
                    <li>
                        <a href="{{route('slogan.index')}}"><i class="icon-footprint"></i> <span>مدیریت شعارها</span></a>

                    </li>

                    <li>
                        <a href="{{route('contact.all')}}"><i class="icon-spell-check"></i> <span>تماس با ما</span></a>

                    </li>



                </ul>
            </div>
        </div>
        <!-- /main navigation -->

    </div>
</div>
