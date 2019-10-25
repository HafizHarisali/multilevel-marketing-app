<div class="col-lg-8 col-md-12 text-right hidden-xs title-extra-class">
    <div class="region region-title-extra">
        <div id="block-afl-widgets-afl-ewallet-income" class="block block-afl-widgets contextual-links-region clearfix">

            <div class="inline m-r text-left ">
                <div class="m-b-xs font-thin text-lg text-muted">
                    <p class="text-base m-b-none text-success">Income</p>{{$get_ewallet_accounts["income"]}} USD</div>
            </div>

        </div>
        <!-- /.block -->
        <div id="block-afl-widgets-afl-ewallet-expenses" class="block block-afl-widgets contextual-links-region clearfix">

            <div class="inline m-r text-left ">
                <div class="m-b-xs font-thin text-lg text-muted">
                    <p class="text-base m-b-none text-danger">Expenses</p> {{$get_ewallet_accounts["expense"]}} USD</div>
            </div>

        </div>
        <!-- /.block -->
        <div id="block-afl-widgets-afl-ewallet-balance" class="block block-afl-widgets contextual-links-region clearfix">

            <div class="inline m-r text-left ">
                <div class="m-b-xs font-thin text-lg text-muted">
                    <p class="text-base m-b-none text-info">E-Wallet</p> {{$get_ewallet_accounts["remaining_ewallet"]}} USD</div>
            </div>

        </div>
        <!-- /.block -->
    </div>
</div>