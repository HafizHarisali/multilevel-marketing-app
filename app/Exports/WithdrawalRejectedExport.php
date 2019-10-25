<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use DB;
class WithdrawalRejectedExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $datefrom = date('Y-m-d',strtotime(\Request::input('from_date')));
       	$dateto = date('Y-m-d',strtotime(\Request::input('to_date')));

        $rejected = DB::table('withdraw_funds')
        	->select('users.name as username','payment_methods.name as payment_method','ewallet_addresses.wallet_address','withdraw_funds.requested_amount','withdraw_funds.withdraw_charges','withdraw_funds.payable_amount','withdraw_funds.notes','withdraw_funds.status','withdraw_funds.updated_date_time')
        	->leftjoin('users','users.id','withdraw_funds.user_id')
        	->leftjoin('payment_methods','payment_methods.id','withdraw_funds.payment_method_id')
        	->leftjoin('ewallet_addresses','ewallet_addresses.id','withdraw_funds.ewallet_address_id')
        	->where('withdraw_funds.status',2)
        	->where(function($query) use ($datefrom,$dateto){
                     $query->whereBetween(DB::raw('DATE(withdraw_funds.updated_date_time)'),array($datefrom,$dateto));
                })
        	->get();
        return $rejected;
    }

    public function headings(): array
    {
        return [
        	'Username',
        	'Payment Method',
        	'Wallet Address',
        	'Requested Amount',
        	'Withdraw Charges',
        	'Payable Amount',
        	'Notes',
        	'Status',
        	'DateTime'
        ];
    }
}
