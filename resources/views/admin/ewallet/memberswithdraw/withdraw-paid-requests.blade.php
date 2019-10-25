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
                            <h1 class="m-n h3">Approved and Paid</h1>
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
                                @include('admin.layouts.withdraw-requests-navigation')
                            </div>
                            <div class="region region-content">
                                <div id="block-system-main" class="block block-system clearfix">

                                    <div class="eps-view view view-withdrawal-requests view-id-withdrawal_requests view-display-id-page_4 view-dom-id-d3d0a85a0da0dc0148cb510ecd19ac76">
                                        @if(!empty($total_records > 0))
                                        <div class="panel panel-default panel-filter">
                                            <div class="panel-heading clearfix">
                                                <h4 class="panel-title" data-toggle="collapse" data-target=".view-filters">
                                                    <span class="text-dark-lter" style="cursor:pointer;"><i class="fa fa-filter text-primary"></i> Export </span>
                                                  </h4>
                                            </div>
                                            <div class="panel-collapse view-filters collapse" aria-expanded="false" style="height: 0px;">
                                                <div class="panel-body">
                                                    <form action="{{route('withdrawal_approved_export')}}" method="get" id="" accept-charset="UTF-8" siq_id="autopick_4104">
                                                        <div class="from-panel">
                                                            <div class="row form-row">
                                                                <div class="col-md-4">
                                                                    <input placeholder="From" type="text" id="fromdate" name="from_date" value="" size="20" maxlength="30" class="form-text form-control input-lg-3">
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <input placeholder="To" type="text" id="todate" name="to_date" value="" size="20" maxlength="30" class="form-text form-control input-lg-3">
                                                                </div>
                                                                <div class="col-md-4">
                                                                   <input type="submit" id="" name="" value="Export" class="form-submit btn btn-default btn-primary">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel panel-default panel-view">
                                            <div class="view-content">
                                                <div class="table-responsive">
                                                    <table class="views-table cols-7 table">
                                                        <thead>
                                                            <tr>
                                                                <th class="views-field views-field-uid-1">
                                                                    Member </th>
                                                                <th class="views-field views-field-created">
                                                                    Requested Date </th>
                                                                <th class="views-field views-field-paid-date">
                                                                    Paid Date </th>
                                                                <th class="views-field views-field-notes">
                                                                    Notes </th>
                                                                <th class="views-field views-field-payout-method">
                                                                    Preferred Method </th>
                                                                <th class="views-field views-field-wallet-address">
                                                                    Wallet address </th>
                                                                <th class="views-field views-field-php">
                                                                    Amount Payable </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach($withdraw_paid as $row)
                                                            <tr class="odd views-row-first">
                                                                <td class="views-field views-field-uid-1">
                                                                    {{$row->first_name}} {{$row->sur_name}}
                                                                    <br><span class="text-primary">({{$row->name}})</span> </td>
                                                                <td class="views-field views-field-created">
                                                                    {{date('M,d Y h:i:s a',strtotime($row->created_date_time))}} </td>
                                                                <td class="views-field views-field-paid-date">
                                                                    {{date('M,d Y h:i:s a',strtotime($row->updated_date_time))}} </td>
                                                                <td class="views-field views-field-notes">
                                                                   {{$row->notes}} </td>
                                                                <td class="views-field views-field-payout-method">
                                                                    {{$row->payment_method_name}} </td>
                                                                <td class="views-field views-field-wallet-address">
                                                                    <span class="w-full block"><code>{{$row->wallet_address}}</code></span> </td>
                                                                <td class="views-field views-field-php">
                                                                    {{number_format($row->payable_amount,2, '.', ',')}}  USD
                                                                </td>
                                                            </tr>
                                                            @endforeach
                                                    </table>
                                                </div>
                                                <div class="text-center">{{$withdraw_paid->links()}}</div>
                                            </div>
                                        </div>
                                        @else
                                        <div class="panel panel-default panel-view">
                                            <h5 class="text-center">No Paid Requests</h5>
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