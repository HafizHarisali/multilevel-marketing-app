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
                            <h1 class="m-n h3">System Configurations</h1>
                        </div>
                        <!-- sreeram -->
                    </div>
                </div>
                <!-- / main header -->
                <!-- main content -->
                <div class="wrapper-md ">
                    <!-- content -->
                    <div class="row">
                        <div class="col-md-12">
                           @include('admin.layouts.packages-compensation-nav')
                            <div class="region region-content">
                                <div id="block-system-main" class="block block-system clearfix">
                                    <form action="{{route('system_config_update')}}" method="post" id="afl-genealogy-config" accept-charset="UTF-8" enctype="multipart/form-data">
                                        @csrf
                                        <div class="from-panel">
                                            <div class="form-item clearfix form-type-select form-item-afl-unilevel-downline-depth form-group">
                                                <label for="edit-afl-unilevel-downline-depth">Website Name <span class="form-required" title="This field is required.">*</span></label>
                                                <input type="text" name="site_name_update" value="{{$row->site_name}}" class="form-select form-control">
                                            </div>
                                            <div class="form-item clearfix form-type-select form-item-afl-unilevel-downline-depth form-group">
                                                <label for="edit-afl-unilevel-downline-depth">Website Logo <span class="form-required" title="This field is required.">*</span></label>
                                            <input type="file" name="site_logo_update" class="form-file" id="imgInp">
                                            <div class="image-widget form-managed-file clearfix">
                                                <div class="image-preview">
                                                    <img id="cover-image-edit" src="{{asset('public/assets/images/settings/logo')}}/{{$row->site_logo}}" width="100" height="100" alt="">
                                                </div>
                                            </div>
                                            </div>
                                            <div class="form-item clearfix form-type-select form-item-afl-unilevel-downline-depth form-group">
                                                <label for="edit-afl-unilevel-downline-depth">Text Logo <span class="form-required" title="This field is required.">*</span></label>
                                                <input type="text" name="logo_text" value="{{$row->logo_text}}"class="form-select form-control">
                                            </div>
                                            <input type="submit" id="edit-submit" name="op" value="Save configuration" class="form-submit btn btn-default btn-primary">
                                        </div>
                                    </form>
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

@include('admin.layouts.footer')