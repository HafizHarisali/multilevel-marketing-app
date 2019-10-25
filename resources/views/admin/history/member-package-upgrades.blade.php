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
                            <h1 class="m-n h3">Member package upgrade</h1>
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

                    <!-- content -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="region region-content">
                                <div id="block-system-main" class="block block-system clearfix">

                                    <div class="eps-view view view-member-package-upgrade view-id-member_package_upgrade view-display-id-page view-dom-id-c69b6ea2cc07c00a2a8a6112dc6be05e">
                                        @if(!empty($upgarde_members))
                                        <div class="panel panel-default panel-view">
                                            <div class="view-content">
                                                <div class="table-responsive">
                                                    <table class="views-table cols-6 table">
                                                        <thead>
                                                            <tr>
                                                                <th class="views-field views-field-counter">
                                                                    # </th>
                                                                <th class="views-field views-field-field-afl-first-name">
                                                                    <a href="#" class="active">First Name</a> </th>
                                                                <th class="views-field views-field-name">
                                                                    <a href="#" class="active">Username</a> </th>
                                                                <th class="views-field views-field-title">
                                                                    <a href="#" class="active">Previous Package</a> </th>
                                                                <th class="views-field views-field-title-1">
                                                                    <a href="#" class="active">New Package</a> </th>
                                                                <th class="views-field views-field-created">
                                                                    <a href="#" class="active">Updated date</a> </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php $no = 1; ?>
                                                            @foreach($upgarde_members as $row)
                                                            <tr class="odd views-row-first">
                                                                <td class="views-field views-field-counter">
                                                                    <?php echo $no++; ?> </td>
                                                                <td class="views-field views-field-field-afl-first-name">
                                                                    {{$row->first_name}} {{$row->sur_name}} </td>
                                                                <td class="views-field views-field-name">
                                                                    <a href="#" title="View user profile." class="username">{{$row->name}}</a> </td>
                                                                <td class="views-field views-field-title">
                                                                    <span class="product-img"></span> {{$row->old_package}} </td>
                                                                <td class="views-field views-field-title-1">
                                                                    <span class="product-img"></span> {{$row->new_package}} </td>
                                                                <td class="views-field views-field-created">
                                                                    {{date('M d, Y - h:i a',strtotime($row->updated_date_time))}}</td>
                                                                    
                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        @else

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