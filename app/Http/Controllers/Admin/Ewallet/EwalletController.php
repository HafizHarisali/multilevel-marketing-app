<?php
namespace App\Http\Controllers\Admin\Ewallet;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use session;
use DB;
use Carbon\Carbon;
use Carbon\CarbonPeriod;

class EwalletController extends Controller{

	public function index(Request $request){
		if(!empty($request->session()->has('id') && $request->session()->get('role') == 0)){
			//Getting Total for ewallet purchase
			$ewallet_query = DB::table('transactions')
						->select(DB::raw('sum(balance) as ewallet_purchase'),'transactions.from_credit_status','transactions.sponsor_id')
						->where('cat_id',1)
						->where('sponsor_id',$request->session()->get('id'))
						->where('from_credit_status',1)
						->first();
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
			//Getting Total for binary commision
			$binary_query = DB::table('transactions')
						->select(DB::raw('sum(balance) as binary_commision'),'transactions.from_credit_status','transactions.sponsor_id')
						->where('cat_id',2)
						->where('sponsor_id',$request->session()->get('id'))
						->where('from_credit_status',0)
						->first();
			//Getting Total for ewallet debited
			$ewallet_debit_query = DB::table('transactions')
						->select(DB::raw('sum(balance) as ewallet_debit'),'transactions.from_credit_status','transactions.sponsor_id')
						->where('cat_id',6)
						->where('sponsor_id',$request->session()->get('id'))
						->where('from_credit_status',0)
						->first();
			//getting total for fund transfer
			$ewallet_transfer_query = DB::table('transactions')
						->select(DB::raw('sum(balance) as ewallet_transfer'),'transactions.from_credit_status','transactions.sponsor_id')
						->where('cat_id',7)
						->where('sponsor_id',$request->session()->get('id'))
						->where('from_credit_status',1)
						->first();
			//getting total for package upgrade
			$package_upgrade = DB::table('transactions')
						->select(DB::raw('sum(balance) as package_upgrade'),'transactions.from_credit_status','transactions.sponsor_id')
						->where('cat_id',8)
						->where('sponsor_id',$request->session()->get('id'))
						->where('from_credit_status',1)
						->first();
			//store data in array
			$result = array(
				'ewallet_query' => $ewallet_query,
				'sponsor_query' => $sponsor_query,
				'level_query' => $level_query,
				'binary_query' => $binary_query,
				'ewallet_debit_query' => $ewallet_debit_query,
				'ewallet_transfer' => $ewallet_transfer_query,
				'upgrade_package' => $package_upgrade
			);
						
			// $query = DB::table('ewallet')
			// 			->select('ewallet.cat_id','ewallet.user_id','ewallet.balance','ewallet.from_credit_status','ewallet_categories.name')
			// 			->leftjoin('ewallet_categories','ewallet.cat_id','=','ewallet_categories.id')
			// 			->where('user_id','=',$request->session()->get('id'));
			//Getting All Data
			// $result['query'] = $query->get();
			// $result['total_records'] = $query->count();
			$result['get_ewallet_accounts'] = get_ewallet_accounts();
			//return view
			return view('admin.ewallet.ewallet-summary',$result);
		}
		else{
			return redirect()->route('admin_login');
		}
	}

	public function all_transactions(Request $request){
		if(!empty($request->session()->has('id') && $request->session()->get('role') == 0)){
			//Getting Data
			$query = DB::table('transactions')
						->select('transactions.cat_id','transactions.user_id','transactions.sponsor_id','transactions.balance','transactions.from_credit_status','transactions.to_credit_status','transactions.date as transaction_date','transactions.time as transaction_time','ewallet_categories.name as payment_source','users.name as associated_user')
						->leftjoin('users','transactions.user_id','=','users.id')
						->leftjoin('ewallet_categories','transactions.cat_id','=','ewallet_categories.id')
						->where('transactions.sponsor_id',$request->session()->get('id'))
						->orderby('date','desc')
						->orderby('time','desc');
			//Getting All Data

			$result['total_records'] = $query->count();
			$result['query'] = $query->paginate(20,$result['total_records']);
			$result['get_ewallet_accounts'] = get_ewallet_accounts();
			//return view
			return view('admin.ewallet.all-transactions',$result);
		}
		else{
			return redirect()->route('admin_login');
		}
	}

	public function earning_inward_transactions(Request $request){
		if(!empty($request->session()->has('id') && $request->session()->get('role') == 0)){
			//Getting Data
			$query = DB::table('transactions')
						->select('transactions.cat_id','transactions.user_id','transactions.sponsor_id','transactions.balance','transactions.from_credit_status','transactions.to_credit_status','transactions.date as transaction_date','transactions.time as transaction_time','ewallet_categories.name as payment_source','users.name as associated_user')
						->leftjoin('users','transactions.user_id','=','users.id')
						->leftjoin('ewallet_categories','transactions.cat_id','=','ewallet_categories.id')
						->where('transactions.sponsor_id',$request->session()->get('id'))
						->where('transactions.from_credit_status',0)
						->orderby('date','desc')
						->orderby('time','desc');
			//Getting All Data

			$result['total_records'] = $query->count();
			$result['query'] = $query->paginate(20,$result['total_records']);
			$result['get_ewallet_accounts'] = get_ewallet_accounts();
			//return view
			return view('admin.ewallet.all-transactions',$result);
		}
		else{
			return redirect()->route('admin_login');
		}
	}

	public function withdraw_outward_transactions(Request $request){
		if(!empty($request->session()->has('id') && $request->session()->get('role') == 0)){
			//Getting Data
			$query = DB::table('transactions')
						->select('transactions.cat_id','transactions.user_id','transactions.sponsor_id','transactions.balance','transactions.from_credit_status','transactions.to_credit_status','transactions.date as transaction_date','transactions.time as transaction_time','ewallet_categories.name as payment_source','users.name as associated_user')
						->leftjoin('users','transactions.user_id','=','users.id')
						->leftjoin('ewallet_categories','transactions.cat_id','=','ewallet_categories.id')
						->where('transactions.sponsor_id',$request->session()->get('id'))
						->where('transactions.from_credit_status',1)
						->orderby('date','desc')
						->orderby('time','desc');
			//Getting All Data

			$result['total_records'] = $query->count();
			$result['query'] = $query->paginate(20,$result['total_records']);
			$result['get_ewallet_accounts'] = get_ewallet_accounts();
			//return view
			return view('admin.ewallet.all-transactions',$result);
		}
		else{
			return redirect()->route('admin_login');
		}
	}

	public function transfer_funds(Request $request){
		if(!empty($request->session()->has('id') && $request->session()->get('role') == 0)){
			//checking transaction password
			$check = DB::table('transaction_credentials')
						->select('transaction_password')
						->where('user_id',$request->session()->get('id'))
						->where('for_what',0)//0 for transactions and 1 for edit-profile
						->first();
			if(!empty($check)){	
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
			$result['data'] = $amount;
			//return view
			return view('admin.ewallet.transfer-fund',$result);
			}
			else{
			//return view
			return view('admin.ewallet.transaction-auth');
			}

		}
		else{
			return redirect()->route('admin_login');
		}
	}

	//for create transaction password
	public function create_transaction_password(Request $request){
		if(!empty($request->session()->has('id') && $request->session()->get('role') == 0)){

			$validateData = $request->validate([
				'new_password' => 'required_with:confirm_password|same:confirm_password|min:6',
				'confirm_password' => 'required|min:6'
			]);
			//getting inputs
			$password = sha1($request->input('new_password'));
			$confirm_password = sha1($request->input('confirm_password'));
			//matching
			if(!empty($password == $confirm_password)){
				$data = array(
					'transaction_password' => $password,
					'user_id' => $request->session()->get('id'),
					'for_what' => 0,//0 for transactions and 1 for edit profile
					'created_date_time' => date('Y-m-d H:i:s')
				);
				//Query for insert
				if(!empty($data)){
					$insert = DB::table('transaction_credentials')
							->insert($data);
					if(!empty($insert) == 1){
						$notifications = array(
							'message' => 'Password created successfully',
							'alert-type' => 'success',
						);
						return redirect()->route('transfer_funds')->with($notifications);
					}
					else{
						$notifications = array(
							'message' => 'Something went wrong in inserting data',
							'alert-type' => 'error',
						);
						return redirect()->back()->with($notifications);
					}
				}
			}
			else{
				$notifications = array(
					'message' => 'Password Dont Match',
					'alert-type' => 'warning',
				);
				return redirect()->back()->with($notifications);
			}
		}
		else{
			return redirect()->route('admin_login');
		}
	}

	public function confirm_transfer_fund(Request $request){
		if(!empty($request->session()->has('id') && $request->session()->get('role') == 0)){
			$validateData = $request->validate([
				'transfer_amount' => 'required|numeric',
				'transferee' => 'required',
				'password' => 'required'
			]);
			//Get User Status
			$user_status = DB::table('users')
			     ->select('status')
			     ->where('id',$request->input('transferee'))
			     ->first();
			//check transaction password
			$query = DB::table('transaction_credentials')
						->select('transaction_password')
						->where('user_id',$request->session()->get('id'))
						->where('for_what',0)//0 for transactions and 1 for edit-profile
						->first();
			//income
			$income = DB::table('transactions')
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
			//difference
			$amount = $income - $expense;
			if(!empty($user_status->status == 0)){
			    if(!empty($amount > $request->input('transfer_amount'))){
    				if(!empty($request->input('transfer_amount') >= 25)){
    					if(!empty($request->input('transfer_amount') && $request->input('transferee') && $request->input('password'))){
    						if(!empty($query->transaction_password == sha1($request->input('password')))){
    							$data = array(
    								'transfer_amount' => $request->input('transfer_amount'),
    								'transferee' => $request->input('transferee')
    							);
    							//return confirmation view
    							return view('admin.ewallet.confirm-transfer',$data);
    						}
    						else{
    							$notifications = array(
    								'message' => 'Please provide correct password',
    								'alert-type' => 'warning',
    							);
    							return redirect()->back()->with($notifications);
    						}
    					}
    					else{
    						$notifications = array(
    							'message' => 'Please fill all required fields',
    							'alert-type' => 'warning',
    						);
    						return redirect()->back()->with($notifications);
    					}
    				}
    				else{
    					$notifications = array(
    						'message' => 'Transfer amount must be more than $25',
    						'alert-type' => 'warning',
    					);
    					return redirect()->back()->with($notifications);
    				}
    			}
    			else{
    				$notifications = array(
    					'message' => 'You have not enough money in your ewallet',
    					'alert-type' => 'warning',
    				);
    				return redirect()->back()->with($notifications);
    			}   
			}
			else{
			    $notifications = array(
					'message' => 'This member is not verified yet',
					'alert-type' => 'warning',
				);
				return redirect()->back()->with($notifications);
			}
		}
		else{
			return redirect()->route('admin_login');
		}
	}

	public function do_transfer_fund(Request $request){
		if(!empty($request->session()->has('id') && $request->session()->get('role') == 0)){
			$insert = DB::transaction(function(){
				DB::table('transactions')
					->insert(array(
					'ip_address' => \Request::ip(),
					'user_id' => \Request::input('transferee'),
					'sponsor_id' => \Request::session()->get('id'),
					'cat_id' => 7,
					'balance' => \Request::input('transfer_amount'),
					'from_credit_status' => 1,//0 for credit 1 for debit
					'to_credit_status' => 0,
					'date' => date('Y-m-d'),
					'time' => date('H:i:s')
				));
				DB::table('transactions')
					->insert(array(
					'ip_address' => \Request::ip(),
					'user_id' => \Request::session()->get('id'),
					'sponsor_id' => \Request::input('transferee'),
					'cat_id' => 7,
					'balance' => \Request::input('transfer_amount'),
					'from_credit_status' => 0,//0 for credit 1 for debit
					'to_credit_status' => 0,
					'date' => date('Y-m-d'),
					'time' => date('H:i:s')
				));
			});
			$notifications = array(
				'message' => 'Amount Transfered Successfully',
				'alert-type' => 'success',
			);
			return redirect()->route('all_transactions')->with($notifications);
		}
		else{
			return redirect()->route('admin_login');
		}
	}

