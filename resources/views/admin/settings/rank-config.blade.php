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
                            <h1 class="m-n h3">Ranks Configurations</h1>
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
                                <div id="block-block-5" class="block block-block contextual-links-region clearfix">

                                    <div style="margin-bottom:10px;" class="row text-right clear">
                                        <span class="label text-base bg-primary pos-rlt m-r text-righ">
                                            <a href="{{route('compensation_settings')}}">&lt;&lt;&lt; Back to compensations page</a></span>
                                    </div>
                                </div>
                                <!-- /.block -->
                            </div>
                            <div class="region region-content">
                                <div id="block-system-main" class="block block-system clearfix">

                                    <form action="{{route('rank_config_update')}}" method="post" id="ranks-general-configuration-settings" accept-charset="UTF-8" siq_id="autopick_7312">
                                        @csrf
                                        <div class="from-panel">
                                            <div id="ranks-wrapper">
                                                <div></div>
                                                <fieldset class="form-wrapper" id="edit-wrapper--3">
                                                    <div class="fieldset-wrapper">
                                                        @foreach($rank_data as $row)
                                                        <fieldset class="form-wrapper" id="edit-fieldset-1--3">
                                                            <legend><span class="fieldset-legend">Rank {{$row->id}}</span></legend>
                                                            <div class="fieldset-wrapper">
                                                                <div class="form-item clearfix form-type-textfield form-item-afl-comp-rank-name-1 form-group">
                                                                    <label for="edit-afl-comp-rank-name-1--3">Rank Name </label>
                                                                    <input type="text" id="edit-afl-comp-rank-name-1--3" name="rank_name_{{$row->id}}" value="{{$row->rank_name}}" size="60" maxlength="128" class="form-text form-control input-lg-3">
                                                                </div>
                                                                <div class="form-item clearfix form-type-textfield form-item-afl-comp-rank-weaker-leg-sale-1 form-group">
                                                                    <label for="edit-afl-comp-rank-weaker-leg-sale-1--3">Left Leg Sale Required </label>
                                                                    <input type="text" id="edit-afl-comp-rank-weaker-leg-sale-1--3" name="left_sale_{{$row->id}}" value="{{$row->left_earning}}" size="60" maxlength="128" class="form-text form-control input-lg-3">
                                                                </div>
                                                                <div class="form-item clearfix form-type-textfield form-item-afl-comp-rank-weaker-leg-sale-1 form-group">
                                                                    <label for="edit-afl-comp-rank-weaker-leg-sale-1--3">Right Leg Sale Required </label>
                                                                    <input type="text" id="edit-afl-comp-rank-weaker-leg-sale-1--3" name="right_sale_{{$row->id}}" value="{{$row->right_earning}}" size="60" maxlength="128" class="form-text form-control input-lg-3">
                                                                </div>
                                                                <div class="form-item clearfix form-type-select form-item-afl-comp-rank-downline-rank-required-1 form-group">
                                                                    <label for="edit-afl-comp-rank-downline-rank-required-1--3">Downline Rank Required </label>
                                                                    <select id="edit-afl-comp-rank-downline-rank-required-1--3" name="left_right_package_{{$row->id}}" class="form-select form-control">
                                                                        <option value="">-Select-</option>
                                                                        @foreach($packages as $package_row)
                                                                        <option @if($row->left_right_package_id == $package_row->package_id) selected="selected" @endif value="{{$package_row->package_id}}">{{$package_row->package}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <div class="form-item clearfix form-type-textfield form-item-afl-comp-rank-downline-rank-count-required-1 form-group">
                                                                    <label for="edit-afl-comp-rank-downline-rank-count-required-1--3">Downline Rank Count Required </label>
                                                                    <input type="text" id="edit-afl-comp-rank-downline-rank-count-required-1--3" name="count_left_right_package_{{$row->id}}" value="{{$row->count_left_right_package}}" size="60" maxlength="128" class="form-text form-control input-lg-3">
                                                                </div>
                                                                <div class="form-item clearfix form-type-select form-item-afl-comp-rank-downline-rank-required-1 form-group">
                                                                    <label for="edit-afl-comp-rank-downline-rank-required-1--3">Package To Qualify </label>
                                                                    <select id="edit-afl-comp-rank-downline-rank-required-1--3" name="qualify_package_{{$row->id}}" class="form-select form-control">
                                                                        <option value="">-Select-</option>
                                                                        @foreach($packages as $package_row)
                                                                        <option value="{{$package_row->package_id}}"@if($row->qualify_package_id == $package_row->package_id) selected="selected" @endif >{{$package_row->package}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <div class="form-item clearfix form-type-textfield form-item-afl-comp-rank-downline-rank-count-required-1 form-group">
                                                                    <label for="edit-afl-comp-rank-downline-rank-count-required-1--3">Direct Referals Required </label>
                                                                    <input type="number" id="edit-afl-comp-rank-downline-rank-count-required-1--3" name="referals_{{$row->id}}" value="{{$row->referals}}" size="60" maxlength="128" class="form-text form-control input-lg-3">
                                                                </div>
                                                                <div class="form-item clearfix form-type-textfield form-item-afl-comp-rank-advancement-bonus-1 form-group">
                                                                    <label for="edit-afl-comp-rank-advancement-bonus-1--3">Incentive </label>
                                                                    <input type="text" id="edit-afl-comp-rank-advancement-bonus-1--3" name="incentive_{{$row->id}}" value="{{$row->incentive}}" size="60" maxlength="128" class="form-text form-control input-lg-3">
                                                                </div>
                                                                <hr style="border:2px solid #7266ba; color:#7266ba; margin:60px 0px 60px 0px">
                                                            </div>
                                                        </fieldset>
                                                        @endforeach
                                                    </div>
                                                </fieldset>
                                            </div>
                                            <input type="submit" id="edit-submit" name="op" value="Save Configurations" class="form-submit btn btn-default btn-primary">
                                            
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