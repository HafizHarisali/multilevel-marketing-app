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
                            <h1 class="m-n h3">Active Withdrawal Requests</h1>
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
                            <div class="tab-container">
                                <h2 class="hide">Primary tabs</h2>
                                @include('admin.layouts.my-withdraw-requests-navigation')
                            </div>
                            <div class="region region-content">
                                <div id="block-system-main" class="block block-system clearfix">

                                    <div class="eps-view view view-my-withdrawal-requests view-id-my_withdrawal_requests view-display-id-page view-dom-id-52fe9a4a8625225109e380ba1b6f87f0">

                                        <div class="view-header">
                                            <p>
                                                <br>
                                                <a href="{{route('withdraw_funds_view')}}">
                                                    <button class="btn m-b-xs btn-sm btn-primary btn-addon"><i class="fa fa-plus"></i>Withdraw From E-Wallet </button>
                                                </a>
                                            </p>
                                        </div>
                                        @if(!empty($total_records > 0))
                                        <div class="panel panel-default panel-view">
                                            <div class="view-content">
                                                <div class="vbo-views-form">
                                                    <form class="view-bulk-operation" action="#" method="post" id="views-form-my-withdrawal-requests-page" accept-charset="UTF-8" siq_id="autopick_5821">
                                                        <div>
                                                            <div class="table-responsive">
                                                                <table class="views-table cols-7 table">
                                                                    <thead>
                                                                        <tr>
                                                                            <th class="views-field views-field-views-bulk-operations">
                                                                                Requested Date </th>
                                                                            <th class="views-field views-field-created">
                                                                                Paid Date </th>
                                                                            <th class="views-field views-field-created">
                                                                                Notes </th>
                                                                            <th class="views-field views-field-payout-method">
                                                                                Preferred Method </th>
                                                                            <th class="views-field views-field-wallet-address">
                                                                                Wallet address </th>
                                                                            <th class="views-field views-field-php">
                                                                                Requested Amount </th>
                                                                            <th class="views-field views-field-php-1">
                                                                                Withdrawal Charges </th>
                                                                            <th class="views-field views-field-php-3">
                                                                                Receivable Amount </th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        @foreach($active_payouts as $row)
                                                                        <tr class="odd views-row-first views-row-last">
                                                                            <td class="views-field views-field-created">
                                                                               {{date('Y/M/d h:i:s a',strtotime($row->created_date_time))}} </td>
                                                                            <td class="views-field views-field-created">
                                                                               {{date('Y/M/d h:i:s a',strtotime($row->updated_date_time))}} </td>
                                                                            <td class="views-field views-field-created">
                                                                               {{$row->notes}} </td>
                                                                            <td class="views-field views-field-payout-method">
                                                                                {{$row->payment_method_name}} </td>
                                                                            <td class="views-field views-field-wallet-address">
                                                                                <span class="w-full block"><code>{{$row->wallet_address}}</code></span> </td>
                                                                            <td class="views-field views-field-php">
                                                                                {{number_format($row->requested_amount,2, '.', ',')}} USD </td>
                                                                            <td class="views-field views-field-php-1">
                                                                                {{number_format($row->withdraw_charges,2, '.', ',')}} USD </td>
                                                                            <td class="views-field views-field-php-3">
                                                                                {{number_format($row->payable_amount,2, '.', ',')}} USD
                                                                            </td>
                                                                        </tr>
                                                                        @endforeach
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        @else
                                        <div class="panel panel-default panel-view">
                                            <h5 class="text-center">No Paid Payouts</h5>
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