	public function capping_transactions(Request $request){
		if(!empty($request->session()->has('id') && $request->session()->get('role') == 0)){
			//get all childs
			$query = DB::table('users')
					->select('users.id','users.name','users.created_date_time')
					->where('users.id','>',1)
					->get();
			foreach ($query as $row) {
				//Getting old cappings
				$date = date('Y-m-d',strtotime($row->created_date_time));
				$from_date = Carbon::parse($date);
				$now = Carbon::now();
				$diff = $from_date->diffInMonths($now);
				if(!empty($diff >= 1)){
					$old_capping = DB::table('old_cappings')
						->select('*')
						->where('user_id',$row->id)
						->orderby('from_date','desc')
						->first();
					if(!empty($old_capping)){
						$date = date('Y-m-d',strtotime($old_capping->to_date));
						$from_date = Carbon::parse($date);
						$now = Carbon::now();
						$diff = $from_date->diffInMonths($now);
						if(!empty($diff == 1)){
							$startdate = date('Y-m-d',strtotime("$date +1 month"));
							//$sales_query = DB::select(DB::raw("select sum(packages.fees) as total_sales from (select * from users order by parent, id) users_sorted left join packages on packages.id = users_sorted.package_id, (select @pv := '".$row->id."') initialisation where find_in_set(users_sorted.parent, @pv) and length(@pv := concat(@pv, ',',users_sorted.id)) and users_sorted.created_date_time between '".$date."' and '".$startdate."'"));
							//dd($date.' '.$startdate);
							$level_commission = DB::table('transactions')
							            ->select('balance')
							            ->where('sponsor_id',$row->id)
							            ->where('cat_id',3)
							            ->where('from_credit_status',0)
							            ->whereBetween('date',[$date,$startdate])
							            ->sum('balance');
							$sponsor_commission = DB::table('transactions')
							            ->select('balance')
							            ->where('sponsor_id',$row->id)
							            ->where('cat_id',5)
							            ->where('from_credit_status',0)
							            ->whereBetween('date',[$date,$startdate])
							            ->sum('balance');
							$sales_query = $level_commission + $sponsor_commission;
							//set data for old cappings
							$capping_data = array(
								'from_date' => $date,
								'to_date' => $startdate,
								'user_id' => $row->id,
							);
							$insert = DB::table('old_cappings')
									->insert($capping_data);
							//get package price of users
							$package_price = DB::table('users')
								->select('packages.fees')
								->leftjoin('packages','packages.id','users.package_id')
								->where('users.id',$row->id)
								->first();
							if(!empty($package_price)){
								$double_price = $package_price->fees * 2;
								$capping_amount = $sales_query - $double_price;
								if(!empty($capping_amount > 0)){
									//set data for admin income transactions
    								$admin_transaction_data = array(
    									'ip_address' => $request->ip(),
    									'user_id' => $row->id,
    									'sponsor_id' => $request->session()->get('id'),
    									'cat_id' => 12,
    									'balance' => $capping_amount,
    									'from_credit_status' => 0,
    									'to_credit_status' => 0,
    									'date' => date('Y-m-d'),
    									'time' => date('H:i:s') 
    								);
    								//set data for user expense transactions
    								$user_transaction_data = array(
    									'ip_address' => $request->ip(),
    									'user_id' => $request->session()->get('id'),
    									'sponsor_id' => $row->id,
    									'cat_id' => 12,
    									'balance' => $capping_amount,
    									'from_credit_status' => 1,
    									'to_credit_status' => 0,
    									'date' => date('Y-m-d'),
    									'time' => date('H:i:s') 
    								);
    								$insert_admin_transaction = DB::table('transactions')
    									->insert($admin_transaction_data);
    								$insert_user_transaction = DB::table('transactions')
    									->insert($user_transaction_data);
									//set data for notifications
									$notifications_data = array(
										'user_id' => $request->session()->get('id'),
										'title' => 'Capping Amount Recieved...',
										'message' => 'You have recieved capping amount from '.$row->name,
										'is_seen' => 'no',
										'created_date_time' => date('Y-m-d H:i:s')
									);
									$insert_notification_data = DB::table('notifications')
										->insert($notifications_data);
								}
							}
						}
						
					}
					else{
						$date = date('Y-m-d',strtotime($row->created_date_time));
						$startdate = date('Y-m-d',strtotime("$date +1 month"));
						//$sales_query = DB::select(DB::raw("select sum(packages.fees) as total_sales from (select * from users order by parent, id) users_sorted left join packages on packages.id = users_sorted.package_id, (select @pv := '".$row->id."') initialisation where find_in_set(users_sorted.parent, @pv) and length(@pv := concat(@pv, ',',users_sorted.id)) and users_sorted.created_date_time between '".$date."' and '".$startdate."'"));
						$level_commission = DB::table('transactions')
							            ->select('balance')
							            ->where('sponsor_id',$row->id)
							            ->where('cat_id',3)
							            ->where('from_credit_status',0)
							            ->whereBetween('date',[$date,$startdate])
							            ->sum('balance');
							$sponsor_commission = DB::table('transactions')
							            ->select('balance')
							            ->where('sponsor_id',$row->id)
							            ->where('cat_id',5)
							            ->where('from_credit_status',0)
							            ->whereBetween('date',[$date,$startdate])
							            ->sum('balance');
						$sales_query = $level_commission + $sponsor_commission;
						//set data for old cappings
						$capping_data = array(
							'from_date' => $date,
							'to_date' => $startdate,
							'user_id' => $row->id,
						);
						$insert = DB::table('old_cappings')
								->insert($capping_data);
						//get package price of users
						$package_price = DB::table('users')
							->select('packages.fees as fees')
							->leftjoin('packages','packages.id','users.package_id')
							->where('users.id',$row->id)
							->first();
						if(!empty($package_price)){
							$double_price = $package_price->fees * 2;
							$capping_amount = $sales_query - $double_price;
							if(!empty($capping_amount > 0)){
								//set data for admin income transactions
								$admin_transaction_data = array(
									'ip_address' => $request->ip(),
									'user_id' => $row->id,
									'sponsor_id' => $request->session()->get('id'),
									'cat_id' => 12,
									'balance' => $capping_amount,
									'from_credit_status' => 0,
									'to_credit_status' => 0,
									'date' => date('Y-m-d'),
									'time' => date('H:i:s') 
								);
								//set data for user expense transactions
								$user_transaction_data = array(
									'ip_address' => $request->ip(),
									'user_id' => $request->session()->get('id'),
									'sponsor_id' => $row->id,
									'cat_id' => 12,
									'balance' => $capping_amount,
									'from_credit_status' => 1,
									'to_credit_status' => 0,
									'date' => date('Y-m-d'),
									'time' => date('H:i:s') 
								);
								$insert_admin_transaction = DB::table('transactions')
									->insert($admin_transaction_data);
								$insert_user_transaction = DB::table('transactions')
									->insert($user_transaction_data);
								//set data for notifications
								$notifications_data = array(
									'user_id' => $request->session()->get('id'),
									'title' => 'Capping Amount Recieved...',
									'message' => 'You have recieved capping amount from '.$row->name,
									'is_seen' => 'no',
									'created_date_time' => date('Y-m-d H:i:s')
								);
								$insert_notification_data = DB::table('notifications')
									->insert($notifications_data);
							}
						}
					}
				}
			}
		}
		else{
			return redirect()->route('admin_login');
		}
	}

