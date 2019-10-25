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
                            <h1 class="m-n h3">System Configurations</h1>
                        </div>
                        <!-- sreeram -->

                    </div>
                </div>
                <!-- / main header -->

                <!-- main content -->
                <div class="wrapper-md ">
                    <!--Dashboard-thankyou-section-open -->

                    <!--Dashboard-thankyou-section-close -->

                    <!-- content -->
                    <div class="row">
                        <div class="col-md-12">
                             @include('admin.layouts.packages-compensation-nav')
                            <div class="region region-content">
                                <div id="block-system-main" class="block block-system clearfix">

                                    <form action="#" method="post" id="afl-compensation-types" accept-charset="UTF-8">
                                        <div class="from-panel">
                                            <table class="sticky-header" style="position: fixed; top: 0px; left: 266px; visibility: hidden;">
                                                <thead style="">
                                                    <tr>
                                                        <th>Type of Compensations</th>
                                                        <th>Status</th>
                                                        <th>Configuration</th>
                                                    </tr>
                                                </thead>
                                            </table>
                                            <table class="table sticky-enabled tableheader-processed sticky-table">
                                                <thead>
                                                    <tr>
                                                        <th>Type of Compensations</th>
                                                        <th>Status</th>
                                                        <th>Configuration</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @if($total_records > 0)
                                                    @foreach($query as $row)
                                                        <tr class="odd">
                                                            <td>{{$row->name}}</td>
                                                            <td>
                                                                <div class="form-item clearfix form-type-checkbox form-item-rows-1-c2-afl-plan-binary-sponsor-bonus">
                                                                    <form method="post">
                                                                        @csrf
                                                                        <label class="i-switch m-t-xs m-r">
                                                                            <input type="hidden" name="status" class="ajax_status" value="1" data-category_id="{{$row->id}}">
                                                                            <input switch="switch" type="checkbox" class="ajax_status" data-category_id="{{$row->id}}" name="status" value="0" @if($row->status == 0) checked="checked" @else @endif class="form-checkbox checkbox">
                                                                            <i></i>
                                                                        </label>
                                                                    </form>
                                                                </div>
                                                            </td>
                                                            <td><a href="{{route('binary_package_bonus_config',$row->slug)}}"><span class="btn btn-rounded btn-sm btn-icon btn-default"><i class="fa fa-cog"></i></span></a></td>
                                                        </tr>
                                                    @endforeach
                                                    @endif
                                                </tbody>
                                            </table>
                                        </div>
                                    </form>
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
@include("admin.layouts.footer")