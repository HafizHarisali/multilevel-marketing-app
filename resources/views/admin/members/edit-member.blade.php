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
                        <h1 class="m-n h3">{{$query->first_name}} {{$query->sur_name}}</h1>
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

                                <form class="form-horizontal" enctype="multipart/form-data" action="{{route('update_member',$query->id)}}" method="post" id="user-profile-form" accept-charset="UTF-8">
                                    @csrf
                                    <div class="from-panel">
                                        <div class="field-type-text field-name-field-afl-first-name field-widget-text-textfield form-wrapper" id="edit-field-afl-first-name">
                                            <div id="field-afl-first-name-add-more-wrapper">
                                                <div class="form-item form-type-textfield form-item-field-afl-first-name-und-0-value form-group" data-toggle="tooltip" title="" data-original-title="Please provide your first name.">
                                                    <label for="edit-field-afl-first-name-und-0-value" class="col-lg-2">First Name * </label>
                                                    <div class="col-lg-10">
                                                        <input class="text-full form-text form-control input-lg-3" type="text" id="first_name" name="first_name" value="{{$query->first_name}}" size="60" maxlength="255">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="field-type-text field-name-field-afl-surname field-widget-text-textfield form-wrapper" id="edit-field-afl-surname">
                                            <div id="field-afl-surname-add-more-wrapper">
                                                <div class="form-item form-type-textfield form-item-field-afl-surname-und-0-value form-group" data-toggle="tooltip" title="" data-original-title="Please provide your surname">
                                                    <label for="edit-field-afl-surname-und-0-value" class="col-lg-2">Surname * </label>
                                                    <div class="col-lg-10">
                                                        <input class="text-full form-text form-control input-lg-3" type="text" id="sur_name" name="sur_name" value="{{$query->sur_name}}" size="60" maxlength="255">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="field-type-text field-name-field-afl-surname field-widget-text-textfield form-wrapper" id="edit-field-afl-surname">
                                            <div id="field-afl-surname-add-more-wrapper">
                                                <div class="form-item form-type-textfield form-item-field-afl-surname-und-0-value form-group" data-toggle="tooltip" title="" data-original-title="Please provide your surname">
                                                    <label for="edit-field-afl-surname-und-0-value" class="col-lg-2">Username *</label>
                                                    <div class="col-lg-10">
                                                        <input class="text-full form-text form-control input-lg-3" type="text" id="sur_name" name="name" value="{{$query->name}}" size="60" maxlength="255">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="field-type-text field-name-field-afl-surname field-widget-text-textfield form-wrapper" id="edit-field-afl-surname">
                                            <div id="field-afl-surname-add-more-wrapper">
                                                <div class="form-item form-type-textfield form-item-field-afl-surname-und-0-value form-group" data-toggle="tooltip" title="" data-original-title="Please provide your surname">
                                                    <label for="edit-field-afl-surname-und-0-value" class="col-lg-2">Country *</label>
                                                    <div class="col-lg-10">
                                                        <select id="edit-field-country-und" name="country_id" class="form-select form-control required">
                                                            <option value="">Select Country</option>
                                                            @foreach($countries as $row)
                                                            <option @if($query->country_id == $row->id) selected="" @endif value="{{$row->id}}" >{{$row->country_name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="field-type-text field-name-field-afl-surname field-widget-text-textfield form-wrapper" id="edit-field-afl-surname">
                                            <div id="field-afl-surname-add-more-wrapper">
                                                <div class="form-item form-type-textfield form-item-field-afl-surname-und-0-value form-group" data-toggle="tooltip" title="" data-original-title="Please provide your surname">
                                                    <label for="edit-field-afl-surname-und-0-value" class="col-lg-2">City </label>
                                                    <div class="col-lg-10">
                                                        <input class="text-full form-text form-control input-lg-3" type="text" id="city" name="city" value="{{$query->city}}" size="60" maxlength="255">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="field-type-text field-name-field-afl-surname field-widget-text-textfield form-wrapper" id="edit-field-afl-surname">
                                            <div id="field-afl-surname-add-more-wrapper">
                                                <div class="form-item form-type-textfield form-item-field-afl-surname-und-0-value form-group" data-toggle="tooltip" title="" data-original-title="Please provide your surname">
                                                    <label for="edit-field-afl-surname-und-0-value" class="col-lg-2">Address </label>
                                                    <div class="col-lg-10">
                                                        <input class="text-full form-text form-control input-lg-3" type="text" id="address" name="address" value="{{$query->address}}" size="60" maxlength="255">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="field-type-text field-name-field-afl-surname field-widget-text-textfield form-wrapper" id="edit-field-afl-surname">
                                            <div id="field-afl-surname-add-more-wrapper">
                                                <div class="form-item form-type-textfield form-item-field-afl-surname-und-0-value form-group" data-toggle="tooltip" title="" data-original-title="Please provide your surname">
                                                    <label for="edit-field-afl-surname-und-0-value" class="col-lg-2">Postal code </label>
                                                    <div class="col-lg-10">
                                                        <input class="text-full form-text form-control input-lg-3" type="text" id="city" name="postal_code" value="{{$query->postal_code}}" size="60" maxlength="255">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="field-type-text field-name-field-afl-surname field-widget-text-textfield form-wrapper" id="edit-field-afl-surname">
                                            <div id="field-afl-surname-add-more-wrapper">
                                                <div class="form-item form-type-textfield form-item-field-afl-surname-und-0-value form-group" data-toggle="tooltip" title="" data-original-title="Please provide your surname">
                                                    <label for="edit-field-afl-surname-und-0-value" class="col-lg-2">Password </label>
                                                    <div class="col-lg-10">
                                                        <input class="text-full form-text form-control input-lg-3" type="password" id="password" name="password" value="" size="60" maxlength="255">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="field-type-text field-name-field-afl-surname field-widget-text-textfield form-wrapper" id="edit-field-afl-surname">
                                            <div id="field-afl-surname-add-more-wrapper">
                                                <div class="form-item form-type-textfield form-item-field-afl-surname-und-0-value form-group" data-toggle="tooltip" title="" data-original-title="Please provide your surname">
                                                    <label for="edit-field-afl-surname-und-0-value" class="col-lg-2">Contact *</label>
                                                    <div class="col-lg-10">
                                                        <input class="text-full form-text form-control input-lg-3" type="text" id="contact" name="contact" value="{{$query->contact}}" size="60" maxlength="255">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="field-type-text field-name-field-afl-surname field-widget-text-textfield form-wrapper" id="edit-field-afl-surname">
                                            <div id="field-afl-surname-add-more-wrapper">
                                                <div class="form-item form-type-textfield form-item-field-afl-surname-und-0-value form-group" data-toggle="tooltip" title="" data-original-title="Please provide your surname">
                                                    <label for="edit-field-afl-surname-und-0-value" class="col-lg-2">CNIC / Passport *</label>
                                                    <div class="col-lg-10">
                                                        <input class="text-full form-text form-control input-lg-3" type="text" id="cnic" name="cnic" value="{{$query->cnic}}" size="60" maxlength="255">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="edit-account" class="form-wrapper">
                                            <div class="form-item form-type-textfield form-item-mail form-group" data-toggle="tooltip" title="" data-original-title="A valid e-mail address. All e-mails from the system will be sent to this address. The e-mail address is not made public and will only be used if you wish to receive a new password or wish to receive certain news or notifications by e-mail.">
                                                <label for="edit-mail--2" class="col-lg-2">E-mail address <span class="form-required" title="This field is required.">*</span></label>
                                                <div class="col-lg-10">
                                                    <input type="text" id="email" name="email" value="{{$query->email}}" size="60" maxlength="254" class="form-text form-control required">
                                                </div>
                                            </div>
                                            <div class="form-item form-type-radios form-item-status form-group">
                                                <label for="edit-status" class="col-lg-2">Status </label>
                                                <div class="col-lg-10">
                                                    <div id="edit-status" class="form-radios">
                                                        <div class="form-item form-type-radio form-item-status radio">
                                                            <label class="i-checks">
                                                                <input type="radio" @if($query->status == 1) checked="checked" @endif id="edit-status-0" name="status" value="1" class="form-radio radio"><i></i></label>
                                                            <label class="option" for="edit-status-0">Blocked </label>

                                                        </div>
                                                        <div class="form-item form-type-radio form-item-status radio">
                                                            <label class="i-checks">
                                                                <input type="radio" @if($query->status == 0) checked="checked" @endif id="edit-status-1" name="status" value="0" class="form-radio radio"><i></i></label>
                                                            <label class="option" for="edit-status-1">Active </label>

                                                        </div>
                                                        <div class="form-item form-type-radio form-item-status radio">
                                                            <label class="i-checks">
                                                                <input type="radio" @if($query->status == 2) checked="checked" @endif id="edit-status-1" name="status" value="2"  class="form-radio radio"><i></i></label>
                                                            <label class="option" for="edit-status-1">Un verify </label>

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