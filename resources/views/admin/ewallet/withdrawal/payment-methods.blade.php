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
                            <h1 class="m-n h3">Payout Preference</h1>
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
                    @if($total_records > 0)
                    <div class="row">
                        <div class="col-md-12">
                            <div class="tab-container">
                                <h2 class="hide">Primary tabs</h2>
                                <ul class="tabs--primary nav nav-tabs">
                                    <li class="active"><a href="/afl/payment-methods" class="active">Select Payment method<span class="element-invisible">(active tab)</span></a></li>
                                </ul>
                            </div>
                            <div class="region region-content">
                                <div id="block-system-main" class="block block-system clearfix">

                                    <form action="#" method="post" id="select-payment-methods" accept-charset="UTF-8" siq_id="autopick_3214">
                                        @csrf
                                        <div class="from-panel">
                                            <table class="sticky-header" style="position: fixed; top: 0px; left: 266px; visibility: hidden;">
                                                <thead style="">
                                                    <tr>
                                                        <th>Payment Methods</th>
                                                        <th>Status</th>
                                                        <th>Configuration</th>
                                                    </tr>
                                                </thead>
                                            </table>
                                            <table class="table sticky-enabled tableheader-processed sticky-table">
                                                <thead>
                                                    <tr>
                                                        <th>Payment Methods</th>
                                                        <!-- <th>Status</th> -->
                                                        <th>Configuration</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($payment_methods as $row)
                                                    <tr class="odd">
                                                        <td>{{$row->name}}</td>
                                                        <!-- <td>
                                                            <div class="form-item clearfix form-type-checkbox form-item-rows-0-c2-method-bitcoin">
                                                                <label class="i-switch m-t-xs m-r">
                                                                    <input type="hidden" name="payment_method_id" value="{{$row->id}}">
                                                                    <input type="hidden" name="status" value="1">
                                                                    <input switch="switch" class="single-switch-checkbox form-checkbox checkbox" type="checkbox" id="edit-rows-0-c2-method-bitcoin" name="status" value="0" @if($row->status == 0) checked="checked" @else  @endif >
                                                                    <i></i>
                                                                </label>
                                                            </div>
                                                        </td> -->
                                                        <td><a href="{{route('payment_ewallet_address',$row->slug)}}"><span class="btn btn-rounded btn-sm btn-icon btn-default"><i class="fa fa-cog"></i></span></a></td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table><!-- 
                                            <input type="submit" id="edit-submit" name="op" value="Save Payment methods" class="form-submit btn btn-default btn-primary"> -->
                                        </div>
                                    </form>
                                </div>
                                <!-- /.block -->
                            </div>
                        </div>
                    </div>
                    @else
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <h5 class="text-center">No Payment Methods Available</h5>
                            </div>
                        </div>
                    </div>
                    @endif
                    <!-- / content -->
                </div>
                <!-- / main content -->
            </div>

        </div>
    </div>

</div>
@include('admin.layouts.footer')