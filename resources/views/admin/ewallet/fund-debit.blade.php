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
                            <h1 class="m-n h3">Debit Fund</h1>
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
                            <div class="region region-content">
                                <div id="block-system-main" class="block block-system clearfix">

                                    <form action="{{route('do_debit_fund')}}" method="post" id="create-ewallet-transfer" accept-charset="UTF-8" siq_id="autopick_3615">
                                        @csrf
                                        <div class="from-panel">
                                            <div class="form-item clearfix form-type-textfield form-item-transfer-amount form-group">
                                                <label for="edit-transfer-amount">Amount to be debit to your e-wallet <span class="form-required" title="This field is required.">*</span></label>
                                                <div class="input-group m-b"><span class="input-group-addon">$</span>
                                                    <input groupfields="$" type="text" id="edit-transfer-amount" name="debited_amount" value="{{old('debited_amount')}}"  @if ($errors->has('debited_amount')) autofocus @endif size="60" maxlength="128" class="form-text form-control input-lg-3 required">
                                                </div>
                                            </div>
                                            <input type="submit" id="edit-submit" name="op" value="Transfer Fund" class="form-submit btn btn-default btn-primary">
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