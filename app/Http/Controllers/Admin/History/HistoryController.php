<?php
namespace App\Http\Controllers\Admin\History;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use session;
use DB;
use Carbon\Carbon;

class HistoryController extends Controller{

	public function package_upgrades(Request $request){
		if(!empty($request->session()->has('id') && $request->session()->get('role') == 0)){
			//get all members who upgrade their packages
			$upgarde_members = DB::table('upgrade_package_histories')
					->select('upgrade_package_histories.updated_date_time','users.id as user_id','users.first_name','users.sur_name','users.name','packages.package as old_package','packages.fees as old_fees','upgrade.package as new_package','upgrade.fees as new_fees')
					->leftjoin('users','upgrade_package_histories.user_id','users.id')
					->leftjoin('packages','upgrade_package_histories.old_package_id','packages.id')
					->leftjoin('packages as upgrade','upgrade_package_histories.new_package_id','upgrade.id');
			//set data in array
			$result['upgarde_members'] = $upgarde_members->paginate(20);
			return view('admin.history.member-package-upgrades',$result);
		}
		else{
			return redirect()->route('admin_login');
		}
	}

}