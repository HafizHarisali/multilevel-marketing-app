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
                            <h1 class="m-n h3">Block Members List</h1>
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
                                        <div class="view-filters">
                                            <form action="{{route('search_block_members')}}" method="get" id="views-exposed-form-manage-members-page" accept-charset="UTF-8">
                                                <div class="from-panel">
                                                    <div class="views-exposed-form form-inline">
                                                        <div class="views-exposed-widgets clearfix">
                                                            <div id="edit-field-afl-first-name-value-wrapper" class="views-exposed-widget views-widget-filter-field_afl_first_name_value form-group">
                                                                <label for="edit-field-afl-first-name-value">
                                                                    First Name </label>
                                                                <div class="views-widget">
                                                                    <div class="form-item clearfix form-type-textfield form-item-field-afl-first-name-value form-group">
                                                                        <input type="text" id="edit-field-afl-first-name-value" name="first_name" value="" size="30" maxlength="128" class="form-text form-control">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div id="edit-field-afl-surname-value-wrapper" class="views-exposed-widget views-widget-filter-field_afl_surname_value form-group">
                                                                <label for="edit-field-afl-surname-value">
                                                                    Surname </label>
                                                                <div class="views-widget">
                                                                    <div class="form-item clearfix form-type-textfield form-item-field-afl-surname-value form-group">
                                                                        <input type="text" id="edit-field-afl-surname-value" name="sur_name" value="" size="30" maxlength="128" class="form-text form-control">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div id="edit-mail-wrapper" class="views-exposed-widget views-widget-filter-mail form-group">
                                                                <label for="edit-mail">
                                                                    Email </label>
                                                                <div class="views-widget">
                                                                    <div class="form-item clearfix form-type-textfield form-item-mail form-group">
                                                                        <input type="text" id="edit-mail" name="email" value="" size="30" maxlength="128" class="form-text form-control">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div id="edit-uid-wrapper" class="views-exposed-widget views-widget-filter-uid form-group">
                                                                <label for="edit-uid">
                                                                    Username </label>
                                                                <div class="views-widget">
                                                                    <div class="form-item form-autocomplete clearfix form-type-textfield form-item-uid form-group" data-toggle="tooltip" title="" role="application" data-original-title="Enter a comma separated list of user names.">
                                                                        <input type="text" id="user_name_live" name="user_name" value="" size="60" maxlength="128" class="form-text form-control input-lg-3">
                                                                        <div id="live-search">
                                                                            
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="views-exposed-widget views-submit-button form-group m-t-22">
                                                                <input type="submit" id="edit-submit-manage-members" name="" value="Search" class="form-submit btn btn-default btn-primary">
                                                                <input type="submit" id="edit-reset" name="op" value="Clear" class="form-submit btn btn-default btn-primary"> </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>

                                        <div class="view-content">
                                            <div class="vbo-views-form">
                                                <form action="/afl-admin/manage-members" method="post" id="views-form-manage-members-page" accept-charset="UTF-8">
                                                    <div class="from-panel">
                                                        <!-- <fieldset class="container-inline form-wrapper" id="edit-select">
                                                            <legend><span class="fieldset-legend">Operations</span></legend>
                                                            <div class="fieldset-wrapper">
                                                                <input type="submit" id="edit-actionafl-activate-user" name="op" value="Activate User" class="form-submit btn btn-default btn-primary" disabled="">
                                                                <input type="submit" id="edit-actionafl-block-member-account" name="op" value="Block Members" class="form-submit btn btn-default btn-primary" disabled="">
                                                            </div>
                                                        </fieldset> -->
                                                        <div class="panel panel-default">
                                                            <div class="table-responsive">
                                                                <table class="views-table cols-12 table">
                                                                    <thead>
                                                                        <tr>
                                                                           <!--  <th class="views-field views-field-views-bulk-operations-1">
                                                                                <div class="form-item clearfix form-type-checkbox">
                                                                                    <label class="i-checks">
                                                                                        <input class="vbo-table-select-all form-checkbox checkbox" type="checkbox" value="1"><i></i></label>
                                                                                </div>
                                                                            </th> -->
                                                                            <th class="views-field views-field-counter">
                                                                                # </th>
                                                                            <th class="views-field views-field-uid">
                                                                                Member Name </th>
                                                                            <th class="views-field views-field-field-afl-sponsor">
                                                                                Sponsor </th>
                                                                            <th class="views-field views-field-mail">
                                                                                E-mail </th>
                                                                            <th class="views-field views-field-php-2">
                                                                                Current Package </th>
                                                                            <th class="views-field views-field-rid">
                                                                                Role(s) </th>
                                                                            <th class="views-field views-field-status">
                                                                                Status </th>
                                                                            <th class="views-field views-field-created">
                                                                                <a href="/afl-admin/manage-members?uid_raw_1=&amp;field_afl_first_name_value=&amp;field_afl_surname_value=&amp;mail=&amp;uid=&amp;order=created&amp;sort=asc" title="sort by Registered On" class="active">Registered On</a> </th>
                                                                            <th class="views-field views-field-edit-node">
                                                                                Link to edit user </th>
                                                                            
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        @if(!empty($count) > 0)
                                                                        @foreach($query as $row)
                                                                        <tr class="odd views-row-first">
                                                                           <!--  <td class="views-field views-field-views-bulk-operations-1">
                                                                                <div class="form-item clearfix form-type-checkbox form-item-views-bulk-operations-1-0">
                                                                                    <label class="i-checks">
                                                                                        <input class="vbo-select form-checkbox checkbox" type="checkbox" id="edit-views-bulk-operations-1-0" name="views_bulk_operations_1[0]" value="16"><i></i></label>
                                                                                </div>
                                                                            </td> -->
                                                                            <td class="views-field views-field-counter">
                                                                                {{$no++}}</td>
                                                                            <td class="views-field views-field-uid">
                                                                                {{$row->first_name}} {{$row->sur_name}} <span class="label bg-info"><a href="/users/mariag" title="View user profile." class="username">{{$row->name}}</a></span> <span class="label label-primary">{{$row->user_id}}</span> </td>
                                                                            <td class="views-field views-field-field-afl-sponsor">
                                                                                <a href="/users/mlmmember">{{$row->sponsor}}</a> <span class="text-primary">(12)</span> </td>
                                                                            <td class="views-field views-field-mail">
                                                                                {{$row->email}} </td>
                                                                            <td class="views-field views-field-php-2">
                                                                                {{$row->package}} </td>
                                                                            <td class="views-field views-field-rid">
                                                                                @if($row->role == 1) Member @else Admin @endif</td>
                                                                            <td class="views-field views-field-status">
                                                                                @if($row->user_status == 0) Active
                                                                                @elseif($row->user_status == 1) Blocked @else Unverified @endif </td>
                                                                            <td class="views-field views-field-created">
                                                                                {{$row->registration_date}} </td>
                                                                            <td class="views-field views-field-edit-node">
                                                                                <a href="{{route('edit_member',$row->user_id)}}"><i class="fa fa-pencil-square fa-2x" aria-hidden="true"></i></a> </td>
                                                                           
                                                                        </tr>
                                                                        @endforeach
                                                                        @else
                                                                        <h3>No Members Found</h3>
                                                                        @endif
                                                                    </tbody>
                                                                </table>
                                                                {{$query->links()}}
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