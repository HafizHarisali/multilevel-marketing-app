@include("admin.layouts.header")
@include("admin.layouts.aside")
   <div id="content" class="app-content" role="main">
    <div class="app-content-body ">
        <div class="hbox hbox-auto-xs hbox-auto-sm">

            <div class="col">
                <!-- main header -->
                <div class="bg-light lter b-b wrapper-md">
                    <div class="row">
                        <div class="col-lg-4 col-md-12">
                            <h1 class="m-n h3">Overview</h1>
                        </div>
                        <div class="col-lg-8 col-md-12 text-right hidden-xs title-extra-class">
                            <div class="region region-title-extra">
                                
                                <!-- /.block -->
                                <div id="block-afl-widgets-afl-block-member-current-package" class="block block-afl-widgets contextual-links-region clearfix">

                                    <div class="inline text-left">
                                        <div class="hidden-md inline m-r text-left  pull-left">
                                            <div class="sparkline inline m-r-xs"><img class="img-circle" width="50" src="{{asset('public/assets/images/badges')}}/{{$current_package->badge}}" alt="{{$current_package->package}}" title="{{$current_package->package}}"></div>
                                        </div>
                                        <div class="r-r inline m-r text-left">
                                            <div class="m-b-">Current Package</div>
                                            <div class="sparkline inline text-md text-black font-bold">{{$current_package->package}}</div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.block -->
                                <div id="block-afl-widgets-afl-block-upgrade-package-link" class="block block-afl-widgets contextual-links-region v-top">

                                    <div class="inline text-left dashboard-upgrade-block">
                                        <div class="dropdown">
                                            <div class="btn btn-md btn-primary font-bold dropdown-toggle" data-toggle="dropdown">UPGRADE<i class="fa fa-fw fa-caret-down text-white text-sm fa fa-gear m-l-sm m-r-s "></i></div>
                                            @if(!empty($count > 0))
                                            <div class="dropdown-menu pull-right angle" style="width:485px;">
                                                <ul class="list-group list-group-lg m-b-none">
                                                    @foreach($packages as $row)
                                                    <li class="list-group-item text-dark-ltr m-b-xs">
                                                        <div class="row">
                                                            <div class="col-xs-7">
                                                                <div class="thumb-xs pull-left m-r"><img class="img-circle" id="my-img" src="{{asset('public/assets/images/badges')}}/{{$row->badge}}" alt="{{$row->package}}" title="{{$row->package}}"></div>
                                                                <div class="m-b-sm m-t-xs"><span class="h4 text-primary">{{$row->package}} {{number_format($row->fees,2)}} USD</span></div>
                                                            </div>
                                                            <div class="col-xs-5"><a href="{{route('upgrade_front_package',['id' => $user_id,'package_id' => $row->package_id])}}" class="btn btn-warning btn-sm btn-addon text-black"><i class="fa fa-arrow-right pull-right"></i>UPGRADE</a></div>
                                                        </div>
                                                    </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                            @else
                                            <div class="dropdown-menu pull-right angle" style="width:485px;">
                                                <ul class="list-group list-group-lg m-b-none">
                                                    <li class="list-group-item bg-light text-dark-ltr m-b-xs">
                                                        <div class="row">
                                                            <div class="col-md-12 text-center">You have the highest package.</div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <!-- /.block -->
                            </div>
                        </div>
                        <!-- sreeram -->

                    </div>
                </div>
                <!-- / main header -->

                <!-- main content -->
                <div class="wrapper-md ">
                    <!--Dashboard-thankyou-section-open -->

                    <!--Dashboard-thankyou-section-close -->
                    <!-- stats -->

                    <div class="row row-before-sm">
                        <div class="col-md-5">
                            <div class="row text-center">
                                <div class="region region-panel-grid">
                                    <div id="block-afl-widgets-afl-block-referal-downlines" class="block block-afl-widgets contextual-links-region col-xs-6 col-md-6 col-sm-12">

                                        <div class="block panel wrapper-md item afl-widget-panel bg-primary padder-lg text-left r-3x- ">
                                            <a href="#">
                                                <div class="h1 font-thin text-muted popover__wrapper animated fadeIn"><span class="text- m-r-xs"></span>{{$direct_referals}}</div>
                                                <div class="text-muted ">Direct Referrals</div>
                                            </a>
                                            <!-- <div class="top text-right w-full">
                                                <div class="dropdown"><i class="fa fa-gear m-l-sm m-r-sm text-muted dropdown-toggle" data-toggle="dropdown"></i>
                                                    <ul class="dropdown-menu pull-right">
                                                        <li class="active"><a href="#" type="t">Overall</a></li>
                                                        <li><a href="#" type="y">Yearly</a></li>
                                                        <li><a href="#" type="m">Monthly</a></li>
                                                        <li><a href="#" type="d">Day</a></li>
                                                    </ul>
                                                </div>
                                            </div> -->
                                        </div>

                                    </div>
                                    <!-- /.block -->
                                    <div id="block-afl-widgets-afl-block-commission-payout" class="block block-afl-widgets contextual-links-region col-xs-6 col-md-6 col-sm-12">

                                        <div class="block panel wrapper-md item afl-widget-panel bg-white padder-lg  text-left r-3x- ">
                                            <a href="#">
                                                <div class="h1 font-thin text-muted popover__wrapper animated fadeIn"><span class="text-muted  text- m-r-xs ">$</span>{{$withdraw_commission}}</div>
                                                <div class="text-muted ">Commission Withdrawn</div>
                                            </a>
                                            <!-- <div class="top text-right w-full">
                                                <div class="dropdown"><i class="fa fa-gear m-l-sm m-r-sm text-muted  dropdown-toggle" data-toggle="dropdown"></i>
                                                    <ul class="dropdown-menu pull-right">
                                                        <li class="active"><a href="#" type="t">Overall</a></li>
                                                        <li><a href="#" type="y">Yearly</a></li>
                                                        <li><a href="#" type="m">Monthly</a></li>
                                                        <li><a href="#" type="d">Day</a></li>
                                                    </ul>
                                                </div>
                                            </div> -->
                                        </div>

                                    </div>
                                    <!-- /.block -->
                                    <div id="block-afl-widgets-afl-block-commission-pending" class="block block-afl-widgets contextual-links-region col-xs-6 col-md-6 col-sm-12">

                                        <div class="block panel wrapper-md item afl-widget-panel bg-white padder-lg text-left r-3x- ">
                                            <a href="#">
                                                <div class="h1 font-thin text-muted popover__wrapper animated fadeIn"><span class="text-muted text- m-r-xs ">$</span>{{$payout_pending}}</div>
                                                <div class="text-muted ">Payout Pending</div>
                                            </a>
                                            <!-- <div class="top text-right w-full">
                                                <div class="dropdown"><i class="fa fa-gear m-l-sm m-r-sm text-muted dropdown-toggle" data-toggle="dropdown"></i>
                                                    <ul class="dropdown-menu pull-right">
                                                        <li class="active"><a href="#" type="t">Overall</a></li>
                                                        <li><a href="#" type="y">Yearly</a></li>
                                                        <li><a href="#" type="m">Monthly</a></li>
                                                        <li><a href="#" type="d">Day</a></li>
                                                    </ul>
                                                </div>
                                            </div> -->
                                        </div>

                                    </div>
                                    <!-- /.block -->
                                    <div id="block-afl-widgets-afl-block-commission-earned" class="block block-afl-widgets contextual-links-region col-xs-6 col-md-6 col-sm-12">

                                        <div class="block panel wrapper-md item afl-widget-panel bg-info padder-lg text-left r-3x- ">
                                            <a href="#">
                                                <div class="h1 font-thin text-white popover__wrapper animated fadeIn"><span class="text-white text- m-r-xs ">$</span>{{$commission_earnings}}</div>
                                                <div class="text-muted  ">Commission Earned</div>
                                            </a>
                                            <!-- <div class="top text-right w-full">
                                                <div class="dropdown"><i class="fa fa-gear m-l-sm m-r-sm text-white dropdown-toggle" data-toggle="dropdown"></i>
                                                    <ul class="dropdown-menu pull-right">
                                                        <li class="active"><a href="#" type="t">Overall</a></li>
                                                        <li><a href="#" type="y">Yearly</a></li>
                                                        <li><a href="#" type="m">Monthly</a></li>
                                                        <li><a href="#" type="d">Day</a></li>
                                                    </ul>
                                                </div>
                                            </div> -->
                                        </div>

                                    </div>
                                    <!-- /.block -->
                                    <div id="block-afl-widgets-afl-block-revenue" class="block block-afl-widgets contextual-links-region col-xs-12 m-b-md">

                                        <div class="r dker item hbox no-border bg-white">
                                            <div class="col w-xs v-middle hidden-md">
                                                <div class="sparkline inline"><img class="" src="https://binary.epixelmlmsoftware.com/sites/binary/files/default_images/wallet-1.png" height="50" alt="Wallet" title="Wallet"></div>
                                            </div>
                                            <div class="col dk padder-v r-r">
                                                <div class="h1 font-thin text-primary"><span><span class="text-primary text- m-r-xs ">$</span>{{$remaining}}</span>
                                                </div><span class="text-muted">E-Wallet Balance</span></div>
                                        </div>

                                    </div>
                                    <!-- /.block -->
                                </div>
                            </div>
                        </div>

                        <div class="col-md-7">
                            <div class="region region-analytics-right">
                                <div id="block-afl-widgets-afl-block-downlines-chart" class="block block-afl-widgets contextual-links-region clearfix">

                                    <div class="panel wrapper afl-widget-chart">
                                        <div class="clearfix">
                                            <h4 class="m-t-none m-b text-primary-lt font-thin-bold pull-left">Downline Members</h4>
                                            <!-- <div class="pull-left dropdown"><i class="fa fa-gear m-l-sm m-r-sm text-muted dropdown-toggle" data-toggle="dropdown"></i>
                                                <ul class="dropdown-menu">
                                                    <li><a href="#" type="y">Yearly</a></li>
                                                    <li><a href="#" type="m">Monthly</a></li>
                                                    <li><a href="#" type="w">Weekly</a></li>
                                                </ul>
                                            </div> -->
                                            <div class="text-right hidden-xs dashboard-sales-block">
                                                <a>
                                                    <div class="inline m-r text-left text-primary dropdown">
                                                        <div class="dropdown-toggle" data-toggle="dropdown">
                                                            <div>Sales - Left <i class="fa fa-fw fa-caret-down text-primary text-sm"></i></div>
                                                            <div class="h3 m-b-sm"><span class="text-primary m-r-xs ">$</span>{{number_format($left_sales,2)}}</div>
                                                        </div>
                                                       <!--  <div class="pull-right dropdown-menu bg-white">
                                                            <div class="wrapper-sm text-primary  m-b-xs">
                                                                <div class="text-left">
                                                                    <div class="h3"><span class="text-primary m-r-xs ">$ 2,000.00</span></div>
                                                                    <div class="text-muted text-xs">Carry Forward</div>
                                                                </div>
                                                            </div>
                                                            <div class="wrapper-sm text-primary">
                                                                <div class="text-left">
                                                                    <div class="h3"><span class="m-r-xs ">24</span></div>
                                                                    <div class="text-muted text-xs">Active Members</div>
                                                                </div>
                                                            </div>
                                                        </div> -->
                                                    </div>
                                                </a>
                                                <a>
                                                    <div class="inline m-r text-left text-info dropdown">
                                                        <div class="dropdown-toggle" data-toggle="dropdown">
                                                            <div>Sales - Right <i class="fa fa-fw fa-caret-down text-info text-sm"></i></div>
                                                            <div class="h3 m-b-sm"><span class="text-info m-r-xs ">$</span>{{number_format($right_sales,2)}}</div>
                                                        </div>
                                                        <!-- <div class="pull-right dropdown-menu bg-white text-info">
                                                            <div class="wrapper-sm text-info m-b-xs">
                                                                <div class="text-left">
                                                                    <div class="h3">$ 0</div>
                                                                    <div class="text-muted text-xs">Carry Forward</div>
                                                                </div>
                                                            </div>
                                                            <div class="wrapper-sm text-info">
                                                                <div class="text-left">
                                                                    <div class="h3">12</div>
                                                                    <div class="text-muted text-xs">Active Members</div>
                                                                </div>
                                                            </div>
                                                        </div> -->
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                        <!-- <div ui-refresh="showSpline" style="height:240px" class="chart" data-highcharts-chart="0">
                                            <div id="high-container" class="highcharts-container " style="position: relative; overflow: hidden; width: 535px; height: 235px; text-align: left; line-height: normal; z-index: 0; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);">
                                                
                                            </div>
                                        </div> -->
                                    </div>

                                </div>
                                <!-- /.block -->
                            </div>
                        </div>
                    </div>
                    <!-- / stats -->

                    <!-- grid block -->
                    <div class="row row-flex">
                        <div class="col-md-6 m-b-md">
                            <div class="region region-grid-block-left">
                                <div id="block-afl-widgets-afl-block-expenditures" class="block block-afl-widgets contextual-links-region clearfix">

                                    <div class="panel wrapper">
                                        <h4 class="m-t-none m-b text-primary-lt font-thin-bold inline font-semi-bold">Commissions &amp; Withdrawals</h4>
                                        <div class="nav-tabs-alt hidden-xs">
                                            <ul class="nav nav-tabs nav-justified">
                                                <li class="active">
                                                    <a data-target="#tab-earnings" role="tab" data-toggle="tab" aria-expanded="true">Earnings</a>
                                                </li>
                                                <li class="">
                                                    <a data-target="#tab-expenditures" role="tab" data-toggle="tab" aria-expanded="false">Expenses</a>
                                                </li>
                                                <li class="">
                                                    <a data-target="#tab-withdrawal-request" role="tab" data-toggle="tab" aria-expanded="false">Withdrawal Requests</a>
                                                </li>
                                            </ul>
                                        </div>

                                        <!-- Will visible on Xs -->
                                        <div class="text-right inline pull-right">
                                            <div class="dropdown  visible-xs">
                                                <a class="btn btn-default dropdown-toggle" data-toggle="dropdown"><i class="fa fa-ellipsis-v" aria-hidden="true"></i>
    </a>
                                                <ul class="dropdown-menu nav flex-column pull-right">
                                                    <li class="earnings-and-expenditures-navitem active">
                                                        <a data-target="#tab-earnings" role="tab" data-toggle="tab" aria-expanded="true">Earnings</a>
                                                    </li>
                                                    <li class="earnings-and-expenditures-navitem">
                                                        <a data-target="#tab-expenditures" role="tab" data-toggle="tab" aria-expanded="false">Expenses</a>
                                                    </li>
                                                    <li class="earnings-and-expenditures-navitem">
                                                        <a data-target="#tab-withdrawal-request" role="tab" data-toggle="tab" aria-expanded="false">Withdrawal Requests</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>

                                        <div class="row-row">
                                            <div class="cell">
                                                <div class="cell-inner">
                                                    <div class="tab-content">

                                                        <!-- TAB EARNINGS -->
                                                        <div class="tab-pane active" id="tab-earnings">
                                                            <div class="m-t">
                                                                <div class="panel no-border">
                                                                    <ul class="list-group list-group-lg m-b-none">
                                                                        <li class="list-group-item">
                                                                            <div class="row">
                                                                                <div class="col-sm-3 col-xs-6 text-left wrapper-xs hidden-xs">
                                                                                    <button class="btn btn-md 
                                                                                        btn-icon 
                                                                                        btn-warning">
                                                                                        <span class="text-bold text-md">SC</span>
                                                                                    </button>
                                                                                </div>
                                                                                <div class="col-sm-3 col-xs-12 text-left wrapper-xs">
                                                                                    <span class="">SPONSOR COMMISSION</span>
                                                                                </div>
                                                                                <div class="col-sm-3 col-xs-6 text-left wrapper-xs">
                                                                                    <span class="text-md text-black">
                                                                                        ${{$sponsor_query}}
                                                                                    </span>
                                                                                </div>
                                                                                <!-- <div class="col-sm-3 col-xs-6 text-right wrapper-xs">
                                                                                    <a href="/afl/income-history?category=SPONSOR%20COMMISSION" class="btn btn-sm btn-info">View More</a>
                                                                                </div> -->
                                                                            </div>
                                                                        </li>
                                                                        <li class="list-group-item">
                                                                            <div class="row">
                                                                                <div class="col-sm-3 col-xs-6 text-left wrapper-xs hidden-xs">
                                                                                    <button class="btn btn-md 
                                                                                        btn-icon 
                                                                                        btn-danger">
                                                                                        <span class="text-bold text-md">LE</span>
                                                                                    </button>
                                                                                </div>
                                                                                <div class="col-sm-3 col-xs-12 text-left wrapper-xs">
                                                                                    <span class="">LEVEL COMMISSION</span>
                                                                                </div>
                                                                                <div class="col-sm-3 col-xs-6 text-left wrapper-xs">
                                                                                    <span class="text-md text-black">
                                                                                        ${{$level_query}}
                                                                                    </span>
                                                                                </div>
                                                                                <!-- <div class="col-sm-3 col-xs-6 text-right wrapper-xs">
                                                                                    <a href="/afl/income-history?category=SPONSOR%20COMMISSION" class="btn btn-sm btn-info">View More</a>
                                                                                </div> -->
                                                                            </div>
                                                                        </li>
                                                                        <li class="list-group-item">
                                                                            <div class="row">
                                                                                <div class="col-sm-3 col-xs-6 text-left wrapper-xs hidden-xs">
                                                                                    <button class="btn btn-md 
                                                                                        btn-icon 
                                                                                        btn-success">
                                                                                        <span class="text-bold text-md">MB</span>
                                                                                    </button>
                                                                                </div>
                                                                                <div class="col-sm-3 col-xs-12 text-left wrapper-xs">
                                                                                    <span class="">Matching Bonus</span>
                                                                                </div>
                                                                                <div class="col-sm-3 col-xs-6 text-left wrapper-xs">
                                                                                    <span class="text-md text-black">
                                                                                        {{$matching_bonus}}
                                                                                    </span>
                                                                                </div>
                                                                                <!-- <div class="col-sm-3 col-xs-6 text-right wrapper-xs">
                                                                                    <a href="/afl/income-history?category=SPONSOR%20COMMISSION" class="btn btn-sm btn-info">View More</a>
                                                                                </div> -->
                                                                            </div>
                                                                        </li>

                                                                    </ul>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-12">
                                                                <!-- <div class="text-md wrapper-md pull-right">View details</div> -->
                                                            </div>

                                                        </div>
                                                        <!-- TAB EXPENDITURES -->
                                                        <div class="tab-pane" id="tab-expenditures">
                                                            <div class="m-t">
                                                                <div class="panel no-border">
                                                                    <ul class="list-group list-group-lg m-b-none">
                                                                        @if(!empty(count($expenses) > 0))
                                                                        @foreach($expenses as $row)
                                                                        <li class="list-group-item">
                                                                            <div class="row">
                                                                                <!-- <div class="col-sm-3 col-xs-6 wrapper-xs text-left hidden-xs">
                                                                                    <button class="btn 
                                                                                     btn-md 
                                                                                     btn-icon 
                                                                                     btn-primary">
                                                                                        <span class="text-bold text-md">EP</span>
                                                                                    </button>
                                                                                </div> -->
                                                                                <div class="col-sm-3 col-xs-12 wrapper-xs text-left">
                                                                                    <span>{{$row->category_name}}</span>
                                                                                </div>
                                                                                <div class="col-sm-3 col-xs-6 wrapper-xs text-left">
                                                                                    <span class="text-md text-black">
                                                                                        ${{number_format($row->balance,2)}}
                                                                                    </span>
                                                                                </div>
                                                                                <!-- <div class="col-sm-3 col-xs-6 wrapper-xs text-right">
                                                                                    <a href="/afl/expenses-history?category=E-WALLET%20PURCHASE" class="btn btn-sm btn-info">View More</a>
                                                                                </div> -->
                                                                            </div>
                                                                        </li>
                                                                        @endforeach
                                                                        @else
                                                                        <div class="panel">
                                                                            <div class="panel-body">
                                                                                No Expenses found
                                                                            </div>
                                                                        </div>
                                                                        @endif
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <!-- <div class="text-md wrapper-md pull-right">View details</div> -->
                                                            </div>

                                                        </div>

                                                        <!-- TAB WITHDRAWAL REQUESTS -->
                                                        <div class="tab-pane" id="tab-withdrawal-request">
                                                            <div class="m-t">
                                                                <div class="panel no-border">
                                                                    <ul class="list-group list-group-lg m-b-none">
                                                                        @if(!empty(count($withdraw_requests) > 0))
                                                                        @foreach($withdraw_requests as $row)
                                                                        <li class="list-group-item">
                                                                            <div class="row">
                                                                                <!-- <div class="col-sm-3 col-xs-6 wrapper-xs text-left hidden-xs">
                                                                                    <button class="btn 
                                                                                     btn-md 
                                                                                     btn-icon 
                                                                                     btn-primary">
                                                                                        <span class="text-bold text-md">EP</span>
                                                                                    </button>
                                                                                </div> -->
                                                                                <div class="col-sm-3 col-xs-12 wrapper-xs text-left">
                                                                                    <span>{{$row->notes}}</span>
                                                                                </div>
                                                                                <div class="col-sm-3 col-xs-6 wrapper-xs text-left">
                                                                                    <span class="text-md text-black">
                                                                                        ${{number_format($row->requested_amount,2)}}
                                                                                    </span>
                                                                                </div>
                                                                                <div class="col-sm-3 col-xs-6 wrapper-xs text-right">
                                                                                    <a class="btn btn-sm btn-light">{{\Carbon\Carbon::parse($row->created_date_time)->diffForHumans()}}</a>
                                                                                </div>
                                                                            </div>
                                                                        </li>
                                                                        @endforeach
                                                                        @else
                                                                        <div class="panel">
                                                                            <div class="panel-body">
                                                                                No Request found
                                                                            </div>
                                                                        </div>
                                                                        @endif
                                                                    </ul>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-12">
                                                                <!-- <div class="text-md wrapper-md pull-right">View details</div> -->
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <script type="text/javascript">
                                        if (jQuery('.earnings-and-expenditures-navitem').length) {
                                            jQuery('.earnings-and-expenditures-navitem').click(function() {
                                                jQuery('.earnings-and-expenditures-navitem').removeClass('active');
                                            });
                                        }
                                    </script>

                                </div>
                                <!-- /.block -->
                            </div>
                        </div>

                        <div class="col-md-6 m-b-md">
                            <div class="region region-grid-block-right">
                                <div id="block-afl-widgets-afl-block-my-organisations" class="block block-afl-widgets contextual-links-region clearfix">

                                    <div class="panel wrapper">
                                        <h4 class="m-t-none m-b text-primary-lt font-thin-bold inline font-semi-bold">Team Performance</h4>
                                        <div class="nav-tabs-alt  hidden-xs">
                                            <ul class="nav nav-tabs nav-justified">
                                                <li class="active my-organisation-tabitem">
                                                    <a data-target="#tab-top-earners" role="tab" data-toggle="tab" aria-expanded="true">Top Earners</a>
                                                </li>
                                                <li class="my-organisation-tabitem">
                                                    <a data-target="#tab-rankOverview" role="tab" data-toggle="tab" aria-expanded="false">Rank Overview</a>
                                                </li>
                                                <li class="my-organisation-tabitem">
                                                    <a data-target="#tab-packageOveview" role="tab" data-toggle="tab" aria-expanded="false">Package Overview</a>
                                                </li>
                                                <li class="my-organisation-tabitem">
                                                    <a data-target="#tab-recentJoinings" role="tab" data-toggle="tab" aria-expanded="false">Joinings</a>
                                                </li>
                                            </ul>
                                        </div>

                                        <!-- Will visible on Xs -->
                                        <div class="text-right inline pull-right">
                                            <div class="dropdown  visible-xs">
                                                <a class="btn btn-default dropdown-toggle" data-toggle="dropdown"><i class="fa fa-ellipsis-v" aria-hidden="true"></i>
    </a>
                                                <ul class="dropdown-menu nav flex-column pull-right">
                                                    <li class="my-organisation-tabitem nav-item active">
                                                        <a data-target="#tab-top-earners" role="tab" data-toggle="tab" aria-expanded="true">Top Earners</a>
                                                    </li>
                                                    <li class="my-organisation-tabitem nav-item">
                                                        <a data-target="#tab-rankOverview" role="tab" data-toggle="tab" aria-expanded="false">Rank Overview</a>
                                                    </li>
                                                    <li class="my-organisation-tabitem">
                                                        <a data-target="#tab-packageOveview" role="tab" data-toggle="tab" aria-expanded="false">Package Overview</a>
                                                    </li>
                                                    <li class="my-organisation-tabitem">
                                                        <a data-target="#tab-recentJoinings" role="tab" data-toggle="tab" aria-expanded="false">Joinings</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>

                                        <div class="row-row">

                                            <div class="tab-content">

                                                <!-- TAB EARNINGS -->
                                                <div class="tab-pane active" id="tab-top-earners">
                                                    <div class="m-t">
                                                        <ul class="list-group list-group-xs m-b-none">
                                                            @if(!empty($top_earners))
                                                            @foreach($top_earners as $row)
                                                            <li class="list-group-item b m-b-sm">
                                                                <div class="thumb pull-left m-r">
                                                                    <img class="img-circle img-responsive" src="{{asset('public/assets/images/users/profiles')}}/{{$row['image']}}" width="104" height="104" alt=""> </div>
                                                                <div class="clear ">
                                                                    <div class="m-b-xs">
                                                                        <span class="text-black">
                                                                            {{$row['name']}}
                                                                        </span>
                                                                    </div>
                                                                    <div class="">
                                                                        <span class="text-muted">${{number_format($row['earnings'],2)}}</span> </div>

                                                                </div>
                                                            </li>
                                                            @endforeach
                                                            @else
                                                            <div class="panel">
                                                                <div class="panel-body">
                                                                    No Top Earners found
                                                                </div>
                                                            </div>
                                                            @endif
                                                        </ul>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <!-- <div class="text-md wrapper-md pull-right">View details</div> -->
                                                    </div>

                                                </div>

                                                <!-- TAB RANK OVERVIEW -->
                                                <div class="tab-pane" id="tab-rankOverview">
                                                    <div class="m-t">
                                                        <ul class="list-group list-group-xs m-b-none">
                                                            @if(!empty($rank_overview))
                                                            @foreach($rank_overview as $row)
                                                            <li class="list-group-item b b-md m-b-sm clearfix">
                                                               <!--  <div class="thumb m-r pull-left">
                                                                    <img class="img-circle" id="my-img" src="https://binary.epixelmlmsoftware.com/sites/binary/files/rank_images/rank-2.png" alt="Rank - 2" title="Rank - 2"> </div> -->
                                                                <span class="pull-right label text-base font-normal bg-primary inline m-t">{{$row['total_users']}}</span>
                                                                <div class="clear ">
                                                                    <div class="m-b-xs"><span>{{$row['rank_name']}}</span></div>
                                                                    <div class=""><span class="text-muted">You have {{$row['total_users']}} {{$row['rank_name']}} in your team.</span></div>
                                                                </div>
                                                            </li>
                                                            @endforeach
                                                            @endif
                                                        </ul>
                                                        <div class="col-md-12">
                                                            <!-- <div class="text-md wrapper-md pull-right">View details</div> -->
                                                        </div>
                                                    </div>

                                                </div>

                                                <!-- TAB WITHDRAWAL REQUESTS -->
                                                <div class="tab-pane" id="tab-packageOveview">
                                                    <div class="m-t">
                                                        <ul class="list-group list-group-xs m-b-none">
                                                            @if(!empty($packages_overview))
                                                            @foreach($packages_overview as $row)
                                                            <li class="list-group-item b b-md m-b-sm clearfix">
                                                                <div class="thumb m-r pull-left">
                                                                    <!-- <img class="img-circle" id="my-img" src="https://binary.epixelmlmsoftware.com/sites/binary/files/package-images/package-30.png" alt="Package - 30" title="Package - 30"> --> </div>
                                                                <span class="pull-right label text-base font-normal bg-dark text-white inline m-t">{{$row['total_users']}} Members</span>
                                                                <span>
                                                                </span>

                                                                <div class="clear ">
                                                                    <div class="m-b-xs"><span>{{$row['package_name']}}</span></div>
                                                                    <div class=""><span class="text-muted">You have {{$row['total_users']}} {{$row['package_name']}} package purchases in your team.</span></div>
                                                                </div>

                                                            </li>
                                                            @endforeach
                                                            @endif
                                                        </ul>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <!-- <div class="text-md wrapper-md pull-right">View details</div> -->
                                                    </div>

                                                </div>

                                                <!-- TAB RECENT JOININGS -->
                                                <div class="tab-pane" id="tab-recentJoinings">
                                                    <div class="m-t">
                                                        <ul class="list-group list-group-xs m-b-none">
                                                            @if(!empty($new_joinings))
                                                            @foreach($new_joinings as $row)
                                                            <li class="list-group-item b b-md m-b-sm clearfix">
                                                                <div class="col-md-9 col-sm-9 col-xs-9">
                                                                    <div class="thumb pull-left m-r">
                                                                        <img class="img-circle img-responsive" src="{{asset('public/assets/images/users/profiles')}}/{{$row->image}}" width="104" height="104" alt=""> </div>
                                                                    <div class="clear ">
                                                                        <div class="m-b-xs">
                                                                            <span class="text-black">
                                                                                {{$row->first_name}} {{$row->sur_name}} 
                                                                            </span>
                                                                        </div>
                                                                        <div class="">
                                                                            <span class="text-muted">{{date('Y,M-d h:i:s a',strtotime($row->created_date_time))}}</span> </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3 col-sm-3 col-xs-3">
                                                                    <div class="pull-right">
                                                                        <!-- <span class="label text-base font-normal bg-info inline m-t text-white"> Free</span> -->
                                                                        <div class="thumb m-r pull-right"><img class="img-circle" id="my-img" src="https://binary.epixelmlmsoftware.com/sites/binary/files/package_images/package-42.png" alt="Package - 42" title="Package - 42"> </div>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            @endforeach
                                                            @else

                                                            @endif
                                                        </ul>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <!-- <div class="text-md wrapper-md pull-right">View details</div> -->
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <script type="text/javascript">
                                        if (jQuery('.my-organisation-tabitem').length) {
                                            jQuery('.my-organisation-tabitem').click(function() {
                                                jQuery('.my-organisation-tabitem').removeClass('active');
                                            });
                                        }
                                    </script>

                                </div>
                                <!-- /.block -->
                            </div>
                        </div>
                    </div>
                    <!-- / grid block -->

                    <!-- grid block -->
                   

                        
                    </div>
                    <!-- / grid block -->
                </div>
                <!-- / main content -->
            </div>

        </div>
    </div>

</div>
@include("admin.layouts.footer")