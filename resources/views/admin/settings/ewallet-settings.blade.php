@include("admin.layouts.header")
@include("admin.layouts.aside")
<div id="content" class="app-content" role="main">
    <div class="app-content-body ">
        <div class="hbox hbox-auto-xs hbox-auto-sm">

            <div class="col">
                <!-- main header -->
                <div class="bg-light lter b-b wrapper-md">
                    <div class="row">
                        <div class="col-sm-12 col-xs-12">
                            <h1 class="m-n h3">Ewallet Settings</h1>
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
                            @include('admin.layouts.packages-compensation-nav')
                            <div class="region region-content">
                                <div id="block-system-main" class="block block-system clearfix">
                                    <form action="{{route('ewallet_settings_update')}}" method="post" id="afl-payout-settings" accept-charset="UTF-8" siq_id="autopick_1131">
                                        <div class="from-panel">
                                            @csrf
                                            <div id="checkboxes-div">
                                                <fieldset class="form-wrapper" id="edit-ewallet-transfer">
                                                    <legend><span class="fieldset-legend">E-wallet Withdrawal Settings</span></legend>
                                                    <div class="fieldset-wrapper">
                                                        <div class="form-item clearfix form-type-textfield form-item-etransfer-min-value form-group" data-toggle="tooltip" title="" data-original-title="Please give only numeric value">
                                                            <label for="edit-etransfer-min-value">Minimum amount for withdrawal <span class="form-required" title="This field is required.">*</span></label>
                                                            <div class="input-group m-b"><span class="input-group-addon">$</span>
                                                                <input groupfields="$" type="text" id="edit-etransfer-min-value" name="minimum_amount" value="@if(!empty($ewallet_settings->minimum_amount)) {{$ewallet_settings->minimum_amount}} @else 0 @endif" @if ($errors->has('minimum_amount')) autofocus @endif size="60" maxlength="128" class="form-text form-control input-lg-3 required">
                                                            </div>
                                                        </div>
                                                        <div class="form-item clearfix form-type-textfield form-item-etransfer-charges form-group" data-toggle="tooltip" title="" data-original-title="Please give only numeric value">
                                                            <label for="edit-etransfer-charges">E-wallet Withdraw charges <span class="form-required" title="This field is required.">*</span></label>
                                                            <div class="input-group m-b"><span class="input-group-addon">%</span>
                                                                <input class="percentage-n-amount form-text form-control input-lg-3 required" type="text" id="edit-etransfer-charges" name="processing_tax" value="@if(!empty($ewallet_settings->processing_tax)) {{$ewallet_settings->processing_tax}} @else 0 @endif" @if ($errors->has('processing_tax')) autofocus @endif size="60" maxlength="128">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </fieldset>
                                            </div>
                                            <hr style="border:2px solid #7266ba; color:#7266ba; margin:60px 0px 60px 0px">
                                            <input type="submit" id="edit-submit" name="op" value="Save Configurations" class="form-submit btn btn-default btn-primary">
                                            
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