	public function matching_bonus(Request $request){
		if(!empty($request->session()->has('id') && $request->session()->get('role') == 0)){
			$users = DB::table('users')
				->select('id','name')
				->where('id','>=',1)
				->get();
			//users for associate rank
			foreach ($users as $row) {
				$left_query = DB::table('users')
						->select('id')
	    				->where('parent',$row->id)
	    				->where('position',0)
	    				->first();
	    		$right_query = DB::table('users')
						->select('id')
	    				->where('parent',$row->id)
	    				->where('position',1)
						->first();
				if(!empty($right_query && $left_query)){
					//get right leg earnings
					$get_right_earnings = DB::select(DB::raw("select sum(packages.fees) as right_sale from (select * from users order by parent, id) users_sorted left join packages on packages.id = users_sorted.package_id, (select @pv := '".$row->id."') initialisation where find_in_set(users_sorted.parent, @pv) and length(@pv := concat(@pv, ',',users_sorted.id)) and users_sorted.id != '".$left_query->id."'"));
					//get left leg earnings
					$get_left_earnings = DB::select(DB::raw("select sum(packages.fees) as left_sale from (select * from users order by parent, id) users_sorted left join packages on packages.id = users_sorted.package_id, (select @pv := '".$row->id."') initialisation where find_in_set(users_sorted.parent, @pv) and length(@pv := concat(@pv, ',',users_sorted.id)) and users_sorted.id != '".$right_query->id."'"));
				    	
				    	//get right left package count
					$get_downline_package_data = DB::table('leadership_ranks')
							->select('leadership_ranks.count_left_right_package','leadership_ranks.left_right_package','leadership_ranks.left_earning','leadership_ranks.right_earning','leadership_ranks.qualify_package','packages.id as left_right_package_id','packages.package as left_right_package_name')
							->leftjoin('packages','packages.id','leadership_ranks.left_right_package')
							->where('leadership_ranks.id',1)
							->first();
					if(!empty($get_downline_package_data)){
					    //get count of same package on right leg
    					$right_leg_package_count = DB::select(DB::raw("select count(*) as right_count from (select * from users order by parent, id) users_sorted left join packages on packages.id = users_sorted.package_id, (select @pv := '".$row->id."') initialisation where find_in_set(users_sorted.parent, @pv) and length(@pv := concat(@pv, ',',users_sorted.id)) and users_sorted.id != '".$left_query->id."' and packages.id >= '".$get_downline_package_data->left_right_package_id."'"));
    					//get count of same package on left leg
    					$left_leg_package_count = DB::select(DB::raw("select count(*) as left_count from (select * from users order by parent, id) users_sorted left join packages on packages.id = users_sorted.package_id, (select @pv := '".$row->id."') initialisation where find_in_set(users_sorted.parent, @pv) and length(@pv := concat(@pv, ',',users_sorted.id)) and users_sorted.id != '".$right_query->id."' and packages.id >= '".$get_downline_package_data->left_right_package_id."'"));
    					//get current user package
    					$parent_package = DB::table('users')
    							->select('users.package_id as user_package_id')
    							->where('users.id',$row->id)
    							->first();
    					//get referal users count 
    					$direct_referals_count = DB::table('leadership_ranks')
    							->select('referals')
    							->where('leadership_ranks.id',1)
    							->first();
    					//get users direct referals
    					$user_direct_referals = DB::table('users')
    							->select(DB::raw('count(*) as total_referals'))
    							->where('sponsor',$row->name)
    							->where('users.status',0)
    							->first();
					    if(!empty($get_left_earnings[0]->left_sale >= $get_downline_package_data->left_earning && $get_right_earnings[0]->right_sale >= $get_downline_package_data->right_earning) && !empty($left_leg_package_count[0]->left_count >= $get_downline_package_data->count_left_right_package && $right_leg_package_count[0]->right_count >= $get_downline_package_data->count_left_right_package) && !empty($parent_package->user_package_id >= $get_downline_package_data->qualify_package) && !empty( $user_direct_referals->total_referals >= $direct_referals_count->referals)){

					    	//check if rank_id and user_id already in history
					    	$check_history = DB::table('ranks_history')
					    			->select('id','user_id','rank_id')
					    			->where('user_id',$row->id)
					    			->where('rank_id',1)
					    			->first();
					    	if(empty($check_history)){
					    		//Query for update user rank
								$update = DB::table('users')
											->where('users.id',$row->id)
											->update(array('rank_id' => 1));
								//set data for rank history\
								$data = array(
									'ip_address' => $request->ip(),
									'user_id' => $row->id,
									'rank_id' => 1,
									'updated_date_time' => date('Y-m-d H:i:s')
								);
								if(!empty($data)){
									$rank_history = DB::table('ranks_history')
											->insert($data);
								}
					    	}
							//check data for notifications
							$check = DB::table('notifications')
									->select('*')
									->where('user_id',$row->id)
									->where('message','=','Congratulations!'.$row->name.' have acheived Associate Rank')
									->first();
							if(empty($check)){
								//Set data for notification
								$data = array(
									'user_id' => $row->id,
									'title' => 'Congrats..! Matching Bonus Incentive...',
									'message' => 'Congratulations!'.$row->name.' have acheived Associate Rank',
									'is_seen' => 'no',
									'created_date_time' => date('Y-m-d H:i:s'),
								);
								//Query for insert notification
								$insert = DB::table('notifications')
										->insert($data);
							}
    					}	
					}
				}
				
			}
			//users for senior associate rank
			foreach ($users as $row) {
				$left_query = DB::table('users')
						->select('id')
	    				->where('parent',$row->id)
	    				->where('position',0)
	    				->first();
	    		$right_query = DB::table('users')
						->select('id')
	    				->where('parent',$row->id)
	    				->where('position',1)
					->first();
				if(!empty($right_query && $left_query)){
					//get right leg earnings
					$get_right_earnings = DB::select(DB::raw("select sum(packages.fees) as right_earning from (select * from users order by parent, id) users_sorted left join packages on packages.id = users_sorted.package_id, (select @pv := '".$row->id."') initialisation where find_in_set(users_sorted.parent, @pv) and length(@pv := concat(@pv, ',',users_sorted.id)) and users_sorted.id != '".$left_query->id."'"));
					//get left leg earnings
					$get_left_earnings = DB::select(DB::raw("select sum(packages.fees) as left_earning from (select * from users order by parent, id) users_sorted left join packages on packages.id = users_sorted.package_id, (select @pv := '".$row->id."') initialisation where find_in_set(users_sorted.parent, @pv) and length(@pv := concat(@pv, ',',users_sorted.id)) and users_sorted.id != '".$right_query->id."'"));
					//get right left package count
					$get_downline_package_data = DB::table('leadership_ranks')
							->select('leadership_ranks.count_left_right_package','leadership_ranks.left_right_package','leadership_ranks.left_earning','leadership_ranks.right_earning','leadership_ranks.qualify_package','packages.id as left_right_package_id','packages.package as left_right_package_name')
							->leftjoin('packages','packages.id','leadership_ranks.left_right_package')
							->where('leadership_ranks.id',2)
							->first();
					if(!empty($get_downline_package_data)){
					    //get count of same package on right leg
    					$right_leg_package_count = DB::select(DB::raw("select count(*) as right_count from (select * from users order by parent, id) users_sorted left join packages on packages.id = users_sorted.package_id, (select @pv := '".$row->id."') initialisation where find_in_set(users_sorted.parent, @pv) and length(@pv := concat(@pv, ',',users_sorted.id)) and users_sorted.id != '".$left_query->id."' and packages.id >= '".$get_downline_package_data->left_right_package_id."'"));
    					//get count of same package on left leg
    					$left_leg_package_count = DB::select(DB::raw("select count(*) as left_count from (select * from users order by parent, id) users_sorted left join packages on packages.id = users_sorted.package_id, (select @pv := '".$row->id."') initialisation where find_in_set(users_sorted.parent, @pv) and length(@pv := concat(@pv, ',',users_sorted.id)) and users_sorted.id != '".$right_query->id."' and packages.id >= '".$get_downline_package_data->left_right_package_id."'"));
    					//get current user package
    					$parent_package = DB::table('users')
    							->select('users.package_id as user_package_id')
    							->where('users.id',$row->id)
    							->first();
    					//get referal users count 
    					$direct_referals_count = DB::table('leadership_ranks')
    							->select('referals')
    							->where('leadership_ranks.id',2)
    							->first();
    					//get users direct referals
    					$user_direct_referals = DB::table('users')
    							->select(DB::raw('count(*) as total_referals'))
    							->where('sponsor',$row->name)
    							->where('users.status',0)
    							->first();   
					}
					if(!empty($get_left_earnings[0]->left_earning >= $get_downline_package_data->left_earning && $get_right_earnings[0]->right_earning >= $get_downline_package_data->right_earning) && !empty($left_leg_package_count[0]->left_count >= $get_downline_package_data->count_left_right_package && $right_leg_package_count[0]->right_count >= $get_downline_package_data->count_left_right_package) && !empty($parent_package->user_package_id >= $get_downline_package_data->qualify_package) && !empty($user_direct_referals->total_referals >= $direct_referals_count->referals)){
							//Query for update user rank
							$update = DB::table('users')
										->where('users.id',$row->id)
										->update(array('rank_id' => 2));
							//check if rank_id and user_id already in history
					    	$check_history = DB::table('ranks_history')
					    			->select('id','user_id','rank_id')
					    			->where('user_id',$row->id)
					    			->where('rank_id',2)
					    			->first();
					    	if(empty($check_history)){
					    		//Query for update user rank
								$update = DB::table('users')
											->where('users.id',$row->id)
											->update(array('rank_id' => 2));
								//set data for rank history\
								$data = array(
									'ip_address' => $request->ip(),
									'user_id' => $row->id,
									'rank_id' => 2,
									'updated_date_time' => date('Y-m-d H:i:s')
								);
								if(!empty($data)){
									$rank_history = DB::table('ranks_history')
											->insert($data);
								}
					    	}
							//check data for notifications
							$check = DB::table('notifications')
									->select('*')
									->where('user_id',$row->id)
									->where('message','=','Congratulations!'.$row->name.' have acheived Senior Associate Rank')
									->first();
							if(empty($check)){
								//Set data for notification
								$data = array(
									'user_id' => $row->id,
									'title' => 'Congrats..! Matching Bonus Incentive...',
									'message' => 'Congratulations!'.$row->name.' have acheived Senior Associate Rank',
									'is_seen' => 'no',
									'created_date_time' => date('Y-m-d H:i:s'),
								);
								//Query for insert notification
								$insert = DB::table('notifications')
										->insert($data);
							}
						
					}
				}
				
			}
			//users for franchiser rank
			foreach ($users as $row) {
				$left_query = DB::table('users')
						->select('id')
	    				->where('parent',$row->id)
	    				->where('position',0)
	    				->first();
	    		$right_query = DB::table('users')
						->select('id')
	    				->where('parent',$row->id)
	    				->where('position',1)
						->first();
				if(!empty($right_query && $left_query)){
					//get right leg earnings
					$get_right_earnings = DB::select(DB::raw("select sum(packages.fees) as right_earning from (select * from users order by parent, id) users_sorted left join packages on packages.id = users_sorted.package_id, (select @pv := '".$row->id."') initialisation where find_in_set(users_sorted.parent, @pv) and length(@pv := concat(@pv, ',',users_sorted.id)) and users_sorted.id != '".$left_query->id."'"));
					//get left leg earnings
					$get_left_earnings = DB::select(DB::raw("select sum(packages.fees) as left_earning from (select * from users order by parent, id) users_sorted left join packages on packages.id = users_sorted.package_id, (select @pv := '".$row->id."') initialisation where find_in_set(users_sorted.parent, @pv) and length(@pv := concat(@pv, ',',users_sorted.id)) and users_sorted.id != '".$right_query->id."'"));
					//get right left package count
					$get_downline_package_data = DB::table('leadership_ranks')
							->select('leadership_ranks.count_left_right_package','leadership_ranks.left_right_package','leadership_ranks.left_earning','leadership_ranks.right_earning','leadership_ranks.qualify_package','packages.id as left_right_package_id','packages.package as left_right_package_name')
							->leftjoin('packages','packages.id','leadership_ranks.left_right_package')
							->where('leadership_ranks.id',3)
							->first();
					if(!empty($get_downline_package_data)){
					    //get count of same package on right leg
    					$right_leg_package_count = DB::select(DB::raw("select count(*) as right_count from (select * from users order by parent, id) users_sorted left join packages on packages.id = users_sorted.package_id, (select @pv := '".$row->id."') initialisation where find_in_set(users_sorted.parent, @pv) and length(@pv := concat(@pv, ',',users_sorted.id)) and users_sorted.id != '".$left_query->id."' and packages.id >= '".$get_downline_package_data->left_right_package_id."'"));
    					//get count of same package on left leg
    					$left_leg_package_count = DB::select(DB::raw("select count(*) as left_count from (select * from users order by parent, id) users_sorted left join packages on packages.id = users_sorted.package_id, (select @pv := '".$row->id."') initialisation where find_in_set(users_sorted.parent, @pv) and length(@pv := concat(@pv, ',',users_sorted.id)) and users_sorted.id != '".$right_query->id."' and packages.id >= '".$get_downline_package_data->left_right_package_id."'"));
    					//get current user package
    					$parent_package = DB::table('users')
    							->select('users.package_id as user_package_id')
    							->where('users.id',$row->id)
    							->first();
    					//get referal users count 
    					$direct_referals_count = DB::table('leadership_ranks')
    							->select('referals')
    							->where('leadership_ranks.id',3)
    							->first();
    					//get users direct referals
    					$user_direct_referals = DB::table('users')
    							->select(DB::raw('count(*) as total_referals'))
    							->where('sponsor',$row->name)
    							->where('users.status',0)
    							->first();   
					}
					if(!empty($get_left_earnings[0]->left_earning >= $get_downline_package_data->left_earning && $get_right_earnings[0]->right_earning >= $get_downline_package_data->right_earning) && !empty($left_leg_package_count[0]->left_count >= $get_downline_package_data->count_left_right_package && $right_leg_package_count[0]->right_count >= $get_downline_package_data->count_left_right_package) && !empty($parent_package->user_package_id >= $get_downline_package_data->qualify_package) && !empty($user_direct_referals->total_referals >= $direct_referals_count->referals)){
							$update = DB::table('users')
										->where('users.id',$row->id)
										->update(array('rank_id' => 3));
							//check if rank_id and user_id already in history
					    	$check_history = DB::table('ranks_history')
					    			->select('id','user_id','rank_id')
					    			->where('user_id',$row->id)
					    			->where('rank_id',3)
					    			->first();
					    	if(empty($check_history)){
					    		//Query for update user rank
								$update = DB::table('users')
											->where('users.id',$row->id)
											->update(array('rank_id' => 3));
								//set data for rank history\
								$data = array(
									'ip_address' => $request->ip(),
									'user_id' => $row->id,
									'rank_id' => 3,
									'updated_date_time' => date('Y-m-d H:i:s')
								);
								if(!empty($data)){
									$rank_history = DB::table('ranks_history')
											->insert($data);
								}
					    	}
							//check data for notifications
							$check = DB::table('notifications')
									->select('*')
									->where('user_id',$row->id)
									->where('message','=','Congratulations!'.$row->name.' have acheived Franchiser Rank')
									->first();
							if(empty($check)){
								//Set data for notification
								$data = array(
									'user_id' => $row->id,
									'title' => 'Congrats..! Matching Bonus Incentive...',
									'message' => 'Congratulations!'.$row->name.' have acheived Franchiser Rank',
									'is_seen' => 'no',
									'created_date_time' => date('Y-m-d H:i:s'),
								);
								//Query for insert notification
								$insert = DB::table('notifications')
										->insert($data);
							}
						
					}
				}
				
			}
			//user for manager rank
			foreach ($users as $row) {
				$left_query = DB::table('users')
						->select('id')
	    				->where('parent',$row->id)
	    				->where('position',0)
	    				->first();
	    		$right_query = DB::table('users')
						->select('id')
	    				->where('parent',$row->id)
	    				->where('position',1)
					->first();
				if(!empty($right_query && $left_query)){
					//get right leg earnings
					$get_right_earnings = DB::select(DB::raw("select sum(packages.fees) as right_earning from (select * from users order by parent, id) users_sorted left join packages on packages.id = users_sorted.package_id, (select @pv := '".$row->id."') initialisation where find_in_set(users_sorted.parent, @pv) and length(@pv := concat(@pv, ',',users_sorted.id)) and users_sorted.id != '".$left_query->id."'"));
					//get left leg earnings
					$get_left_earnings = DB::select(DB::raw("select sum(packages.fees) as left_earning from (select * from users order by parent, id) users_sorted left join packages on packages.id = users_sorted.package_id, (select @pv := '".$row->id."') initialisation where find_in_set(users_sorted.parent, @pv) and length(@pv := concat(@pv, ',',users_sorted.id)) and users_sorted.id != '".$right_query->id."'"));
					//get right left package count
					$get_downline_package_data = DB::table('leadership_ranks')
							->select('leadership_ranks.count_left_right_package','leadership_ranks.left_right_package','leadership_ranks.left_earning','leadership_ranks.right_earning','leadership_ranks.qualify_package','packages.id as left_right_package_id','packages.package as left_right_package_name')
							->leftjoin('packages','packages.id','leadership_ranks.left_right_package')
							->where('leadership_ranks.id',4)
							->first();
					if(!empty($get_downline_package_data)){
					    //get count of same package on right leg
    					$right_leg_package_count = DB::select(DB::raw("select count(*) as right_count from (select * from users order by parent, id) users_sorted left join packages on packages.id = users_sorted.package_id, (select @pv := '".$row->id."') initialisation where find_in_set(users_sorted.parent, @pv) and length(@pv := concat(@pv, ',',users_sorted.id)) and users_sorted.id != '".$left_query->id."' and packages.id >= '".$get_downline_package_data->left_right_package_id."'"));
    					//get count of same package on left leg
    					$left_leg_package_count = DB::select(DB::raw("select count(*) as left_count from (select * from users order by parent, id) users_sorted left join packages on packages.id = users_sorted.package_id, (select @pv := '".$row->id."') initialisation where find_in_set(users_sorted.parent, @pv) and length(@pv := concat(@pv, ',',users_sorted.id)) and users_sorted.id != '".$right_query->id."' and packages.id >= '".$get_downline_package_data->left_right_package_id."'"));
    					//get current user package
    					$parent_package = DB::table('users')
    							->select('users.package_id as user_package_id')
    							->where('users.id',$row->id)
    							->first();
    					//get referal users count 
    					$direct_referals_count = DB::table('leadership_ranks')
    							->select('referals')
    							->where('leadership_ranks.id',4)
    							->first();
    					//get users direct referals
    					$user_direct_referals = DB::table('users')
    							->select(DB::raw('count(*) as total_referals'))
    							->where('sponsor',$row->name)
    							->where('users.status',0)
    							->first();   
					}
					if(!empty($get_left_earnings[0]->left_earning >= $get_downline_package_data->left_earning && $get_right_earnings[0]->right_earning >= $get_downline_package_data->right_earning) && !empty($left_leg_package_count[0]->left_count >= $get_downline_package_data->count_left_right_package && $right_leg_package_count[0]->right_count >= $get_downline_package_data->count_left_right_package) && !empty($parent_package->user_package_id >= $get_downline_package_data->qualify_package) && !empty($user_direct_referals->total_referals >= $direct_referals_count->referals)){
							//Query for update user rank
							$update = DB::table('users')
										->where('users.id',$row->id)
										->update(array('rank_id' => 4));
							//check if rank_id and user_id already in history
					    	$check_history = DB::table('ranks_history')
					    			->select('id','user_id','rank_id')
					    			->where('user_id',$row->id)
					    			->where('rank_id',4)
					    			->first();
					    	if(empty($check_history)){
					    		//Query for update user rank
								$update = DB::table('users')
											->where('users.id',$row->id)
											->update(array('rank_id' => 4));
								//set data for rank history\
								$data = array(
									'ip_address' => $request->ip(),
									'user_id' => $row->id,
									'rank_id' => 4,
									'updated_date_time' => date('Y-m-d H:i:s')
								);
								if(!empty($data)){
									$rank_history = DB::table('ranks_history')
											->insert($data);
								}
					    	}
							//check data for notifications
							$check = DB::table('notifications')
									->select('*')
									->where('user_id',$row->id)
									->where('message','=','Congratulations!'.$row->name.' have acheived Manager Rank')
									->first();
							if(empty($check)){
								//Set data for notification
								$data = array(
									'user_id' => $row->id,
									'title' => 'Congrats..! Matching Bonus Incentive...',
									'message' => 'Congratulations!'.$row->name.' have acheived Manager Rank',
									'is_seen' => 'no',
									'created_date_time' => date('Y-m-d H:i:s'),
								);
								//Query for insert notification
								$insert = DB::table('notifications')
										->insert($data);
							}
						
					}
				}
				
			}
			//user for director rank
			foreach ($users as $row) {
				$left_query = DB::table('users')
						->select('id')
	    				->where('parent',$row->id)
	    				->where('position',0)
	    				->first();
	    		$right_query = DB::table('users')
						->select('id')
	    				->where('parent',$row->id)
	    				->where('position',1)
					->first();
				if(!empty($right_query && $left_query)){
					//get right leg earnings
					$get_right_earnings = DB::select(DB::raw("select  COUNT(*) as right_manager_count from (select * from users order by parent, id) users_sorted left join leadership_ranks on leadership_ranks.id = users_sorted.rank_id, (select @pv := '".$row->id."') initialisation where find_in_set(users_sorted.parent, @pv) and length(@pv := concat(@pv, ',',users_sorted.id)) and users_sorted.id != '".$left_query->id."' and leadership_ranks.id = 4"));
					//get left leg earnings
					$get_left_earnings = DB::select(DB::raw("select  COUNT(*) as left_manager_count from (select * from users order by parent, id) users_sorted left join leadership_ranks on leadership_ranks.id = users_sorted.rank_id, (select @pv := '".$row->id."') initialisation where find_in_set(users_sorted.parent, @pv) and length(@pv := concat(@pv, ',',users_sorted.id)) and users_sorted.id != '".$right_query->id."' and leadership_ranks.id = 4"));
					//get right left package count
					$get_downline_package_data = DB::table('leadership_ranks')
							->select('leadership_ranks.count_left_right_package','leadership_ranks.left_right_package','leadership_ranks.left_earning','leadership_ranks.right_earning','leadership_ranks.qualify_package','packages.id as left_right_package_id','packages.package as left_right_package_name')
							->leftjoin('packages','packages.id','leadership_ranks.left_right_package')
							->where('leadership_ranks.id',5)
							->first();
					if(!empty($get_downline_package_data)){
					    //get count of same package on right leg
    					$right_leg_package_count = DB::select(DB::raw("select count(*) as left_count from (select * from users order by parent, id) users_sorted left join packages on packages.id = users_sorted.package_id, (select @pv := '".$row->id."') initialisation where find_in_set(users_sorted.parent, @pv) and length(@pv := concat(@pv, ',',users_sorted.id)) and users_sorted.id != '".$left_query->id."' and packages.id >= '".$get_downline_package_data->left_right_package_id."'"));
    					//get count of same package on left leg
    					$left_leg_package_count = DB::select(DB::raw("select count(*) as right_count from (select * from users order by parent, id) users_sorted left join packages on packages.id = users_sorted.package_id, (select @pv := '".$row->id."') initialisation where find_in_set(users_sorted.parent, @pv) and length(@pv := concat(@pv, ',',users_sorted.id)) and users_sorted.id != '".$right_query->id."' and packages.id >= '".$get_downline_package_data->left_right_package_id."'"));
    					//get current user package
    					$parent_package = DB::table('users')
    							->select('users.package_id as user_package_id')
    							->where('users.id',$row->id)
    							->first();
    					//get referal users count 
    					$direct_referals_count = DB::table('leadership_ranks')
    							->select('referals')
    							->where('leadership_ranks.id',5)
    							->first();
    					//get users direct referals
    					$user_direct_referals = DB::table('users')
    							->select(DB::raw('count(*) as total_referals'))
    							->where('sponsor',$row->name)
    							->where('users.status',0)
    							->first();    
					}
					if(!empty($get_left_earnings[0]->left_manager_count >= 1 && $get_right_earnings[0]->right_manager_count >= 1) && !empty($left_leg_package_count[0]->left_count >= $get_downline_package_data->count_left_right_package && $right_leg_package_count[0]->right_count >= $get_downline_package_data->count_left_right_package) && !empty($parent_package->user_package_id >= $get_downline_package_data->qualify_package) && !empty($user_direct_referals->total_referals >= $direct_referals_count->referals)){
							//Query for update user rank
							$update = DB::table('users')
										->where('users.id',$row->id)
										->update(array('rank_id' => 5));
							//check if rank_id and user_id already in history
					    	$check_history = DB::table('ranks_history')
					    			->select('id','user_id','rank_id')
					    			->where('user_id',$row->id)
					    			->where('rank_id',5)
					    			->first();
					    	if(empty($check_history)){
					    		//Query for update user rank
								$update = DB::table('users')
											->where('users.id',$row->id)
											->update(array('rank_id' => 5));
								//set data for rank history\
								$data = array(
									'ip_address' => $request->ip(),
									'user_id' => $row->id,
									'rank_id' => 5,
									'updated_date_time' => date('Y-m-d H:i:s')
								);
								if(!empty($data)){
									$rank_history = DB::table('ranks_history')
											->insert($data);
								}
					    	}
							//check data for notifications
							$check = DB::table('notifications')
									->select('*')
									->where('user_id',$row->id)
									->where('message','=','Congratulations!'.$row->name.' have acheived Director Rank')
									->first();
							if(empty($check)){
								//Set data for notification
								$data = array(
									'user_id' => $row->id,
									'title' => 'Congrats..! Matching Bonus Incentive...',
									'message' => 'Congratulations!'.$row->name.' have acheived Director Rank',
									'is_seen' => 'no',
									'created_date_time' => date('Y-m-d H:i:s'),
								);
								//Query for insert notification
								$insert = DB::table('notifications')
										->insert($data);
							}
						
					}
				}
				
			}
			//user for executive rank
			foreach ($users as $row) {
				$left_query = DB::table('users')
						->select('id')
	    				->where('parent',$row->id)
	    				->where('position',0)
	    				->first();
	    		$right_query = DB::table('users')
						->select('id')
	    				->where('parent',$row->id)
	    				->where('position',1)
					->first();
				if(!empty($right_query && $left_query)){
					//get right leg earnings
					$get_right_earnings = DB::select(DB::raw("select  COUNT(*) as right_manager_count from (select * from users order by parent, id) users_sorted left join leadership_ranks on leadership_ranks.id = users_sorted.rank_id, (select @pv := '".$row->id."') initialisation where find_in_set(users_sorted.parent, @pv) and length(@pv := concat(@pv, ',',users_sorted.id)) and users_sorted.id != '".$left_query->id."' and leadership_ranks.id = 5"));
					//get left leg earnings
					$get_left_earnings = DB::select(DB::raw("select  COUNT(*) as left_manager_count from (select * from users order by parent, id) users_sorted left join leadership_ranks on leadership_ranks.id = users_sorted.rank_id, (select @pv := '".$row->id."') initialisation where find_in_set(users_sorted.parent, @pv) and length(@pv := concat(@pv, ',',users_sorted.id)) and users_sorted.id != '".$right_query->id."' and leadership_ranks.id = 5"));
					
					//get right left package count
					$get_downline_package_data = DB::table('leadership_ranks')
							->select('leadership_ranks.count_left_right_package','leadership_ranks.left_right_package','leadership_ranks.left_earning','leadership_ranks.right_earning','leadership_ranks.qualify_package','packages.id as left_right_package_id','packages.package as left_right_package_name')
							->leftjoin('packages','packages.id','leadership_ranks.left_right_package')
							->where('leadership_ranks.id',6)
							->first();
					if(!empty($get_downline_package_data)){
					    //get count of same package on right leg
    					$right_leg_package_count = DB::select(DB::raw("select count(*) as left_count from (select * from users order by parent, id) users_sorted left join packages on packages.id = users_sorted.package_id, (select @pv := '".$row->id."') initialisation where find_in_set(users_sorted.parent, @pv) and length(@pv := concat(@pv, ',',users_sorted.id)) and users_sorted.id != '".$left_query->id."' and packages.id >= '".$get_downline_package_data->left_right_package_id."'"));
    					//get count of same package on left leg
    					$left_leg_package_count = DB::select(DB::raw("select count(*) as right_count from (select * from users order by parent, id) users_sorted left join packages on packages.id = users_sorted.package_id, (select @pv := '".$row->id."') initialisation where find_in_set(users_sorted.parent, @pv) and length(@pv := concat(@pv, ',',users_sorted.id)) and users_sorted.id != '".$right_query->id."' and packages.id >= '".$get_downline_package_data->left_right_package_id."'"));
    					//get current user package
    					$parent_package = DB::table('users')
    							->select('users.package_id as user_package_id')
    							->where('users.id',$row->id)
    							->first();
    					//get referal users count 
    					$direct_referals_count = DB::table('leadership_ranks')
    							->select('referals')
    							->where('leadership_ranks.id',6)
    							->first();
    					//get users direct referals
    					$user_direct_referals = DB::table('users')
    							->select(DB::raw('count(*) as total_referals'))
    							->where('sponsor',$row->name)
    							->where('users.status',0)
    							->first();   
					} 
					if(!empty($get_left_earnings[0]->left_manager_count >= 2 && $get_right_earnings[0]->right_manager_count >= 2) && !empty($left_leg_package_count[0]->left_count >= $get_downline_package_data->count_left_right_package && $right_leg_package_count[0]->right_count >= $get_downline_package_data->count_left_right_package) && !empty($parent_package->user_package_id >= $get_downline_package_data->qualify_package) && !empty($user_direct_referals->total_referals >= $direct_referals_count->referals)){
							//Query for update user rank
							$update = DB::table('users')
										->where('users.id',$row->id)
										->update(array('rank_id' => 6));
							//check if rank_id and user_id already in history
					    	$check_history = DB::table('ranks_history')
					    			->select('id','user_id','rank_id')
					    			->where('user_id',$row->id)
					    			->where('rank_id',6)
					    			->first();
					    	if(empty($check_history)){
					    		//Query for update user rank
								$update = DB::table('users')
											->where('users.id',$row->id)
											->update(array('rank_id' => 6));
								//set data for rank history\
								$data = array(
									'ip_address' => $request->ip(),
									'user_id' => $row->id,
									'rank_id' => 6,
									'updated_date_time' => date('Y-m-d H:i:s')
								);
								if(!empty($data)){
									$rank_history = DB::table('ranks_history')
											->insert($data);
								}
					    	}
							//check data for notifications
							$check = DB::table('notifications')
									->select('*')
									->where('user_id',$row->id)
									->where('message','=','Congratulations!'.$row->name.' have acheived Exective Rank')
									->first();
							if(empty($check)){
								//Set data for notification
								$data = array(
									'user_id' => $row->id,
									'title' => 'Congrats..! Matching Bonus Incentive...',
									'message' => 'Congratulations!'.$row->name.' have acheived Exective Rank',
									'is_seen' => 'no',
									'created_date_time' => date('Y-m-d H:i:s'),
								);
								//Query for insert notification
								$insert = DB::table('notifications')
										->insert($data);
							}
						
					}
				}
				
			}
			//user for president rank
			foreach ($users as $row) {
				$left_query = DB::table('users')
						->select('id')
	    				->where('parent',$row->id)
	    				->where('position',0)
	    				->first();
	    		$right_query = DB::table('users')
						->select('id')
	    				->where('parent',$row->id)
	    				->where('position',1)
					->first();
				if(!empty($right_query && $left_query)){
					//get right leg earnings
					$get_right_earnings = DB::select(DB::raw("select  COUNT(*) as right_manager_count from (select * from users order by parent, id) users_sorted left join leadership_ranks on leadership_ranks.id = users_sorted.rank_id, (select @pv := '".$row->id."') initialisation where find_in_set(users_sorted.parent, @pv) and length(@pv := concat(@pv, ',',users_sorted.id)) and users_sorted.id != '".$left_query->id."' and leadership_ranks.id = 6"));
					//get left leg earnings
					$get_left_earnings = DB::select(DB::raw("select  COUNT(*) as left_manager_count from (select * from users order by parent, id) users_sorted left join leadership_ranks on leadership_ranks.id = users_sorted.rank_id, (select @pv := '".$row->id."') initialisation where find_in_set(users_sorted.parent, @pv) and length(@pv := concat(@pv, ',',users_sorted.id)) and users_sorted.id != '".$right_query->id."' and leadership_ranks.id = 6"));
					//get right left package count
					$get_downline_package_data = DB::table('leadership_ranks')
							->select('leadership_ranks.count_left_right_package','leadership_ranks.left_right_package','leadership_ranks.left_earning','leadership_ranks.right_earning','leadership_ranks.qualify_package','packages.id as left_right_package_id','packages.package as left_right_package_name')
							->leftjoin('packages','packages.id','leadership_ranks.left_right_package')
							->where('leadership_ranks.id',7)
							->first();
					if(!empty($get_downline_package_data)){
					    //get count of same package on right leg
    					$right_leg_package_count = DB::select(DB::raw("select count(*) as right_count from (select * from users order by parent, id) users_sorted left join packages on packages.id = users_sorted.package_id, (select @pv := '".$row->id."') initialisation where find_in_set(users_sorted.parent, @pv) and length(@pv := concat(@pv, ',',users_sorted.id)) and users_sorted.id != '".$left_query->id."' and packages.id >= '".$get_downline_package_data->left_right_package_id."'"));
    					//get count of same package on left leg
    					$left_leg_package_count = DB::select(DB::raw("select count(*) as left_count from (select * from users order by parent, id) users_sorted left join packages on packages.id = users_sorted.package_id, (select @pv := '".$row->id."') initialisation where find_in_set(users_sorted.parent, @pv) and length(@pv := concat(@pv, ',',users_sorted.id)) and users_sorted.id != '".$right_query->id."' and packages.id >= '".$get_downline_package_data->left_right_package_id."'"));
    					//get current user package
    					$parent_package = DB::table('users')
    							->select('users.package_id as user_package_id')
    							->where('users.id',$row->id)
    							->first(); 
    					//get referal users count 
    					$direct_referals_count = DB::table('leadership_ranks')
    							->select('referals')
    							->where('leadership_ranks.id',7)
    							->first();
    					//get users direct referals
    					$user_direct_referals = DB::table('users')
    							->select(DB::raw('count(*) as total_referals'))
    							->where('sponsor',$row->name)
    							->where('users.status',0)
    							->first();
					}
							
					if(!empty($get_left_earnings[0]->left_manager_count >= 4 && $get_right_earnings[0]->right_manager_count >= 4) && !empty($left_leg_package_count[0]->left_count >= $get_downline_package_data->count_left_right_package && $right_leg_package_count[0]->right_count >= $get_downline_package_data->count_left_right_package) && !empty($parent_package->user_package_id >= $get_downline_package_data->qualify_package) && !empty($user_direct_referals->total_referals >= $direct_referals_count->referals)){
							//Query for update user rank
							$update = DB::table('users')
										->where('users.id',$row->id)
										->update(array('rank_id' => 7));
							//check if rank_id and user_id already in history
					    	$check_history = DB::table('ranks_history')
					    			->select('id','user_id','rank_id')
					    			->where('user_id',$row->id)
					    			->where('rank_id',7)
					    			->first();
					    	if(empty($check_history)){
					    		//Query for update user rank
								$update = DB::table('users')
											->where('users.id',$row->id)
											->update(array('rank_id' => 7));
								//set data for rank history\
								$data = array(
									'ip_address' => $request->ip(),
									'user_id' => $row->id,
									'rank_id' => 7,
									'updated_date_time' => date('Y-m-d H:i:s')
								);
								if(!empty($data)){
									$rank_history = DB::table('ranks_history')
											->insert($data);
								}
					    	}
							//check data for notifications
							$check = DB::table('notifications')
									->select('*')
									->where('user_id',$row->id)
									->where('message','=','Congratulations!'.$row->name.' have acheived President Rank')
									->first();
							if(empty($check)){
								//Set data for notification
								$data = array(
									'user_id' => $row->id,
									'title' => 'Congrats..! Matching Bonus Incentive...',
									'message' => 'Congratulations!'.$row->name.' have acheived President Rank',
									'is_seen' => 'no',
									'created_date_time' => date('Y-m-d H:i:s'),
								);
								//Query for insert notification
								$insert = DB::table('notifications')
										->insert($data);
							}
						
					}
				}
				
			}
			return redirect()->route('matching_bonus_members');
		}
		else{
			return redirect()->route('admin_login');
		}
	}

