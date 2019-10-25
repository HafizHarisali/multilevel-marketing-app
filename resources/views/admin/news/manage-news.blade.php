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

                                    <div class="view view-manage-events view-id-manage_events view-display-id-page_1 view-dom-id-990e3357783dca8cb829e90b731e45c2">
                                        <div class="view-header">
                                            <div class="m-b-md"><a class="btn btn-primary" href="/node/add/news">Create News</a></div>
                                        </div>

                                        <div class="view-filters">
                                            <form action="/afl-admin/manage-news" method="get" id="views-exposed-form-manage-events-page-1" accept-charset="UTF-8">
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
                                                <form action="/afl-admin/manage-news" method="post" id="views-form-manage-events-page-1" accept-charset="UTF-8">
                                                    <div class="from-panel">
                                                        <fieldset class="container-inline form-wrapper" id="edit-select">
                                                            <legend><span class="fieldset-legend">Operations</span></legend>
                                                            <div class="fieldset-wrapper">
                                                                <input type="submit" id="edit-actionviews-bulk-operations-delete-item" name="op" value="Delete News" class="form-submit btn btn-default btn-primary" />
                                                                <input type="submit" id="edit-actionnode-unpublish-action" name="op" value="Unpublish News" class="form-submit btn btn-default btn-primary" />
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
                                                                            <th class="views-field views-field-created">
                                                                                Post date </th>
                                                                            <th class="views-field views-field-edit-node">
                                                                                Edit </th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr class="odd views-row-first">
                                                                            <td class="views-field views-field-views-bulk-operations">
                                                                                <div class="form-item clearfix form-type-checkbox form-item-views-bulk-operations-0">
                                                                                    <label class="i-checks">
                                                                                        <input class="vbo-select form-checkbox checkbox" type="checkbox" id="edit-views-bulk-operations-0" name="views_bulk_operations[0]" value="87" /><i></i></label>
                                                                                </div>
                                                                            </td>
                                                                            <td class="views-field views-field-title">
                                                                                <a href="/content/samsung-developing-ethereum-based-blockchain-may-issue-own-token">Samsung Developing Ethereum-Based Blockchain, May Issue Own Token</a> </td>
                                                                            <td class="views-field views-field-created">
                                                                                Tue, 04/30/2019 - 10:48 </td>
                                                                            <td class="views-field views-field-edit-node">
                                                                                <a href="/node/87/edit?destination=afl-admin/manage-news">Edit</a> </td>
                                                                        </tr>
                                                                        <tr class="even">
                                                                            <td class="views-field views-field-views-bulk-operations">
                                                                                <div class="form-item clearfix form-type-checkbox form-item-views-bulk-operations-1">
                                                                                    <label class="i-checks">
                                                                                        <input class="vbo-select form-checkbox checkbox" type="checkbox" id="edit-views-bulk-operations-1" name="views_bulk_operations[1]" value="86" /><i></i></label>
                                                                                </div>
                                                                            </td>
                                                                            <td class="views-field views-field-title">
                                                                                <a href="/content/good-time-buy-bitcoin-again-new-report-suggests">A Good Time To Buy Bitcoin Again, New Report Suggests</a> </td>
                                                                            <td class="views-field views-field-created">
                                                                                Tue, 04/30/2019 - 10:47 </td>
                                                                            <td class="views-field views-field-edit-node">
                                                                                <a href="/node/86/edit?destination=afl-admin/manage-news">Edit</a> </td>
                                                                        </tr>
                                                                        <tr class="odd views-row-last">
                                                                            <td class="views-field views-field-views-bulk-operations">
                                                                                <div class="form-item clearfix form-type-checkbox form-item-views-bulk-operations-2">
                                                                                    <label class="i-checks">
                                                                                        <input class="vbo-select form-checkbox checkbox" type="checkbox" id="edit-views-bulk-operations-2" name="views_bulk_operations[2]" value="85" /><i></i></label>
                                                                                </div>
                                                                            </td>
                                                                            <td class="views-field views-field-title">
                                                                                <a href="/content/investment-firm-bitcoin-might-already-be-better-gold-here%E2%80%99s-why">Investment Firm: Bitcoin Might Already Be Better Than Gold, Here’s Why</a> </td>
                                                                            <td class="views-field views-field-created">
                                                                                Tue, 04/30/2019 - 10:46 </td>
                                                                            <td class="views-field views-field-edit-node">
                                                                                <a href="/node/85/edit?destination=afl-admin/manage-news">Edit</a> </td>
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