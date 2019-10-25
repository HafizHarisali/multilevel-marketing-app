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
                            <h1 class="m-n h3">Withdraw fund from E-Wallet</h1>
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

                                    <form action="{{route('do_withdraw_fund')}}" method="post" id="create-withdrawal-request" accept-charset="UTF-8" siq_id="autopick_6838">
                                        @csrf
                                        <div class="from-panel">
                                            <div class="form-item clearfix form-type-textfield form-item-withdrwal-amount form-group">
                                                <label for="edit-withdrwal-amount">Amount to be withdraw <span class="form-required" title="This field is required.">*</span></label>
                                                <div class="input-group m-b"><span class="input-group-addon">$</span>
                                                    <input groupfields="$" type="text" id="edit-withdrwal-amount" name="withdraw_amount" value="{{old('withdraw_amount')}}"  @if ($errors->has('withdraw_amount')) autofocus @endif size="60" maxlength="128" class="form-text form-control input-lg-3 required">
                                                </div>
                                            </div>
                                            <div class="transaction-password">
                                                <div class="form-item clearfix form-type-password form-item-password form-group">
                                                    <label for="edit-password">Transaction Password <span class="form-required" title="This field is required.">*</span></label>
                                                    <input type="password" id="edit-password" name="transaction_password" @if ($errors->has('transaction_password')) autofocus @endif size="10" maxlength="128" class="form-text form-control required">
                                                </div>
                                                <!-- <div class="fund-transaction-password"><a href="/afl/ewallet/transaction-authorization/password-verification/YWZsL2NyZWF0ZS13aXRoZHJhd2FsLXJlcXVlc3Q%3D/redirect" class="text-primary">Forget Password</a></div> -->
                                            </div>
                                            <div class="form-item clearfix form-type-radios form-item-my-payment-methods form-group">
                                                <label for="edit-my-payment-methods">Select Payment Methods <span class="form-required" title="This field is required.">*</span></label>
                                                <div id="edit-my-payment-methods" class="form-radios">
                                                    @foreach($query as $row)
                                                    <div class="form-item clearfix form-type-radio form-item-my-payment-methods radio">
                                                        <label class="i-checks">
                                                            <input type="radio" id="edit-my-payment-methods-method-bitcoin" name="payment_method_id" value="{{$row->id}}" {{old('payment_method_id') == $row->id ? 'checked':''}}  class="form-radio radio"><i></i></label>
                                                        <label class="option" for="edit-my-payment-methods-method-bitcoin">{{$row->name}} </label>

                                                    </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                            <table class="sticky-header" style="position: fixed; top: 0px; left: 266px; visibility: hidden;">
                                                <thead style="">
                                                    <tr>
                                                        <th>Particulars</th>
                                                        <th>Amount</th>
                                                    </tr>
                                                </thead>
                                            </table>
                                            <table class="table sticky-enabled tableheader-processed sticky-table">
                                                <thead>
                                                    <tr>
                                                        <th>Particulars</th>
                                                        <th>Amount</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr class="odd">
                                                        <td>Eligible amount for withdrawal</td>
                                                        <td>$ {{number_format($data,2)}}</td>
                                                    </tr><!-- 
                                                    <tr class="even">
                                                        <td>E-wallet amount already in
                                                            <br>payout process</td>
                                                        <td>337.50</td>
                                                    </tr> -->
                                                    <tr class="odd">
                                                        <td>Processing Charges</td>
                                                        <td>@if(!empty($ewallet_settings->processing_tax)){{$ewallet_settings->processing_tax}}% @else 0 @endif</td>
                                                    </tr>
                                                    <tr class="even">
                                                        <td>Minimum withdrawal Amount</td>
                                                        <td>@if(!empty($ewallet_settings->processing_tax)) ${{$ewallet_settings->minimum_amount}} @else 0 @endif</td>
                                                    </tr>
                                                    <tr class="odd">
                                                        <td>Maximum withdrawal Percentage / Amount</td>
                                                        <td>100%</td>
                                                    </tr>
                                                    <tr class="even">
                                                        <td>Active withdrawal Request</td>
                                                        @if(!empty($active_withdraw_request))
                                                        <td>{{$active_withdraw_request->active_withdraw_request}}</td>
                                                        @else
                                                        <td>0</td>
                                                        @endif
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <input type="submit" id="edit-submit" name="op" value="Submit withdrawal Request" class="form-submit btn btn-default btn-primary">
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