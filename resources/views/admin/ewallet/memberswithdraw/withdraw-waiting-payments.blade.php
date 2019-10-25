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
                            <h1 class="m-n h3">Approved and Ready for payment</h1>
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

                                    <div class="eps-view view view-withdrawal-requests view-id-withdrawal_requests view-display-id-page_2 view-dom-id-665ad5ea74bd7bfe5859d2ceefb3c7d3">
                                        @if(!empty($total_records > 0))
                                        <div class="panel panel-default panel-filter">
                                            <div class="panel-heading clearfix">
                                                <h4 class="panel-title" data-toggle="collapse" data-target=".view-filters">
                                                    <span class="text-dark-lter" style="cursor:pointer;"><i class="fa fa-filter text-primary"></i> Export </span>
                                                  </h4>
                                            </div>
                                            <div class="panel-collapse view-filters collapse" aria-expanded="false" style="height: 0px;">
                                                <div class="panel-body">
                                                    <form action="{{route('withdrawal_processed_export')}}" method="get" id="" accept-charset="UTF-8" siq_id="autopick_4104">
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
                                                <div class="vbo-views-form">
                                                    <form class="view-bulk-operation" action="{{route('markpaid_paylater_status')}}" method="post" id="views-form-withdrawal-requests-page-2" accept-charset="UTF-8" siq_id="autopick_904">
                                                        @csrf
                                                        <div>
                                                            <input class="select-all-rows" type="hidden" name="select_all" value="">
                                                            <div class="container-inline panel-bulk-operation form-wrapper" id="edit-select">
                                                                <input type="submit" id="edit-actionafl-mark-as-paid" name="op" value="Marks as paid" class="form-submit btn btn-default btn-primary">
                                                                <input type="submit" id="edit-actionafl-reject-payout" name="op" value="Pay Later" class="form-submit btn btn-default btn-primary">
                                                            </div>
                                                            <div class="table-responsive">
                                                                <table class="views-table cols-10 table">
                                                                    <thead>
                                                                        <tr>
                                                                            <th class="views-field views-field-views-bulk-operations">
                                                                                <div class="form-item clearfix form-type-checkbox">
                                                                                    <label class="i-checks">
                                                                                        <input class="vbo-table-select-all form-checkbox checkbox" type="checkbox" value="0"><i></i></label>
                                                                                </div>
                                                                            </th>
                                                                            <th class="views-field views-field-uid-1">
                                                                                Member </th>
                                                                            <th class="views-field views-field-created">
                                                                                Requested Date </th>
                                                                            <th class="views-field views-field-modified">
                                                                                Approved date </th>
                                                                            <th class="views-field views-field-notes">
                                                                                Notes </th>
                                                                            <th class="views-field views-field-payout-method">
                                                                                Preferred Method </th>
                                                                            <th class="views-field views-field-wallet-address">
                                                                                Wallet address </th>
                                                                            <th class="views-field views-field-php">
                                                                                Amount Requested </th>
                                                                            <th class="views-field views-field-charges">
                                                                                Charges </th>
                                                                            <th class="views-field views-field-php-1">
                                                                                Amount Payable </th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        @foreach($withdraw_processed as $row)
                                                                        <tr class="odd views-row-first">
                                                                            <td class="views-field views-field-views-bulk-operations">
                                                                                <div class="form-item clearfix form-type-checkbox form-item-views-bulk-operations-0">
                                                                                    <label class="i-checks">
                                                                                        <input class="vbo-select form-checkbox checkbox" type="checkbox" id="edit-views-bulk-operations-0" name="views_bulk_operations[]" value="{{$row->id}}"><i></i></label>
                                                                                </div>
                                                                            </td>
                                                                            <td class="views-field views-field-uid-1">
                                                                                {{$row->first_name}} {{$row->sur_name}}
                                                                                <br><span class="text-primary">({{$row->name}})</span> </td>
                                                                            <td class="views-field views-field-created">
                                                                                {{date('M,d Y h:i:s a',strtotime($row->created_date_time))}} </td>
                                                                            <td class="views-field views-field-modified">
                                                                                {{date('M,d Y h:i:s a',strtotime($row->updated_date_time))}} </td>
                                                                            <td class="views-field views-field-notes">
                                                                                {{$row->notes}} </td>
                                                                            <td class="views-field views-field-payout-method">
                                                                                {{$row->payment_method_name}} </td>
                                                                            <td class="views-field views-field-wallet-address">
                                                                                <span class="w-full block"><code>{{$row->wallet_address}}</code></span> </td>
                                                                            <td class="views-field views-field-php">
                                                                                {{number_format($row->requested_amount,2, '.', ',')}} USD </td>
                                                                            <td class="views-field views-field-charges">
                                                                                {{number_format($row->withdraw_charges,2, '.', ',')}} USD </td>
                                                                            <td class="views-field views-field-php-1">
                                                                                {{number_format($row->payable_amount,2, '.', ',')}} USD
                                                                            </td>
                                                                        </tr>
                                                                        @endforeach
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                            <div class="text-center">{{$withdraw_processed->links()}}</div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        @else
                                        <div class="panel panel-default panel-view">
                                            <h5 class="text-center">No Processed Requests</h5>
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