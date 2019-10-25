<?php
namespace App\Http\Controllers\Admin\Reports;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use session;
use DB;
use Carbon\Carbon;

class ReportsController extends Controller{

	public function ranks_history(Request $request){
		if(!empty($request->session()->has('id') && $request->session()->get('role') == 0)){
			//getting ranks history
			$history = DB::table('ranks_history')
					->select('users.id','users.name','users.first_name','users.sur_name','leadership_ranks.rank_name','ranks_history.updated_date_time')
					->leftjoin('users','ranks_history.user_id','users.id')
					->leftjoin('leadership_ranks','ranks_history.rank_id','leadership_ranks.id');
			//set data in array
			$result['total_records'] = $history->count();
			$result['rank_history'] = $history->paginate(20,$result['total_records']);

			return view('admin.reports.rank-history',$result);
		}
		else{
			return redirect()->route('admin_login');
		}
	}

	public function self_ranks_history(Request $request){
		if(!empty($request->session()->has('id') && $request->session()->get('role') == 0)){
			//getting ranks history
			$history = DB::table('ranks_history')
					->select('users.id','users.name','users.first_name','users.sur_name','leadership_ranks.rank_name','ranks_history.updated_date_time')
					->leftjoin('users','ranks_history.user_id','users.id')
					->leftjoin('leadership_ranks','ranks_history.rank_id','leadership_ranks.id')
					->where('ranks_history.user_id',$request->session()->get('id'));
			//set data in array
			$result['total_records'] = $history->count();
			$result['rank_history'] = $history->paginate(20,$result['total_records']);

			return view('admin.reports.rank-history',$result);
		}
		else{
			return redirect()->route('admin_login');
		}
	}

	public function package_expiries(Request $request){
		if(!empty($request->session()->has('id') && $request->session()->get('role') == 0)){
			//getting data of users for package expiries
			$users = DB::table('users')
						->select('users.id as user_id','users.first_name','users.sur_name','users.name','users.package_id','users.created_date_time','users.status','packages.package','packages.fees')
						->leftjoin('packages','users.package_id','packages.id')
						->get();
			foreach ($users as $row) {
				$expiries = DB::table('upgrade_package_histories')
						->select('upgrade_package_histories.id','upgrade_package_histories.old_package_id','upgrade_package_histories.new_package_id','upgrade_package_histories.updated_date_time','upgrade_package_histories.user_id','users.name','users.created_date_time','packages.package','packages.fees','users.status')
						->leftjoin('users','upgrade_package_histories.user_id','users.id')
						->leftjoin('packages','upgrade_package_histories.new_package_id','packages.id')
						->where('upgrade_package_histories.user_id',$row->user_id)
						->orderby('upgrade_package_histories.updated_date_time','desc')
						->first();
				if(!empty($expiries)){
					//get time of package expiry
					$expiry_limit = DB::table('users')
								->select('packages.expiry_duration','packages.expiry_period')
								->leftjoin('packages','users.package_id','packages.id')
								->where('users.package_id',$expiries->new_package_id)
								->first();
					if(!empty($expiry_limit)){
						//get count for expiry(1 month,year,day etc...)
						$count = $expiry_limit->expiry_duration;
						//get period for expiry(month,year,day)
						$period = $expiry_limit->expiry_period;
						//get startdate of every user
						$startDate = date('Y-m-d',strtotime($expiries->updated_date_time));
						//get expiry date of every user
						$futureDate=date('Y-m-d', strtotime('+'.$count.''.$period, strtotime($startDate)));
					}
					$result[] = array(
						'id' => $expiries->id,
						'updated_date_time' => $expiries->updated_date_time,
						'user_id' => $expiries->user_id,
						'name' => $expiries->name,
						'created_date_time' => $expiries->created_date_time,
						'package' => $expiries->package,
						'fees' => $expiries->fees,
						'status' => $expiries->status,
						'expiry_date' => $futureDate,
					);
				}
				else{
					//get time of package expiry
					$expiry_limit = DB::table('users')
								->select('packages.expiry_duration','packages.expiry_period')
								->leftjoin('packages','users.package_id','packages.id')
								->where('users.package_id',$row->package_id)
								->first();
					if(!empty($expiry_limit)){
						//get count for expiry(1 month,year,day etc...)
						$count = $expiry_limit->expiry_duration;
						//get period for expiry(month,year,day)
						$period = $expiry_limit->expiry_period;
						//get startdate of every user
						$startDate = date('Y-m-d',strtotime($row->created_date_time));
						//get expiry date of every user
						$futureDate=date('Y-m-d', strtotime('+'.$count.''.$period, strtotime($startDate)));
					}
					$result[] = array(
						'user_id' => $row->user_id,
						'name' => $row->name,
						'created_date_time' => $row->created_date_time,
						'package' => $row->package,
						'fees' => $row->fees,
						'status' => $row->status,
						'expiry_date' => $futureDate,
					);
				}
			}
			$expiry['expiries'] = $result;
			return view('admin.reports.package-expiries',$expiry);
		}
		else{

		}
	}

}