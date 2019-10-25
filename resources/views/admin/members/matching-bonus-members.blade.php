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
                            <h1 class="m-n h3">Matching Bonus Members List</h1>
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
                                    <div class="view view-manage-members view-id-manage_members view-display-id-page view-dom-id-7dcf229004c154cee7faed0948f9ec0d">
                                        <div class="view-content">
                                            <div class="vbo-views-form">
                                                <form action="/afl-admin/manage-members" method="post" id="views-form-manage-members-page" accept-charset="UTF-8">
                                                    <div class="from-panel">
                                                        <div class="panel panel-default">
                                                            <div class="table-responsive">
                                                                <table class="views-table cols-12 table">
                                                                    <thead>
                                                                        <tr>
                                                                            <th class="views-field views-field-counter">
                                                                                # </th>
                                                                            <th class="views-field views-field-uid">
                                                                                Member Name </th>
                                                                            <th class="views-field views-field-mail">
                                                                                E-mail </th>
                                                                            <th class="views-field views-field-mail">
                                                                            Contact No </th>
                                                                            <th class="views-field views-field-php-2">
                                                                                Current Package </th>
                                                                            <th class="views-field views-field-created">
                                                                                <a href="#" title="sort by Registered On" class="active">Date Time</a> </th>
                                                                            <th class="views-field views-field-edit-node">
                                                                                Current Rank </th>
                                                                            
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <?php $no = 1; ?>
                                                                        @if(!empty($total_records) > 0)
                                                                        @foreach($matching_bonus_users as $row)
                                                                        <tr class="odd views-row-first">
                                                                            <td class="views-field views-field-counter">
                                                                               <?php echo $no++; ?></td>
                                                                            <td class="views-field views-field-uid">
                                                                                {{$row->first_name}} {{$row->sur_name}} <span class="label bg-info"><a href="#" title="View user profile." class="username">{{$row->username}}</a></span> <span class="label label-primary">{{$row->id}}</span> </td>
                                                                            <td class="views-field views-field-mail">
                                                                                {{$row->email}} </td>
                                                                            <td class="views-field views-field-mail">
                                                                                {{$row->contact}} </td>
                                                                            <td class="views-field views-field-php-2">
                                                                                {{$row->package}} </td>
                                                                            <td class="views-field views-field-created">
                                                                                {{date('Y-M-d h:i:s a',strtotime($row->updated_date_time))}} </td>
                                                                            <td class="views-field views-field-edit-node">
                                                                                @if($row->rank_id == 1) <p class="badge badge-primary">
                                                                                    {{$row->rank_name}}
                                                                                </p>
                                                                                @elseif($row->rank_id == 2)
                                                                                <p class="badge badge-secondary">
                                                                                    {{$row->rank_name}}
                                                                                </p>
                                                                                @elseif($row->rank_id == 3)
                                                                                <p class="badge badge-success">
                                                                                    {{$row->rank_name}}
                                                                                </p>
                                                                                @elseif($row->rank_id == 4)
                                                                                <p class="badge badge-danger">
                                                                                    {{$row->rank_name}}
                                                                                </p>
                                                                                @elseif($row->rank_id == 5)
                                                                                <p class="badge badge-warning">
                                                                                    {{$row->rank_name}}
                                                                                </p>
                                                                                @elseif($row->rank_id == 6)
                                                                                <p class="badge badge-info">
                                                                                    {{$row->rank_name}}
                                                                                </p>
                                                                                @elseif($row->rank_id == 7)
                                                                                <p class="badge badge-dark">
                                                                                    {{$row->rank_name}}
                                                                                </p>
                                                                                @endif    
                                                                            </td>
                                                                           
                                                                        </tr>
                                                                        @endforeach
                                                                        @else
                                                                        <h3>No Members Found</h3>
                                                                        @endif
                                                                    </tbody>
                                                                </table>
                                                                {{$matching_bonus_users->links()}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
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

</div>
@include('admin.layouts.footer')