	public function payment_methods(Request $request){
		if(!empty($request->session()->has('id') && $request->session()->get('role') == 0)){
			//Query for checking if user has transaction password
			$query = DB::table('transaction_credentials')
						->select('transaction_password')
						->where('user_id',$request->session()->get('id'))
						->where('for_what',0)//0 for transactions and 1 for edit profile
						->first();
			if(!empty($query)){
				//Getting All Payment Methods
				$query = DB::table('payment_methods')
							->select('*');
				$result['payment_methods'] = $query->get();
				$result['total_records'] = $query->count();
				return view('admin.ewallet.withdrawal.payment-methods',$result);
			}
			else{
				return view('admin.ewallet.transaction-auth');
			}	
		}
		else{
			return redirect()->route('admin_login');
		}
	}

	// public function save_payment_methods(Request $request){
	// 	if(!empty($request->session()->has('id') && $request->session()->get('role') == 0)){
	// 		//Check if user has already payment methods set
	// 		$query = DB::table('user_payment_methods')
	// 				->select('id','payment_method_id')
	// 				->where('user_id',$request->session()->get('id'))
	// 				->where('status',0)
	// 				->get();
	// 		if($query->count() > 0){
	// 			foreach ($query as $row) {
	// 				if($row->payment_method_id == $request->input('payment_method_id')){
	// 					//set data as coloumns
	// 					$data = array(
	// 						'payment_method_id' => $row->payment_method_id,
	// 						'user_id' => $request->session()->get('id'),
	// 						'status' => $request->input('status'),
	// 						'created_date_time' => date('Y-m-d H:i:s')
	// 					);
	// 					//Update data
	// 					$update = DB::table('user_payment_methods')
	// 							->where('user_id',$request->session()->get('id'))
	// 							->update($data);
	// 				}
	// 			}
	// 		}
	// 		else{
	// 			//Getting All Payment Methods
	// 			$payment_methods = DB::table('payment_methods')
	// 					->select('*')
	// 					->get();
	// 			foreach ($payment_methods as $row) {
	// 				//Set data as coloumns
	// 				$data = array(
	// 					'payment_method_id' => $request->input('payment_method_id'),
	// 					'user_id' => $request->session()->get('id'),
	// 					'status' => $request->input('status'),
	// 					'created_date_time' => date('Y-m-d H:i:s')
	// 				);
	// 				//Insert user payment methods
	// 				$update = DB::table('user_payment_methods')
	// 						->insert($data);
	// 			}
	// 		}
	// 		if(!empty($update == 1)){
	// 			$notifications = array(
	// 				'message' => 'Payment Methods Save Successfully',
	// 				'alert-type' => 'success',
	// 			);
	// 			return redirect()->back()->with($notifications);
	// 		}
	// 		else{
	// 			$notifications = array(
	// 				'message' => 'Something went wrong',
	// 				'alert-type' => 'error',
	// 			);
	// 			return redirect()->back()->with($notifications);
	// 		}

