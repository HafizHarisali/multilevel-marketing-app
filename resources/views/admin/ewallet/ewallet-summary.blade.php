@include("admin.layouts.header")
@include("admin.layouts.aside")
  <div id="content" class="app-content" role="main">
    <div class="">
    <div class="hbox hbox-auto-xs hbox-auto-sm">

        <div class="col">
            <!-- main header -->
            <div class="bg-light lter b-b wrapper-md">
                <div class="row">
                    <div class="col-lg-4 col-md-12">
                        <h1 class="m-n h3">E-Wallet Summary</h1>
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

                    <!-- content -->
                    <div class="row">
                    <div class="col-md-12">
                        <div class="tab-container">
                            <h2 class="hide">Primary tabs</h2>
                            <ul class="tabs--primary nav nav-tabs">
                                <li class="active"><a href="#" class="active">Summary<span class="element-invisible">(active tab)</span></a></li>
                                <!-- <li><a href="#">This Month</a></li>
                                <li><a href="#">This Year</a></li> -->
                            </ul>
                        </div>
                        <div class="region region-content">
                            <div id="block-system-main" class="block block-system clearfix">

                                <div class="eps-view view view-e-wallet-summary view-id-e_wallet_summary view-display-id-page view-dom-id-026c565e2ffd696b94a205cf6a7c219b">

                                    <div class="panel panel-default panel-view">
                                        <div class="view-content">
                                            <div class="table-responsive">
                                                <table class="views-table cols-3 table">
                                                    <thead>
                                                        <tr>
                                                            <th class="views-field views-field-counter">
                                                                # </th>
                                                            <th class="views-field views-field-category">
                                                                <a href="#" title="sort by Category" class="active">Category</a> </th>
                                                            <th class="views-field views-field-balance">
                                                                <a href="#" title="sort by Overview" class="active">Overview</a> </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @if(!empty($ewallet_query->ewallet_purchase))
                                                        <tr class="views-row-first">
                                                            <td class="views-field views-field-counter">
                                                                 1</td>
                                                            <td class="views-field views-field-category">
                                                                 Ewallet Purchase</td>
                                                            <td class="views-field views-field-balance">
                                                                <span class="text-success text-xss m-r-xs"><i class="fa fa-minus"></i></span><span class="small text-primary">$</span> <span class="small text-primary"></span> {{$ewallet_query->ewallet_purchase}}</td>
                                                        </tr>
                                                        @endif
                                                        @if(!empty($sponsor_query->sponsor_commision))
                                                        <tr class="views-row-first">
                                                            <td class="views-field views-field-counter">
                                                                 2</td>
                                                            <td class="views-field views-field-category">
                                                                 Sponsor Commision</td>
                                                            <td class="views-field views-field-balance">
                                                                <span class="text-success text-xss m-r-xs"><i class="fa fa-plus"></i></span><span class="small text-primary">$</span> <span class="small text-primary"></span> {{$sponsor_query->sponsor_commision}}</td>
                                                        </tr>
                                                        @endif
                                                        @if(!empty($level_query->level_commision))
                                                        <tr class="views-row-first">
                                                            <td class="views-field views-field-counter">
                                                                 3</td>
                                                            <td class="views-field views-field-category">
                                                                 Level Commision</td>
                                                            <td class="views-field views-field-balance">
                                                                <span class="text-success text-xss m-r-xs"><i class="fa fa-plus"></i></span><span class="small text-primary">$</span> <span class="small text-primary"></span> {{$level_query->level_commision}}</td>
                                                        </tr>
                                                        @endif
                                                        @if(!empty($binary_query->binary_commision))
                                                        <tr class="views-row-first">
                                                            <td class="views-field views-field-counter">
                                                                 4</td>
                                                            <td class="views-field views-field-category">
                                                                 Binary Bonus</td>
                                                            <td class="views-field views-field-balance">
                                                                <span class="text-success text-xss m-r-xs"><i class="fa fa-plus"></i></span><span class="small text-primary">$</span> <span class="small text-primary"></span> {{$binary_query->binary_commision}}</td>
                                                        </tr>
                                                        @endif
                                                        @if(!empty($ewallet_debit_query->ewallet_debit))
                                                        <tr class="views-row-first">
                                                            <td class="views-field views-field-counter">
                                                                 5</td>
                                                            <td class="views-field views-field-category">
                                                                 Ewallet Debit</td>
                                                            <td class="views-field views-field-balance">
                                                                <span class="text-success text-xss m-r-xs"><i class="fa fa-plus"></i></span><span class="small text-primary">$</span> <span class="small text-primary"></span> {{$ewallet_debit_query->ewallet_debit}}</td>
                                                        </tr>
                                                        @endif
                                                        @if(!empty($ewallet_transfer->ewallet_transfer))
                                                        <tr class="views-row-first">
                                                            <td class="views-field views-field-counter">
                                                                 6</td>
                                                            <td class="views-field views-field-category">
                                                                 Ewallet Fund Transfer</td>
                                                            <td class="views-field views-field-balance">
                                                                <span class="text-success text-xss m-r-xs"><i class="fa fa-minus"></i></span><span class="small text-primary">$</span> <span class="small text-primary"></span> {{$ewallet_transfer->ewallet_transfer}}</td>
                                                        </tr>
                                                        @endif
                                                        @if(!empty($upgrade_package->package_upgrade))
                                                        <tr class="views-row-first">
                                                            <td class="views-field views-field-counter">
                                                                 7</td>
                                                            <td class="views-field views-field-category">
                                                                 Ewallet Package Upgrade</td>
                                                            <td class="views-field views-field-balance">
                                                                <span class="text-success text-xss m-r-xs"><i class="fa fa-minus"></i></span><span class="small text-primary">$</span> <span class="small text-primary"></span> {{$upgrade_package->package_upgrade}}</td>
                                                        </tr>
                                                        @endif
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
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
@include("admin.layouts.footer")