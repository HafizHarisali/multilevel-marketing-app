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
                            <h1 class="m-n h3">System Configurations</h1>
                        </div>
                        <!-- sreeram -->
                    </div>
                </div>
                <!-- / main header -->
                <!-- main content -->
                <div class="wrapper-md ">
                    <!-- content -->
                    <div class="row">
                        <div class="col-md-12">
                           @include('admin.layouts.packages-compensation-nav')
                            <div class="region region-content">
                                @if(empty($row))
                                <div id="block-system-main" class="block block-system clearfix">
                                    <form action="{{route('package_tree_config_update')}}" method="post" id="afl-genealogy-config" accept-charset="UTF-8">
                                        @csrf
                                        <div class="from-panel">
                                            <div class="form-item clearfix form-type-select form-item-afl-unilevel-downline-depth form-group">
                                                <label for="edit-afl-unilevel-downline-depth">Maximum Depth of Downlines <span class="form-required" title="This field is required.">*</span></label>
                                                <select id="maximum_downlines" name="maximum_downlines_insert" class="form-select form-control required">
                                                    <option @if($row->maximum_downline_tree == 1) selected = "selected" @endif value="1">1</option>
                                                    <option @if($row->maximum_downline_tree == 2) selected = "selected" @endif  value="2">2</option>
                                                    <option @if($row->maximum_downline_tree == 3) selected = "selected" @endif value="3">3</option>
                                                    <option @if($row->maximum_downline_tree == 4) selected = "selected" @endif value="4">4</option>
                                                    <option @if($row->maximum_downline_tree == 5) selected = "selected" @endif value="5">5</option>
                                                    <option @if($row->maximum_downline_tree == 6) selected = "selected" @endif value="6">6</option>
                                                    <option @if($row->maximum_downline_tree == 7) selected = "selected" @endif value="7">7</option>
                                                    <option @if($row->maximum_downline_tree == 8) selected = "selected" @endif value="8">8</option>
                                                    <option @if($row->maximum_downline_tree == 9) selected = "selected" @endif value="9">9</option>
                                                    <option @if($row->maximum_downline_tree == 10) selected = "selected" @endif value="10">10</option>
                                                    <option @if($row->maximum_downline_tree == 11) selected = "selected" @endif value="11">11</option>
                                                    <option @if($row->maximum_downline_tree == 12) selected = "selected" @endif value="12">12</option>
                                                    <option @if($row->maximum_downline_tree == 13) selected = "selected" @endif value="13">13</option>
                                                    <option @if($row->maximum_downline_tree == 14) selected = "selected" @endif value="14">14</option>
                                                    <option @if($row->maximum_downline_tree == 15) selected = "selected" @endif value="15">15</option>
                                                    <option @if($row->maximum_downline_tree == 16) selected = "selected" @endif value="16">16</option>
                                                    <option @if($row->maximum_downline_tree == -1) selected = "selected" @endif value="-1">Unlimited</option>
                                                </select>
                                            </div>
                                                <input type="submit" id="edit-submit" name="op" value="Save configuration" class="form-submit btn btn-default btn-primary">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                @else
                                <div id="block-system-main" class="block block-system clearfix">
                                    <form action="{{route('package_tree_config_update')}}" method="post" id="afl-genealogy-config" accept-charset="UTF-8">
                                        @csrf
                                        <div class="from-panel">
                                            <div class="form-item clearfix form-type-select form-item-afl-unilevel-downline-depth form-group">
                                                <label for="edit-afl-unilevel-downline-depth">Maximum Depth of Downlines <span class="form-required" title="This field is required.">*</span></label>
                                                <select id="maximum_downlines" name="maximum_downlines_update" class="form-select form-control required">
                                                    <option @if($row->maximum_downline_tree == 1) selected = "selected" @endif value="1">1</option>
                                                    <option @if($row->maximum_downline_tree == 2) selected = "selected" @endif  value="2">2</option>
                                                    <option @if($row->maximum_downline_tree == 3) selected = "selected" @endif value="3">3</option>
                                                    <option @if($row->maximum_downline_tree == 4) selected = "selected" @endif value="4">4</option>
                                                    <option @if($row->maximum_downline_tree == 5) selected = "selected" @endif value="5">5</option>
                                                    <option @if($row->maximum_downline_tree == 6) selected = "selected" @endif value="6">6</option>
                                                    <option @if($row->maximum_downline_tree == 7) selected = "selected" @endif value="7">7</option>
                                                    <option @if($row->maximum_downline_tree == 8) selected = "selected" @endif value="8">8</option>
                                                    <option @if($row->maximum_downline_tree == 9) selected = "selected" @endif value="9">9</option>
                                                    <option @if($row->maximum_downline_tree == 10) selected = "selected" @endif value="10">10</option>
                                                    <option @if($row->maximum_downline_tree == 11) selected = "selected" @endif value="11">11</option>
                                                    <option @if($row->maximum_downline_tree == 12) selected = "selected" @endif value="12">12</option>
                                                    <option @if($row->maximum_downline_tree == 13) selected = "selected" @endif value="13">13</option>
                                                    <option @if($row->maximum_downline_tree == 14) selected = "selected" @endif value="14">14</option>
                                                    <option @if($row->maximum_downline_tree == 15) selected = "selected" @endif value="15">15</option>
                                                    <option @if($row->maximum_downline_tree == 16) selected = "selected" @endif value="16">16</option>
                                                    <option @if($row->maximum_downline_tree == -1) selected = "selected" @endif value="-1">Unlimited</option>
                                                </select>
                                            </div>
                                                <input type="submit" id="edit-submit" name="op" value="Save configuration" class="form-submit btn btn-default btn-primary">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                @endif
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