<?php
function get_ewallet_accounts(){
	//Getting total ewallet income
	$income = \DB::table('transactions')
				->where('sponsor_id',\Request::session()->get('id'))
				->where('from_credit_status',0)
				->sum('balance');
	//Getting total expense
	$expense = \DB::table('transactions')
				->where('sponsor_id',\Request::session()->get('id'))
				->where('from_credit_status',1)
				->sum('balance');//0 for credited and 1 for debited
	//Getting total remaining ewallet
	$remaining_ewallet = number_format(($income - $expense), 2); 
	$data = array(
		'income' => number_format($income,2),
		'expense' => number_format($expense,2),
		'remaining_ewallet' => $remaining_ewallet
	);
	if(!empty($data)){
		return $data;
	}
	else{
		echo "No Data Found";
	}
			
} 





?>