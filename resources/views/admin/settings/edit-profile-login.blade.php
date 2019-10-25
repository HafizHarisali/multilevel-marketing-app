@include("admin.layouts.header")
@include("admin.layouts.aside")
<div id="content" class="app-content" role="main">
    <div class="app-content-body ">
        <div class="hbox hbox-auto-xs hbox-auto-sm">

            <div class="col">
                <!-- main header -->
                <div class="bg-white b-b wrapper-md">
                    <div class="row">
                        <div class="col-sm-12 col-xs-12">
                            <h1 class="m-n h3">Profile Authorization</h1>
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

                                    <form action="{{route('validate_profile_credentials')}}" method="post" id="afl-transaction-authorization-form" accept-charset="UTF-8" siq_id="autopick_8722">
                                        @csrf
                                        <div class="from-panel">
                                            <div id="checkboxes-div">
                                                <fieldset class="form-wrapper" id="edit-transaction-authorization-form">
                                                    <legend><span class="fieldset-legend">Login to See Profile </span></legend>
                                                    <div class="fieldset-wrapper">
                                                        <div class="form-item clearfix form-type-password form-item-new-password form-group">
                                                            <label for="edit-new-password">Username </label>
                                                            <input type="text" id="edit-new-password" name="username" size="10" maxlength="128" class="form-text form-control" value="{{Session::get('username')}}" readonly="">
                                                        </div>
                                                        <div class="form-item clearfix form-type-password form-item-confirm-password form-group">
                                                            <label for="edit-confirm-password"> Transaction Pin </label>
                                                            <input type="password" id="edit-confirm-password" name="password" size="10" maxlength="128" class="form-text form-control">
                                                        </div>
                                                    </div>
                                                </fieldset>
                                            </div>
                                            <input type="submit" id="edit-submit" name="op" value="Save Configurations" class="form-submit btn btn-default btn-primary">
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
@include("admin.layouts.footer")