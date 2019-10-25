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
                            <h1 class="m-n h3">Manage Enrollment Packages</h1>
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

                                    <div class="view view-manage-enrollment-packages view-id-manage_enrollment_packages view-display-id-page view-dom-id-ee2cd28cd0b605f66a21119f9942c946">
                                        <div class="view-header">
                                            <p>
                                                <a href="{{route('add_package')}}" title="Add New Category">
                                                    <button class="btn m-b-xs btn-sm btn-primary btn-addon"><i class="fa fa-plus"></i>Add New Enrollment Package</button>
                                                </a>
                                            </p>
                                        </div>

                                        <div class="view-filters">
                                            <form action="{{route('filter_packages')}}" method="get" id="views-exposed-form-manage-enrollment-packages-page" accept-charset="UTF-8">
                                                <div class="from-panel">
                                                    <div class="views-exposed-form form-inline">
                                                        <div class="views-exposed-widgets clearfix">
                                                            <div id="edit-commerce-price-amount-wrapper" class="views-exposed-widget views-widget-filter-commerce_price_amount form-group">
                                                                <label for="edit-commerce-price-amount">
                                                                    Price </label>
                                                                <div class="views-widget">
                                                                    <div class="form-item clearfix form-type-textfield form-item-commerce-price-amount form-group">
                                                                        <input type="text" id="price" name="price" value="" size="30" maxlength="128" class="form-text form-control input-lg-3" />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div id="edit-title-wrapper" class="views-exposed-widget views-widget-filter-title form-group">
                                                                <label for="edit-title">
                                                                    Title </label>
                                                                <div class="views-widget">
                                                                    <div class="form-item clearfix form-type-textfield form-item-title form-group">
                                                                        <input type="text" id="title" name="title" value="" size="30" maxlength="128" class="form-text form-control input-lg-3" />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="views-exposed-widget views-submit-button form-group m-t-22">
                                                                <input type="submit" id="edit-submit-manage-enrollment-packages" name="" value="Search" class="form-submit btn btn-default btn-primary" /> </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>

                                        <div class="view-content">
                                            <div class="panel panel-default">
                                                <div class="table-responsive">
                                                    <table class="views-table cols-4 table">
                                                        <thead>
                                                            <tr>
                                                                <th class="views-field views-field-title">
                                                                    Title </th>
                                                                <th class="views-field views-field-commerce-price">
                                                                    Price </th>
                                                                <th class="views-field views-field-edit-product">
                                                                    Edit </th>
                                                                <th class="views-field views-field-delete-product">
                                                                    Delete </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @if($total_records > 0)
                                                            @foreach($query as $row)
                                                            <tr class="odd views-row-first">
                                                                <td class="views-field views-field-title">
                                                                    {{$row->package}} </td>
                                                                <td class="views-field views-field-commerce-price">
                                                                    {{$row->fees}} </td>
                                                                <td class="views-field views-field-edit-product">
                                                                    <a href="{{route('edit_package',$row->id)}}">edit</a> </td>
                                                                <td class="views-field views-field-delete-product">
                                                                    <a data-href="{{route('delete_package',$row->id)}}" data-toggle="modal" data-target="#deleteModal" data-token="{{csrf_token()}}" class="delete_package">delete</a> </td>
                                                            </tr>
                                                            @endforeach
                                                            @else
                                                            <h3>No Package Available</h3>
                                                            @endif
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
                    <div class="custom-modal">
                        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        </div>
                    </div>
@include('admin.layouts.footer')