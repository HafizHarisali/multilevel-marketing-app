@include('admin.layouts.header')
@include('admin.layouts.aside')
<div id="content" class="app-content" role="main">
    <div class="app-content-body ">
        <div class="hbox hbox-auto-xs hbox-auto-sm">

            <div class="col">
                <!-- main header -->
                <div class="bg-white b-b wrapper-md">
                    <div class="row">
                        <div class="col-sm-12 col-xs-12">
                            <h1 class="m-n h3">Genealogy Tree</h1>
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
                            <div class="region region-content-top">
                                <div id="block-block-19" class="block block-block contextual-links-region clearfix">

                                    <form action="/afl/genealogy-tree" method="post" id="search-user-for-genology" accept-charset="UTF-8" siq_id="autopick_5973">
                                        <div class="from-panel">
                                            <div class="form-inline form-wrapper" id="edit-container">
                                                <div class="form-item form-autocomplete clearfix form-type-textfield form-item-user-name form-group" data-toggle="tooltip" title="" role="application" data-original-title="User Name">
                                                    <label for="edit-user-name">User Name </label>
                                                    <input type="text" id="edit-user-name" name="user_name" value="" size="60" maxlength="128" class="form-text form-control input-lg-3 form-autocomplete" autocomplete="OFF" aria-autocomplete="list"><span class="icon glyphicon glyphicon-refresh form-control-feedback" aria-hidden="true"></span>
                                                    <input type="hidden" id="edit-user-name-autocomplete" value="https://binary.epixelmlmsoftware.com/afl/user-downlines-name/autocomplete" disabled="disabled" class="autocomplete autocomplete-processed">
                                                    <span class="element-invisible" aria-live="assertive" id="edit-user-name-autocomplete-aria-live"></span></div>
                                                <input type="submit" id="edit-submit" name="op" value="Submit" class="form-submit btn btn-default btn-primary">
                                                <input type="hidden" name="afl_redirect_url" value="/afl/genealogy-tree/">
                                            </div>
                                            <input type="hidden" name="form_build_id" value="form-TUKoPOaZJcizANlas0N0wuKZIS8DUnBFCEhnHA_n5gE">
                                            <input type="hidden" name="form_token" value="llaUXv7owtsfaP4wdlMBaqK1fwTlY0dBQ892UG3y8Tw">
                                            <input type="hidden" name="form_id" value="search_user_for_genology">
                                        </div>
                                    </form>
                                </div>
                                <!-- /.block -->
                            </div>
                            <div class="region region-content">
                                <div id="block-system-main" class="block block-system clearfix">

                                    <div class="binary-genealogy-tree binary_tree_extended">
                                        <div class="binary-genealogy-level-0 clearfix">
                                            <div class="no_padding parent-wrapper clearfix">
                                                <div class="node-centere-item binary-level-width-100">
                                                    <div class="node-item-root">
                                                        <div class="binary-node-single-item user-block user-0">
                                                            <div class="images_wrapper"><img class="profile-rounded-image-small" style="border-color: #ccc;" src="https://binary.epixelmlmsoftware.com/sites/binary/files/styles/genealogy-view/public/user-profile-images/johngillem.jpg?itok=si5Dauw3" width="70" height="70" alt="business.admin" title="business.admin"></div>
                                                            <span class="wrap_content ">{{$user->name}}</span>
                                                            <div class="pop-up-content">
                                                                <div class="profile_tooltip_pick">
                                                                    <div class="image_tooltip"><img class="profile-rounded-image-tooltip" src="https://binary.epixelmlmsoftware.com/sites/binary/files/styles/genealogy-view/public/user-profile-images/johngillem.jpg?itok=si5Dauw3" width="70" height="70" alt="business.admin" title="business.admin"></div>
                                                                    <div class="full-name">Master Business Team </div>
                                                                    <div class="username">
                                                                        <span class="text-label">Username : </span>
                                                                        <span class="text-value">{{$user->name}}</span>
                                                                    </div>
                                                                </div>
                                                                <div class="tooltip_profile_detaile">

                                                                    <div class="text">
                                                                        <span class="text-label">Sales (Left)</span>
                                                                        <span class="text-value">$100.00</span>
                                                                    </div>

                                                                    <div class="text">
                                                                        <span class="text-label">Sales (Right)</span>
                                                                        <span class="text-value">$0.00</span>
                                                                    </div>

                                                                    <div class="text">
                                                                        <span class="text-label">Carry-forward (Right)</span>
                                                                        <span class="text-value">$0.00</span>
                                                                    </div>

                                                                    <div class="text">
                                                                        <span class="text-label">Carry-forward (Left)</span>
                                                                        <span class="text-value">$2,000.00</span>
                                                                    </div>
                                                                </div>
                                                                <div class="tooltip-footer">
                                                                    <div class="text">
                                                                        <span class="text-label">Joined Date : </span>
                                                                        <span class="text-value">{{$user->created_date_time}}</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="parent-wrapper clearfix">
                                                            <div class="node-left-item binary-level-width-50"> <span class="binary-hr-line binar-hr-line-left binary-hr-line-width-25"></span>
                                                                @foreach($left_users as $childrens)
                                                                <div class="node-item-1-child-left node-item-root">
                                                                    <div class="binary-node-single-item user-block user-1">
                                                                        <div class="images_wrapper"><img class="profile-rounded-image-small" style="border-color: #ccc;" src="https://binary.epixelmlmsoftware.com/sites/binary/files/styles/genealogy-view/public/user-profile-images/002_0.jpg?itok=4ZNS9aUe" width="70" height="70" alt="mlm.member" title="mlm.member"></div>
                                                                        <span class="wrap_content ">{{$childrens['name']}}</span>
                                                                        <div class="pop-up-content">
                                                                            <div class="profile_tooltip_pick">
                                                                                <div class="image_tooltip"><img class="profile-rounded-image-tooltip" src="https://binary.epixelmlmsoftware.com/sites/binary/files/styles/genealogy-view/public/user-profile-images/002_0.jpg?itok=4ZNS9aUe" width="70" height="70" alt="mlm.member" title="mlm.member"></div>
                                                                                <div class="full-name">{{$childrens->name}} </div>
                                                                                <div class="username">
                                                                                    <span class="text-label">Username : </span>
                                                                                    <span class="text-value">{{$childrens->name}}</span>
                                                                                </div>
                                                                            </div>
                                                                            <div class="tooltip_profile_detaile">

                                                                                <div class="text">
                                                                                    <span class="text-label">Sales (Left)</span>
                                                                                    <span class="text-value">$100.00</span>
                                                                                </div>

                                                                                <div class="text">
                                                                                    <span class="text-label">Sales (Right)</span>
                                                                                    <span class="text-value">$0.00</span>
                                                                                </div>

                                                                                <div class="text">
                                                                                    <span class="text-label">Carry-forward (Right)</span>
                                                                                    <span class="text-value">$0.00</span>
                                                                                </div>

                                                                                <div class="text">
                                                                                    <span class="text-label">Carry-forward (Left)</span>
                                                                                    <span class="text-value">$300.00</span>
                                                                                </div>
                                                                            </div>
                                                                            <div class="tooltip-footer">
                                                                                <div class="text">
                                                                                    <span class="text-label">Joined Date : </span>
                                                                                    <span class="text-value">{{$childrens->created_date_time}}</span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                @endforeach
                                                            </div>
                                                            <div class="node-right-item binary-level-width-50"> <span class="binary-hr-line binar-hr-line-right binary-hr-line-width-25"></span>
                                                                @foreach($right_users as $childs)   
                                                                    <div class="node-item-1-child-right   node-item-root">
                                                                        <div class="binary-node-single-item user-block user-2">
                                                                            <div class="images_wrapper"><img class="profile-rounded-image-small" style="border-color: #ccc;" src="https://binary.epixelmlmsoftware.com/sites/binary/files/styles/genealogy-view/public/user-profile-images/003.jpg?itok=nhP1ci1b" width="70" height="70" alt="laceypace" title="laceypace"></div>
                                                                            <span class="wrap_content ">{{$childs->name}}</span>
                                                                            <div class="pop-up-content right_tooltip">
                                                                                <div class="profile_tooltip_pick">
                                                                                    <div class="image_tooltip"><img class="profile-rounded-image-tooltip" src="https://binary.epixelmlmsoftware.com/sites/binary/files/styles/genealogy-view/public/user-profile-images/003.jpg?itok=nhP1ci1b" width="70" height="70" alt="laceypace" title="laceypace"></div>
                                                                                    <div class="full-name">{{$childs->name}}</div>
                                                                                    <div class="username">
                                                                                        <span class="text-label">Username : </span>
                                                                                        <span class="text-value">{{$childs->name}}</span>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="tooltip_profile_detaile">

                                                                                    <div class="text">
                                                                                        <span class="text-label">Sales (Left)</span>
                                                                                        <span class="text-value">$0.00</span>
                                                                                    </div>

                                                                                    <div class="text">
                                                                                        <span class="text-label">Sales (Right)</span>
                                                                                        <span class="text-value">$0.00</span>
                                                                                    </div>

                                                                                    <div class="text">
                                                                                        <span class="text-label">Carry-forward (Right)</span>
                                                                                        <span class="text-value">$0.00</span>
                                                                                    </div>

                                                                                    <div class="text">
                                                                                        <span class="text-label">Carry-forward (Left)</span>
                                                                                        <span class="text-value">$1,500.00</span>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="tooltip-footer">
                                                                                    <div class="text">
                                                                                        <span class="text-label">Joined Date : </span>
                                                                                        <span class="text-value">{{$childs->created_date_time}}</span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @endforeach   
                                                            </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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

</div>
@include('admin.layouts.footer')