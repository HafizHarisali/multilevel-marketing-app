<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use DB;
class AllMembersExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $datefrom = date('Y-m-d',strtotime(\Request::input('from_date')));
       	$dateto = date('Y-m-d',strtotime(\Request::input('to_date')));

       	$all_members = DB::table('users')
			->select('users.first_name','users.sur_name','users.name','users.email','users.address','users.contact','u.name as parent_name','users.sponsor','users.position','countries.country_code','users.unique_code','packages.package','countries.country_name','users.created_date_time')
			->leftjoin('users as u','u.id','users.parent')
			->leftjoin('packages','users.package_id','=','packages.id')
			->leftjoin('countries','users.country_id','countries.id')
			->where('users.name','not like','%adminuser%')
			->where('users.id','>',1)
			->where('users.status',0)//0 for active 1 for block ,2 for unverified
			->where(function($query) use ($datefrom,$dateto){
             $query->whereBetween(DB::raw('DATE(users.updated_date_time)'),array($datefrom,$dateto));
	        })
			->orderby('users.id','desc')
			->get();

		return $all_members;
    }

    public function headings(): array
    {
        return [
        	'First Name',
        	'Sur Name',
        	'Username',
        	'Email',
        	'Address',
        	'Contact',
        	'Parent Name',
        	'Sponsor Name',
        	'Position',
        	'Country Code',
        	'Unique Code',
        	'Package Name',
        	'Country Name',
        	'Register Date'
        ];
    }
}
