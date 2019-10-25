@include('admin.layouts.header')
@include('admin.layouts.aside')
<div id="content" class="app-content" role="main">
    <div class="app-content-body ">
        <div class="hbox hbox-auto-xs hbox-auto-sm">
            <div class="col">
                <!-- main header -->
                <div class="bg-light lter b-b wrapper-md">
                    <div class="row">
                        <div class="col-sm-6 col-xs-6">
                            <h1 class="m-n h3">All Members List</h1>
                            <small class="text-muted"></small>
                        </div>
                        <div class="col-sm-6 col-xs-6 text-right">
                            <h4 class="m-n">Total Verified Members:: {{$count}}</h4>
                            <h4 class=""></h4>
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
                                        @if(!empty($count) > 0)
                                        <div class="panel panel-default panel-filter">
                                            <div class="panel-heading clearfix">
                                                <h4 class="panel-title" data-toggle="collapse" data-target=".view-filters">
                                                    <span class="text-dark-lter" style="cursor:pointer;"><i class="fa fa-filter text-primary"></i> Export </span>
                                                  </h4>
                                            </div>
                                            <div class="panel-collapse view-filters collapse" aria-expanded="false" style="height: 0px;">
                                                <div class="panel-body">
                                                    <form action="{{route('all_members_export')}}" method="get" id="" accept-charset="UTF-8" siq_id="autopick_4104">
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
                                        <div class="panel panel-default panel-filter">
                                            <div class="panel-heading clearfix">
                                                <h4 class="panel-title" data-toggle="collapse" data-target=".view-filters">
                                                    <span class="text-dark-lter" style="cursor:pointer;"><i class="fa fa-filter text-primary"></i> Filter </span>
                                                  </h4>
                                            </div>
                                            <div class="panel-collapse view-filters collapse" aria-expanded="false" style="height: 0px;">
                                                <div class="panel-body">
                                                    <form action="{{route('search_members')}}" method="get" id="views-exposed-form-manage-members-page" accept-charset="UTF-8">
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
                                                                <!--<input type="submit" id="edit-reset" name="op" value="Clear" class="form-submit btn btn-default btn-primary"> </div>-->
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                                </div>
                                            </div>
                                        </div>
                                        </div>
                                        <div class="panel panel-default panel-view">
                                        <div class="view-content">
                                            <div class="table-responsive">
                                                <table class="views-table cols-12 table">
                                                    <thead>
                                                        <tr>
                                                            <!-- <th class="views-field views-field-views-bulk-operations-1">
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
                                                                Parent </th>    
                                                            <th class="views-field views-field-field-afl-sponsor">
                                                                Sponsor </th>
                                                            <th class="views-field views-field-mail">
                                                                E-mail </th>
                                                            <th class="views-field views-field-php-2">
                                                                Current Package </th>
                                                            <th class="views-field views-field-rid">
                                                                Role(s) </th>
                                                            <th class="views-field views-field-rid">
                                                                Unique Code </th>
                                                            <th class="views-field views-field-status">
                                                                Status </th>
                                                            <th class="views-field views-field-created">
                                                                <a href="#" title="sort by Registered On" class="active">Registered On</a> </th>
                                                            <th class="views-field views-field-edit-node">
                                                                Link to edit user </th>
                                                            
                                                        </tr>
                                                    </thead>
                                                    <tbody>
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
                                                                {{$row->first_name}} {{$row->sur_name}} <span class="label bg-info"><a href="#" title="View user profile." class="username">{{$row->name}}</a></span> <span class="label label-primary">{{$row->id}}</span> </td>
                                                            <td class="views-field views-field-field-afl-sponsor">
                                                                <a href="#">{{$row->parent_name}}</a> <span class="text-primary"></span> </td>
                                                            <td class="views-field views-field-field-afl-sponsor">
                                                                {{$row->sponsor}}<br><span class="label bg-info"><a href="#" title="Sponsor Contact No." class="username">{{$row->sponsor_contact}}</a></span></td>
                                                            <td class="views-field views-field-mail">
                                                                {{$row->email}} </td>
                                                            <td class="views-field views-field-php-2">
                                                                {{$row->package}} </td>
                                                            <td class="views-field views-field-rid">
                                                                @if($row->role == 1) Member @else Admin @endif</td>
                                                            <td class="views-field views-field-rid">
                                                                {{$row->country_code}}-{{$row->unique_code}}</td>
                                                            <td class="views-field views-field-status">
                                                                @if($row->user_status == 0) Active @else Blocked @endif </td>
                                                            <td class="views-field views-field-created">
                                                                {{$row->registration_date}} </td>
                                                            <td class="views-field views-field-edit-node">
                                                                <a href="{{route('edit_member',$row->user_id)}}"><i class="fa fa-pencil-square fa-2x" aria-hidden="true"></i></a> </td>
                                                           
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