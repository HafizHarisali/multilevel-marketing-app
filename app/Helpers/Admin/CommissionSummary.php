<?php 
function get_commission_summary(){
	$level_commission = \DB::table('transactions')
		->select('balance')
		->where('cat_id',3)
		->where('sponsor_id',\Request::session()->get('id'))
		->sum('balance');
	$sponsor_commission = \DB::table('transactions')
		->select('balance')
		->where('cat_id',5)
		->where('sponsor_id',\Request::session()->get('id'))
		->sum('balance');
	$total_commission = number_format($level_commission + $sponsor_commission,2);
	$summary = array(
		'level_commission' => number_format($level_commission,2),
		'sponsor_commission' => number_format($sponsor_commission,2),
		'total_commission' => $total_commission
	);
	return $summary;
}

?>