@include('admin.layouts.header')
@include('admin.layouts.aside')
<div id="content" class="app-content" role="main">
    <div class="app-content-body ">
        <div class="hbox hbox-auto-xs hbox-auto-sm">

            <div class="col">
                <!-- main header -->
                <div class="bg-light lter b-b wrapper-md">
                    <div class="row">
                        <div class="col-sm-12 col-xs-12">
                            <h1 class="m-n h3">Network Explorer</h1>
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
                            <div class="tab-container">
                                <h2 class="hide">Primary tabs</h2>
                                <ul class="tabs--primary nav nav-tabs">
                                    <li><a href="{{route('network_explorer')}}">Network Explorer</a></li>
                                    <li><a href="{{route('network_explorer_left')}}">Left Team</a></li>
                                    <li><a href="{{route('network_explorer_right')}}">Right team</a></li>
                                </ul>
                            </div>
                            <div class="region region-content">
                                <div id="block-system-main" class="block block-system clearfix">
                                    <div class="panel panel-default">
                                        <div class="panel-body">
                                            <div id="tree1"></div>
                                        </div>
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