@include("admin.layouts.header")
@include("admin.layouts.aside")
<div id="content" class="app-content" role="main">
    <div class="app-content-body ">
        <div class="hbox hbox-auto-xs hbox-auto-sm">

            <div class="col">
                <!-- main header -->
                <div class="bg-light lter b-b wrapper-md">
                    <div class="row">
                        <div class="col-sm-12 col-xs-12">
                            <h1 class="m-n h3">Sponsor Bonus Configurations</h1>
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
                                   
                                    <form action="{{route('package_bonus_config_update',$slug)}}" method="post" id="sponsor-bonus-compensation-settings" accept-charset="UTF-8">
                                        @csrf
                                        <div class="from-panel">
                                            <fieldset class="form-wrapper" id="edit-fieldset">
                                                <legend><span class="fieldset-legend text-uppercase">{{$slug}} Configuration</span></legend>
                                                <div class="fieldset-wrapper"></div>
                                            </fieldset>
                                            <table class="sticky-header" style="position: fixed; top: 0px; left: 266px; visibility: hidden;">
                                                <thead style="">
                                                    <tr>
                                                        <th>Package / Level</th>
                                                        <th>Bonus</th>
                                                    </tr>
                                                </thead>
                                            </table>
                                            <table class="table sticky-enabled tableheader-processed sticky-table">
                                                <thead>
                                                    <tr>
                                                        <th>Package / Level</th>
                                                        <th>Bonus</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($query as $row)
                                                     @if(!empty($row->level > 0))
                                                    <tr class="odd">
                                                        <td>Level {{$row->level}}</td>
                                                        <td>
                                                            <div class="form-item clearfix form-type-textfield form-item-afl-compensations-sponsor-bonus-42 form-group">
                                                                <div class="input-group m-b"><span class="input-group-addon">%</span>
                                                                    <input groupfields="%" class="percentage-n-amount form-text form-control input-lg-3" type="text" id="edit-afl-compensations-sponsor-bonus-42" name="bonus_{{$row->level}}" value="{{$row->bonus}}" size="60" maxlength="128">
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    @else
                                                    <tr class="odd">
                                                        <td>{{$row->package}}</td>
                                                        <td>
                                                            <div class="form-item clearfix form-type-textfield form-item-afl-compensations-sponsor-bonus-42 form-group">
                                                                <div class="input-group m-b"><span class="input-group-addon">%</span>
                                                                    <input groupfields="%" class="percentage-n-amount form-text form-control input-lg-3" type="text" id="edit-afl-compensations-sponsor-bonus-42" name="bonus_{{$row->package_id}}" value="{{$row->bonus}}" size="60" maxlength="128">
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    @endif
                                                    @endforeach
                                                </tbody>
                                            </table>
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