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
                            <h1 class="m-n h3">Upgrade Package</h1>
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
                                    @if(!empty($count > 0))
                                    @foreach($packages as $row)
                                    <form method="post" action="{{route('upgrade_user_package',$user_id)}}">
                                        @csrf
                                        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                                            <div class="panel price panel-red box-shadow br-radius-10">
                                                <input type="hidden" name="package_id" value="{{$row->package_id}}">
                                                <div class="panel-heading text-center text-uppercase">
                                                    <h2>{{$row->package}}</h2></div>
                                                <div class="panel-body text-center"><img src="" width="100%"  />
                                                    <ul class="list-group list-group-flush text-center">
                                                        <li class="list-group-item h4 no-bg"><strong> {{$row->fees}}</strong></li>
                                                    </ul>
                                                </div>
                                                <div class="panel-footer"><button type="submit" class="btn btn-lg btn-block btn-info">UPGRADE</button></div>
                                            </div>
                                        </div>
                                    </form>
                                    @endforeach
                                    @else
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="region region-content">
                                                <div id="block-system-main" class="block block-system clearfix">

                                                    <div class="panel panel-primary">
                                                        <div class="panel-body"> There is no packages available for update.</div>
                                                    </div>
                                                </div>
                                                <!-- /.block -->
                                            </div>
                                        </div>
                                    </div>
                                    @endif
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