	// 		//Save payment methods for specific user

	// 	}
	// 	else{
	// 		return redirect()->route('admin_login');
	// 	}
	// }

	public function payment_ewallet_address(Request $request,$slug){
		if(!empty($request->session()->has('id') && $request->session()->get('role') == 0)){
			//Getting old wallet address for specific payment method and user
			$wallet_address = DB::table('ewallet_addresses')
						->select('wallet_address')
						->leftjoin('payment_methods','payment_methods.id','ewallet_addresses.payment_method_id')
						->where('payment_methods.slug',$slug)
						->first();
			//Getting payment methods data
			$payment_methods = DB::table('payment_methods')
						->select('slug')
						->where('slug',$slug);
			//Query for getting active payout
			$active_payout = DB::table('withdraw_funds')
					->select('*')
					->where('user_id',$request->session()->get('id'))
					->where('status',0);//0 for active, 1 for approve, 2 for rejected
			
			$result['active_payout'] = $active_payout->first(); 
			$result['payment_methods'] = $payment_methods->first();
			$result['wallet_address'] = $wallet_address;
			return view('admin.ewallet.withdrawal.create-wallet-address',$result);
		}
		else{
			return redirect()->route('admin_login');
		}
	}

	public function create_ewallet_address(Request $request,$slug){
		if(!empty($request->session()->has('id') && $request->session()->get('role') == 0)){
			$validateData = $request->validate([
				'authorization_password' => 'required',
				'wallet_address' => 'required'
			]);
			//check for transaction password for specific user
			$check = DB::table('transaction_credentials')
					->select('transaction_password')
					->where('user_id',$request->session()->get('id'))
					->where('for_what',0)//0 for transactions and 1 for edit profile
					->first();
			//getting payment method id
			$payment_method_id = DB::table('payment_methods')
					->select('id')
					->where('slug',$slug)
					->first();
			if(!empty($check->transaction_password == sha1($request->input('authorization_password')))){
				//Check user active payouts
				$check_active_payout = DB::table('withdraw_funds')
					->select('*')
					->where('user_id',$request->session()->get('id'))
					->where('status',0)//0 for active, 1 for approve and 2 for rejected
					->orderby('created_date_time','desc')
					->first();
				if(empty($check_active_payout)){
					//set data for create
					$data = array(
						'wallet_address' => $request->input('wallet_address'),
						'user_id' => $request->session()->get('id'),
						'payment_method_id' => $payment_method_id->id,
						'created_date_time' => date('Y-m-d H:i:s')
					);
					//Query for insert wallet address for specific payment method
					$insert = DB::table('ewallet_addresses')
							->insert($data);
					if(!empty($insert == 1)){
						$notifications = array(
							'message' => 'Wallet Address Created Successfully For'.$slug,
							'alert-type' => 'success',
						);
						return redirect()->back()->with($notifications);
					}
					else{
						$notifications = array(
							'message' => 'somthing went wrong',
							'alert-type' => 'error',
						);
						return redirect()->back()->with($notifications);
					}
				}
				else{
					$notifications = array(
						'message' => 'You have already active payout request.Try Later',
						'alert-type' => 'info',
					);
					return redirect()->back()->with($notifications);
				}
				
			}
			else{
				$notifications = array(
					'message' => 'You are providing wrong password',
					'alert-type' => 'warning',
				);
				return redirect()->back()->with($notifications);
			}

			
		}
		else{
			return redirect()->route('admin_login');
		}
	}

