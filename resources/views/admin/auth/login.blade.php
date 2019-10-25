<!DOCTYPE html>
<html>
<head>
    <title>Admin Login | MLM</title>
    @include('admin.layouts.style')
</head>
<body class="html front not-logged-in no-sidebars page-user i18n-en">
    <div class="app app-header-fixed" id="page-anonymoususe">
        <div class="container w-xxl  w-auto-xs">
            <a href="/" title="Epixel MLM Binary" class="navbar-brand block m-t logo-block"><img src="" alt="MLM Binary" title="MLM Binary" /></a>
            <div class="m-b-lg">
                <div class="wrapper text-center">
                    <h4 class="page-title">Admin Login</h4>
                </div>
                <div class="region region-content">
                    <div id="block-system-main" class="block block-system clearfix">
                        <form class="form-validation m-t-md user-eps-diamond-block" action="{{route('validating_credentials')}}" method="post" id="user-login" accept-charset="UTF-8">
                            <div>
                                @csrf
                                <div class="form-item clearfix form-type-textfield form-item-name form-group" data-toggle="tooltip" title="e-mail address">
                                    <input placeholder="username" class="no-border form-text form-control input-lg-3 required" type="text" id="edit-name" name="name" value="" />
                                </div>
                                <div class="form-item clearfix form-type-password form-item-pass form-group" data-toggle="tooltip" title="Enter Pasword">
                                    <input value="" placeholder="Password" class="no-border form-text form-control required" type="password" id="edit-pass" name="password"/>
                                </div>
                                <!--<div class="text-right m-t m-b"><a href="/user/password" class="text-muted" title="Request new password">Forgot password?</a></div>-->
                                <div class="form-actions form-wrapper" id="edit-actions">
                                    <input class="btn btn-lg btn-primary btn-block form-submit btn btn-default btn-primary" type="submit" id="edit-submit" name="op" value="Log in" />
                                </div>
                                <!-- <p class="text-center sign-up-text">Don't have an account yet ? <a href="/afl/join" class="text-black">Sign Up</a></p> -->
                            </div>
                        </form>
                    </div>
                    <!-- /.block -->
                </div>
            </div>

        </div>

        <div class="text-center">
            <div class="region region-footer">
                <div id="block-system-powered-by" class="block block-system clearfix">

                    <span> &copy; 2019 Epixel MLM Binary. All Rights Reserved. </span>
                </div>
                <!-- /.block -->
            </div>
        </div>
    </div>
    @include('admin.layouts.script')
    @include('admin.layouts.notifications')
</body>
</html>

