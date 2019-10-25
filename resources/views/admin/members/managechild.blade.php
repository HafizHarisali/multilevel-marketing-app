
        @foreach($children as $childrens)
        <div class="node-left-item binary-level-width-50"> <span class="binary-hr-line binar-hr-line-left binary-hr-line-width-25"></span>
        <div class="node-item-1-child-left node-item-root">
            <div class="binary-node-single-item user-block user-1">
                <div class="images_wrapper">
                    @if($childrens->status == 1)
                    <img class="profile-rounded-image-small" style="border-color: #ccc;" src="{{asset('public/assets/images/users/profiles/blocked-user.png')}}" width="70" height="70" alt="blocked-user" title="blocked-member">
                    @else
                    <img class="profile-rounded-image-small" style="border-color: #ccc;" src="{{asset('public/assets/images/users/profiles')}}/{{$childrens->image}}" width="70" height="70" alt="{{$childrens->image}}" title="{{$childrens->name}}">
                    @endif
                </div>
                <span class="wrap_content ">{{$childrens->left_count_count}} {{$childrens->name}} {{$childrens->right_count_count}}</span>
                <div class="pop-up-content">
                    <div class="profile_tooltip_pick">
                        <div class="image_tooltip">
                            @if($childrens->status == 1)
                            <img class="profile-rounded-image-small" style="border-color: #ccc;" src="{{asset('public/assets/images/users/profiles/blocked-user.png')}}" width="70" height="70" alt="blocked-user" title="blocked-member">
                            @else
                            <img class="profile-rounded-image-tooltip" src="{{asset('public/assets/images/users/profiles')}}/{{$childrens->image}}" width="70" height="70" alt="{{$childrens->image}}" title="{{$childrens->name}}">
                            @endif
                        </div>
                        <div class="full-name">{{$childrens->name}}</div>
                        <div class="username">
                            <span class="text-label">Username : </span>
                            <span class="text-value">{{$childrens->name}} {{$childrens->id}} {{$childrens->children_count}}</span>
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
        @if($childrens->left_count_count == 1 && $childrens->right_count_count == 1)
            @include('/admin/members/managechild',['children' => $childrens->children,'child' => $childrens->child])
        @else
            @if($childrens->left_count_count == 1)
                @include('/admin/members/managechild',['children' => $childrens->children,'child' => $childrens->child])
            @else
                <div class="node-left-item binary-level-width-50"> <span class="binary-hr-line binar-hr-line-left binary-hr-line-width-25"></span>
                    <div class="node-item-1-child-left node-item-root">
                        <div class="binary-node-single-item user-block user-1">
                            <div class="images_wrapper">
                                <a href="{{url('admin/add-member/?parent='.encrypt($childrens->id).'&position='.encrypt(0))}}">
                                    <img class="profile-rounded-image-small" style="border-color: #ccc;" src="{{asset('public/assets/images/users/profiles/no-user.png')}}" width="70" height="70" alt="blocked-user" title="blocked-member">
                                </a>
                            </div>
                            <span class="wrap_content ">add member</span>
                        </div>
                    </div>
                </div>
            @endif
            @if($childrens->right_count_count == 1)
                @include('/admin/members/managechild',['children' => $childrens->children,'child' => $childrens->child])
            @else
                <div class="node-right-item binary-level-width-50"> <span class="binary-hr-line binar-hr-line-right binary-hr-line-width-25"></span>
                    <div class="node-item-1-child-right node-item-root">
                        <div class="binary-node-single-item user-block user-2">
                            <div class="images_wrapper">
                                <a href="{{url('admin/add-member/?parent='.encrypt($childrens->id).'&position='.encrypt(1))}}">
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
        @endforeach
        @foreach($child as $childs)
        <div class="node-right-item binary-level-width-50"> <span class="binary-hr-line binar-hr-line-right binary-hr-line-width-25"></span>   
            <div class="node-item-1-child-right node-item-root">
                <div class="binary-node-single-item user-block user-2">
                    <div class="images_wrapper">
                        @if($childs->status == 1)
                        <img class="profile-rounded-image-small" style="border-color: #ccc;" src="{{asset('public/assets/images/users/profiles/blocked-user.png')}}" width="70" height="70" alt="blocked-user" title="blocked-member">
                        @else
                        <img class="profile-rounded-image-small" style="border-color: #ccc;" src="{{asset('public/assets/images/users/profiles')}}/{{$childs->image}}" width="70" height="70" alt="laceypace" title="laceypace">
                        @endif
                    </div>
                    <span class="wrap_content ">{{$childs->left_count_count}} {{$childs->name}} {{$childs->right_count_count}}</span>
                    <div class="pop-up-content right_tooltip">
                        <div class="profile_tooltip_pick">
                            <div class="image_tooltip">
                                 @if($childs->status == 1)
                                <img class="profile-rounded-image-small" style="border-color: #ccc;" src="{{asset('public/assets/images/users/profiles/blocked-user.png')}}" width="70" height="70" alt="blocked-user" title="blocked-member">
                                @else
                                <img class="profile-rounded-image-tooltip" src="{{asset('public/assets/images/users/profiles')}}/{{$childs->image}}" width="70" height="70" alt="{{$childs->image}}" title="{{$childs->name}}">
                                @endif
                                </div>
                            <div class="full-name">{{$childs->name}}</div>
                            <div class="username">
                                <span class="text-label">Username : </span>
                                <span class="text-value">{{$childs->name}} {{$childs->id}} {{$childs->children_count}}</span>
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
        @if($childs->right_count_count == 1 && $childs->left_count_count == 1)
            @include('/admin/members/managechild',['child' => $childs->child,'children' => $childs->children])
        @else
            @if($childs->right_count_count == 1)
                @include('/admin/members/managechild',['child' => $childs->child,'children' => $childs->children])
            @else
                <div class="node-right-item binary-level-width-50"> <span class="binary-hr-line binar-hr-line-right binary-hr-line-width-25"></span>
                    <div class="node-item-1-child-right node-item-root">
                        <div class="binary-node-single-item user-block user-2">
                            <div class="images_wrapper">
                                <a href="{{url('admin/add-member/?parent='.encrypt($childs->id).'&position='.encrypt(1))}}">
                                    <img class="profile-rounded-image-small" style="border-color: #ccc;" src="{{asset('public/assets/images/users/profiles/no-user.png')}}" width="70" height="70" alt="blocked-user" title="blocked-member">
                                </a>
                            </div>
                            <span class="wrap_content ">add member</span>
                        </div>
                    </div>
                </div>
            @endif
            @if($childs->left_count_count == 1)
                @include('/admin/members/managechild',['child' => $childs->child,'children' => $childs->children])
            @else
                <div class="node-left-item binary-level-width-50"> <span class="binary-hr-line binar-hr-line-left binary-hr-line-width-25"></span>
                    <div class="node-item-1-child-left node-item-root">
                        <div class="binary-node-single-item user-block user-1">
                            <div class="images_wrapper">
                                <a href="{{url('admin/add-member/?parent='.encrypt($childs->id).'&position='.encrypt(0))}}">
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
        @endforeach
