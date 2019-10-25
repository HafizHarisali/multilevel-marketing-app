@include('admin.layouts.header')
@include('admin.layouts.aside')
<div id="content" class="app-content" role="main">
    <div class="app-content-body ">
        <div class="hbox hbox-auto-xs hbox-auto-sm">

            <div class="col">
                <!-- main header -->
                <div class="bg-white b-b wrapper-md">
                    <div class="row">
                        <div class="col-sm-12 col-xs-12">
                            <h1 class="m-n h3">Notification</h1>
                            <small class="text-muted"></small>
                        </div>
                        <!-- sreeram -->

                    </div>
                </div>
                <!-- / main header -->

                <!-- main content -->
                <div class="wrapper-md ">
                    <!--Dashboard-thankyou-section-open -->

                    <!--Dashboard-thankyou-section-close -->
                    <!-- / stats -->

                    <!-- content -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="region region-content">
                                <div id="block-system-main" class="block block-system clearfix">

                                    <div class="eps-view view view-afl-notifications view-id-afl_notifications view-display-id-page view-dom-id-8baf442c096e2cf0951bf84f1d14011c">
                                         @if($total_records > 0)
                                        <div class="panel panel-default panel-view">
                                            <div class="view-content">
                                                <div class="vbo-views-form">
                                                    <div>
                                                        <div class="panel panel-default">
                                                            <div class="panel-body">
                                                                <ul class="list-group list-group-lg m-b-none">  
                                                                    @foreach($notifications as $row)
                                                                    <?php $ago = Carbon\Carbon::parse($row->created_date_time)->diffForHumans();?>
                                                                    <li class="views-row views-row-1 views-row-odd views-row-first list-group-item">
                                                                        <div class="pull-left pull-left-btn">
                                                                            <a href="#" class="thumb avatar m-r"><img src="{{asset('public/assets/images/users/profiles/')}}/{{$row->image}}" alt=""></a>
                                                                        </div>
                                                                        <div class="views-field views-field-php">
                                                                            <span class="field-content">
                                                                                @if($row->is_seen == 'yes')
                                                                                <div class="clear msg-1 ">
                                                                        			<div>{{$row->title}}</div>
                                                                        			<div>{{$row->message}}</div>
                                                                        			<small class="text-muted"><?php echo $ago; ?></small>
                                            		                            </div>
                                                                                @else
                                                                                <div class="clear msg-0 font-bold ">
                                                                                    <div>{{$row->title}}</div>
                                                                                    <div>{{$row->message}}</div>
                                                                                    <small class="text-muted"><?php echo $ago; ?></small>
                                                                                </div>
                                                                                @endif
                                                                            </span>
                                                                        </div>
                                                                    </li>
                                                                    @endforeach
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="text-center">{{$notifications->links()}}</div>
                                        </div>
                                         @else
                                         <div class="panel panel-default panel-view">
                                             <h5 class="text-center">You have no notifications</h5>
                                         </div>
                                         @endif
                                    </div>
                                </div>
                                <!-- /.block -->
                            </div>
                        </div>
                    </div>
                    <!-- / content -->
                </div>
                <!-- / main content -->
            </div>

        </div>
    </div>

</div>
@include('admin.layouts.footer')