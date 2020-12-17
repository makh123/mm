@extends('admin.master.master')
@section('script')
    <script type="text/javascript" src="/assets/js/plugins/visualization/d3/d3.min.js"></script>
    <script type="text/javascript" src="/assets/js/plugins/visualization/d3/d3_tooltip.js"></script>
    <script type="text/javascript" src="/assets/js/plugins/forms/styling/switchery.min.js"></script>

    <script type="text/javascript" src="/assets/js/plugins/ui/moment/moment.min.js"></script>
    <script type="text/javascript" src="/assets/js/plugins/pickers/daterangepicker.js"></script>

    <script type="text/javascript" src="/assets/js/pages/dashboard.js"></script>

@endsection

@section('content')

        <!-- Main charts -->
        <div class="row">
            <div class="col-lg-12">

                <!-- Traffic sources -->
                <div class="panel panel-flat">
                    <div class="panel-heading">
                        <h6 class="panel-title">Traffic sources</h6>
                        <div class="heading-elements">
                            <form class="heading-form" action="#">
                                <div class="form-group">
                                    <label class="checkbox-inline checkbox-switchery checkbox-right switchery-xs">
                                        <input type="checkbox" class="switch" checked="checked">
                                        Live update:
                                    </label>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-4">
                                <ul class="list-inline text-center">
                                    <li>
                                        <a href="#" class="btn border-teal text-teal btn-flat btn-rounded btn-icon btn-xs valign-text-bottom"><i class="icon-plus3"></i></a>
                                    </li>
                                    <li class="text-left">
                                        <div class="text-semibold">New visitors</div>
                                        <div class="text-muted">2,349 avg</div>
                                    </li>
                                </ul>

                                <div class="col-lg-10 col-lg-offset-1">
                                    <div class="chart content-group" id="new-visitors"></div>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <ul class="list-inline text-center">
                                    <li>
                                        <a href="#" class="btn border-warning-400 text-warning-400 btn-flat btn-rounded btn-icon btn-xs valign-text-bottom"><i class="icon-watch2"></i></a>
                                    </li>
                                    <li class="text-left">
                                        <div class="text-semibold">New sessions</div>
                                        <div class="text-muted">08:20 avg</div>
                                    </li>
                                </ul>

                                <div class="col-lg-10 col-lg-offset-1">
                                    <div class="chart content-group" id="new-sessions"></div>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <ul class="list-inline text-center">
                                    <li>
                                        <a href="#" class="btn border-indigo-400 text-indigo-400 btn-flat btn-rounded btn-icon btn-xs valign-text-bottom"><i class="icon-people"></i></a>
                                    </li>
                                    <li class="text-left">
                                        <div class="text-semibold">Total online</div>
                                        <div class="text-muted"><span class="status-mark border-success position-left"></span> 5,378 avg</div>
                                    </li>
                                </ul>

                                <div class="col-lg-10 col-lg-offset-1">
                                    <div class="chart content-group" id="total-online"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="chart position-relative" id="traffic-sources"></div>
                </div>
                <!-- /traffic sources -->

            </div>

            <div class="col-lg-5">

                <!-- Sales stats -->
                <!-- /sales stats -->

            </div>
        </div>
        <!-- /main charts -->


        <!-- Dashboard content -->
        <div class="row">
            <div class="col-lg-8">

                <!-- Marketing campaigns -->
                <!-- /marketing campaigns -->


                <!-- Quick stats boxes -->
                <!-- /quick stats boxes -->


                <!-- Support tickets -->
                <!-- /support tickets -->


                <!-- Latest posts -->
                <div class="panel panel-flat">
                    <div class="panel-heading">
                        <h6 class="panel-title">Latest posts</h6>
                        <div class="heading-elements">
                            <ul class="icons-list">
                                <li><a data-action="collapse"></a></li>
                                <li><a data-action="reload"></a></li>
                                <li><a data-action="close"></a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <ul class="media-list content-group">
                                    <li class="media stack-media-on-mobile">
                                        <div class="media-left">
                                            <div class="thumb">
                                                <a href="#">
                                                    <img src="../assets/images/placeholder.jpg" class="img-responsive img-rounded media-preview" alt="">
                                                    <span class="zoom-image"><i class="icon-play3"></i></span>
                                                </a>
                                            </div>
                                        </div>

                                        <div class="media-body">
                                            <h6 class="media-heading"><a href="#">Up unpacked friendly</a></h6>
                                            <ul class="list-inline list-inline-separate text-muted mb-5">
                                                <li><i class="icon-book-play position-left"></i> Video tutorials</li>
                                                <li>14 minutes ago</li>
                                            </ul>
                                            The him father parish looked has sooner. Attachment frequently gay terminated son...
                                        </div>
                                    </li>

                                    <li class="media stack-media-on-mobile">
                                        <div class="media-left">
                                            <div class="thumb">
                                                <a href="#">
                                                    <img src="../assets/images/placeholder.jpg" class="img-responsive img-rounded media-preview" alt="">
                                                    <span class="zoom-image"><i class="icon-play3"></i></span>
                                                </a>
                                            </div>
                                        </div>

                                        <div class="media-body">
                                            <h6 class="media-heading"><a href="#">It allowance prevailed</a></h6>
                                            <ul class="list-inline list-inline-separate text-muted mb-5">
                                                <li><i class="icon-book-play position-left"></i> Video tutorials</li>
                                                <li>12 days ago</li>
                                            </ul>
                                            Alteration literature to or an sympathize mr imprudence. Of is ferrars subject as enjoyed...
                                        </div>
                                    </li>
                                </ul>
                            </div>

                            <div class="col-lg-6">
                                <ul class="media-list content-group">
                                    <li class="media stack-media-on-mobile">
                                        <div class="media-left">
                                            <div class="thumb">
                                                <a href="#">
                                                    <img src="assets/images/placeholder.jpg" class="img-responsive img-rounded media-preview" alt="">
                                                    <span class="zoom-image"><i class="icon-play3"></i></span>
                                                </a>
                                            </div>
                                        </div>

                                        <div class="media-body">
                                            <h6 class="media-heading"><a href="#">Case read they must</a></h6>
                                            <ul class="list-inline list-inline-separate text-muted mb-5">
                                                <li><i class="icon-book-play position-left"></i> Video tutorials</li>
                                                <li>20 hours ago</li>
                                            </ul>
                                            On it differed repeated wandered required in. Then girl neat why yet knew rose spot...
                                        </div>
                                    </li>

                                    <li class="media stack-media-on-mobile">
                                        <div class="media-left">
                                            <div class="thumb">
                                                <a href="#">
                                                    <img src="assets/images/placeholder.jpg" class="img-responsive img-rounded media-preview" alt="">
                                                    <span class="zoom-image"><i class="icon-play3"></i></span>
                                                </a>
                                            </div>
                                        </div>

                                        <div class="media-body">
                                            <h6 class="media-heading"><a href="#">Too carriage attended</a></h6>
                                            <ul class="list-inline list-inline-separate text-muted mb-5">
                                                <li><i class="icon-book-play position-left"></i> FAQ section</li>
                                                <li>2 days ago</li>
                                            </ul>
                                            Marianne or husbands if at stronger ye. Considered is as middletons uncommonly...
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /latest posts -->

            </div>

            <div class="col-lg-4">

                <!-- Progress counters -->
                <div class="row">
                    <div class="col-md-6">

                        <!-- Available hours -->
                        <!-- /available hours -->

                    </div>

                    <div class="col-md-6">

                        <!-- Productivity goal -->
                        <!-- /productivity goal -->

                    </div>
                </div>
                <!-- /progress counters -->


                <!-- Daily sales -->
                <!-- /daily sales -->


                <!-- My messages -->
                <!-- /my messages -->


                <!-- Daily financials -->
                <!-- /daily financials -->

            </div>
        </div>
        <!-- /dashboard content -->

    </div>
@endsection
