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
                            <h1 class="m-n h3">Mange Other Members</h1>
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

                                    <div class="view view-manage-member view-id-manage_member view-display-id-page view-dom-id-7900783cead82f2f18092ce86318bf45">
                                        <div class="view-header">
                                            <p>
                                                <a href="/afl-admin/business-staff/11">
                                                    <button class="btn m-b-xs btn-sm btn-primary btn-addon"><i class="fa fa-plus"></i>Add CMS Manager</button>
                                                </a>
                                                <a href="/afl-admin/business-staff/5">
                                                    <button class="btn m-b-xs btn-sm btn-primary btn-addon"><i class="fa fa-plus"></i>Add Business Staff</button>
                                                </a>
                                                <a href="/afl-admin/business-staff/9">
                                                    <button class="btn m-b-xs btn-sm btn-primary btn-addon"><i class="fa fa-plus"></i>Add Previliged User</button>
                                                </a>
                                            </p>
                                        </div>

                                        <div class="view-filters">
                                            <form class="ctools-auto-submit-full-form ctools-auto-submit-processed" action="/mange-other-members" method="get" id="views-exposed-form-manage-member-page" accept-charset="UTF-8">
                                                <div>
                                                    <div class="views-exposed-form form-inline">
                                                        <div class="views-exposed-widgets clearfix">
                                                            <div id="edit-uid-raw-wrapper" class="views-exposed-widget views-widget-filter-uid_raw form-group">
                                                                <label for="edit-uid-raw">
                                                                    The user ID </label>
                                                                <div class="views-widget">
                                                                    <div class="form-item clearfix form-type-textfield form-item-uid-raw form-group">
                                                                        <input type="text" id="edit-uid-raw" name="uid_raw" value="" size="30" maxlength="128" class="form-text form-control input-lg-3 ctools-auto-submit-processed">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div id="edit-uid-wrapper" class="views-exposed-widget views-widget-filter-uid form-group">
                                                                <label for="edit-uid">
                                                                    Name </label>
                                                                <div class="views-widget">
                                                                    <div class="form-item form-autocomplete clearfix form-type-textfield form-item-uid form-group" data-toggle="tooltip" title="" role="application" data-original-title="Enter a comma separated list of user names.">
                                                                        <input type="text" id="edit-uid" name="uid" value="" size="60" maxlength="128" class="form-text form-control input-lg-3 form-autocomplete ctools-auto-submit-processed" autocomplete="OFF" aria-autocomplete="list"><span class="icon glyphicon glyphicon-refresh form-control-feedback" aria-hidden="true"></span>
                                                                        <span class="element-invisible" aria-live="assertive" id="edit-uid-autocomplete-aria-live"></span></div>
                                                                </div>
                                                            </div>
                                                            <div class="views-exposed-widget views-submit-button form-group m-t-22">
                                                                <input class="ctools-use-ajax ctools-auto-submit-click form-submit btn btn-default btn-primary" type="submit" id="edit-submit-manage-member" name="" value="Search">
                                                                <input type="submit" id="edit-reset" name="op" value="Clear" class="form-submit btn btn-default btn-primary"> </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>

                                        <div class="view-content">
                                            <div class="panel panel-default">
                                                <div class="table-responsive">
                                                    <table class="views-table cols-7 table">
                                                        <thead>
                                                            <tr>
                                                                <th class="views-field views-field-uid">
                                                                    Uid </th>
                                                                <th class="views-field views-field-name-1">
                                                                    Name </th>
                                                                <th class="views-field views-field-status">
                                                                    Active status </th>
                                                                <th class="views-field views-field-rid">
                                                                    Roles </th>
                                                                <th class="views-field views-field-created">
                                                                    Register Date </th>
                                                                <th class="views-field views-field-php">
                                                                    Rank </th>
                                                                <th class="views-field views-field-edit-node">
                                                                    Link to edit user </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr class="odd views-row-first views-row-last">
                                                                <td class="views-field views-field-uid">
                                                                    <a href="/user/4">4</a> </td>
                                                                <td class="views-field views-field-name-1">
                                                                    <a href="/user/4" title="View user profile." class="username">business.staff</a> </td>
                                                                <td class="views-field views-field-status">
                                                                    Yes </td>
                                                                <td class="views-field views-field-rid">
                                                                    Business Staff </td>
                                                                <td class="views-field views-field-created">
                                                                    Thu, 05/05/2016 - 07:16 </td>
                                                                <td class="views-field views-field-php">
                                                                    <li class="dropdown member-status-afl-wid"><a href="#" data-toggle="dropdown" class="dropdown-toggle" aria-expanded="true"><span style="display: inline; padding: .2em .6em .3em; font-size: 100%;font-weight: 700;line-height: 1; color: #fff;
    text-align: center; white-space: nowrap; vertical-align: baseline; border-radius: .25em;background-color:#eea236;">Active</span></a></li>
                                                                </td>
                                                                <td class="views-field views-field-edit-node">
                                                                    <a href="/user/4/edit?destination=mange-other-members"><i class="fa fa-pencil-square fa-2x" aria-hidden="true"></i></a> </td>
                                                            </tr>
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

</div>
@include('admin.layouts.footer')