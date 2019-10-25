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
                    <!--Dashboard-thankyou-section-open -->

                    <!--Dashboard-thankyou-section-close -->
                    <!-- / stats -->

                    <!-- content -->
                    <div class="row">
                        <div class="col-md-12">
                           @include('admin.layouts.packages-compensation-nav')
                            <div class="region region-content">
                                <div id="block-system-main" class="block block-system clearfix">

                                    <form action="{{route('package_plan_config_insert')}}" method="post" id="package-settings" accept-charset="UTF-8">
                                        @csrf
                                        <div class="from-panel">
                                            <div id="checkboxes-div" style="display: block;">
                                                <div style="display: block;"></div>
                                                <fieldset class="form-wrapper" id="edit-package-settings--10">
                                                    <div class="fieldset-wrapper">
                                                        <hr style="border:2px solid #ccc; color:#ccc; margin:30px 0px 30px 0px">
                                                        <table class="sticky-header" style="position: fixed; top: 0px; left: 266px; visibility: hidden;">
                                                            <thead style="">
                                                                <tr>
                                                                    <th>Package</th>
                                                                    <th>Expiry Duration</th>
                                                                    <th>Expiry Period</th>
                                                                </tr>
                                                            </thead>
                                                        </table>
                                                        <table class="table sticky-enabled tableheader-processed sticky-table">
                                                            <thead>
                                                                <tr>
                                                                    <th>Package</th>
                                                                    <th>Expiry Duration</th>
                                                                    <th>Expiry Period</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach($query as $row)
                                                                <tr class="odd">
                                                                    <td class="text-uppercase">{{$row->package}}</td>
                                                                    <td>
                                                                        <div class="form-item clearfix form-type-select form-item-afl-package-expire-duration-32 form-group">
                                                                            <select id="edit-afl-package-expire-duration-32--5" name="package_expire_duration_{{$row->id}}" class="form-select form-control required">
                                                                                <option value="-0">--select--</option>
                                                                                <option @if($row->expiry_duration == 1) selected="selected" @endif value="1">1</option>
                                                                                <option @if($row->expiry_duration == 2) selected="selected" @endif value="2">2</option>
                                                                                <option @if($row->expiry_duration == 3) selected="selected" @endif  value="3">3</option>
                                                                                <option @if($row->expiry_duration == 4) selected="selected" @endif  value="4">4</option>
                                                                                <option @if($row->expiry_duration == 5) selected="selected" @endif  value="5">5</option>
                                                                                <option @if($row->expiry_duration == 6) selected="selected" @endif  value="6">6</option>
                                                                                <option @if($row->expiry_duration == 7) selected="selected" @endif  value="7">7</option>
                                                                                <option @if($row->expiry_duration == 8) selected="selected" @endif  value="8">8</option>
                                                                                <option @if($row->expiry_duration == 9) selected="selected" @endif  value="9">9</option>
                                                                                <option @if($row->expiry_duration == 10) selected="selected" @endif  value="10">10</option>
                                                                                <option @if($row->expiry_duration == 11) selected="selected" @endif  value="11">11</option>
                                                                                <option @if($row->expiry_duration == 12) selected="selected" @endif  value="12">12</option>
                                                                                <option @if($row->expiry_duration == 13) selected="selected" @endif  value="13">13</option>
                                                                                <option @if($row->expiry_duration == 14) selected="selected" @endif  value="14">14</option>
                                                                                <option @if($row->expiry_duration == 15) selected="selected" @endif  value="15">15</option>
                                                                                <option @if($row->expiry_duration == 16) selected="selected" @endif  value="16">16</option>
                                                                                <option @if($row->expiry_duration == -1) selected="selected" @endif  value="-1">Unlimited</option>
                                                                            </select>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-item clearfix form-type-select form-item-afl-package-expire-duration-period-32 form-group">
                                                                            <select id="edit-afl-package-expire-duration-period-32--5" name="package_expiry_period_{{$row->id}}" class="form-select form-control required">
                                                                                <option value="-x">--select--</option>
                                                                                <option @if($row->expiry_period == 'day') selected="selected" @endif  value="day">Day</option>
                                                                                <option @if($row->expiry_period == 'week') selected="selected" @endif value="week">Week</option>
                                                                                <option @if($row->expiry_period == 'month') selected="selected" @endif value="month">Month</option>
                                                                                <option @if($row->expiry_period == 'year') selected="selected" @endif value="year">Year</option>
                                                                            </select>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </fieldset>
                                            </div>
                                            <input type="submit" id="edit-submit" name="op" value="Save Configuration" class="form-submit btn btn-default btn-primary">
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
@include('admin.layouts.footer')
