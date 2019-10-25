<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class DashboardController extends Controller
{
    public function index(Request $request){
        if(!empty($request->session()->has('id') && $request->session()->get('role') == 0)){
        	//get user current package
        	$user_package = DB::table('users')
        				->select('packages.package as package','packages.badge')
        				->leftjoin('packages','packages.id','users.package_id')
        				->where('users.id',$request->session()->get('id'))
        				->first();
        	//getting packages for upgrade
        	$packages = DB::table('packages')
							->select('packages.id as package_id','packages.package','packages.fees','packages.badge')
							->leftjoin('users','users.package_id','<','packages.id')
							->where('users.id','=',$request->session()->get('id'))
							->where('packages.status',0);//0 for active and 1 for inactive
			//direct referals
			$direct_referals = DB::table('users')
					->select(DB::raw('count(*) as total_referal_members'))
					->where('sponsor',$request->session()->get('username'))
					->first();
			//get withdraw commission
			$withdraw_commission = DB::table('withdraw_funds')
					->select('requested_amount')
					->where('user_id',$request->session()->get('id'))
					->where('status',1)
					->sum('requested_amount');
			//pending payout amount
			$earnings = DB::table('transactions')
					->select('balance')
					->where('sponsor_id',$request->session()->get('id'))
					->where('from_credit_status',0)
					->sum('balance');
			$expense = DB::table('transactions')
					->select('balance')
					->where('sponsor_id',$request->session()->get('id'))
					->where('from_credit_status',1)
					->sum('balance'); 
			$remaining = $earnings - $expense;
			$payout_pending = $remaining - $withdraw_commission;

			//get commission earnings
			$commission_earnings = DB::table('transactions')
					->select('balance')
					->where('sponsor_id',$request->session()->get('id'))
					->where('cat_id',5)
					->orwhere('cat_id',3)
					->sum('balance');

			$left_query = DB::table('users')
						->select('id')
	    				->where('parent',$request->session()->get('id'))
	    				->where('position',0)
	    				->first();
	    	$right_query = DB::table('users')
						->select('id')
	    				->where('parent',$request->session()->get('id'))
	    				->where('position',1)
						->first();
			if(!empty($left_query)){
				//get right leg earnings
				$get_right_earnings = DB::select(DB::raw("select sum(packages.fees) as right_sales from (select * from users order by parent, id) users_sorted left join packages on packages.id = users_sorted.package_id, (select @pv := '".$request->session()->get('id')."') initialisation where find_in_set(users_sorted.parent, @pv) and length(@pv := concat(@pv, ',',users_sorted.id)) and users_sorted.id != '".$left_query->id."'"));
			    
			}
			else{
			    $get_right_earnings = DB::select(DB::raw("select sum(packages.fees) as right_sales from (select * from users order by parent, id) users_sorted left join packages on packages.id = users_sorted.package_id, (select @pv := '".$request->session()->get('id')."') initialisation where find_in_set(users_sorted.parent, @pv) and length(@pv := concat(@pv, ',',users_sorted.id))"));
			}
			if(!empty($right_query)){
			    //get left leg earnings
			    $get_left_earnings = DB::select(DB::raw("select sum(packages.fees) as left_sales from (select * from users order by parent, id) users_sorted left join packages on packages.id = users_sorted.package_id, (select @pv := '".$request->session()->get('id')."') initialisation where find_in_set(users_sorted.parent, @pv) and length(@pv := concat(@pv, ',',users_sorted.id)) and users_sorted.id != '".$right_query->id."'"));
			}
			else{
				$get_left_earnings = DB::select(DB::raw("select sum(packages.fees) as left_sales from (select * from users order by parent, id) users_sorted left join packages on packages.id = users_sorted.package_id, (select @pv := '".$request->session()->get('id')."') initialisation where find_in_set(users_sorted.parent, @pv) and length(@pv := concat(@pv, ',',users_sorted.id))"));
				
			}

			//Getting Total for sponsor commision
			$sponsor_query = DB::table('transactions')
						->select(DB::raw('sum(balance) as sponsor_commision'),'transactions.from_credit_status','transactions.sponsor_id')
						->where('cat_id',5)
						->where('sponsor_id',$request->session()->get('id'))
						->where('from_credit_status',0)
						->first();
			//Getting Total for level commision
			$level_query = DB::table('transactions')
						->select(DB::raw('sum(balance) as level_commision'),'transactions.from_credit_status','transactions.sponsor_id')
						->where('cat_id',3)
						->where('sponsor_id',$request->session()->get('id'))
						->where('from_credit_status',0)
						->first();
			//Getting Incentive for matching bonus
			$matching_bonus = DB::table('leadership_ranks')
						->select('incentive')
						->leftjoin('users','users.rank_id','leadership_ranks.id')
						->where('users.id',$request->session()->get('id'))
						->first();
			if(!empty($matching_bonus)){
			    $matching_bonus = $matching_bonus->incentive;
			}
			else{
			    $matching_bonus = '';
			}
			//Getting Expenses
			$expenses = DB::table('transactions')
						->select('balance','ewallet_categories.slug','ewallet_categories.name as category_name')
						->leftjoin('ewallet_categories','transactions.cat_id','ewallet_categories.id')
						->where('sponsor_id',$request->session()->get('id'))
						->where('from_credit_status',1)
						->orderby('date','desc')
						->limit(5)
						->get();
			//Getting Withdrawal requests
			$withdraw_requests = DB::table('withdraw_funds')
						->select('*')
						->where('user_id',$request->session()->get('id'))
						->orderby('created_date_time','desc')
						->limit(5)
						->get();
			//Getting Top Earners
			$users = DB::table('users')
						->select('id')
						->orderby('created_date_time','asc')
						->where('id','>',$request->session()->get('id'))
						->limit(5)
						->get();
			if(!empty($users)){
				foreach ($users as $row) {
					$name = DB::table('users')
							->select('name','image')
							->where('id',$row->id)
							->first();
					$earnings = DB::table('transactions')
							->select('balance')
							->where('sponsor_id',$row->id)
							->where('from_credit_status',0)
							->sum('balance');
					$top[] = array(
						'name' => $name->name,
						'image' => $name->image,
						'earnings' => $earnings
					);
				}
			}
			if(empty($top)){
				$top = array();
			}
			//Getting Ranks
			$ranks = DB::table('leadership_ranks')
					->select('id')
					->get();
			foreach ($ranks as $row) {
				$rank_name = DB::table('leadership_ranks')
							->select('rank_name')
							->where('id',$row->id)
							->first();
				$rank_users_count = DB::select(DB::raw("select count('*') as total_users from (select * from users order by parent, id) users_sorted, (select @pv := '".$request->session()->get('id')."') initialisation where find_in_set(users_sorted.parent, @pv) and length(@pv := concat(@pv, ',',users_sorted.id)) and users_sorted.rank_id = '".$row->id."'"));
				$rank_overview[] = array(
					'rank_name' => $rank_name->rank_name,
					'total_users' => $rank_users_count[0]->total_users
				);
			}
			//Getting Packages
			$packages_for_users = DB::table('packages')
					->select('id')
					->get();
			foreach ($packages_for_users as $row) {
				$package_name = DB::table('packages')
					->select('package')
					->where('id',$row->id)
					->first();
				$package_users = DB::select(DB::raw("select count('*') as total_users from (select * from users order by parent, id) users_sorted left join packages on packages.id = users_sorted.package_id, (select @pv := '".$request->session()->get('id')."') initialisation where find_in_set(users_sorted.parent, @pv) and length(@pv := concat(@pv, ',',users_sorted.id)) and users_sorted.package_id = '".$row->id."'"));
				$packages_overview[] = array(
					'package_name' => $package_name->package,
					'total_users' => $package_users[0]->total_users
				);
			}
			//Getting New Joinings
			$new_joinings = DB::table('users')
					->select('first_name','sur_name','name','created_date_time','image')
					->where('status',0)
					->orderby('created_date_time','desc')
					->limit(5)
					->get();
			if(!empty($matching_bonus && $get_left_earnings || $get_right_earnings)){
				$result = array(
					'packages' => $packages->get(),
					'count' => $packages->count(),
					'user_id' => $request->session()->get('id'),
					'current_package' => $user_package,
					'direct_referals' => $direct_referals->total_referal_members,
					'withdraw_commission' => $withdraw_commission,
					'remaining' => $remaining,
					'payout_pending' => $payout_pending,
					'commission_earnings' => $commission_earnings,
					'left_sales' => $get_left_earnings[0]->left_sales,
					'right_sales' => $get_right_earnings[0]->right_sales,
					'sponsor_query' => $sponsor_query->sponsor_commision,
					'level_query' => $level_query->level_commision,
					'matching_bonus' => $matching_bonus,
					'expenses' => $expenses,
					'withdraw_requests' => $withdraw_requests,
					'top_earners' => $top,
					'rank_overview' => $rank_overview,
					'packages_overview' => $packages_overview,
					'new_joinings' => $new_joinings,
				);
			}
			else{
				$result = array(
					'packages' => $packages->get(),
					'count' => $packages->count(),
					'user_id' => $request->session()->get('id'),
					'current_package' => $user_package,
					'direct_referals' => $direct_referals->total_referal_members,
					'withdraw_commission' => $withdraw_commission,
					'remaining' => $remaining,
					'payout_pending' => $payout_pending,
					'commission_earnings' => $commission_earnings,
					'left_sales' => 0,
					'right_sales' => 0,
					'sponsor_query' => $sponsor_query->sponsor_commision,
					'level_query' => $level_query->level_commision,
					'matching_bonus' => '',
					'expenses' => $expenses,
					'withdraw_requests' => $withdraw_requests,
					'top_earners' => $top,
					'rank_overview' => $rank_overview,
					'packages_overview' => $packages_overview,
					'new_joinings' => $new_joinings,
				);
			}
			
            return view('admin.dashboard.index',$result);    
        }
        else{
            return redirect()->route('admin_login');
        }
    	
    }

    public function upgrade_front_package(Request $request,$id,$package_id){
		if(!empty($request->session()->has('id') && $request->session()->get('role') == 1 && $id)){
			//getting ewallet data
            //income
            $query = DB::table('transactions')
                    ->select('balance')
                    ->where('sponsor_id',$request->session()->get('id'))
                    ->where('from_credit_status',0)
                    ->sum('balance');
            //expense
            $expense = DB::table('transactions')
                        ->select('balance')
                        ->where('sponsor_id',$request->session()->get('id'))
                        ->where('from_credit_status',1)
                        ->sum('balance');
            //getting sum
            $amount = $query - $expense;
            $total_amount = $amount;
            //get new package fees
            $package_fees = DB::table('packages')
            		->select('fees')
            		->where('id',$package_id)
            		->first();
            if(!empty($total_amount >= $package_fees->fees)){
            	//get user old package
	            $old_package = DB::table('users')
	            			->select('package_id')
	            			->where('id',$request->session()->get('id'))
	            			->first();
				//set data as coloumns
				$data = array(
					'package_id' => $package_id,
					'updated_date_time' => date('Y-m-d H:i:s')
				);
				//upgrade query
				$update_package = DB::table('users')
								 ->where('id',$id)
								 ->update($data);
				//set data for package upgrade
	            $package_data = array(
	                'ip_address' => $request->ip(),
	                'user_id' => $id,
	                'old_package_id' => $old_package->package_id,
	                'new_package_id' => $package_id,
	                'updated_date_time' => date('Y-m-d H:i:s')
	            );

				//get package price
				$query = DB::table('packages')
						->select('fees')
						->where('id',$package_id)
						->first();
				//set transaction data
				$transaction_data = array(
					'ip_address' => $request->ip(),
					'user_id' => $request->session()->get('id'),
					'sponsor_id' => $request->session()->get('id'),
					'cat_id' => 8,
					'balance' => $query->fees,
					'from_credit_status' => 1,//0 for credit 1 for debit
					'to_credit_status' => 0,
					'date' => date('Y-m-d'),
					'time' => date('H:i:s')
				);
				//insert transaction data
				$insert = DB::table('transactions')
							->insert($transaction_data);
				//insert upgrade package data
				$insert_upgrade = DB::table('upgrade_package_histories')
							->insert($package_data);

				if(!empty($update_package == 1 && $insert == 1 && $insert_upgrade == 1)){
					$notifications = array(
						'message' => 'Package Upgraded Successfully',
						'alert-type' => 'success'
					);	
					return redirect()->route('index')->with($notifications);
				}
				else{
					$notifications = array(
						'message' => 'Something went wrong',
						'alert-type' => 'error'
					);	
					return redirect()->route('index')->with($notifications);
				}
            }
            else{
            	$notifications = array(
					'message' => 'You dont have enough amount in tour ewallet',
					'alert-type' => 'error'
				);	
				return redirect()->route('index')->with($notifications);
            }
		}
		else{
			return redirect()->route('admin_login');
		}
	}

	public function ajax_downlines_chart(Request $request){
		if(!empty($request->session()->has('id') && $request->session()->get('role') == 0)){
			//get data for downlines
			header("Content-type: text/json");

			$jsonString = "
			[{
				name: 'Tokyo',
				data: [1, 2, 3, 4, 5, 6, 7, 8, 9, 3, 4, 5]
			}, {
				name: 'New York',
				data: [1, 2, 3, 4, 5, 6, 7, 8, 9, 3, 4, 5] 
			}]";
			echo $jsonString;
		}
		else{

		}
	}
}
