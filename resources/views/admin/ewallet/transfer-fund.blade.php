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
                            <h1 class="m-n h3">Transfer fund to others</h1>
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

                                    <form action="{{route('confirm_transfer_fund')}}" method="post" id="create-ewallet-transfer" accept-charset="UTF-8" siq_id="autopick_3615">
                                        @csrf
                                        <div class="from-panel">
                                            <div class="form-item clearfix form-type-textfield form-item-transfer-amount form-group">
                                                <label for="edit-transfer-amount">Amount to be transferred to others e-wallet <span class="form-required" title="This field is required.">*</span></label>
                                                <div class="input-group m-b"><span class="input-group-addon">$</span>
                                                    <input groupfields="$" type="text" id="edit-transfer-amount" name="transfer_amount" value="{{old('transfer_amount')}}"  @if ($errors->has('transfer_amount')) autofocus @endif size="60" maxlength="128" class="form-text form-control input-lg-3 required">
                                                </div>
                                            </div>
                                            <div class="form-item form-autocomplete clearfix form-type-entityreference form-item-transferee form-group" role="application">
                                                <label for="edit-transferee">Transferee (Please select the transferee username) <span class="form-required" title="This field is required.">*</span></label>
                                                <select id="edit-field-users-und" name="transferee" @if ($errors->has('transferee')) autofocus @endif class="form-select form-control"></select>
                                                </div>
                                            <div class="transaction-password">
                                                <div class="form-item clearfix form-type-password form-item-password form-group">
                                                    <label for="edit-password">Transaction Password <span class="form-required" title="This field is required.">*</span></label>
                                                    <input type="password" id="edit-password" name="password" size="10" @if ($errors->has('password')) autofocus @endif  maxlength="128" class="form-text form-control required">
                                                </div>
                                                <!--<div class="fund-transaction-password"><a href="#" class="text-primary btn btn-danger">Forget Password</a></div>-->
                                            </div>
                                            <table class="sticky-header" style="position: fixed; top: 0px; left: 266px; visibility: hidden;">
                                                <thead style="">
                                                    <tr>
                                                        <th>E-wallet Particulars</th>
                                                        <th>Amount</th>
                                                    </tr>
                                                </thead>
                                            </table>
                                            <table class="table sticky-enabled tableheader-processed sticky-table">
                                                <thead>
                                                    <tr>
                                                        <th>E-wallet Particulars</th>
                                                        <th>Amount</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <!-- <tr class="odd">
                                                        <td>E-wallet amount already in
                                                            <br>payout process</td>
                                                        <td>958.15 USD</td>
                                                    </tr> -->
                                                    <tr class="even">
                                                        <td>E-Wallet Balance Available for Transfer</td>
                                                        <td>{{$data}} USD</td>
                                                    </tr>
                                                    <!-- <tr class="odd">
                                                        <td>Transfer Charges</td>
                                                        <td>2%</td>
                                                    </tr> -->
                                                    <tr class="even">
                                                        <td>Minimum Amount to Initiate Transfer</td>
                                                        <td>$25.00</td>
                                                    </tr>
                                                    <!-- <tr class="active even">
                                                        <td>Amount Available For Transfering</td>
                                                        <td>2,444.46 USD</td>
                                                    </tr> -->
                                                </tbody>
                                            </table>
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