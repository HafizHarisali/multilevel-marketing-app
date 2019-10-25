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
                            <h1 class="m-n h3">
                                Edit Wall Image profile for {{Session::get('username')}}
                            </h1>
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

                                    <form class="node-form node-cover-form" enctype="multipart/form-data" action="{{route('update_cover_image',$data->id)}}" method="post" id="promotional-banners-node-form" accept-charset="UTF-8">
                                        @csrf
                                        <div>
                                            <div class="field-type-image field-name-field-banner-image field-widget-image-image form-wrapper" id="edit-field-cover-image">
                                                <div id="edit-field-banner-image-und-0-ajax-wrapper">
                                                    <div class="form-item clearfix form-type-managed-file form-item-field-cover-image-und-0 form-group" data-toggle="tooltip" title="" data-original-title="Files must be less than 1 GB.Allowed file types: png gif jpg jpeg.">
                                                        <label for="edit-field-banner-image-und-0-upload">Wall Image </label>
                                                        <input type="file" name="cover_image" class="form-file" id="imgInp">
                                                        <div class="image-widget form-managed-file clearfix">
                                                            <div class="image-preview">
                                                                <img id="cover-image-edit" src="{{asset('public/assets/images/users/covers')}}/{{$data->cover}}" width="100" height="100" alt="">
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