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
                            <h1 class="m-n h3">Create Enrollment Packages</h1>
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

                                    <form action="{{route('update_package',$query->id)}}" method="post" id="commerce-product-ui-product-form" accept-charset="UTF-8" enctype="multipart/form-data">
                                        @csrf
                                        <div class="from-panel">
                                            <div class="form-item clearfix form-type-textfield form-item-title form-group">
                                                <label for="edit-title">Title <span class="form-required" title="This field is required.">*</span></label>
                                                <input type="text" id="edit-title" name="title" value="{{$query->package}}" size="60" maxlength="255" class="form-text form-control input-lg-3 required" />
                                            </div>
                                            <div class="field-type-commerce-price field-name-commerce-price field-widget-commerce-price-full form-wrapper" id="edit-commerce-price">
                                                <div id="commerce-price-add-more-wrapper">
                                                    <div class="form-item clearfix form-type-textfield form-item-commerce-price-und-0-amount form-group">
                                                        <label for="edit-commerce-price-und-0-amount">Price <span class="form-required" title="This field is required.">*</span></label>
                                                        <input type="text" id="edit-commerce-price-und-0-amount" name="price" value="{{$query->fees}}" size="10" maxlength="128" class="form-text form-control input-lg-3 required" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="field-type-image field-name-field-banner-image field-widget-image-image form-wrapper" id="edit-field-banner-image">
                                                <div id="edit-field-banner-image-und-0-ajax-wrapper">
                                                    <div class="form-item clearfix form-type-managed-file form-item-field-banner-image-und-0 form-group" data-toggle="tooltip" title="" data-original-title="Upload Package Bagde">
                                                        <label for="edit-field-banner-image-und-0-upload">Package Bagde </label>
                                                        <input type="file" name="badge" class="form-file" id="imgInp">
                                                        <div class="image-widget form-managed-file clearfix">
                                                            <div class="image-preview">
                                                                <img id="banner-image-edit" src="{{asset('public/assets/images/badges')}}/{{$query->badge}}" width="100" height="100" alt="{{$query->badge}}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-item clearfix form-type-radios form-item-status form-group" data-toggle="tooltip" title="Disabled products cannot be added to shopping carts and may be hidden in administrative product lists.">
                                                <label for="edit-status">Status <span class="form-required" title="This field is required.">*</span></label>
                                                <div id="edit-status" class="form-radios">
                                                    <div class="form-item clearfix form-type-radio form-item-status radio">
                                                        <label class="i-checks">
                                                            <input type="radio" id="edit-status-1" name="status" value="0" @if($query->status == 0) checked="checked" @endif class="form-radio radio" /><i></i></label>
                                                        <label class="option" for="edit-status-1">Active </label>

                                                    </div>
                                                    <div class="form-item clearfix form-type-radio form-item-status radio">
                                                        <label class="i-checks">
                                                            <input type="radio" id="edit-status-0" name="status" value="1" @if($query->status == 1) checked="checked" @endif class="form-radio radio" /><i></i></label>
                                                        <label class="option" for="edit-status-0">Disabled </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-actions form-wrapper" id="edit-actions">
                                                <input type="submit" id="edit-submit" name="op" value="Save Package" class="form-submit btn btn-default btn-primary" /><a href="">Cancel</a></div>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.block -->
                            </div>
                        </div>
                    </div>
@include('admin.layouts.footer')