	public function withdraw_funds_view(Request $request){
		if(!empty($request->session()->has('id') && $request->session()->get('role') == 0)){
			//checking transaction password
			$check = DB::table('transaction_credentials')
						->select('transaction_password')
						->where('user_id',$request->session()->get('id'))
						->where('for_what',0)//0 for transactions and 1 for edit-profile
						->first();
			if(!empty($check)){	
				//getting ewallet data
				$query = DB::table('transactions')
						->select('balance')
						->where('sponsor_id',$request->session()->get('id'))
						->where('from_credit_status',0)
						->sum('balance');
				$expense = DB::table('transactions')
							->select('balance')
							->where('sponsor_id',$request->session()->get('id'))
							->where('from_credit_status',1)
							->sum('balance');
				$amount = $query - $expense;
				$result['data'] = $amount;
				//Getting Active withdrawal requests
				$active_withdraw_request = DB::table('withdraw_funds')
						->select(DB::raw('count(*) as active_withdraw_request'))
						->where('user_id',$request->session()->get('id'))
						->where('status',0)
						->first();
				$result['active_withdraw_request'] = $active_withdraw_request; 
				//Getting All Payment Methods
				$query = DB::table('payment_methods')
						->select('*');
				$result['query'] = $query->get();
				
				//getting ewallet settings
				$ewallet_settings = DB::table('ewallet_settings')
				        ->select('minimum_amount','processing_tax')
				        ->where('id',1);
				$result['ewallet_settings'] = $ewallet_settings->first();
				return view('admin.ewallet.withdrawal.create-withdrawal-request',$result);
			}
			else{
				return view('admin.ewallet.transaction-auth');
			}
		}
		else{
			return redirect()->route('admin_login');
		}
	}

	public function do_withdraw_fund(Request $request){
		if(!empty($request->session()->has('id') && $request->session()->get('role') == 0)){
			
			$validateData = $request->validate([
				'withdraw_amount' => 'required|numeric',
				'payment_method_id' => 'required',
				'transaction_password' => 'required'
			]); 

			//Getting Ewallet Remaining amount for specific user
			$query = DB::table('transactions')
						->select('balance')
						->where('sponsor_id',$request->session()->get('id'))
						->where('from_credit_status',0)
						->sum('balance');
			$expense = DB::table('transactions')
						->select('balance')
						->where('sponsor_id',$request->session()->get('id'))
						->where('from_credit_status',1)
						->sum('balance');
			$amount = $query - $expense;
			//Getting User Active Payouts
			$user_active_payout = DB::table('withdraw_funds')
						->select(DB::raw('count(*) as user_active_payout'))
						->where('user_id',$request->session()->get('id'))
						->where('status',0)
						->first();
			//getting ewallet settings
			$ewallet_settings = DB::table('ewallet_settings')
			            ->select('minimum_amount','processing_tax')
			            ->where('id',1)
			            ->first();
			//check ewallet settings if empty
			if(!empty($ewallet_settings->minimum_amount)){
			    $minimum_amount = $ewallet_settings->minimum_amount;
			}
			else{
			    $minimum_amount = 0;
			}
			if(!empty($ewallet_settings->processing_tax)){
			    $processing_tax = $ewallet_settings->processing_tax;
			}
			else{
			    $processing_tax = 0;
			}
			if(!empty($user_active_payout->user_active_payout <= 0)){
				if(!empty($request->input('withdraw_amount') > $minimum_amount)){
					if(!empty($request->input('withdraw_amount') > $amount)){
						$notifications = array(
							'message' => 'You have not enough amount',
							'alert-type' => 'error',
						);
						return redirect()->back()->with($notifications);
					}
					else{
						//Check User Transaction Password
						$check_password = DB::table('transaction_credentials')
								->select('transaction_password')
								->where('user_id',$request->session()->get('id'))
								->where('for_what',0)//0 for transactions and 1 for edit profile
								->first();
						if(!empty($check_password->transaction_password == sha1($request->input('transaction_password')))){
							//Check Wallet address for specific payment method and user
							$check_wallet_address = DB::table('ewallet_addresses')
									->select('id','wallet_address')
									->where('user_id',$request->session()->get('id'))
									->where('payment_method_id',$request->input('payment_method_id'))
									->first();
							if(!empty($check_wallet_address->wallet_address)){
								//Getting 17% of total amount to be withdraw
								$charges = $request->input('withdraw_amount') / 100 * $processing_tax;
								$payable_amount = $request->input('withdraw_amount') - $charges;
								//set data as coloumns
								$data = array(
									'user_id' => $request->session()->get('id'),
									'payment_method_id' => $request->input('payment_method_id'),
									'ewallet_address_id' => $check_wallet_address->id,
									'requested_amount' => $request->input('withdraw_amount'),
									'withdraw_charges' => $charges,
									'payable_amount' =>  $payable_amount,
									'notes' => 'Pending|withdraw request',
									'status' => 0,//0 for active, 1 for approve and 2 for rejected
									'created_date_time' => date('Y-m-d H:i:s'),
									'updated_date_time' => date('Y-m-d H:i:s'),
								);
								if(!empty($data)){
									//Insert Withdraw request data
									$insert_withdraw_request = DB::table('withdraw_funds')
											->insert($data);
									//set data for transactions as coloumns
									$transaction_data = array(
										'ip_address' => $request->ip(),
										'user_id' => $request->session()->get('id'),
										'sponsor_id' => $request->session()->get('id'),
										'cat_id' => 9,
										'balance' => $request->input('withdraw_amount'),
										'from_credit_status' => 1, //0 for credit and 1 for debit
										'to_credit_status' => 0,
										'date' => date('Y-m-d'),
										'time' => date('H:i:s')
									);
									//Insert Transaction Data
									$insert_transaction_data = DB::table('transactions')
											->insert($transaction_data);
									//set data for notifications as coloumns
									$notifications_data = array(
										'user_id' => $request->session()->get('id'),
										'title' => 'Withdrawal Request...',
										'message' => 'Withdrawal Request from '.$request->session()->get('username'),
										'is_seen' => 'no',
										'created_date_time' => date('Y-m-d H:i:s')
									);
									//Insert Notifications data
									$insert_notification_data = DB::table('notifications')
												->insert($notifications_data);
									if(!empty($insert_withdraw_request && $insert_transaction_data && $insert_notification_data)){
										$notifications = array(
											'message' => 'Withdrawal Request Submitted.You will be notify when Admin Approve Your Request',
											'alert-type' => 'success',
										);
										return redirect()->route('my_active_withdrawal_request')->with($notifications);
									}

								}
							}
							else{
								$notifications = array(
									'message' => 'Please create wallet address first for this payment method by navigate through payment preferences > configuration',
									'alert-type' => 'warning'
								);
								return redirect()->back()->with($notifications);
							}
						}
						else{
							$notifications = array(
								'message' => 'You are providing wrong password',
								'alert-type' => 'warning'
							);
							return redirect()->back()->with($notifications);
						}
					}
				}
				else{
					$notifications = array(
						'message' => 'Withdraw amount must be greater than $'.$minimum_amount,
						'alert-type' => 'warning'
					);
					return redirect()->back()->with($notifications);
				}
			}
			else{
				$notifications = array(
					'message' => 'You have already 1 active payout request. Try after This',
					'alert-type' => 'warning'
				);
				return redirect()->back()->with($notifications);
			}
		}
		else{
			return redirect()->route('admin_login');
		}
	}

