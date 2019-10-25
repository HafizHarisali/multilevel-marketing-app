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
                            <h1 class="m-n h3">Create Promotional Banners</h1>
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

                                    <form class="node-form node-promotional_banners-form" enctype="multipart/form-data" action="{{route('banners_insert')}}" method="post" id="promotional-banners-node-form" accept-charset="UTF-8">
                                        @csrf
                                        <div>
                                            <div class="form-item clearfix form-type-textfield form-item-title form-group">
                                                <label for="edit-title">Title <span class="form-required" title="This field is required.">*</span></label>
                                                <input type="text" id="edit-title" name="title" value="{{old('title')}}" @if($errors->has('title')) autofocus @endif size="60" maxlength="255" class="form-text form-control input-lg-3 required">
                                            </div>
                                            <div class="field-type-taxonomy-term-reference field-name-field-banner-style field-widget-options-select form-wrapper" id="edit-field-banner-style">
                                                <div class="form-item clearfix form-type-select form-item-field-banner-style-und form-group">
                                                    <label for="edit-field-banner-style-und">Banner Style </label>
                                                    <select id="edit-field-banner-style-und" name="banner_size" class="form-select form-control">
                                                        <option value="_none">- None -</option>
                                                        <option value="125x125" {{old('banner_size') == '125x125' ? 'selected':''}}>Banner 125x125</option>
                                                        <option value="160x600" {{old('banner_size') == '160x600' ? 'selected':''}>Banner 160x600</option>
                                                        <option value="300x250" {{old('banner_size') == '300x250' ? 'selected':''}>Banner 300x250</option>
                                                        <option value="468x60" {{old('banner_size') == '468x60' ? 'selected':''}>Banner 468x60</option>
                                                        <option value="728x90" {{old('banner_size') == '728x90' ? 'selected':''}>Banner 728x90</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="field-type-image field-name-field-banner-image field-widget-image-image form-wrapper" id="edit-field-banner-image">
                                                <div id="edit-field-banner-image-und-0-ajax-wrapper">
                                                    <div class="form-item clearfix form-type-managed-file form-item-field-banner-image-und-0 form-group" data-toggle="tooltip" title="" data-original-title="Files must be less than 5 MB.Allowed file types: png gif jpg jpeg.">
                                                        @csrf
                                                        <label for="edit-field-banner-image-und-0-upload">Banner Image </label>
                                                        <input type="file" name="banner_image" class="form-file" id="imgInp">
                                                        <div class="image-widget form-managed-file clearfix">
                                                            <div class="image-preview">
                                                                <img id="banner-image-edit" src="" width="100" height="100" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-actions form-wrapper" id="edit-actions">
                                                <input type="submit" id="edit-submit" name="op" value="Save" class="form-submit btn btn-default btn-primary">
                                            </div>
                                        </div>
                                    </form>
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