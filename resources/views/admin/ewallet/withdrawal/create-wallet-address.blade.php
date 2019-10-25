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
                            <h1 class="m-n h3">Create Wallet Address</h1>
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
                            <div class="region region-content-top">
                                <div id="block-block-13" class="block block-block contextual-links-region clearfix">

                                    <!--<div style="margin-bottom:10px;" class="row text-right clear">-->
                                    <!--    <span class="label text-base bg-primary pos-rlt m-r text-righ">-->
                                    <!--        <a href="#">&lt;&lt;&lt; Payment Preferences</a></span>-->
                                    <!--</div>-->
                                </div>
                                <!-- /.block -->
                            </div>
                            <div class="tab-container">
                                <h2 class="hide">Primary tabs</h2>
                                <ul class="tabs--primary nav nav-tabs">
                                    <li><a href="#">Create Wallet Address</a></li>
                                </ul>
                            </div>
                            <div class="region region-content">
                                <div id="block-system-main" class="block block-system clearfix">

                                    <form action="{{route('create_ewallet_address',$payment_methods->slug)}}" method="post" id="payment-method-bitcoin-conf" accept-charset="UTF-8" siq_id="autopick_1848">
                                        @csrf
                                        <div class="from-panel">
                                            <div class="form-item clearfix form-type-textfield form-item-wallet-address form-group">
                                                <label for="edit-wallet-address">Wallet Address <span class="form-required" title="This field is required.">*</span></label>
                                                <input type="text" id="edit-wallet-address" name="wallet_address" @if(!empty($wallet_address)) value="{{$wallet_address->wallet_address}}" @else value = "" @endif size="60"  @if ($errors->has('wallet_address')) autofocus @endif maxlength="128" {{old('wallet_address')}} class="form-text form-control input-lg-3 required">
                                            </div>
                                            <div class="form-item clearfix form-type-password form-item-authorization-password form-group">
                                                <label for="edit-authorization-password">Transaction password <span class="form-required" title="This field is required.">*</span></label>
                                                <input type="password" id="edit-authorization-password" name="authorization_password" @if ($errors->has('authorization_password')) autofocus @endif  size="60" maxlength="128" class="form-text form-control required">
                                            </div>
                                            @if(!empty($active_payout))
                                            <div class="panel panel-danger">
                                                <div class="panel-body text-danger">
                                                    <strong>You have an active withdrawal request in process.Cannot change the wallet addess.</strong>
                                                </div>
                                            </div>
                                            @else
                                            <input type="submit" id="edit-submit" name="op" value="Create Wallet Address" class="form-submit btn btn-default btn-primary">
                                            @endif
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
@include('admin.layouts.footer')