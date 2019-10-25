@include("admin.layouts.header")
@include("admin.layouts.aside")
<div id="content" class="app-content" role="main">
    <div class="app-content-body ">
        <div class="hbox hbox-auto-xs hbox-auto-sm">

            <div class="col">
                <!-- main header -->
                <div class="bg-white b-b wrapper-md">
                    <div class="row">
                        <div class="col-lg-4 col-md-12">
                            <h1 class="m-n h3">All Transactions</h1>
                            <small class="text-muted"></small>
                        </div>
                        @include("admin.layouts.ewallet-accounts")
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
                                <ul class="tabs--primary nav nav-tabs">
                                    <li class="active"><a href="#" class="active">Overall<span class="element-invisible">(active tab)</span></a></li>
                                    <!-- <li><a href="#">This Month</a></li> -->
                                </ul>
                            </div>
                            <div class="region region-content">
                                <div id="block-system-main" class="block block-system clearfix">
                                    <div class="eps-view view view-e-wallet-transactions view-id-e_wallet_transactions view-display-id-page view-dom-id-d6f398ef78b2586d72fd3d52c28b7fd9">
                                        @if(!empty($total_records > 0))
                                        <div class="panel panel-default panel-filter">
                                            <div class="panel-heading clearfix">
                                                <h4 class="panel-title" data-toggle="collapse" data-target=".view-filters">
                                                    <span class="text-dark-lter" style="cursor:pointer;"><i class="fa fa-filter text-primary"></i> Export </span>
                                                  </h4>
                                            </div>
                                            <div class="panel-collapse view-filters collapse" aria-expanded="false" style="height: 0px;">
                                                <div class="panel-body">
                                                    <form action="{{route('all_transactions_export')}}" method="get" id="" accept-charset="UTF-8" siq_id="autopick_4104">
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
                                                    <table class="views-table cols-5 table">
                                                        <thead>
                                                            <tr>
                                                                <th class="views-field views-field-counter">
                                                                    # </th>
                                                                <th class="views-field views-field-category">
                                                                    Payment Source </th>
                                                                <th class="views-field views-field-name">
                                                                    Associated Member </th>
                                                                <th class="views-field views-field-amount-paid">
                                                                    Amount </th>
                                                                <th class="views-field views-field-created">
                                                                    Transaction Date </th>
                                                                <th class="views-field views-field-created">
                                                                Transaction Time </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php $no = 1;?>
                                                            @foreach($query as $row)
                                                            <tr class="odd views-row-first">
                                                                <td class="views-field views-field-counter">
                                                                    <?php echo $no++; ?></td>
                                                                <td class="views-field views-field-category">
                                                                    <!-- <span class="label-source m-r-xs" text="sp">SP</span> -->{{$row->payment_source}} </td>
                                                                <td class="views-field views-field-name">
                                                                    <span data-toggle="tooltip" title="" data-original-title="{{$row->associated_user}}">
                                                                       {{$row->associated_user}}</span> </td>
                                                                <td class="views-field views-field-amount-paid">
                                                                    <a href="#" data-toggle="tooltip" title="" data-original-title=""><span class="text-success text-xss m-r-xs">
                                                                        @if($row->from_credit_status == 1)
                                                                        <i class="fa fa-minus"></i>
                                                                        @else
                                                                        <i class="fa fa-plus"></i>
                                                                        @endif
                                                                    </span><span class="small text-primary">$</span><span class="small text-primary">{{$row->balance}}</span></a> </td>
                                                                <td class="views-field views-field-created">
                                                                    {{$row->transaction_date}} </td>
                                                                <td class="views-field views-field-created">
                                                                {{date('h:i:s a',strtotime($row->transaction_time))}}
                                                                 </td>
                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="text-center">{{$query->links()}}</div>
                                            </div>
                                        </div>
                                        @else
                                        <div class="panel panel-default panel-view">
                                            <h5 class="text-center">No Data Found</h5>
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
@include("admin.layouts.footer")