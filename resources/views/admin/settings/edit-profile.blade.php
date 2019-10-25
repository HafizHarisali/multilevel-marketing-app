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
                            <h1 class="m-n h3">{{$data->name}}</h1>
                        </div>
                        <!-- sreeram -->

                    </div>
                </div>
                <!-- / main header -->

                <!-- main content -->
                <div class="wrapper-md user-profile-wrapper">
                    <!--Dashboard-thankyou-section-open -->

                    <!--Dashboard-thankyou-section-close -->
                    <!-- / stats -->

                    <!-- content -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="region region-content">
                                <div id="block-system-main" class="block block-system clearfix">

                                    <form class="form-horizontal" enctype="multipart/form-data" action="{{route('update_profile',Session::get('id'))}}" method="post" id="user-profile-form" accept-charset="UTF-8">
                                        @csrf
                                        <div class="from-panel">
                                            <div class="field-type-text field-name-field-afl-first-name field-widget-text-textfield form-wrapper" id="edit-field-afl-first-name">
                                                <div id="field-afl-first-name-add-more-wrapper">
                                                    <div class="form-item form-type-textfield form-item-field-afl-first-name-und-0-value form-group" data-toggle="tooltip" title="Please provide your first name.">
                                                        <label for="edit-field-afl-first-name-und-0-value" class="col-lg-2">First Name </label>
                                                        <div class="col-lg-10">
                                                            <input class="text-full form-text form-control input-lg-3" type="text" id="edit-field-afl-first-name-und-0-value" name="first_name" value="{{$data->first_name}}" size="60" maxlength="255" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="field-type-text field-name-field-afl-surname field-widget-text-textfield form-wrapper" id="edit-field-afl-surname">
                                                <div id="field-afl-surname-add-more-wrapper">
                                                    <div class="form-item form-type-textfield form-item-field-afl-surname-und-0-value form-group" data-toggle="tooltip" title="Please provide your surname">
                                                        <label for="edit-field-afl-surname-und-0-value" class="col-lg-2">Surname </label>
                                                        <div class="col-lg-10">
                                                            <input class="text-full form-text form-control input-lg-3" type="text" id="edit-field-afl-surname-und-0-value" name="sur_name" value="{{$data->sur_name}}" size="60" maxlength="255" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="edit-account" class="form-wrapper">
                                                <!-- <div class="form-item form-type-textfield form-item-name form-group" data-toggle="tooltip" title="Spaces are allowed; punctuation is not allowed except for periods, hyphens, apostrophes, and underscores.">
                                                    <label for="edit-name" class="col-lg-2">Username <span class="form-required" title="This field is required.">*</span></label>
                                                    <div class="col-lg-10">
                                                        <input class="username form-text form-control input-lg-3 required" type="text" id="edit-name" name="username" value="{{$data->name}}" size="60" maxlength="60" />
                                                    </div>
                                                </div> -->
                                                <div class="form-item form-type-password form-item-current-pass form-group" data-toggle="tooltip" title="Enter your current password to change the E-mail address or Password. Request new password.">
                                                    <label for="edit-current-pass" class="col-lg-2">Current password </label>
                                                    <div class="col-lg-10">
                                                        <input autocomplete="off" type="password" id="edit-current-pass" name="current_password" size="25" maxlength="128" class="form-text form-control" />
                                                    </div>
                                                </div>
                                                <div class="form-item form-type-textfield form-item-mail form-group" data-toggle="tooltip" title="A valid e-mail address. All e-mails from the system will be sent to this address. The e-mail address is not made public and will only be used if you wish to receive a new password or wish to receive certain news or notifications by e-mail.">
                                                    <label for="edit-mail--2" class="col-lg-2">E-mail address <span class="form-required" title="This field is required.">*</span></label>
                                                    <div class="col-lg-10">
                                                        <input type="text" id="edit-mail--2" name="email" value="{{$data->email}}" size="60" maxlength="254" class="form-text form-control input-lg-3 required" />
                                                    </div>
                                                </div>
                                                <div class="form-item form-type-password-confirm form-item-pass form-group" data-toggle="tooltip" title="To change the current user password, enter the new password in both fields.">
                                                    <div class="form-item form-type-password form-item-pass-pass1 form-group">
                                                        <label for="edit-pass-pass1" class="col-lg-2">Password </label>
                                                        <div class="col-lg-10">
                                                            <input class="password-field form-text form-control" type="password" id="edit-pass-pass1" name="new_password" size="25" maxlength="128" />
                                                        </div>
                                                    </div>
                                                    <div class="form-item form-type-password form-item-pass-pass2 form-group">
                                                        <label for="edit-pass-pass2" class="col-lg-2">Confirm password </label>
                                                        <div class="col-lg-10">
                                                            <input class="password-confirm form-text form-control" type="password" id="edit-pass-pass2" name="confirm_password" size="25" maxlength="128" />
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="form-item form-type-radios form-item-status form-group">
                                                    <label for="edit-status" class="col-lg-2">Status </label>
                                                    <div class="col-lg-10">
                                                        <div id="edit-status" class="form-radios">
                                                            <div class="form-item form-type-radio form-item-status radio">
                                                                <label class="i-checks">
                                                                    <input type="radio" id="edit-status-0" @if($data->status == 1) checked="checked" @endif name="status" value="1" class="form-radio radio" /><i></i></label>
                                                                <label class="option" for="edit-status-0">Blocked </label>

                                                            </div>
                                                            <div class="form-item form-type-radio form-item-status radio">
                                                                <label class="i-checks">
                                                                    <input type="radio" id="edit-status-1" @if($data->status == 0) checked="checked" @endif name="status" value="0" class="form-radio radio" /><i></i></label>
                                                                <label class="option" for="edit-status-1">Active </label>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="field-type-text field-name-field-mobile-number field-widget-text-textfield form-wrapper" id="edit-field-mobile-number">
                                                <div id="field-mobile-number-add-more-wrapper">
                                                    <div class="form-item form-type-textfield form-item-field-mobile-number-und-0-value form-group">
                                                        <label for="edit-field-mobile-number-und-0-value" class="col-lg-2">Mobile Number <span class="form-required" title="This field is required.">*</span></label>
                                                        <div class="col-lg-10">
                                                            <input class="text-full form-text form-control input-lg-3 required" type="text" id="edit-field-mobile-number-und-0-value" name="contact" value="{{$data->contact}}" size="60" maxlength="255" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-actions form-wrapper" id="edit-actions">
                                                <input type="submit" id="edit-submit" name="op" value="Save" class="form-submit btn btn-default btn-primary" />
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.block -->
                            </div>
                        </div>
                    </div>
@include('admin.layouts.footer')