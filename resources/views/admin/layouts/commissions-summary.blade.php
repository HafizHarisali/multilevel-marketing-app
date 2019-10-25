<div class="col-lg-8 col-md-12 text-right hidden-xs title-extra-class">
    <div class="region region-title-extra">
        <div id="block-afl-widgets-afl-ewallet-income" class="block block-afl-widgets contextual-links-region clearfix">

            <div class="inline m-r text-left ">
                <div class="m-b-xs font-thin text-lg text-muted">
                    <p class="text-base m-b-none text-success">Level Commission</p>{{$get_commission_summary["level_commission"]}} USD</div>
            </div>

        </div>
        <!-- /.block -->
        <div id="block-afl-widgets-afl-ewallet-expenses" class="block block-afl-widgets contextual-links-region clearfix">

            <div class="inline m-r text-left ">
                <div class="m-b-xs font-thin text-lg text-muted">
                    <p class="text-base m-b-none text-danger">Sponsor Commission</p> {{$get_commission_summary["sponsor_commission"]}} USD</div>
            </div>

        </div>
        <!-- /.block -->
        <div id="block-afl-widgets-afl-ewallet-balance" class="block block-afl-widgets contextual-links-region clearfix">

            <div class="inline m-r text-left ">
                <div class="m-b-xs font-thin text-lg text-muted">
                    <p class="text-base m-b-none text-info">Total Commission</p> {{$get_commission_summary["total_commission"]}} USD</div>
            </div>

        </div>
    </div>
</div>