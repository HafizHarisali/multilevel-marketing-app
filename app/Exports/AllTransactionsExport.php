<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use DB;
class AllTransactionsExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $datefrom = date('Y-m-d',strtotime(\Request::input('from_date')));
       	$dateto = date('Y-m-d',strtotime(\Request::input('to_date')));

       	$alltransactions = DB::table('transactions')
						->select('ewallet_categories.name as payment_source','users.name as associated_user','transactions.balance','transactions.date as transaction_date','transactions.time as transaction_time')
						->leftjoin('users','transactions.user_id','=','users.id')
						->leftjoin('ewallet_categories','transactions.cat_id','=','ewallet_categories.id')
						->where('transactions.sponsor_id',\Request::session()->get('id'))
						->where(function($query) use ($datefrom,$dateto){
                     $query->whereBetween(DB::raw('DATE(transactions.date)'),array($datefrom,$dateto));
			                })
						->orderby('date','desc')
						->orderby('time','desc')
						->get();
		return $alltransactions;
    }

    public function headings(): array
    {
        return [
        	'Payment Source',
        	'Associated User',
        	'Amount',
        	'Transaction Date',
        	'Transaction Time'
        ];
    }
}