	public function my_active_withdrawal_request(Request $request){
		if(!empty($request->session()->has('id') && $request->session()->get('role') == 0)){
			//Getting User Active Withdrawal Requests
			$query = DB::table('withdraw_funds')
					->select('withdraw_funds.id as request_id','withdraw_funds.requested_amount','withdraw_funds.withdraw_charges','withdraw_funds.payable_amount','withdraw_funds.notes','withdraw_funds.status','withdraw_funds.created_date_time','withdraw_funds.updated_date_time','payment_methods.name as payment_method_name','ewallet_addresses.wallet_address')
					->leftjoin('payment_methods','payment_methods.id','withdraw_funds.payment_method_id')
					->leftjoin('ewallet_addresses','ewallet_addresses.id','withdraw_funds.ewallet_address_id')
					->where('withdraw_funds.user_id',$request->session()->get('id'))
					->where('withdraw_funds.status',0);//0 for active, 1 for approve and 2 for rejected

			$result['total_records'] = $query->count();
			$result['active_payouts'] = $query->paginate(20,$result['total_records']);
			return view('admin.ewallet.withdrawal.active-withdrawal-request',$result); 
		}
		else{
			return redirect()->route('admin_login');
		}
	}

	public function my_processed_withdrawal_request(Request $request){
		if(!empty($request->session()->has('id') && $request->session()->get('role') == 0)){
			//Getting User Active Withdrawal Requests
			$query = DB::table('withdraw_funds')
					->select('withdraw_funds.id as request_id','withdraw_funds.requested_amount','withdraw_funds.withdraw_charges','withdraw_funds.payable_amount','withdraw_funds.notes','withdraw_funds.status','withdraw_funds.created_date_time','withdraw_funds.updated_date_time','payment_methods.name as payment_method_name','ewallet_addresses.wallet_address')
					->leftjoin('payment_methods','payment_methods.id','withdraw_funds.payment_method_id')
					->leftjoin('ewallet_addresses','ewallet_addresses.id','withdraw_funds.ewallet_address_id')
					->where('withdraw_funds.user_id',$request->session()->get('id'))
					->where('withdraw_funds.status',1);//0 for active, 1 for approve and 2 for rejected
			$result['active_payouts'] = $query->get();
			$result['total_records'] = $query->count();
			return view('admin.ewallet.withdrawal.approved-pending-payment-requests',$result); 
		}
		else{
			return redirect()->route('admin_login');
		}
	}

	public function my_paid_withdrawal_request(Request $request){
		if(!empty($request->session()->has('id') && $request->session()->get('role') == 0)){
			//Getting User Active Withdrawal Requests
			$query = DB::table('withdraw_funds')
					->select('withdraw_funds.id as request_id','withdraw_funds.requested_amount','withdraw_funds.withdraw_charges','withdraw_funds.payable_amount','withdraw_funds.notes','withdraw_funds.status','withdraw_funds.created_date_time','withdraw_funds.updated_date_time','payment_methods.name as payment_method_name','ewallet_addresses.wallet_address')
					->leftjoin('payment_methods','payment_methods.id','withdraw_funds.payment_method_id')
					->leftjoin('ewallet_addresses','ewallet_addresses.id','withdraw_funds.ewallet_address_id')
					->where('withdraw_funds.user_id',$request->session()->get('id'))
					->where('withdraw_funds.status',3);//0 for active, 1 for approve and 2 for rejected
			$result['active_payouts'] = $query->get();
			$result['total_records'] = $query->count();
			return view('admin.ewallet.withdrawal.approved-paid-requests',$result); 
		}
		else{
			return redirect()->route('admin_login');
		}
	}

	public function my_rejected_withdrawal_request(Request $request){
		if(!empty($request->session()->has('id') && $request->session()->get('role') == 0)){
			//Getting User Active Withdrawal Requests
			$query = DB::table('withdraw_funds')
					->select('withdraw_funds.id as request_id','withdraw_funds.requested_amount','withdraw_funds.withdraw_charges','withdraw_funds.payable_amount','withdraw_funds.notes','withdraw_funds.status','withdraw_funds.created_date_time','withdraw_funds.updated_date_time','payment_methods.name as payment_method_name','ewallet_addresses.wallet_address')
					->leftjoin('payment_methods','payment_methods.id','withdraw_funds.payment_method_id')
					->leftjoin('ewallet_addresses','ewallet_addresses.id','withdraw_funds.ewallet_address_id')
					->where('withdraw_funds.user_id',$request->session()->get('id'))
					->where('withdraw_funds.status',2);//0 for active, 1 for approve and 2 for rejected
			$result['active_payouts'] = $query->get();
			$result['total_records'] = $query->count();
			return view('admin.ewallet.withdrawal.rejected-requests',$result); 
		}
		else{
			return redirect()->route('admin_login');
		}
	}

	public function cancel_my_withdrawal_request(Request $request){
		if(!empty($request->session()->has('id') && $request->session()->get('role') == 0)){
			if(!empty($request->input('views_bulk_operations') > 0 && $request->input('operation') == 2)){
				//Get last active payout
				$last_active_payout = DB::table('withdraw_funds')
						->select('requested_amount')
						->where('user_id',$request->session()->get('id'))
						->where('status',0)
						->orderby('created_date_time','desc')
						->first();
				//Set data for transaction
				$transaction_data = array(
					'ip_address' => $request->ip(),
					'user_id' => $request->session()->get('id'),
					'sponsor_id' => $request->session()->get('id'),
					'cat_id' => 10,
					'balance' => $last_active_payout->requested_amount,
					'from_credit_status' => 0, //0 for credit and 1 for debit
					'to_credit_status' => 0,
					'date' => date('Y-m-d'),
					'time' => date('H:i:s')
				);
				//set data for update withdraw request
				$data = array(
					'notes' => 'Cancelled',
					'status' => 2,
					'updated_date_time' => date('Y-m-d H:i:s')
				);
				//Set data for notifications
				$notifications_data = array(
					'user_id' => $request->session()->get('id'),
					'title' => 'Withdrawal Request Cancelled',
					'message' => 'Your Withdrawal Request Is Cancelled By Admin',
					'is_seen' => 'no',
					'created_date_time' => date('Y-m-d H:i:s')
				);
				if(!empty($transaction_data && $data && $notifications_data)){
					//Query for update
					$update_withdraw = DB::table('withdraw_funds')
							->where('user_id',$request->session()->get('id'))
							->where('status',0)
							->orderby('created_date_time','desc')
							->update($data);
				
					//Query for insert transaction data
					$insert_transaction_data = DB::table('transactions')
							->insert($transaction_data);

					//Query for insert notifications data
					$insert_notification_data = DB::table('notifications')
							->insert($notifications_data);

					$notifications = array(
						'message' => 'Your Withdrawal Request Cancelled Successfully',
						'alert-type' => 'success'
					);
					return redirect()->back()->with($notifications);
				}
			}
			else{
				$notifications = array(
					'message' => 'Please Select Atleast 1 item from data for edit Or select atleast 1 operation',
					'alert-type' => 'error'
				);
				return redirect()->back()->with($notifications);
			}
		}
		else{
			return redirect()->route('admin_login');
		}
	}

	public function withdraw_waiting_requests(Request $request){
		if(!empty($request->session()->has('id') && $request->session()->get('role') == 0)){
			//Getting all waiting for approval withdraw requests
			$query = DB::table('withdraw_funds')
					->select('withdraw_funds.*','users.first_name','users.sur_name','users.name','ewallet_addresses.wallet_address','payment_methods.name as payment_method_name')
					->leftjoin('users','withdraw_funds.user_id','users.id')
					->leftjoin('ewallet_addresses','withdraw_funds.ewallet_address_id','ewallet_addresses.id')
					->leftjoin('payment_methods','withdraw_funds.payment_method_id','payment_methods.id')
					->where('withdraw_funds.status',0);

			$result['total_records'] = $query->count();
			$result['withdraw_waiting'] = $query->paginate(20,$result['total_records']);
			return view('admin.ewallet.memberswithdraw.withdraw-waiting-requests',$result);
		}
		else{
			return redirect()->route('admin_login');
		}
	}

	public function withdraw_processed_requests(Request $request){
		if(!empty($request->session()->has('id') && $request->session()->get('role') == 0)){
			//Getting all waiting for approval withdraw requests
			$query = DB::table('withdraw_funds')
					->select('withdraw_funds.*','users.first_name','users.sur_name','users.name','ewallet_addresses.wallet_address','payment_methods.name as payment_method_name')
					->leftjoin('users','withdraw_funds.user_id','users.id')
					->leftjoin('ewallet_addresses','withdraw_funds.ewallet_address_id','ewallet_addresses.id')
					->leftjoin('payment_methods','withdraw_funds.payment_method_id','payment_methods.id')
					->where('withdraw_funds.status',3);//0 for active/waiting_approval, 1 for approved/paid, 2 for reject and 3 for processed

			$result['total_records'] = $query->count();
			$result['withdraw_processed'] = $query->paginate(20,$result['total_records']);
			return view('admin.ewallet.memberswithdraw.withdraw-waiting-payments',$result);
		}
		else{
			return redirect()->route('admin_login');
		}
	}

	public function withdraw_paid_requests(Request $request){
		if(!empty($request->session()->has('id') && $request->session()->get('role') == 0)){
			//Getting all waiting for approval withdraw requests
			$query = DB::table('withdraw_funds')
					->select('withdraw_funds.*','users.first_name','users.sur_name','users.name','ewallet_addresses.wallet_address','payment_methods.name as payment_method_name')
					->leftjoin('users','withdraw_funds.user_id','users.id')
					->leftjoin('ewallet_addresses','withdraw_funds.ewallet_address_id','ewallet_addresses.id')
					->leftjoin('payment_methods','withdraw_funds.payment_method_id','payment_methods.id')
					->where('withdraw_funds.status',1);//0 for active/waiting_approval, 1 for approved/paid, 2 for reject and 3 for processed

			$result['total_records'] = $query->count();
			$result['withdraw_paid'] = $query->paginate(20,$result['total_records']);
			return view('admin.ewallet.memberswithdraw.withdraw-paid-requests',$result);
		}
		else{
			return redirect()->route('admin_login');
		}
	}

	public function withdraw_rejected_requests(Request $request){
		if(!empty($request->session()->has('id') && $request->session()->get('role') == 0)){
			//Getting all waiting for approval withdraw requests
			$query = DB::table('withdraw_funds')
					->select('withdraw_funds.*','users.first_name','users.sur_name','users.name','ewallet_addresses.wallet_address','payment_methods.name as payment_method_name')
					->leftjoin('users','withdraw_funds.user_id','users.id')
					->leftjoin('ewallet_addresses','withdraw_funds.ewallet_address_id','ewallet_addresses.id')
					->leftjoin('payment_methods','withdraw_funds.payment_method_id','payment_methods.id')
					->where('withdraw_funds.status',2);//0 for active/waiting_approval, 1 for approved/paid, 2 for reject and 3 for processed

			$result['total_records'] = $query->count();
			$result['withdraw_reject'] = $query->paginate(20,$result['total_records']);
			return view('admin.ewallet.memberswithdraw.withdraw-rejected-requests',$result);
		}
		else{
			return redirect()->route('admin_login');
		}
	}

