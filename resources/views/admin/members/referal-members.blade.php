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
                            <h1 class="m-n h3">All Members List</h1>
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
                                                        <div class="panel panel-default panel-view">
                                                            <div class="view-content">

                                                                <div class="table-responsive">
                                                                    <table class="views-table cols-7 table">
                                                                        <thead>
                                                                            <tr>
                                                                                <th class="views-field views-field-counter">
                                                                                    # </th>
                                                                                <th class="views-field views-field-uid">
                                                                                    Member </th>
                                                                                <th class="views-field views-field-php-1">
                                                                                    Parent </th>
                                                                                <th class="views-field views-field-field-afl-sponsor">
                                                                                    Sponsor </th>
                                                                                <th class="views-field views-field-enrolment-package-id">
                                                                                    Current Package </th>
                                                                                <th class="views-field views-field-status">
                                                                                    Status </th>
                                                                                <th class="views-field views-field-created">
                                                                                    Registered On </th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            @if(!empty($count) > 0)
                                                                            @foreach($query as $row)
                                                                            <tr class="odd views-row-first">
                                                                                <td class="views-field views-field-counter">
                                                                                    {{$no++}} </td>
                                                                                <td class="views-field views-field-uid">
                                                                                    {{$row->first_name}} {{$row->sur_name}} <span class="text-primary">({{$row->name}})</span> </td>
                                                                                <td class="views-field views-field-php-1">
                                                                                    {{$row->parent_name}} </td>
                                                                                <td class="views-field views-field-field-afl-sponsor">
                                                                                    {{$row->sponsor}} </td>
                                                                                <td class="views-field views-field-enrolment-package-id">
                                                                                    <span class="product-img"><!-- <img alt="" src="" width="150" height="150"> --></span><span class="product-name">{{$row->package}}</span> </td>
                                                                                <td class="views-field views-field-status">
                                                                                    @if($row->status == 0) Active @else Inactive
                                                                                    @endif 
                                                                                </td>
                                                                                <td class="views-field views-field-created">
                                                                                    {{$row->registration_date}}
                                                                                </td>
                                                                            </tr>
                                                                            @endforeach
                                                                            @else
                                                                            <h3>No Members Found</h3>
                                                                            @endif
                                                                        </tbody>
                                                                    </table>
                                                                </div>
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