<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" version="XHTML+RDFa 1.0" dir="ltr" class="js">

<head profile="http://www.w3.org/1999/xhtml/vocab">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="Generator" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="csrf-token" content="{{csrf_token()}}">
    <link rel="shortcut icon" href="" />
    <title>Overview | Epixel MLM Binary</title>
    @include("admin.layouts.style") 
    <style type="text/css">
        body {
            font-family: inherit;
            font-size: 12px;
            -webkit-font-smoothing: antialiased;
            line-height: 1.42857143;
            /* background-color: transparent; */
        }
    </style>
</head>
<body class="html not-front logged-in no-sidebars page-afl page-afl-dashboard i18n-en">
    <div class="app aside-lg epixel-main">
        <!-- header -->
        <header id="header" class="app-header navbar" role="menu">
            <!-- navbar header -->
            <div class="navbar-header bg-black text-center logo-wrapper" id="navbar-header">
                <button class="pull-right visible-xs dk" ui-toggle-class="show" target=".navbar-collapse">
                    <i class="fa fa-cog fa-fw"></i>
                </button>
                <button class="pull-right visible-xs" ui-toggle-class="off-screen" target=".app-aside" ui-scroll="app">
                    <i class="fa fa-bars fa-fw"></i>
                </button>
                <!-- brand -->
                <!--  Logo block -->

                <a href="{{route('index')}}" title="Epixel MLM Binary" class="navbar-brand text-lt"><img class="full-logo" src="{{asset('public/assets/images/settings/logo/pp.jpg')}}" alt="MLM Binary" title="MLM Binary" /><img class="logo-icon" src="{{asset('public/assets/images/settings/logo/pp.jpg')}}" alt="MLM Binary" title="Epixel MLM Binary" /></a>
                <!--  END -> Logo block -->

                <!-- / brand -->
            </div>
            <!-- / navbar header -->
            <!-- navbar collapse -->
            <div class="collapse pos-rlt navbar-collapse box-shadow bg-white-only" id="navbar-collapse">
                <!-- collapse buttons -->
                <div class="nav navbar-nav hidden-xs">
                    <a href="#" title="Epixel MLM Binary" class="btn no-shadow navbar-btn btn-aside-folded " ui-toggle-class="app-aside-folded"><i class="fa fa-dedent fa-fw text"></i><i class="fa fa-indent fa-fw text-active"></i></a> <a href="#" title="Epixel MLM Binary" class="btn no-shadow navbar-btn" ui-toggle-class="show" target="#aside-user"><i class="icon-user fa-fw"></i></a></div>
                <!-- END -> collapse buttons -->

                <!-- link and dropdown -->
                <!-- / link and dropdown -->
                <!-- Header Block -->
                <div class="region region-header">
                    <!-- /.block -->
                    <div id="block-afl-widgets-afl-top-header-navbar" class="block block-afl-widgets top-header">
                        <ul class="nav navbar-nav navbar-right">
                            <li class="dropdown" id="afl-notification">
                                
                                <!-- / dropdown -->
                            </li>
                            <!-- User Account -->
                            <li class="dropdown">
                                <a href="#" title="User Account" data-toggle="dropdown" class="dropdown-toggle clear" aria-expanded="false"><span class="thumb-sm avatar pull-right m-t-n-sm m-b-n-sm m-l-sm"><img title="John Joseph" class="img-circle" src="{{asset('public/assets/images/users/profiles/')}}/{{Session::get('profile')}}" width="150" height="150" alt="" /></span><span class="hidden-sm hidden-md">{{Session::get('username')}}</span> <b class="caret"></b></a>
                                <!-- dropdown -->
                                <ul class="dropdown-menu animated fadeInRight w">
                                    <li><a href="{{route('user_profile',Session::get('username'))}}" title="Profile" class="clearfix"><span class="pull-left">Profile</span> <span class="label text-base bg-danger pull-right">Active</span></a></li>
                                    <li><a href="{{route('edit_profile',Session::get('id'))}}" title="Edit Profile">Edit Profile</a></li>
                                    <li class="divider"></li>
                                    <li class="divider"></li>
                                    <li><a href="{{route('admin_logout')}}" title="Logout">Logout</a></li>
                                </ul>
                                <!-- / dropdown -->
                            </li>
                            <!-- / User Account -->

                        </ul>

                    </div>
                    <!-- /.block -->
                </div>
                <!-- END -> Header Block -->
            </div>
            <!-- / navbar collapse -->
        </header>
       
        <!-- / header -->