	public function approve_reject_withdrawal_status(Request $request){
		if(!empty($request->session()->has('id') && $request->session()->get('role') == 0)){
			if(!empty($request->input('operation') > 0 && $request->input('views_bulk_operations') > 0)){
				if(!empty($request->input('operation') == 3)){
					$ids = $request->input('views_bulk_operations');
					foreach ($ids as $row) {
						//get all users associated with request
						$users = DB::table('withdraw_funds')
								->select('user_id')
								->where('id',$row)
								->where('status',0)
								->first();
						//set data according to columns
						$data = array(
							'notes' => 'Approved | Payment processed',
							'status' => 3,// 0 for active, 1 for approve/paid , 2 for reject and 3 for processed
							'updated_date_time' => date('Y-m-d H:i:s')
						);
						//set data for notifications
						$notifications_data = array(
							'user_id' => $users->user_id,
							'title' => 'Withdrawal Request Approved',
							'message' => 'Withdrawal Request Approved By '.$request->session()->get('username'),
							'is_seen' => 'no',
							'created_date_time' => date('Y-m-d H:i:s'),
						);
						if(!empty($data && $notifications_data)){
							//Query for update request status
							$update = DB::table('withdraw_funds')
										->where('id',$row)
										->update($data);
							//Query for insert notifications
							$insert = DB::table('notifications')
										->insert($notifications_data);
							if(!empty($insert == 1 && $update == 1)){
								$notifications = array(
									'message' => 'Withdrawal Requests Approved Successfully',
									'alert-type' => 'success'
								);
							}
							else{
								$notifications = array(
									'message' => 'something went wrong',
									'alert-type' => 'error'
								);
								return redirect()->back()->with($notifications);
							}			 
						}
					}
					return redirect()->back()->with($notifications);
				}
				else{
					foreach ($request->input('views_bulk_operations') as $row) {
						//get all users associated with request
						$users = DB::table('withdraw_funds')
								->select('user_id','requested_amount')
								->where('id',$row)
								->where('status',0)
								->first();
						//set data according to columns
						$data = array(
							'notes' => 'Rejected | Pay Later',
							'status' => 2,// 0 for active, 1 for approve/paid , 2 for reject and 3 for processed
							'updated_date_time' => date('Y-m-d H:i:s')
						);
						//Set data for transaction
						$transaction_data = array(
							'ip_address' => $request->ip(),
							'user_id' => $users->user_id,
							'sponsor_id' => $users->user_id,
							'cat_id' => 10,
							'balance' => $users->requested_amount,
							'from_credit_status' => 0, //0 for credit and 1 for debit
							'to_credit_status' => 0,
							'date' => date('Y-m-d'),
							'time' => date('H:i:s')
						);
						//set data for notifications
						$notifications_data = array(
							'user_id' => $users->user_id,
							'title' => 'Withdrawal Request Cancelled',
							'message' => 'Withdrawal Request Rejected By '.$request->session()->get('username'),
							'is_seen' => 'no',
							'created_date_time' => date('Y-m-d H:i:s'),
						);
						if(!empty($data && $notifications_data && $transaction_data)){
							//Query for update request status
							$update = DB::table('withdraw_funds')
										->where('id',$row)
										->update($data);
							//Query for insert transactions
							$insert_transaction_data = DB::table('transactions')
										->insert($transaction_data);
							//Query for insert notifications
							$insert = DB::table('notifications')
										->insert($notifications_data);
							if(!empty($insert == 1 && $update == 1 && $insert_transaction_data == 1)){
								$notifications = array(
									'message' => 'Withdrawal Requests Cancelled Successfully',
									'alert-type' => 'success'
								);
							}
							else{
								$notifications = array(
									'message' => 'something went wrong',
									'alert-type' => 'error'
								);
								return redirect()->back()->with($notifications);
							}			 
						}
					}

					return redirect()->back()->with($notifications);
				}
				
			}
			else{
				$notifications = array(
					'message' => 'Please Select atleast 1 operation or option from list to proceed',
					'alert-type' => 'error'
				);
				return redirect()->back()->with($notifications);
			}
		}
		else{
			return redirect()->route('admin_login');
		}
	}

	public function markpaid_paylater_status(Request $request){
		if(!empty($request->session()->has('id') && $request->session()->get('role') == 0)){
			if(!empty($request->input('views_bulk_operations') > 0)){
				if(!empty($request->input('op') == 'Marks as paid')){
					$ids = $request->input('views_bulk_operations');
					foreach ($ids as $row) {
						//get all users associated with request
						$users = DB::table('withdraw_funds')
								->select('user_id')
								->where('id',$row)
								->where('status',3)
								->first();
						//set data according to columns
						$data = array(
							'notes' => 'Approved | Payment Paid',
							'status' => 1,// 0 for active, 1 for approve/paid , 2 for reject and 3 for processed
							'updated_date_time' => date('Y-m-d H:i:s')
						);
						//set data for notifications
						$notifications_data = array(
							'user_id' => $users->user_id,
							'title' => 'Withdrawal Request Payment | Paid',
							'message' => 'Withdrawal Request Payment Paid By '.$request->session()->get('username'),
							'is_seen' => 'no',
							'created_date_time' => date('Y-m-d H:i:s'),
						);
						if(!empty($data && $notifications_data)){
							//Query for update request status
							$update = DB::table('withdraw_funds')
										->where('id',$row)
										->update($data);
							//Query for insert notifications
							$insert = DB::table('notifications')
										->insert($notifications_data);
							if(!empty($insert == 1 && $update == 1)){
								$notifications = array(
									'message' => 'Withdrawal Requests Payment Paid Successfully',
									'alert-type' => 'success'
								);
							}
							else{
								$notifications = array(
									'message' => 'something went wrong',
									'alert-type' => 'error'
								);
								return redirect()->back()->with($notifications);
							}			 
						}
					}
					return redirect()->back()->with($notifications);
				}
				else{
					foreach ($request->input('views_bulk_operations') as $row) {
						//get all users associated with request
						$users = DB::table('withdraw_funds')
								->select('user_id','requested_amount')
								->where('id',$row)
								->where('status',3)
								->first();
						//set data according to columns
						$data = array(
							'notes' => 'Cancelled | Pay Later',
							'status' => 2,// 0 for active, 1 for approve/paid , 2 for reject and 3 for processed
							'updated_date_time' => date('Y-m-d H:i:s')
						);
						//Set data for transaction
						$transaction_data = array(
							'ip_address' => $request->ip(),
							'user_id' => $users->user_id,
							'sponsor_id' => $users->user_id,
							'cat_id' => 10,
							'balance' => $users->requested_amount,
							'from_credit_status' => 0, //0 for credit and 1 for debit
							'to_credit_status' => 0,
							'date' => date('Y-m-d'),
							'time' => date('H:i:s')
						);
						//set data for notifications
						$notifications_data = array(
							'user_id' => $users->user_id,
							'title' => 'Withdrawal Request Cancelled',
							'message' => 'Withdrawal Request Rejected By '.$request->session()->get('username'),
							'is_seen' => 'no',
							'created_date_time' => date('Y-m-d H:i:s'),
						);
						if(!empty($data && $notifications_data && $transaction_data)){
							//Query for update request status
							$update = DB::table('withdraw_funds')
										->where('id',$row)
										->update($data);
							//Query for insert transactions
							$insert_transaction_data = DB::table('transactions')
										->insert($transaction_data);
							//Query for insert notifications
							$insert = DB::table('notifications')
										->insert($notifications_data);
							if(!empty($insert == 1 && $update == 1 && $insert_transaction_data == 1)){
								$notifications = array(
									'message' => 'Withdrawal Requests Cancelled Successfully',
									'alert-type' => 'success'
								);
							}
							else{
								$notifications = array(
									'message' => 'something went wrong',
									'alert-type' => 'error'
								);
								return redirect()->back()->with($notifications);
							}			 
						}
					}

					return redirect()->back()->with($notifications);
				}
			}
			else{
				$notifications = array(
					'message' => 'Please Select atleast 1 option from list to proceed',
					'alert-type' => 'error'
				);
				return redirect()->back()->with($notifications);
			}
		}
		else{
			return redirect()->route('admin_login');
		}
	}

	public function get_referal_user_ewallet(Request $request){
		if(!empty($request->session()->has('id') && $request->session()->get('role') == 0)){
			$query = DB::table('users')
						->select('id','name')
						->where('name','like','%'.$request->input('q').'%')
						->get();
			$count = $query->count();
			if(!empty($count) > 0){
				foreach ($query as $row) {
					$data[] = array(
						'id' => $row->id,
						'text' => $row->name
					);
				}
				$results = array(
					'items' => $data
				);
				echo json_encode($results);
			}
		}
		else{
			echo json_encode("fail");
		}
			
	}

	public function debit_fund(Request $request){
		if(!empty($request->session()->has('id') && $request->session()->get('role') == 0)){
			return view('admin.ewallet.fund-debit');
		}
		else{
			return redirect()->route('admin_login');
		}
	}

	public function do_debit_fund(Request $request){
		if(!empty($request->session()->has('id') && $request->session()->get('role') == 0)){
			$validateData = $request->validate([
				'debited_amount' => 'required|numeric'
			]);
			//set data as coloumns
			$data = array(
				'ip_address' => $request->ip(),
				'user_id' => $request->session()->get('id'),
				'sponsor_id' => $request->session()->get('id'),
				'cat_id' => 6,
				'balance' => $request->input('debited_amount'),
				'from_credit_status' => 0,
				'to_credit_status' => 0,
				'date' => date('Y-m-d'),
				'time' => date('H:i:s')
			);
			if(!empty($data)){
				//debit fund
				$query = DB::table('transactions')
						->insert($data);
				if(!empty($query == 1)){
					$notifications = array(
						'message' => 'Fund Debited Successfully to your Ewallet',
						'alert-type' => 'success'
					);
					return redirect()->route('all_transactions')->with($notifications);
				}
				else{
					$notifications = array(
						'message' => 'Something went wrong in fund debit',
						'alert-type' => 'error'
					);
					return redirect()->back()->with($notifications);
				}
			}
			else{
				$notifications = array(
						'message' => 'Something went wrong in entered data',
						'alert-type' => 'error'
					);
				return redirect()->back()->with($notifications);
			}
		}
		else{
			return redirect()->route('admin_login');
		}
	}

	public function all_commissions(Request $request){
		if(!empty($request->session()->has('id') && $request->session()->get('role') == 0)){
			//Getting Data
			$query = DB::table('transactions')
						->select('transactions.cat_id','transactions.user_id','transactions.sponsor_id','transactions.balance','transactions.from_credit_status','transactions.to_credit_status','transactions.date as transaction_date','transactions.time as transaction_time','ewallet_categories.name as payment_source','users.name as associated_user')
						->leftjoin('users','transactions.user_id','=','users.id')
						->leftjoin('ewallet_categories','transactions.cat_id','=','ewallet_categories.id')
						->where('transactions.sponsor_id',$request->session()->get('id'))
						->wherein('cat_id',[3,5])
						->orderby('date','desc')
						->orderby('time','desc');
			//Getting All Data

			$result['total_records'] = $query->count();
			$result['query'] = $query->paginate(20,$result['total_records']);
			$result['get_commission_summary'] = get_commission_summary();
			//return view
			return view('admin.ewallet.all-commissions',$result);
		}
		else{
			return redirect()->route('admin_login');
		}
	}

}