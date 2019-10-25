<aside id="aside" class="app-aside hidden-xs bg-dark">
    <div class="aside-wrap">
        <div class="navi-wrap">
            <!-- user profile -->
            <div class="clearfix hidden-xs text-center hide" id="aside-user">
                <div class="region region-profile">
                    <div id="block-afl-widgets-afl-left-profile" class="block block-afl-widgets contextual-links-region clearfix">
                        <div class="dropdown wrapper">
                            <a href="#" title="Master Business Team"><span class="thumb-lg w-auto-folded avatar m-t-sm"><img class="img-full" src="{{asset('public/assets/images/users/profiles/')}}/{{Session::get('profile')}}" alt=""></span></a><a href="#" title="User Account" data-toggle="dropdown" class="dropdown-toggle hidden-folded" aria-expanded="false"><span class="clear"><span class="block m-t-sm"><strong class="font-bold text-lt">{{Session::get('username')}}</strong><b class="caret"></b></span><span class="text-muted text-xs block">Active</span></span></a>
                            <!-- dropdown -->
                            <ul class="dropdown-menu animated fadeInRight w hidden-folded">
                                <li class="wrapper b-b m-b-sm bg-info m-t-n-xs">
                                    <span class="arrow top hidden-folded arrow-info"></span>
                                    <div>
                                        <a href="{{route('user_profile',Session::get('username'))}}" title="Profile">Profile <span class="label text-base bg-info dker pull-right">Active</span></a> </div>
                                </li>
                                <li><a href="{{route('edit_profile',Session::get('id'))}}" title="Edit Profile">Edit Profile</a></li>
                                <li><a href="{{route('all_notifications')}}" title="Notifications">Notifications</a></li>
                                <li class="divider"></li>
                                <li><a href="{{route('admin_logout')}}" title="Logout">Logout</a></li>
                            </ul>
                            <!-- / dropdown -->
                        </div>
                        <div class="line dk hidden-folded"></div>

                    </div>
                    <!-- /.block -->
                </div>
            </div>
            <!-- / user profile-->
            <!-- nav -->
            <nav ui-nav="" class="navi clearfix">
                <ul class="nav menu-navigation">
                    <li class="first leaf active-trail active"><a href="{{route('index')}}" title="Overview" class="active-trail active"><i class="fa fa-desktop" aria-hidden="true"></i><span class="title">Overview</span></a></li>
                    <li class="expanded"><a href="/afl/new-member" title="Network" class="auto"><i class="fa fa-group" aria-hidden="true"></i><span class="title"> <span class="pull-right text-muted"> <i class="fa fa-fw fa-angle-right text"></i> <i class="fa fa-fw fa-angle-down text-active"></i> </span>Network</span></a>
                        <ul class="nav nav-sub dk">
                            <li class="first leaf"><a href="{{route('add-member')}}" title="Add New Member">Add New Member</a></li>
                            <li class="leaf"><a href="{{route('network_explorer')}}" title="Network Explorer">Network Explorer</a></li>
                            <li class="leaf"><a href="{{route('referal_members')}}" title="Referal Members">Referal Members</a></li>
                            <li class="leaf"><a href="{{route('tree')}}" title="Genealogy Tree">Genealogy Tree</a></li>
                            <li class="last leaf"><a href="{{route('upgrade_package')}}" title="Upgrade Package">Upgrade Package</a></li>
                        </ul>
                    </li>
                    <li class="expanded"><a href="#" title="E-Wallet" class="auto"><i class="fa fa-money" aria-hidden="true"></i><span class="title"> <span class="pull-right text-muted"> <i class="fa fa-fw fa-angle-right text"></i> <i class="fa fa-fw fa-angle-down text-active"></i> </span>E-Wallet</span></a>
                        <ul class="nav nav-sub dk">
                            <li class="first leaf"><a href="{{route('ewallet_summary')}}">E-Wallet Summary</a></li>
                            <li class="leaf"><a href="{{route('all_transactions')}}" title="All Transactions">All Transactions</a></li>
                            <li class="leaf"><a href="{{route('all_commissions')}}" title="All Commissions">All Commissions</a></li>
                            <li class="leaf"><a href="{{route('earning_inward_transactions')}}" title="Earnings &amp; Inward Funds">Earnings &amp; Inward Funds</a></li>
                            <li class="leaf"><a href="{{route('withdraw_outward_transactions')}}" title="Withdrawals &amp; Outward Funds">Withdrawals &amp; Outward Funds</a></li>
                            <li class="last leaf"><a href="{{route('transfer_funds')}}" title="Transfer fund to others">Transfer fund to others</a></li>
                             <li class="leaf"><a href="{{route('withdraw_funds_view')}}" title="Withdraw fund from E-Wallet">Withdraw fund from E-Wallet</a></li>
                             <li class="leaf"><a href="{{route('payment_methods')}}" title="Payout Preference">Payout Preference</a></li>
                             <li class="leaf"><a href="{{route('my_active_withdrawal_request')}}" title="My Withdrawal Requests">My Withdrawal Requests</a></li>
                             <li class="leaf"><a href="{{route('debit_fund')}}" title="Debit Fund">Fund Debit</a></li>
                             
                            
                        </ul>
                    </li>
                    <li class="expanded"><a href="#" title="Manage Members" class="auto"><i class="fa fa-user" aria-hidden="true"></i><span class="title"> <span class="pull-right text-muted"> <i class="fa fa-fw fa-angle-right text"></i> <i class="fa fa-fw fa-angle-down text-active"></i> </span>Manage Members</span></a>
                        <ul class="nav nav-sub dk">
                            <li class="first leaf"><a href="{{route('all_members')}}" title="All Members List">All Members List</a></li>
                            <li class="leaf"><a href="{{route('block_members')}}" title="Blocked  Members List">Blocked  Members List</a></li>
                            <li class="leaf"><a href="{{route('unverified_members')}}" title="Unverified Members List">Unverified Members List</a></li>
                            <li class="leaf"><a href="{{route('matching_bonus')}}" title="Matching Bonus Members List">Matching Bonus Members List</a></li>
                        </ul>
                    </li>
                    <li class="expanded"><a href="#" title="Payout Report" class="auto"><i class="fa fa-briefcase" aria-hidden="true"></i><span class="title"> <span class="pull-right text-muted"> <i class="fa fa-fw fa-angle-right text"></i> <i class="fa fa-fw fa-angle-down text-active"></i> </span>Payout Report</span></a>
                        <ul class="nav nav-sub dk">
                            <li class="first leaf"><a href="{{route('withdraw_waiting_requests')}}">Withdrawal Requests</a></li>
                        </ul>
                    </li>
                    <li class="expanded"><a href="#" title="Support" class="auto"><i class="fa fa-life-bouy" aria-hidden="true"></i><span class="title"> <span class="pull-right text-muted"> <i class="fa fa-fw fa-angle-right text"></i> <i class="fa fa-fw fa-angle-down text-active"></i> </span>Support</span></a>
                        <ul class="nav nav-sub dk">
                            <li class="first leaf"><a href="{{route('support_add')}}" title="Support Request">Support Request</a></li>
                            <!-- <li class="leaf"><a href="/afl/general/support/me" title="My Support Requests &amp; Resolutions">My Support Requests &amp; Resolutions</a></li> -->
                            <li class="last leaf"><a href="{{route('all_supports')}}" title="All support requests">All support requests</a></li>
                        </ul>
                    </li>
                    <li class="expanded"><a href="/afl/referral-promotion" title="Promotion Tools" class="auto"><i class="fa fa-mail-forward" aria-hidden="true"></i><span class="title"> <span class="pull-right text-muted"> <i class="fa fa-fw fa-angle-right text"></i> <i class="fa fa-fw fa-angle-down text-active"></i> </span>Promotion Tools</span></a>
                        <ul class="nav nav-sub dk">
                            <li class="first leaf"><a href="{{route('banners')}}">Promotion Banner</a></li>
                            <li class="leaf"><a href="{{route('banners_create')}}" title="Create Promotion Banner">Create Promotion Banner</a></li>
                        </ul>
                    </li>
                    <li class="expanded"><a href="/afl-admin" title="Settings" class="auto"><i class="fa fa-cog" aria-hidden="true"></i><span class="title"> <span class="pull-right text-muted"> <i class="fa fa-fw fa-angle-right text"></i> <i class="fa fa-fw fa-angle-down text-active"></i> </span>Settings</span></a>
                        <ul class="nav nav-sub dk">
                            <li class="first leaf"><a href="{{route('manage_packages')}}" title="Enrollment Packages">Enrollment Packages</a></li>
                            <li class="leaf"><a href="{{route('compensation_settings')}}" title="Compensation">Compensation</a></li>
                            <li class="leaf"><a href="{{route('ewallet_settings')}}" title="Compensation">Ewallet Settings</a></li>
                            <!-- <li class="leaf"><a href="{{route('package_tree_config')}}" title="Genealogy">Genealogy</a></li> -->
                        </ul>
                    </li>
                    <li class="expanded"><a href="/afl/my-orders" title="Reports" class="auto"><i class="fa fa-file" aria-hidden="true"></i><span class="title"> <span class="pull-right text-muted"> <i class="fa fa-fw fa-angle-right text"></i> <i class="fa fa-fw fa-angle-down text-active"></i> </span>Reports</span></a>
                        <ul class="nav nav-sub dk">
                            <li class="leaf"><a href="{{route('package_expiries')}}" title="Member Package Expiry">Member Package Expiry</a></li>
                            <li class="leaf"><a href="{{route('ranks_history')}}" title="Member Package Expiry">Member Ranks History</a></li>
                            <li class="last leaf"><a href="{{route('self_ranks_history')}}" title="Member Package Expiry">Ranks History</a></li>
                        </ul>
                    </li>
                    <li class="expanded"><a href="/afl/my-orders" title="Reports" class="auto"><i class="fa fa-file" aria-hidden="true"></i><span class="title"> <span class="pull-right text-muted"> <i class="fa fa-fw fa-angle-right text"></i> <i class="fa fa-fw fa-angle-down text-active"></i> </span>History</span></a>
                        <ul class="nav nav-sub dk">
                            <li class="last leaf"><a href="{{route('package_upgrades')}}" title="Member Package Expiry">Member Package Upgrades</a></li>
                        </ul>
                    </li>
                    <li class="last leaf"><a href="{{route('admin_logout')}}" title="Logout"><i class="fa fa-sign-out" aria-hidden="true"></i><span class="title">Logout</span></a></li>
                </ul>
            </nav>
            <!-- nav -->
        </div>
    </div>
</aside>