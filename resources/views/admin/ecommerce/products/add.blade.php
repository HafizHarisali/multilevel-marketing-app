<div id="content" class="app-content" role="main">
    <div class="app-content-body ">
        <div class="hbox hbox-auto-xs hbox-auto-sm">

            <div class="col">
                <!-- main header -->
                <div class="bg-light lter b-b wrapper-md">
                    <div class="row">
                        <div class="col-sm-12 col-xs-12">
                            <h1 class="m-n h3">Create Generic Product</h1>
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

                                    <form enctype="multipart/form-data" action="/admin/commerce/products/add/product?destination=afl/manage-products" method="post" id="commerce-product-ui-product-form" accept-charset="UTF-8">
                                        <div class="from-panel">
                                            <div class="form-item clearfix form-type-textfield form-item-sku form-group" data-toggle="tooltip" title="" data-original-title="Supply a unique identifier for this product using letters, numbers, hyphens, and underscores. Commas may not be used.">
                                                <label for="edit-sku">Product SKU <span class="form-required" title="This field is required.">*</span></label>
                                                <input type="text" id="edit-sku" name="sku" value="" size="60" maxlength="128" class="form-text form-control input-lg-3 required">
                                            </div>
                                            <div class="form-item clearfix form-type-textfield form-item-title form-group">
                                                <label for="edit-title">Title <span class="form-required" title="This field is required.">*</span></label>
                                                <input type="text" id="edit-title" name="title" value="" size="60" maxlength="255" class="form-text form-control input-lg-3 required">
                                            </div>
                                            <div class="field-type-commerce-price field-name-commerce-price field-widget-commerce-price-full form-wrapper" id="edit-commerce-price">
                                                <div id="commerce-price-add-more-wrapper">
                                                    <div class="commerce-price-full">
                                                        <div class="form-item clearfix form-type-textfield form-item-commerce-price-und-0-amount form-group">
                                                            <label for="edit-commerce-price-und-0-amount">Price <span class="form-required" title="This field is required.">*</span></label>
                                                            <input type="text" id="edit-commerce-price-und-0-amount" name="commerce_price[und][0][amount]" value="" size="10" maxlength="128" class="form-text form-control input-lg-3 required">
                                                        </div>
                                                        <div class="form-item clearfix form-type-select form-item-commerce-price-und-0-currency-code form-group">
                                                            <select id="edit-commerce-price-und-0-currency-code" name="commerce_price[und][0][currency_code]" class="form-select form-control">
                                                                <option value="AED">AED</option>
                                                                <option value="CAD">CAD</option>
                                                                <option value="EUR">EUR</option>
                                                                <option value="GBP">GBP</option>
                                                                <option value="INR">INR</option>
                                                                <option value="SGD">SGD</option>
                                                                <option value="USD" selected="selected">USD</option>
                                                                <option value="ZMK">ZMK</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <input type="hidden" name="form_build_id" value="form-eNKYUn7OSD7adf1sK9BMZb8FNMcC9_9267RqtBN2Tsw">
                                            <input type="hidden" name="form_token" value="86viI0pkmc0UYnfS3p5ImajPJO9DpD6skaR4xxMCF2w">
                                            <input type="hidden" name="form_id" value="commerce_product_ui_product_form">
                                            <div class="form-item clearfix form-type-radios form-item-status form-group" data-toggle="tooltip" title="" data-original-title="Disabled products cannot be added to shopping carts and may be hidden in administrative product lists.">
                                                <label for="edit-status">Status <span class="form-required" title="This field is required.">*</span></label>
                                                <div id="edit-status" class="form-radios">
                                                    <div class="form-item clearfix form-type-radio form-item-status radio">
                                                        <label class="i-checks">
                                                            <input type="radio" id="edit-status-1" name="status" value="1" checked="checked" class="form-radio radio"><i></i></label>
                                                        <label class="option" for="edit-status-1">Active </label>

                                                    </div>
                                                    <div class="form-item clearfix form-type-radio form-item-status radio">
                                                        <label class="i-checks">
                                                            <input type="radio" id="edit-status-0" name="status" value="0" class="form-radio radio"><i></i></label>
                                                        <label class="option" for="edit-status-0">Disabled </label>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="field-type-imagefield-crop field-name-field-product-image field-widget-imagefield-crop-widget form-wrapper" id="edit-field-product-image">
                                                <div id="edit-field-product-image-und-0-ajax-wrapper">
                                                    <div class="form-item clearfix form-type-managed-file form-item-field-product-image-und-0 form-group" data-toggle="tooltip" title="" data-original-title="Click on the image and drag to mark how the image will be croppedFiles must be less than 1 MB.Allowed file types: png gif jpg jpeg.Images must be between 200x200 and 900x900 pixels.">
                                                        <label for="edit-field-product-image-und-0-upload">product_image </label>
                                                        <div class="imagefield-crop-widget form-managed-file clearfix">
                                                            <input type="file" id="edit-field-product-image-und-0-upload" name="files[field_product_image_und_0]" size="22" class="form-file">
                                                            <input type="submit" id="edit-field-product-image-und-0-upload-button" name="field_product_image_und_0_upload_button" value="Upload" class="form-submit btn btn-default btn-primary ajax-processed">
                                                            <input type="hidden" name="field_product_image[und][0][fid]" value="0">
                                                            <input type="hidden" name="field_product_image[und][0][display]" value="1">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="field-type-text field-name-field-afl-points field-widget-text-textfield form-wrapper" id="edit-field-afl-points">
                                                <div id="field-afl-points-add-more-wrapper">
                                                    <div class="form-item clearfix form-type-textfield form-item-field-afl-points-und-0-value form-group">
                                                        <label for="edit-field-afl-points-und-0-value">Qualifying Volume </label>
                                                        <input class="text-full form-text form-control input-lg-3" type="text" id="edit-field-afl-points-und-0-value" name="field_afl_points[und][0][value]" value="0" size="60" maxlength="255">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="field-type-entityreference field-name-field-product-category field-widget-entityreference-autocomplete-tags form-wrapper" id="edit-field-product-category">
                                                <div class="form-item form-autocomplete clearfix form-type-textfield form-item-field-product-category-und form-group" role="application">
                                                    <label for="edit-field-product-category-und">Product Category <span class="form-required" title="This field is required.">*</span></label>
                                                    <input type="text" id="edit-field-product-category-und" name="field_product_category[und]" value="" size="60" maxlength="1024" class="form-text form-control input-lg-3 required form-autocomplete" autocomplete="OFF" aria-autocomplete="list"><span class="icon glyphicon glyphicon-refresh form-control-feedback" aria-hidden="true"></span>
                                                    <input type="hidden" id="edit-field-product-category-und-autocomplete" value="https://unilevel.epixelmlmsoftware.com/entityreference/autocomplete/tags/field_product_category/commerce_product/product/NULL" disabled="disabled" class="autocomplete autocomplete-processed">
                                                    <span class="element-invisible" aria-live="assertive" id="edit-field-product-category-und-autocomplete-aria-live"></span></div>
                                            </div>
                                            <div class="field-type-text field-name-field-afl-prod-merchant-id field-widget-text-textfield form-wrapper" id="edit-field-afl-prod-merchant-id">
                                                <div id="field-afl-prod-merchant-id-add-more-wrapper">
                                                    <div class="form-item clearfix form-type-textfield form-item-field-afl-prod-merchant-id-und-0-value form-group">
                                                        <label for="edit-field-afl-prod-merchant-id-und-0-value">Merchant Id </label>
                                                        <input class="text-full form-text form-control input-lg-3" type="text" id="edit-field-afl-prod-merchant-id-und-0-value" name="field_afl_prod_merchant_id[und][0][value]" value="0" size="60" maxlength="255">
                                                    </div>
                                                </div>
                                            </div>
                                            <fieldset class="collapsible collapsed form-wrapper collapse-processed" id="edit-change-history">
                                                <legend><span class="fieldset-legend"><a class="fieldset-title" href="#"><span class="fieldset-legend-prefix element-invisible">Show</span> Change history</a><span class="summary"></span></span>
                                                </legend>
                                                <div class="fieldset-wrapper">
                                                    <div class="form-item clearfix form-type-textarea form-item-log form-group" data-toggle="tooltip" title="" data-original-title="Provide an explanation of the changes you are making. This will provide a meaningful history of changes to this product.">
                                                        <label for="edit-log">Creation log message </label>
                                                        <div class="form-textarea-wrapper resizable textarea-processed resizable-textarea">
                                                            <textarea id="edit-log" name="log" cols="60" rows="4" class="form-textarea form-control"></textarea>
                                                            <div class="grippie"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </fieldset>
                                            <div class="form-actions form-wrapper" id="edit-actions">
                                                <input type="submit" id="edit-submit" name="op" value="Save product" class="form-submit btn btn-default btn-primary">
                                                <input type="submit" id="edit-save-continue" name="op" value="Save and add another" class="form-submit btn btn-default btn-primary"><a href="/admin/commerce/products">Cancel</a></div>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.block -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- / main content -->
            </div>

        </div>
    </div>

</div>