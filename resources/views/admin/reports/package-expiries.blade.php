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
                            <h1 class="m-n h3">Member Upgrade Package  Expiry </h1>
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
                            <div class="region region-content">
                                <div id="block-system-main" class="block block-system clearfix">

                                    <div class="eps-view view view-member-package-expiry- view-id-member_package_expiry_ view-display-id-page view-dom-id-893e9e377f4da003f452629f1ba64dc8">
                                        @if(!empty($expiries))
                                        <div class="panel panel-default panel-view">
                                            <div class="view-content">

                                                <div class="table-responsive">
                                                    <table class="views-table cols-10 table">
                                                        <thead>
                                                            <tr>
                                                                <th class="views-field views-field-uid">
                                                                    User ID </th>
                                                                <th class="views-field views-field-name">
                                                                    Name </th>
                                                                <th class="views-field views-field-package-id">
                                                                    Package </th>
                                                                <th class="views-field views-field-amount-paid">
                                                                Purchase type </th>
                                                                <th class="views-field views-field-amount-paid">
                                                                    Amount Paid </th>
                                                                <th class="views-field views-field-created">
                                                                    Created date </th>
                                                                <th class="views-field views-field-active-status">
                                                                    Active Status </th>
                                                                <th class="views-field views-field-expiry-date">
                                                                    Expiry date </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach($expiries as $row)
                                                            <tr class="odd views-row-first">
                                                                <td class="views-field views-field-uid">
                                                                    {{$row['user_id']}} </td>
                                                                <td class="views-field views-field-name">
                                                                    {{$row['name']}} </td>
                                                                <td class="views-field views-field-package-id">
                                                                    <span class="product-name">{{$row['package']}}</span> </td>
                                                                <td class="views-field views-field-purchase-type">
                                                                    @if(!empty($row['updated_date_time']))
                                                                     upgrade
                                                                    @else enrollment @endif </td>
                                                                <td class="views-field views-field-amount-paid">
                                                                    {{number_format($row['fees'],2)}} </td>
                                                                <td class="views-field views-field-created">
                                                                    @if(!empty($row['updated_date_time']))
                                                                    {{date('M d, Y',strtotime($row['updated_date_time']))}}
                                                                    @else
                                                                     {{date('M d, Y',strtotime($row['created_date_time']))}}
                                                                    @endif </td>
                                                                <td class="views-field views-field-active-status">
                                                                    @if($row['status'] == 1)
                                                                        Inactive
                                                                    @else
                                                                        Active
                                                                    @endif </td>
                                                                <td class="views-field views-field-expiry-date">
                                                                    {{date('M d,Y',strtotime($row['expiry_date']))}} </td>
                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                    <div class="text-center"></div>
                                                </div>
                                            </div>
                                        </div>
                                        @else
                                        <div class="panel panel-default panel-view">
                                            <div class="view-empty">
                                                <div class="panel-body">No record found.</div>
                                            </div>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                                <!-- /.block -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- / main content -->
            </div>

        </div>
    </div>

</div>
@include('admin.layouts.footer')