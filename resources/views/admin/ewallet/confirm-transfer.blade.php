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
                            <h1 class="m-n h3">Are you sure you want to transfer money?</h1>
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

                                    <form class="confirmation" action="{{route('do_transfer_fund')}}" method="post" id="create-ewallet-transfer" accept-charset="UTF-8" siq_id="autopick_5579">
                                        @csrf
                                        <div>You are about to submit transfer request. This action cannot be undone.
                                            <input type="hidden" name="transfer_amount" value="{{$transfer_amount}}">
                                            <input type="hidden" name="transferee" value="{{$transferee}}">
                                            <div class="form-actions form-wrapper" id="edit-actions">
                                                <input type="submit" id="edit-submit" name="op" value="Yes, continue" class="form-submit btn btn-default btn-primary">
                                                <a href="{{route('transfer_funds')}}" id="edit-cancel" class="active">No, discard</a></div>
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