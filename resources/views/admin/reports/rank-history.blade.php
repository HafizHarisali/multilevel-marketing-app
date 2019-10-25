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
                            <h1 class="m-n h3">Member Rank History</h1>
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

                                    <div class="eps-view view view-rank-history view-id-rank_history view-display-id-page_1 view-dom-id-1f7de87ccab5fdff9114ffeed00e3423">

                                        @if(!empty($total_records > 0))
                                        <div class="panel panel-default panel-view">
                                            <div class="view-content">
                                                <div class="table-responsive">
                                                    <table class="views-table cols-4 table">
                                                        <thead>
                                                            <tr>
                                                                <th class="views-field views-field-counter">
                                                                    # </th>
                                                                <th class="views-field views-field-uid">
                                                                    Member </th>
                                                                <th class="views-field views-field-updated">
                                                                    updated date </th>
                                                                <th class="views-field views-field-member-rank">
                                                                    Title / Rank / Status </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php $no = 1; ?>
                                                            @foreach($rank_history as $row)
                                                            <tr class="odd views-row-first">
                                                                <td class="views-field views-field-counter">
                                                                    <?php echo $no++; ?> </td>
                                                                <td class="views-field views-field-uid">
                                                                    {{$row->first_name}} {{$row->sur_name}} <span class="text-primary">(<a href="/users/businessadmin" title="View user profile." class="username">{{$row->name}}</a>)</span> </td>
                                                                <td class="views-field views-field-updated">
                                                                    {{date('M d, Y - h:i:s a',strtotime($row->updated_date_time))}}</td>
                                                                <td class="views-field views-field-member-rank text-uppercase">
                                                                    {{$row->rank_name}} </td>
                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                    <div class="text-center">{{$rank_history->links()}}</div>
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
                    <!-- / content -->
                </div>
                <!-- / main content -->
            </div>

        </div>
    </div>

</div>
@include('admin.layouts.footer')