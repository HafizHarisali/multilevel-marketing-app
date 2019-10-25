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
                            <h1 class="m-n h3">Manage Events</h1>
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

                                    <div class="view view-manage-events view-id-manage_events view-display-id-page view-dom-id-ade4b73929468e266c7b4a13ca68377f">
                                        <div class="view-header">
                                            <div class="m-b-md"><a class="btn btn-primary" href="/node/add/events">Create New Event</a></div>
                                        </div>

                                        <div class="view-filters">
                                            <form action="/afl-admin/manage-events" method="get" id="views-exposed-form-manage-events-page" accept-charset="UTF-8">
                                                <div class="from-panel">
                                                    <div class="views-exposed-form form-inline">
                                                        <div class="views-exposed-widgets clearfix">
                                                            <div id="edit-status-1-wrapper" class="views-exposed-widget views-widget-filter-status_1 form-group">
                                                                <label for="edit-status-1">
                                                                    Active Status </label>
                                                                <div class="views-widget">
                                                                    <div class="form-item clearfix form-type-select form-item-status-1 form-group">
                                                                        <select id="edit-status-1" name="status_1" class="form-select form-control">
                                                                            <option value="All" selected="selected">- Any -</option>
                                                                            <option value="1">Yes</option>
                                                                            <option value="0">No</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="views-exposed-widget views-submit-button form-group m-t-22">
                                                                <input type="submit" id="edit-submit-manage-events" name="" value="Apply" class="form-submit btn btn-default btn-info" /> </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>

                                        <div class="view-content">
                                            <div class="vbo-views-form">
                                                <form action="/afl-admin/manage-events" method="post" id="views-form-manage-events-page" accept-charset="UTF-8">
                                                    <div class="from-panel">
                                                        <fieldset class="container-inline form-wrapper" id="edit-select">
                                                            <legend><span class="fieldset-legend">Operations</span></legend>
                                                            <div class="fieldset-wrapper">
                                                                <input type="submit" id="edit-actionviews-bulk-operations-delete-item" name="op" value="Delete Event" class="form-submit btn btn-default btn-primary" />
                                                                <input type="submit" id="edit-actionnode-unpublish-action" name="op" value="Unpublish Event" class="form-submit btn btn-default btn-primary" />
                                                            </div>
                                                        </fieldset>
                                                        <div class="panel panel-default">
                                                            <div class="table-responsive">
                                                                <table class="views-table cols-4 table">
                                                                    <thead>
                                                                        <tr>
                                                                            <th class="views-field views-field-views-bulk-operations">
                                                                                <div class="form-item clearfix form-type-checkbox">
                                                                                    <label class="i-checks">
                                                                                        <input class="vbo-table-select-all form-checkbox checkbox" type="checkbox" value="1" /><i></i></label>
                                                                                </div>
                                                                            </th>
                                                                            <th class="views-field views-field-title">
                                                                                Title </th>
                                                                            <th class="views-field views-field-field-event-date">
                                                                                Event Date </th>
                                                                            <th class="views-field views-field-edit-node">
                                                                                Edit </th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr class="odd views-row-first">
                                                                            <td class="views-field views-field-views-bulk-operations">
                                                                                <div class="form-item clearfix form-type-checkbox form-item-views-bulk-operations-0">
                                                                                    <label class="i-checks">
                                                                                        <input class="vbo-select form-checkbox checkbox" type="checkbox" id="edit-views-bulk-operations-0" name="views_bulk_operations[0]" value="74" /><i></i></label>
                                                                                </div>
                                                                            </td>
                                                                            <td class="views-field views-field-title">
                                                                                <a href="/node/74">Blockchain Summit London</a> </td>
                                                                            <td class="views-field views-field-field-event-date">
                                                                                <span class="date-display-range"><span class="date-display-start">Tue, 06/25/2019 - 04:45</span> to <span class="date-display-end">Wed, 06/26/2019 - 04:45</span></span>
                                                                            </td>
                                                                            <td class="views-field views-field-edit-node">
                                                                                <a href="/node/74/edit?destination=afl-admin/manage-events">Edit</a> </td>
                                                                        </tr>
                                                                        <tr class="even">
                                                                            <td class="views-field views-field-views-bulk-operations">
                                                                                <div class="form-item clearfix form-type-checkbox form-item-views-bulk-operations-1">
                                                                                    <label class="i-checks">
                                                                                        <input class="vbo-select form-checkbox checkbox" type="checkbox" id="edit-views-bulk-operations-1" name="views_bulk_operations[1]" value="73" /><i></i></label>
                                                                                </div>
                                                                            </td>
                                                                            <td class="views-field views-field-title">
                                                                                <a href="/node/73">BitBlockboom!	</a> </td>
                                                                            <td class="views-field views-field-field-event-date">
                                                                                <span class="date-display-range"><span class="date-display-start">Mon, 08/17/2020 - 04:30</span> to <span class="date-display-end">Tue, 08/18/2020 - 04:30</span></span>
                                                                            </td>
                                                                            <td class="views-field views-field-edit-node">
                                                                                <a href="/node/73/edit?destination=afl-admin/manage-events">Edit</a> </td>
                                                                        </tr>
                                                                        <tr class="odd">
                                                                            <td class="views-field views-field-views-bulk-operations">
                                                                                <div class="form-item clearfix form-type-checkbox form-item-views-bulk-operations-2">
                                                                                    <label class="i-checks">
                                                                                        <input class="vbo-select form-checkbox checkbox" type="checkbox" id="edit-views-bulk-operations-2" name="views_bulk_operations[2]" value="72" /><i></i></label>
                                                                                </div>
                                                                            </td>
                                                                            <td class="views-field views-field-title">
                                                                                <a href="/node/72">CryptoBlockCon London</a> </td>
                                                                            <td class="views-field views-field-field-event-date">
                                                                                <span class="date-display-range"><span class="date-display-start">Thu, 09/24/2020 - 04:15</span> to <span class="date-display-end">Fri, 09/25/2020 - 04:15</span></span>
                                                                            </td>
                                                                            <td class="views-field views-field-edit-node">
                                                                                <a href="/node/72/edit?destination=afl-admin/manage-events">Edit</a> </td>
                                                                        </tr>
                                                                        <tr class="even">
                                                                            <td class="views-field views-field-views-bulk-operations">
                                                                                <div class="form-item clearfix form-type-checkbox form-item-views-bulk-operations-3">
                                                                                    <label class="i-checks">
                                                                                        <input class="vbo-select form-checkbox checkbox" type="checkbox" id="edit-views-bulk-operations-3" name="views_bulk_operations[3]" value="71" /><i></i></label>
                                                                                </div>
                                                                            </td>
                                                                            <td class="views-field views-field-title">
                                                                                <a href="/node/71">CryptoBlockCon Las Vegas</a> </td>
                                                                            <td class="views-field views-field-field-event-date">
                                                                                <span class="date-display-range"><span class="date-display-start">Sat, 10/31/2020 - 04:15</span> to <span class="date-display-end">Mon, 11/02/2020 - 04:15</span></span>
                                                                            </td>
                                                                            <td class="views-field views-field-edit-node">
                                                                                <a href="/node/71/edit?destination=afl-admin/manage-events">Edit</a> </td>
                                                                        </tr>
                                                                        <tr class="odd">
                                                                            <td class="views-field views-field-views-bulk-operations">
                                                                                <div class="form-item clearfix form-type-checkbox form-item-views-bulk-operations-4">
                                                                                    <label class="i-checks">
                                                                                        <input class="vbo-select form-checkbox checkbox" type="checkbox" id="edit-views-bulk-operations-4" name="views_bulk_operations[4]" value="70" /><i></i></label>
                                                                                </div>
                                                                            </td>
                                                                            <td class="views-field views-field-title">
                                                                                <a href="/node/70">Blockchain Summit Austria</a> </td>
                                                                            <td class="views-field views-field-field-event-date">
                                                                                <span class="date-display-range"><span class="date-display-start">Fri, 06/26/2020 - 04:00</span> to <span class="date-display-end">Tue, 06/30/2020 - 04:00</span></span>
                                                                            </td>
                                                                            <td class="views-field views-field-edit-node">
                                                                                <a href="/node/70/edit?destination=afl-admin/manage-events">Edit</a> </td>
                                                                        </tr>
                                                                        <tr class="even views-row-last">
                                                                            <td class="views-field views-field-views-bulk-operations">
                                                                                <div class="form-item clearfix form-type-checkbox form-item-views-bulk-operations-5">
                                                                                    <label class="i-checks">
                                                                                        <input class="vbo-select form-checkbox checkbox" type="checkbox" id="edit-views-bulk-operations-5" name="views_bulk_operations[5]" value="69" /><i></i></label>
                                                                                </div>
                                                                            </td>
                                                                            <td class="views-field views-field-title">
                                                                                <a href="/node/69">BlockHealth Summit</a> </td>
                                                                            <td class="views-field views-field-field-event-date">
                                                                                <span class="date-display-range"><span class="date-display-start">Mon, 04/01/2019 - 04:00</span> to <span class="date-display-end">Wed, 04/03/2019 - 04:00</span></span>
                                                                            </td>
                                                                            <td class="views-field views-field-edit-node">
                                                                                <a href="/node/69/edit?destination=afl-admin/manage-events">Edit</a> </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
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
@include('admin.layouts.footer')