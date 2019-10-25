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
                                <h1 class="m-n h3">Add New Member</h1>
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
                                <div class="mw-650 mr-auto">
                                    <div class="region region-content">
                                        <div id="block-system-main" class="block block-system clearfix">

                                            <form class="user-info-from-cookie" enctype="multipart/form-data" action="{{route('insert_member')}}" method="post" id="afl-add-new-member" accept-charset="UTF-8">
                                                <div>
                                                    @csrf
                                                    <?php 
                                                        if(!empty(Request::get('parent'))){
                                                            $id = decrypt(Request::get('parent'));
                                                        }
                                                    ?>
                                                    <input type="hidden" name="parent_id" value="<?php if(!empty($id)) { echo $id; }?>">
                                                    <div class="field-type-list-text field-name-field-country field-widget-options-select form-wrapper" id="edit-field-country">
                                                        <div class="form-item clearfix form-type-select form-item-field-country-und form-group">
                                                            <label for="edit-field-country-und">Country <span class="form-required" title="This field is required.">*</span></label>
                                                            <select id="edit-field-country-und" name="country_id" class="form-select form-control required" @if ($errors->has('country_id')) autofocus @endif>
                                                                @if(!empty($total_records > 0))
                                                                <option value="">Select Country</option>
                                                                @foreach($query as $row)
                                                                <option value="{{$row->id}}" {{old('country_id') == $row->id ? 'selected': ''}}>{{$row->country_name}}</option>
                                                                @endforeach
                                                                @else
                                                                <option>No Country Found</option>
                                                                @endif
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="field-type-text field-name-field-afl-first-name field-widget-text-textfield form-wrapper" id="edit-field-afl-first-name">
                                                        <div id="field-afl-first-name-add-more-wrapper">
                                                            <div class="form-item clearfix form-type-textfield form-item-field-afl-first-name-und-0-value form-group" data-toggle="tooltip" title="" data-original-title="Please provide your first name.">
                                                                <label for="first_name">First Name <span class="form-required" title="This field is required.">*</span>
                                                                </label>
                                                                <input class="text-full form-text form-control input-lg-3 required" type="text" id="first_name" name="first_name" value="{{old('first_name')}}" @if ($errors->has('first_name')) autofocus @endif size="60" maxlength="255">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="field-type-text field-name-field-afl-surname field-widget-text-textfield form-wrapper" id="edit-field-afl-surname">
                                                        <div id="field-afl-surname-add-more-wrapper">
                                                            <div class="form-item clearfix form-type-textfield form-item-field-afl-surname-und-0-value form-group" data-toggle="tooltip" title="" data-original-title="Please provide your surname">
                                                                <label for="sur_name">Surname <span class="form-required" title="This field is required.">*</span></label>
                                                                <input class="text-full form-text form-control input-lg-3 required" type="text" id="sur_name" name="sur_name" value="{{old('sur_name')}}" @if ($errors->has('sur_name')) autofocus @endif size="60" maxlength="255">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div id="edit-account" class="form-wrapper">
                                                        <div class="form-item clearfix form-type-textfield form-item-name form-group" data-toggle="tooltip" title="" data-original-title="Alphanumeric characters allowed; Spaces are not allowed; punctuation is not allowed; All letters must be in small caps;">
                                                            <label for="user_name">Username <span class="form-required" title="This field is required.">*</span></label>
                                                            <input class="username form-text form-control input-lg-3 required" type="text" id="user_name" name="name" value="{{old('name')}}" @if ($errors->has('name')) autofocus @endif size="60" maxlength="60">
                                                        </div>
                                                        <div class="form-item clearfix form-type-textfield form-item-mail form-group" data-toggle="tooltip" title="" data-original-title="A valid e-mail address. All e-mails from the system will be sent to this address. The e-mail address is not made public and will only be used if you wish to receive a new password or wish to receive certain news or notifications by e-mail.">
                                                            <label for="email">E-mail address <span class="form-required" ></span></label>
                                                            <input type="text" id="email" name="email" value="{{old('email')}}" size="60" maxlength="254" class="form-text form-control input-lg-3 required" autocomplete="">
                                                        </div>
                                                        <div class="form-item clearfix form-type-textfield form-item-mail form-group" data-toggle="tooltip" title="" data-original-title="Enter Your Cnic or Passport no">
                                                            <label for="email">CNIC / Passport <span class="form-required" title="This field is required.">*</span></label>
                                                            <input type="text" id="cnic" name="cnic" value="{{old('cnic')}}" size="60" maxlength="254" class="form-text form-control input-lg-3 required" autocomplete="" @if ($errors->has('cnic')) autofocus @endif>
                                                        </div>
                                                        <div class="form-item clearfix form-type-password-confirm form-item-pass form-group" data-toggle="tooltip" title="" data-original-title="Provide a password for the new account in both fields.">
                                                            <div class="form-item clearfix form-type-password form-item-pass-pass1 form-group password-parent">
                                                                <label for="password">Password <span class="form-required" title="This field is required.">*</span></label>
                                                                <input class="password-field form-text form-control required password-processed" type="password" id="password" name="password"  @if ($errors->has('password')) autofocus @endif size="25" maxlength="128" autocomplete="">
                                                            </div>
                                                            <div class="form-item clearfix form-type-password form-item-pass-pass2 form-group confirm-parent">
                                                                <label for="confirm_pass">Confirm password <span class="form-required" title="This field is required.">*</span></label>
                                                                <input class="password-confirm form-text form-control required" type="password" id="confirm_pass" name="confirm_pass" @if ($errors->has('confirm_pass')) autofocus @endif size="25" maxlength="128" autocomplete="">
                                                            </div>
                                                            <div class="password-suggestions description" style="display: none;"></div>

                                                        </div>
                                                    </div>
                                                    <div class="field-type-entityreference field-name-field-afl-parent field-widget-entityreference-autocomplete form-wrapper" id="edit-field-afl-parent">
                                                        <div id="field-afl-parent-add-more-wrapper"></div>
                                                    </div>
                                                    <div class="field-type-entityreference field-name-field-afl-sponsor field-widget-entityreference-autocomplete form-wrapper" id="edit-field-afl-sponsor">
                                                        <div id="field-afl-sponsor-add-more-wrapper">
                                                            <!-- <div class="form-item form-autocomplete clearfix form-type-textfield form-item-field-afl-sponsor-und-0-target-id form-disabled form-group" data-toggle="tooltip" title="" role="application" data-original-title="Please select the Sponsor user">
                                                                <label for="sponsor_name">Sponsor <span class="form-required" title="This field is required.">*</span></label>
                                                                <input readonly="readonly" type="text" id="sponsor_name" name="sponsor_name" value="{{Session::get('username')}}" size="60" maxlength="1024" class="form-text form-control input-lg-3 required form-autocomplete" autocomplete="OFF" aria-autocomplete="list"><span class="icon glyphicon glyphicon-refresh form-control-feedback" aria-hidden="true"></span>
                                                             </div> -->
                                                        </div>
                                                    </div>
                                                    <div class="field-type-entityreference field-name-field-afl-sponsor field-widget-entityreference-autocomplete form-wrapper" id="edit-field-afl-sponsor">
                                                        <div id="field-afl-sponsor-add-more-wrapper">
                                                            <div class="form-item form-autocomplete clearfix form-type-textfield form-item-field-afl-sponsor-und-0-target-id form-disabled form-group" data-toggle="tooltip" title="" role="application" data-original-title="Please enter referal username">
                                                                <label for="referal_name">Sponsor <span class="form-required" title="This field is required.">*</span></label>
                                                                <!--<select id="edit-field-users-add" name="referal_user_id" class="form-select form-control" @if ($errors->has('referal_user_id')) autofocus @endif>-->
                                                                <!--    <option value="{{Session::get('username')}}">{{Session::get('username')}}</option>-->
                                                                <!--</select>-->
                                                                 <input readonly="readonly" type="text" id="referal_name" name="referal_user_id" value="{{Session::get('username')}}" size="60" maxlength="1024" class="referal_name form-text form-control input-lg-3 required form-autocomplete" autocomplete="OFF" aria-autocomplete="list"><span class="icon fa fa-refresh form-control-feedback font-icon" aria-hidden="true"></span> 
                                                             </div>
                                                        </div>
                                                    </div>
                                                    <div class="field-type-list-text field-name-field-afl-position field-widget-options-select form-wrapper" id="edit-field-afl-position">
                                                        <div class="form-item clearfix form-type-select form-item-field-afl-position-und form-group" data-toggle="tooltip" title="" data-original-title="Please select the Position">
                                                            <label for="edit-field-afl-position-und">Position <span class="form-required" title="This field is required.">*</span></label>
                                                            @if(!empty(Request::get('position')))
                                                            <input disabled="" type="text" id="position" name="position" value="<?php if(decrypt(Request::get('position')) == 0){ echo "Left";} else{echo "Right";}?>" size="60" maxlength="1024" class="referal_name form-text form-control input-lg-3 required form-autocomplete" autocomplete="OFF" aria-autocomplete="list">
                                                            <input type="hidden" id="position" name="position" value="<?php if(decrypt(Request::get('position')) == 0){ echo "0";} else{echo "1";}?>" size="60" maxlength="1024" class="referal_name form-text form-control input-lg-3 required form-autocomplete" autocomplete="OFF" aria-autocomplete="list">
                                                            @else 
                                                            <select id="edit-field-afl-position-und" name="position" class="form-select form-control required" @if ($errors->has('position')) autofocus @endif>
                                                                <option value="">- None -</option>
                                                                <option value="0" {{old('position') == 0 ? 'selected': ''}}>Left</option>
                                                                <option value="1" {{old('position') == 1 ? 'selected': ''}}>Right</option>
                                                            </select>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="field-type-text field-name-field-mobile-number field-widget-text-textfield form-wrapper" id="edit-field-mobile-number">
                                                        <div id="field-mobile-number-add-more-wrapper">
                                                            <div class="form-item clearfix form-type-textfield form-item-field-mobile-number-und-0-value form-group">
                                                                <label for="phone_number">Mobile Number <span class="form-required" title="This field is required.">*</span></label>
                                                                <input class="text-full form-text form-control input-lg-3 required" type="text" id="phone_number" name="contact" value="{{old('contact')}}" size="60"  @if ($errors->has('contact')) autofocus @endif maxlength="255">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="field-type-text field-name-field-mobile-number field-widget-text-textfield form-wrapper" id="edit-field-mobile-number">
                                                        <div id="field-mobile-number-add-more-wrapper">
                                                            <div class="form-item clearfix form-type-textfield form-item-field-mobile-number-und-0-value form-group">
                                                                <label for="phone_number">Mobile Number Next Of Kin<span class="form-required" title="This field is required.">*</span></label>
                                                                <input class="text-full form-text form-control input-lg-3 required" type="text" id="phone_number_kin" name="contact_kin" value="{{old('contact_kin')}}" @if ($errors->has('contact_kin')) autofocus @endif size="60" maxlength="255">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="field-type-entityreference field-name-field-afl-enrollment-fee field-widget-options-buttons form-wrapper" id="edit-field-afl-enrollment-fee">
                                                        <div class="form-item clearfix form-type-radios form-item-field-afl-enrollment-fee-und form-group" data-toggle="tooltip" title="" data-original-title="Please select the Enrollment Fee">
                                                            <label for="edit-field-afl-enrollment-fee-und">Enrollment Fee <span class="form-required" title="This field is required.">*</span></label>
                                                            <div id="edit-field-afl-enrollment-fee-und" class="form-radios">
                                                                @if(!empty($packages_count > 0))
                                                                @foreach($packages as $row)
                                                                <div class="form-item clearfix form-type-radio form-item-field-afl-enrollment-fee-und radio">
                                                                    <label class="i-checks">
                                                                        <input type="radio" id="enrollment_fee_{{$row->package}}" name="enrollment_fee" value="{{$row->id}}" {{ old('enrollment_fee') == $row->id ? 'checked' : ''}} class="form-radio radio" @if ($errors->has('enrollment_fee')) autofocus @endif ><i></i></label>
                                                                    <label class="option" for="enrollment_fee_{{$row->package}}"> <span class="views-field views-field-title"> <span class="field-content">{{$row->package}}</span> </span> - <span class="views-field views-field-commerce-price-1"> <span class="field-content">${{$row->fees}}</span> </span>
                                                                    </label>
                                                                </div>
                                                                @endforeach
                                                                @else
                                                                <h3 class="text-center">No Packages available</h3>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-actions form-wrapper" id="edit-actions">
                                                        <button class="btn btn-primary btn-block" type="submit">Continue to next step</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <!-- /.block -->
                                    </div>
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