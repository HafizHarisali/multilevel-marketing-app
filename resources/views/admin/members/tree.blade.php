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

                                    <form action="{{route('tree')}}" method="get" id="search-user-for-genology" accept-charset="UTF-8" siq_id="autopick_8901">
                                        <div class="from-panel">
                                            <div class="form-item form-autocomplete clearfix form-type-entityreference form-item-transferee form-group" role="application">
                                            <label for="edit-transferee">Username<span class="form-required" title="This field is required.">*</span></label>
                                            <select id="edit-field-users-und" name="id" class="form-select form-control"></select>
                                            </div>
                                        <input type="submit" id="edit-submit" name="op" value="Submit" class="form-submit btn btn-default btn-primary">
                                        </div>
                                    </form>
                                </div>
                                <!-- /.block -->
                            </div>
                            <div class="region region-content">
                                <div id="block-system-main" class="block block-system clearfix">

                                    <div class="binary-genealogy-tree binary_tree_extended">
                                        <div class="binary-genealogy-level-0 clearfix">
                                            @foreach($users as $user)
                                            <div class="no_padding parent-wrapper clearfix">
                                                <div class="node-centere-item binary-level-width-100">
                                                    <div class="node-item-root">
                                                        <div class="binary-node-single-item user-block user-0">
                                                            <div class="images_wrapper"><img class="profile-rounded-image-small" style="border-color: #ccc;" src="{{asset('public/assets/images/users/profiles')}}/{{$user->image}}" width="70" height="70" alt="business.admin" title="business.admin"></div>
                                                            <span class="wrap_content ">{{$user->name}}</span>
                                                            <div class="pop-up-content">
                                                                <div class="profile_tooltip_pick">
                                                                    <div class="image_tooltip"><img class="profile-rounded-image-tooltip" src="{{asset('public/assets/images/users/profiles')}}/{{$user->image}}" width="70" height="70" alt="business.admin" title="business.admin"></div>
                                                                    <div class="full-name">Master Business Team </div>
                                                                    <div class="username">
                                                                        <span class="text-label">Username : </span>
                                                                        <span class="text-value">{{$user->name}}</span>
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
                                                    @if($user->left_count_count == 1 && $user->right_count_count == 1)
                                                        @include('/admin/members/managechild',['children' => $user->children, 'child' => $user->child])
                                                    @else
                                                        @if($user->left_count_count == 1)
                                                            @include('/admin/members/managechild',['children' => $user->children, 'child' => $user->child])
                                                        @else
                                                            <div class="node-left-item binary-level-width-50"> <span class="binary-hr-line binar-hr-line-left binary-hr-line-width-25"></span>
                                                                <div class="node-item-1-child-left node-item-root">
                                                                    <div class="binary-node-single-item user-block user-1">
                                                                        <div class="images_wrapper">
                                                                            <a href="{{url('admin/add-member/?parent='.encrypt($user->id).'&position='.encrypt(0))}}">
                                                                                <img class="profile-rounded-image-small" style="border-color: #ccc;" src="{{asset('public/assets/images/users/profiles/no-user.png')}}" width="70" height="70" alt="blocked-user" title="blocked-member">
                                                                            </a>
                                                                        </div>
                                                                        <span class="wrap_content ">add member</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endif
                                                        @if($user->right_count_count == 1)
                                                            @include('/admin/members/managechild',['children' => $user->children, 'child' => $user->child])
                                                        @else
                                                            <div class="node-right-item binary-level-width-50"> <span class="binary-hr-line binar-hr-line-right binary-hr-line-width-25"></span>
                                                                <div class="node-item-1-child-right node-item-root">
                                                                    <div class="binary-node-single-item user-block user-2">
                                                                        <div class="images_wrapper">
                                                                            <a href="{{url('admin/add-member/?parent='.encrypt($user->id).'&position='.encrypt(1))}}">
                                                                                <img class="profile-rounded-image-small" style="border-color: #ccc;" src="{{asset('public/assets/images/users/profiles/no-user.png')}}" width="70" height="70" alt="blocked-user" title="blocked-member">
                                                                            </a>
                                                                        </div>
                                                                        <span class="wrap_content ">add member</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endif
                                                    @endif
                                                </div>
                                            </div>
                                            @endforeach
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