<?php
namespace App\Http\Controllers\Admin\Members;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use session;
use DB;
use Carbon\Carbon;
use Carbon\CarbonPeriod;

class MembersController extends Controller{

	public function index(Request $request){
		if(!empty($request->session()->has('id') && $request->session()->get('role') == 0)){

			$query = DB::table('users')
						->select('users.ip_address','users.id as user_id','users.first_name','users.sur_name','users.name','users.email','users.address','users.contact','users.role','users.parent','u.name as parent_name','users.sponsor','sponsor.contact as sponsor_contact','users.position','users.image','users.unique_code','users.cover','users.status as user_status','users.created_date_time as registration_date','packages.*','countries.country_name','countries.country_code')
						->leftjoin('users as u','u.id','users.parent')
						->leftjoin('packages','users.package_id','=','packages.id')
						->leftjoin('countries','users.country_id','countries.id')
                        ->leftjoin('users as sponsor','sponsor.name','users.sponsor')
						->where('users.name','not like','%adminuser%')
						->where('users.id','>',1)
						->where('users.status',0)//0 for active 1 for block ,2 for unverified
						->orderby('users.id','desc');
						
			$result['count'] = $query->count();
			$result['query'] = $query->paginate(20,$result['count']);
			$result['no'] = 1;
			return view('admin.members.all-members',$result);
		}
		else{
			return redirect()->route('admin_login');
		}
	}
	//Add Member View
	public function add(Request $request){
		if(!empty($request->session()->has('id') && $request->session()->get('role') == 0)){
			//getting countries
			$query = DB::table('countries')
						->select('*');
			$result['query'] = $query->get();
			$result['total_records'] = $query->count();

			//getting packages
			$packages = DB::table('packages')
						   ->select('*');
			$result['packages'] = $packages->get();
			$result['packages_count'] = $packages->count();

			//getting users
			$users = DB::table('users')
						->select('*');
			$result['users'] = $users->get();
			$result['total_users'] = $users->count();
			if(!empty($result)){
				return view('admin.members.add-member',$result);
			}
			else{
				$notifications = array(
					'message' => 'something went wrong',
					'alert-type' => 'error'
				);
				return redirect()->back()->with($notifications);
			}
		}
		else{
			return redirect()->route('admin_login');
		}
	}

	//Insert Members
	public function insert(Request $request, $parent='', $position=''){
		if(!empty($request->session()->has('id') && $request->session()->get('role') == 0)){

            $validatedData = $request->validate([
                'country_id' => 'required',
                'first_name' => 'required',
                'sur_name' => 'required',
                'name' => 'required|unique:users|regex:/^[a-z0-9_\-]+$/',
                'password' => 'required_with:confirm_pass|same:confirm_pass|min:6',
                'email' => 'regex:/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/',
                'confirm_pass' => 'min:6',
                'referal_user_id' => 'required',
                'position' => 'required',
                'contact' => 'required|unique:users|numeric',
                'contact_kin' => 'required',
                'cnic' => 'required|unique:users',
                'enrollment_fee' => 'required',
            ]);

            if(!empty($request->input('position') == 0)){
                    //check user unique code
                    $query = DB::table('users')
                            ->select('country_id','unique_code')
                            ->where('country_id',$request->input('country_id'))
                            ->orderby('id','desc')
                            ->first();
                    if(!empty($query)){
                        if(!empty($request->input('parent_id'))){
                            if(!empty($request->input('position')) == 0){
                                $position = 0;
                            }else{
                                $position = 1;
                            }
                            $data = array(
                                'ip_address' => $request->ip(),
                                'country_id' => $request->input('country_id'),
                                'first_name' => $request->input('first_name'),
                                'sur_name' => $request->input('sur_name'),
                                'name' => $request->input('name'),
                                'email' => $request->input('email'),
                                'password' => sha1($request->input('password')),
                                'contact' => $request->input('contact'),
                                'contact_kin' => $request->input('contact_kin'),
                                'cnic' => $request->input('cnic'),
                                'role' => 1,
                                'parent' => $request->input('parent_id'),
                                'sponsor' => $request->session()->get('username'),
                                'position' => $position,
                                'image' => 'avatar.png',
                                'cover' => 'profile-cover.png',
                                'status' => 2,
                                'package_id' => $request->input('enrollment_fee'),
                                'unique_code' => $query->unique_code + 1,
                                'rank_id' => 0,
                                'created_date_time' => date('Y-m-d H:i:s'),
                                'updated_date_time' => date('Y-m-d H:i:s')
                            );
                        }
                        else{
                            //Query For Getting Extreme Left User 
                            $extreme_left = DB::select(DB::raw("select users_sorted.id as user_id, users_sorted.name, users_sorted.position from (select * from users order by parent, id) users_sorted left join packages on packages.id = users_sorted.package_id, (select @pv := '".$request->session()->get('id')."') initialisation where find_in_set(users_sorted.parent, @pv) and length(@pv := concat(@pv, ',',users_sorted.id)) and users_sorted.position = 0 ORDER BY users_sorted.created_date_time DESC LIMIT 1"));
                            if(!empty($extreme_left)){
                                $data = array(
                                    'ip_address' => $request->ip(),
                                    'country_id' => $request->input('country_id'),
                                    'first_name' => $request->input('first_name'),
                                    'sur_name' => $request->input('sur_name'),
                                    'name' => $request->input('name'),
                                    'email' => $request->input('email'),
                                    'password' => sha1($request->input('password')),
                                    'contact' => $request->input('contact'),
                                    'contact_kin' => $request->input('contact_kin'),
                                    'cnic' => $request->input('cnic'),
                                    'role' => 1,
                                    'parent' => $extreme_left[0]->user_id,
                                    'sponsor' => $request->session()->get('username'),
                                    'position' => $request->input('position'),
                                    'image' => 'avatar.png',
                                    'cover' => 'profile-cover.png',
                                    'status' => 2,
                                    'package_id' => $request->input('enrollment_fee'),
                                    'unique_code' => $query->unique_code + 1,
                                    'rank_id' => 0,
                                    'created_date_time' => date('Y-m-d H:i:s'),
                                    'updated_date_time' => date('Y-m-d H:i:s')
                                );
                            }else{
                                $data = array(
                                    'ip_address' => $request->ip(),
                                    'country_id' => $request->input('country_id'),
                                    'first_name' => $request->input('first_name'),
                                    'sur_name' => $request->input('sur_name'),
                                    'name' => $request->input('name'),
                                    'email' => $request->input('email'),
                                    'password' => sha1($request->input('password')),
                                    'contact' => $request->input('contact'),
                                    'contact_kin' => $request->input('contact_kin'),
                                    'cnic' => $request->input('cnic'),
                                    'role' => 1,
                                    'parent' => $request->session()->get('id'),
                                    'sponsor' => $request->session()->get('username'),
                                    'position' => $request->input('position'),
                                    'image' => 'avatar.png',
                                    'cover' => 'profile-cover.png',
                                    'status' => 2,
                                    'package_id' => $request->input('enrollment_fee'),
                                    'unique_code' => $query->unique_code + 1,
                                    'rank_id' => 0,
                                    'created_date_time' => date('Y-m-d H:i:s'),
                                    'updated_date_time' => date('Y-m-d H:i:s')
                                );
                            }
                        }
                    }
                 else{
                        if(!empty($request->input('parent_id'))){
                            if(!empty($request->input('position')) == 0){
                                $position = 0;
                            }else{
                                $position = 1;
                            }
                            $data = array(
                                'ip_address' => $request->ip(),
                                'country_id' => $request->input('country_id'),
                                'first_name' => $request->input('first_name'),
                                'sur_name' => $request->input('sur_name'),
                                'name' => $request->input('name'),
                                'email' => $request->input('email'),
                                'password' => sha1($request->input('password')),
                                'contact' => $request->input('contact'),
                                'contact_kin' => $request->input('contact_kin'),
                                'cnic' => $request->input('cnic'),
                                'role' => 1,
                                'parent' => $request->input('parent_id'),
                                'sponsor' => $request->session()->get('username'),
                                'position' => $position,
                                'image' => 'avatar.png',
                                'cover' => 'profile-cover.png',
                                'status' => 2,
                                'package_id' => $request->input('enrollment_fee'),
                                'unique_code' => 1234567890,
                                'rank_id' => 0,
                                'created_date_time' => date('Y-m-d H:i:s'),
                                'updated_date_time' => date('Y-m-d H:i:s')
                            );
                        }
                        else{
                            //Query For Getting Extreme Left User 
                            $extreme_left = DB::select(DB::raw("select users_sorted.id as user_id, users_sorted.name, users_sorted.position from (select * from users order by parent, id) users_sorted left join packages on packages.id = users_sorted.package_id, (select @pv := '".$request->session()->get('id')."') initialisation where find_in_set(users_sorted.parent, @pv) and length(@pv := concat(@pv, ',',users_sorted.id)) and users_sorted.position = 0 ORDER BY users_sorted.created_date_time DESC LIMIT 1"));
                            if(!empty($extreme_left)){
                                $data = array(
                                    'ip_address' => $request->ip(),
                                    'country_id' => $request->input('country_id'),
                                    'first_name' => $request->input('first_name'),
                                    'sur_name' => $request->input('sur_name'),
                                    'name' => $request->input('name'),
                                    'email' => $request->input('email'),
                                    'password' => sha1($request->input('password')),
                                    'contact' => $request->input('contact'),
                                    'contact_kin' => $request->input('contact_kin'),
                                    'cnic' => $request->input('cnic'),
                                    'role' => 1,
                                    'parent' => $extreme_left[0]->user_id,
                                    'sponsor' => $request->session()->get('username'),
                                    'position' => $request->input('position'),
                                    'image' => 'avatar.png',
                                    'cover' => 'profile-cover.png',
                                    'status' => 2,
                                    'package_id' => $request->input('enrollment_fee'),
                                    'unique_code' => 1234567890,
                                    'rank_id' => 0,
                                    'created_date_time' => date('Y-m-d H:i:s'),
                                    'updated_date_time' => date('Y-m-d H:i:s')
                                );
                            }else{
                                $data = array(
                                    'ip_address' => $request->ip(),
                                    'country_id' => $request->input('country_id'),
                                    'first_name' => $request->input('first_name'),
                                    'sur_name' => $request->input('sur_name'),
                                    'name' => $request->input('name'),
                                    'email' => $request->input('email'),
                                    'password' => sha1($request->input('password')),
                                    'contact' => $request->input('contact'),
                                    'contact_kin' => $request->input('contact_kin'),
                                    'cnic' => $request->input('cnic'),
                                    'role' => 1,
                                    'parent' => $request->session()->get('id'),
                                    'sponsor' => $request->session()->get('username'),
                                    'position' => $request->input('position'),
                                    'image' => 'avatar.png',
                                    'cover' => 'profile-cover.png',
                                    'status' => 2,
                                    'package_id' => $request->input('enrollment_fee'),
                                    'unique_code' => 1234567890,
                                    'rank_id' => 0,
                                    'created_date_time' => date('Y-m-d H:i:s'),
                                    'updated_date_time' => date('Y-m-d H:i:s')
                                );
                            }
                        }
                    }
                }
            else{ //check user unique code
                $query = DB::table('users')
                        ->select('country_id','unique_code')
                        ->where('country_id',$request->input('country_id'))
                        ->orderby('id','desc')
                        ->first();
                if(!empty($query)){
                    if(!empty($request->input('parent_id'))){
                        if(!empty($request->input('position')) == 0){
                            $position = 0;
                        }else{
                            $position = 1;
                        }
                        $data = array(
                            'ip_address' => $request->ip(),
                            'country_id' => $request->input('country_id'),
                            'first_name' => $request->input('first_name'),
                            'sur_name' => $request->input('sur_name'),
                            'name' => $request->input('name'),
                            'email' => $request->input('email'),
                            'password' => sha1($request->input('password')),
                            'contact' => $request->input('contact'),
                            'contact_kin' => $request->input('contact_kin'),
                            'cnic' => $request->input('cnic'),
                            'role' => 1,
                            'parent' => $request->input('parent_id'),
                            'sponsor' => $request->session()->get('username'),
                            'position' => $position,
                            'image' => 'avatar.png',
                            'cover' => 'profile-cover.png',
                            'status' => 2,
                            'package_id' => $request->input('enrollment_fee'),
                            'unique_code' => $query->unique_code + 1,
                            'rank_id' => 0,
                            'created_date_time' => date('Y-m-d H:i:s'),
                            'updated_date_time' => date('Y-m-d H:i:s')
                        );
                    }
                    else{
                        //Query For Getting Extreme Left User 
                        $extreme_right = DB::select(DB::raw("select users_sorted.id as user_id, users_sorted.name, users_sorted.position from (select * from users order by parent, id) users_sorted left join packages on packages.id = users_sorted.package_id, (select @pv := '".$request->session()->get('id')."') initialisation where find_in_set(users_sorted.parent, @pv) and length(@pv := concat(@pv, ',',users_sorted.id)) and users_sorted.position = 1 ORDER BY users_sorted.created_date_time DESC LIMIT 1"));
                        if(!empty($extreme_right)){
                            $data = array(
                                'ip_address' => $request->ip(),
                                'country_id' => $request->input('country_id'),
                                'first_name' => $request->input('first_name'),
                                'sur_name' => $request->input('sur_name'),
                                'name' => $request->input('name'),
                                'email' => $request->input('email'),
                                'password' => sha1($request->input('password')),
                                'contact' => $request->input('contact'),
                                'contact_kin' => $request->input('contact_kin'),
                                'cnic' => $request->input('cnic'),
                                'role' => 1,
                                'parent' => $extreme_right[0]->user_id,
                                'sponsor' => $request->session()->get('username'),
                                'position' => $request->input('position'),
                                'image' => 'avatar.png',
                                'cover' => 'profile-cover.png',
                                'status' => 2,
                                'package_id' => $request->input('enrollment_fee'),
                                'unique_code' => $query->unique_code + 1,
                                'rank_id' => 0,
                                'created_date_time' => date('Y-m-d H:i:s'),
                                'updated_date_time' => date('Y-m-d H:i:s')
                            );
                        }else{
                            $data = array(
                                'ip_address' => $request->ip(),
                                'country_id' => $request->input('country_id'),
                                'first_name' => $request->input('first_name'),
                                'sur_name' => $request->input('sur_name'),
                                'name' => $request->input('name'),
                                'email' => $request->input('email'),
                                'password' => sha1($request->input('password')),
                                'contact' => $request->input('contact'),
                                'contact_kin' => $request->input('contact_kin'),
                                'cnic' => $request->input('cnic'),
                                'role' => 1,
                                'parent' => $request->session()->get('id'),
                                'sponsor' => $request->session()->get('username'),
                                'position' => $request->input('position'),
                                'image' => 'avatar.png',
                                'cover' => 'profile-cover.png',
                                'status' => 2,
                                'package_id' => $request->input('enrollment_fee'),
                                'unique_code' => $query->unique_code + 1,
                                'rank_id' => 0,
                                'created_date_time' => date('Y-m-d H:i:s'),
                                'updated_date_time' => date('Y-m-d H:i:s')
                            );
                        }
                    }
                }
             else{
                    if(!empty($request->input('parent_id'))){
                        if(!empty($request->input('position')) == 0){
                            $position = 0;
                        }else{
                            $position = 1;
                        }
                        $data = array(
                            'ip_address' => $request->ip(),
                            'country_id' => $request->input('country_id'),
                            'first_name' => $request->input('first_name'),
                            'sur_name' => $request->input('sur_name'),
                            'name' => $request->input('name'),
                            'email' => $request->input('email'),
                            'password' => sha1($request->input('password')),
                            'contact' => $request->input('contact'),
                            'contact_kin' => $request->input('contact_kin'),
                            'cnic' => $request->input('cnic'),
                            'role' => 1,
                            'parent' => $request->input('parent_id'),
                            'sponsor' => $request->session()->get('username'),
                            'position' => $position,
                            'image' => 'avatar.png',
                            'cover' => 'profile-cover.png',
                            'status' => 2,
                            'package_id' => $request->input('enrollment_fee'),
                            'unique_code' => 1234567890,
                            'rank_id' => 0,
                            'created_date_time' => date('Y-m-d H:i:s'),
                            'updated_date_time' => date('Y-m-d H:i:s')
                        );
                    }
                    else{
                        //Query For Getting Extreme Left User 
                        $extreme_right = DB::select(DB::raw("select users_sorted.id as user_id, users_sorted.name, users_sorted.position from (select * from users order by parent, id) users_sorted left join packages on packages.id = users_sorted.package_id, (select @pv := '".$request->session()->get('id')."') initialisation where find_in_set(users_sorted.parent, @pv) and length(@pv := concat(@pv, ',',users_sorted.id)) and users_sorted.position = 1 ORDER BY users_sorted.created_date_time DESC LIMIT 1"));
                        if(!empty($extreme_right)){
                            $data = array(
                                'ip_address' => $request->ip(),
                                'country_id' => $request->input('country_id'),
                                'first_name' => $request->input('first_name'),
                                'sur_name' => $request->input('sur_name'),
                                'name' => $request->input('name'),
                                'email' => $request->input('email'),
                                'password' => sha1($request->input('password')),
                                'contact' => $request->input('contact'),
                                'contact_kin' => $request->input('contact_kin'),
                                'cnic' => $request->input('cnic'),
                                'role' => 1,
                                'parent' => $extreme_right[0]->user_id,
                                'sponsor' => $request->session()->get('username'),
                                'position' => $request->input('position'),
                                'image' => 'avatar.png',
                                'cover' => 'profile-cover.png',
                                'status' => 2,
                                'package_id' => $request->input('enrollment_fee'),
                                'unique_code' => 1234567890,
                                'rank_id' => 0,
                                'created_date_time' => date('Y-m-d H:i:s'),
                                'updated_date_time' => date('Y-m-d H:i:s')
                            );
                        }else{
                            $data = array(
                                'ip_address' => $request->ip(),
                                'country_id' => $request->input('country_id'),
                                'first_name' => $request->input('first_name'),
                                'sur_name' => $request->input('sur_name'),
                                'name' => $request->input('name'),
                                'email' => $request->input('email'),
                                'password' => sha1($request->input('password')),
                                'contact' => $request->input('contact'),
                                'contact_kin' => $request->input('contact_kin'),
                                'cnic' => $request->input('cnic'),
                                'role' => 1,
                                'parent' => $request->session()->get('id'),
                                'sponsor' => $request->session()->get('username'),
                                'position' => $request->input('position'),
                                'image' => 'avatar.png',
                                'cover' => 'profile-cover.png',
                                'status' => 2,
                                'package_id' => $request->input('enrollment_fee'),
                                'unique_code' => 1234567890,
                                'rank_id' => 0,
                                'created_date_time' => date('Y-m-d H:i:s'),
                                'updated_date_time' => date('Y-m-d H:i:s')
                            );
                        }
                    }
                }
                   
            }
            if(!empty($data)){
                $insert_data = DB::table('users')
                                ->insertGetId($data);
                
                $id = DB::getPdo()->lastInsertId();
                $notifications = array(
                    'message' => 'Check order details and give suitable details for further process',
                    'alert-type' => 'success'
                );
                return redirect()->route('checkout_get',$id)->with($notifications);
            }
            else{
                $notifications = array(
                    'message' => 'Something went wrong',
                    'alert-type' => 'error'
                );
                return redirect()->route('add-member')->with($notifications);
            }
        }
        else{
            return redirect()->route('admin_login');
        }
	}

	public function checkout_get(Request $request, $id){
		if(!empty($request->session()->has('id') && $request->session()->get('role') == 0 && $id)){	
			$query = DB::table('users')
							->select('users.id as user_id','users.first_name','users.sur_name','users.name','users.email','users.sponsor','users.package_id','users.unique_id','packages.id as package_id','packages.package','packages.fees')
							->leftjoin('packages','users.package_id','=','packages.id')
							->where('users.id',$id);
			$result['query'] = $query->first();
			if(empty($result['query']->unique_id)){
				return view('admin.orders.checkout',$result);	
			}
			else{
				print_r('page expire');
			}
		}
		else{
			return redirect()->route('admin_login');
		}
	}

	public function checkout_post(Request $request,$id){
		if(!empty($request->session()->has('id') && $request->session()->get('role') == 0 && $id)){
			
			$validatedData = $request->validate([
				'address' => 'required',
				'city' => 'required',
				'postal_code' => 'required',
		    ]);

			$data = array(
				'address' => $request->input('address'),
				'city' => $request->input('city'),
				'postal_code' => $request->input('postal_code'),
			);
			
			$update_data = DB::table('users')
							->where('id',$id)
							->update($data);
			if(!empty($update_data) >= 0){
				$notifications = array(
					'message' => 'Review Your Order',
					'alert-type' => 'info'
				);
				return redirect()->route('review',$id)->with($notifications);
			}
			else{
				$notifications = array(
					'message' => 'something went wrong',
					'alert-type' => 'error'
				);
				return redirect()->back()->with($notifications);
			}
		}
		else{
			return redirect()->route('admin_login');
		}
	}

	public function review_get(Request $request,$id){
		if(!empty($request->session()->has('id') && $request->session()->get('role') == 0 && $id)){
			$query = DB::table('users')
							->select('users.id as user_id','users.first_name','users.sur_name','users.name','users.email','users.sponsor','users.package_id','users.unique_id','packages.id as package_id','packages.package','packages.fees')
							->leftjoin('packages','users.package_id','=','packages.id')
							->where('users.id',$id);
			$result['query'] = $query->first();
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
			//Getting users packages price those who unverified
			$result['ewallet_total'] = $remaining_ewallet;
			if(empty($result['query']->unique_id)){
				return view('admin.orders.order-review',$result);
			}
			else{
				print_r('page expire');
			}
			
		}
		else{
			return redirect()->route('admin_login');
		}
	}

	public function review_post(Request $request,$id){
		if(!empty($request->session()->has('id') && $request->session()->get('role') == 0 && $id)){
			$data = array(
					'unique_id' => uniqid(),
				);
			$update_data = DB::table('users')
							->where('id',$id)
							->update($data);
			//getting ewallet amount for this particular user
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
			$remaining_ewallet = $income - $expense;
			//getting total package fees for new member
			$total_fees = $request->input('total_fees');
			$total_fees = $total_fees + 10;
			if(!empty($remaining_ewallet > 0 && $remaining_ewallet >= $total_fees)){
			    //get sponsor id
                $user_sponsor = DB::table('users')
                    ->select('sponsor')
                    ->where('id',$id)
                    ->first();
                $user_sponsor_id = DB::table('users')
                    ->select('id')
                    ->where('name',$user_sponsor->sponsor)
                    ->first();
                //getting user package details
				$package_details = DB::table('users')
				        ->select('package_id','packages.fees')
				        ->leftjoin('packages','packages.id','users.package_id')
				        ->where('users.id',$id)
				        ->first();
			    //set data for activation charges
				$activation_fee = array(
			        'ip_address' => $request->ip(),
					'user_id' => $id,
					'sponsor_id' => $user_sponsor_id->id,
					'cat_id' => 11,
					'balance' => 10,
					'from_credit_status' => 1,
					'date' => date('Y-m-d'),
					'time' => date('H:i:s'),
				);
				
				//set data for ewallet purchase
				$ewallet_purchase = array(
				    'ip_address' => $request->ip(),
					'user_id' => $id,
					'sponsor_id' => $user_sponsor_id->id,
					'cat_id' => 1,
					'balance' => $package_details->fees,
					'from_credit_status' => 1,
					'date' => date('Y-m-d'),
					'time' => date('H:i:s'),
				);
				if(!empty($activation_fee && $ewallet_purchase)){
				    //insert ewallet purchase data
					$insert_ewallet = DB::table('transactions')
							->insert($ewallet_purchase);
					//insert activation charges
					$insert_activation_fees = DB::table('transactions')
					        ->insert($activation_fee);
					$notifications = array(
    					'message' => 'Member Added Successfully',
    					'alert-type' => 'success'
    				);
    				return redirect()->route('enrolment_complete',$id)->with($notifications);
					
				}else{
				    $notifications = array(
    					'message' => 'Something went wrong',
    					'alert-type' => 'error'
    				);
    				return redirect()->route('enrolment_complete',$id)->with($notifications);
				}
			}
			else{
                //delete last user if not have enough amount
                $delete_user = DB::table('users')
                            ->where('id',$id)
                            ->delete(); 
				$notifications = array(
					'message' => 'You dont have enough balance in your ewallet',
					'alert-type' => 'warning'
				);
				return redirect()->route('add-member')->with($notifications);
			}
		}
		else{
			return redirect()->route('admin_login');
		}
	}

	public function enrolment_complete(Request $request,$id){
		if(!empty($request->session()->has('id') && $request->session()->get('role') == 0 && $id)){
			$notifications = array(
					'message' => 'Enrollment Completed',
					'alert-type' => 'success'
				);
			return redirect()->route('add-member')->with($notifications);
		}
		else{
			return redirect()->route('admin_login');
		}
	}

	public function edit(Request $request,$id){
		if(!empty($request->session()->has('id') && $request->session()->get('role') == 0 && $id)){
			//Query For Getting User Details
			$query = DB::table('users')
						->select('*')
						->where('id',$id);
		    //Query For Getting Countries
		    $countries = DB::table('countries')
		                ->select('*');
		    //Putting Data In Array
			$result['query'] = $query->first();
			$result['countries'] = $countries->get();
			return view('admin.members.edit-member',$result);
		}
		else{
			return redirect()->route('admin_login');
		}
	}

	public function update(Request $request,$id){
		if(!empty($request->session()->has('id') && $request->session()->get('role') == 0 && $id)){
		    $validatedData = $request->validate([
                'country_id' => 'required',
                'first_name' => 'required',
                'sur_name' => 'required',
                'name' => 'required|regex:/^[a-z0-9_\-]+$/|unique:users,name,'.$id,
                'email' => 'regex:/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/',
                'contact' => 'required|numeric|unique:users,contact,'.$id,
                'cnic' => 'required|unique:users,cnic,'.$id,
            ]);
			if(!empty($request->input('password'))){
		        $data = array(
    				'ip_address' => $request->ip(),
    				'first_name' => $request->input('first_name'),
    				'sur_name' => $request->input('sur_name'),
    				'name' => $request->input('name'),
    				'country_id' => $request->input('country_id'),
    				'city' => $request->input('city'),
    				'address' => $request->input('address'),
    				'postal_code' => $request->input('postal_code'),
    				'password' => sha1($request->input('password')),
    				'contact' => $request->input('contact'),
    				'cnic' => $request->input('cnic'),
    				'email' => $request->input('email'),
    				'status' => $request->input('status'),
    				'updated_date_time' => date('Y-m-d H:i:s')
    			);
		    }
		   else{
		       $data = array(
    				'ip_address' => $request->ip(),
    				'first_name' => $request->input('first_name'),
    				'sur_name' => $request->input('sur_name'),
    				'name' => $request->input('name'),
    				'country_id' => $request->input('country_id'),
    				'city' => $request->input('city'),
    				'address' => $request->input('address'),
    				'postal_code' => $request->input('postal_code'),
    				'contact' => $request->input('contact'),
    				'cnic' => $request->input('cnic'),
    				'email' => $request->input('email'),
    				'status' => $request->input('status'),
    				'updated_date_time' => date('Y-m-d H:i:s')
    			);
		   }
			if(!empty($data)){
				//check if user is already active
				$check_user_status = DB::table('users')
				    ->select('status')
				    ->where('users.id',$id)
				    ->first();
				if(!empty($check_user_status->status == 0)){
				    $insert_data = DB::table('users')
								->where('id',$id)
								->update($data);
				    $notifications = array(
    					'message' => 'Member Updated Successfully',
    					'alert-type' => 'success'
    				);
    				return redirect()->route('all_members')->with($notifications);
				}else{
				    $insert_data = DB::table('users')
								->where('id',$id)
								->update($data);
    				if(!empty($request->input('status') == 0)){
				    //getting user package details
    				$package_details = DB::table('users')
    				        ->select('package_id','packages.fees')
    				        ->leftjoin('packages','packages.id','users.package_id')
    				        ->where('users.id',$id)
    				        ->first();
    				//checking sponsor commissions bonus for this package
    				$check_commission = DB::table('compensations')
    						->select('bonus')
    						->leftjoin('ewallet_categories','ewallet_categories.id','compensations.ewallet_category_id')
    						->where('package_id',$package_details->package_id)
    						->where('ewallet_category_id',5)
    						->where('ewallet_categories.status',0)
    						->first();
                    //get sponsor id
                    $user_sponsor = DB::table('users')
                        ->select('sponsor')
                        ->where('id',$id)
                        ->first();
                    $user_sponsor_id = DB::table('users')
                        ->select('id')
                        ->where('name',$user_sponsor->sponsor)
                        ->first();

    				if(!empty($check_commission)){
    				    //getting commision from total_fees
    					$sponsor_commission = ($check_commission->bonus / 100) * $package_details->fees;	
    					//set data for sponsor commision
    					$transaction_data = array(
    					    'ip_address' => $request->ip(),
    						'user_id' => $id,
    						'sponsor_id' => $user_sponsor_id->id,
    						'cat_id' => 5,
    						'balance' => $sponsor_commission,
    						'from_credit_status' => 0,
    						'date' => date('Y-m-d'),
    						'time' => date('H:i:s'),
    					);
    				}
    				else{
    				    $transaction_data = array();
    				}
                    //check if level commission is active
                    $check_status = DB::table('ewallet_categories')
                            ->select('*')
                            ->where('id',3)
                            ->where('status',0)
                            ->first();
                    if(!empty($check_status)){
                        //set data for level commission
                        $get_all_childs = DB::select(DB::raw("SELECT t2.id AS lev1, t3.id as lev2, t4.id as lev3, t5.id as lev4, t6.id as lev5 FROM users AS t1 LEFT JOIN users AS t2 ON t2.parent = t1.id LEFT JOIN users AS t3 ON t3.parent = t2.id LEFT JOIN users AS t4 ON t4.parent = t3.id LEFT JOIN users AS t5 ON t5.parent = t4.id LEFT JOIN users AS t6 ON t6.parent = t5.id WHERE t1.id = '".$request->session()->get('id')."'"));
                        //dd($get_all_childs);
                       foreach ($get_all_childs as $row) {
                            if(!empty($row->lev1 == $id)){
                                //get user package 
                                $user_package = DB::table('packages')
                                    ->select('packages.fees')
                                    ->leftjoin('users','users.package_id','packages.id')
                                    ->where('users.id',$id)
                                    ->first();
                                //get level commission %
                                $level1_commission = DB::table('compensations')
                                    ->select('bonus')
                                    ->where('ewallet_category_id',3)
                                    ->where('level',1)
                                    ->first();
                                $total_commission = ($level1_commission->bonus / 100) * $user_package->fees;
                                //set data for transaction
                                $level_transaction_data = array(
                                    'user_id' => $id,
                                    'sponsor_id' => $request->session()->get('id'),
                                    'cat_id' => 3,
                                    'balance' => $total_commission,
                                    'from_credit_status' => 0,
                                    'date' => date('Y-m-d'),
                                    'time' => date('H:i:s'),
                                );
                                break; 
                            }elseif(!empty($row->lev2 == $id)){
                                //get user package 
                                $user_package = DB::table('packages')
                                    ->select('packages.fees')
                                    ->leftjoin('users','users.package_id','packages.id')
                                    ->where('users.id',$id)
                                    ->first();
                                //get level commission %
                                $level2_commission = DB::table('compensations')
                                    ->select('bonus')
                                    ->where('ewallet_category_id',3)
                                    ->where('level',2)
                                    ->first();
                                $total_commission = ($level2_commission->bonus / 100) * $user_package->fees;
                                //set data for transaction
                                $level_transaction_data = array(
                                    'user_id' => $id,
                                    'sponsor_id' => $request->session()->get('id'),
                                    'cat_id' => 3,
                                    'balance' => $total_commission,
                                    'from_credit_status' => 0,
                                    'date' => date('Y-m-d'),
                                    'time' => date('H:i:s'),
                                );
                                break;
                            }elseif(!empty($row->lev3 == $id)){
                                //get user package 
                                $user_package = DB::table('packages')
                                    ->select('packages.fees')
                                    ->leftjoin('users','users.package_id','packages.id')
                                    ->where('users.id',$id)
                                    ->first();
                                //get level commission %
                                $level3_commission = DB::table('compensations')
                                    ->select('bonus')
                                    ->where('ewallet_category_id',3)
                                    ->where('level',3)
                                    ->first();
                                $total_commission = ($level3_commission->bonus / 100) * $user_package->fees;
                                //set data for transaction
                                $level_transaction_data = array(
                                    'user_id' => $id,
                                    'sponsor_id' => $request->session()->get('id'),
                                    'cat_id' => 3,
                                    'balance' => $total_commission,
                                    'from_credit_status' => 0,
                                    'date' => date('Y-m-d'),
                                    'time' => date('H:i:s'),
                                );
                                break; 
                            }elseif(!empty($row->lev4 == $id)){
                                //get user package 
                                $user_package = DB::table('packages')
                                    ->select('packages.fees')
                                    ->leftjoin('users','users.package_id','packages.id')
                                    ->where('users.id',$id)
                                    ->first();
                                //get level commission %
                                $level4_commission = DB::table('compensations')
                                    ->select('bonus')
                                    ->where('ewallet_category_id',3)
                                    ->where('level',4)
                                    ->first();
                                $total_commission = ($level4_commission->bonus / 100) * $user_package->fees;
                                //set data for transaction
                                $level_transaction_data = array(
                                    'user_id' => $id,
                                    'sponsor_id' => $request->session()->get('id'),
                                    'cat_id' => 3,
                                    'balance' => $total_commission,
                                    'from_credit_status' => 0,
                                    'date' => date('Y-m-d'),
                                    'time' => date('H:i:s'),
                                );
                                break; 
                            }elseif(!empty($row->lev5 == $id)){
                                //get user package 
                                $user_package = DB::table('packages')
                                    ->select('packages.fees')
                                    ->leftjoin('users','users.package_id','packages.id')
                                    ->where('users.id',$id)
                                    ->first();
                                //get level commission %
                                $level5_commission = DB::table('compensations')
                                    ->select('bonus')
                                    ->where('ewallet_category_id',3)
                                    ->where('level',5)
                                    ->first();
                                $total_commission = ($level5_commission->bonus / 100) * $user_package->fees;
                                //set data for transaction
                                $level_transaction_data = array(
                                    'user_id' => $id,
                                    'sponsor_id' => $request->session()->get('id'),
                                    'cat_id' => 3,
                                    'balance' => $total_commission,
                                    'from_credit_status' => 0,
                                    'date' => date('Y-m-d'),
                                    'time' => date('H:i:s'),
                                );
                                break; 
                            }else{
                                $level_transaction_data = array();
                            }
                       }
                       $descendants = DB::select(DB::raw("select users_sorted.id as user_id, users_sorted.name from (select * from users order by parent, id) users_sorted left join packages on packages.id = users_sorted.package_id, (select @pv := '".$request->session()->get('id')."') initialisation where find_in_set(users_sorted.parent, @pv) and length(@pv := concat(@pv, ',',users_sorted.id))"));
                        foreach ($descendants as $row_desc) {
                            $get_all_sub_childs = DB::select(DB::raw("SELECT t2.id AS lev1, t3.id as lev2, t4.id as lev3, t5.id as lev4, t6.id as lev5 FROM users AS t1 LEFT JOIN users AS t2 ON t2.parent = t1.id LEFT JOIN users AS t3 ON t3.parent = t2.id LEFT JOIN users AS t4 ON t4.parent = t3.id LEFT JOIN users AS t5 ON t5.parent = t4.id LEFT JOIN users AS t6 ON t6.parent = t5.id WHERE t1.id = '".$row_desc->user_id."'"));
                            foreach ($get_all_sub_childs as $row) {
                                if(!empty($row->lev1 == $id)){
                                    //get user package 
                                    $user_package = DB::table('packages')
                                        ->select('packages.fees')
                                        ->leftjoin('users','users.package_id','packages.id')
                                        ->where('users.id',$id)
                                        ->first();
                                    //get level commission %
                                    $level1_commission = DB::table('compensations')
                                        ->select('bonus')
                                        ->where('ewallet_category_id',3)
                                        ->where('level',1)
                                        ->first();
                                    $total_commission = ($level1_commission->bonus / 100) * $user_package->fees;
                                    //set data for transaction
                                    $sub_level_transaction_data = array(
                                        'user_id' => $id,
                                        'sponsor_id' => $row_desc->user_id,
                                        'cat_id' => 3,
                                        'balance' => $total_commission,
                                        'from_credit_status' => 0,
                                        'date' => date('Y-m-d'),
                                        'time' => date('H:i:s'),
                                    );
                                    break; 
                                }elseif(!empty($row->lev2 == $id)){
                                    //get user package 
                                    $user_package = DB::table('packages')
                                        ->select('packages.fees')
                                        ->leftjoin('users','users.package_id','packages.id')
                                        ->where('users.id',$id)
                                        ->first();
                                    //get level commission %
                                    $level2_commission = DB::table('compensations')
                                        ->select('bonus')
                                        ->where('ewallet_category_id',3)
                                        ->where('level',2)
                                        ->first();
                                    $total_commission = ($level2_commission->bonus / 100) * $user_package->fees;
                                    //set data for transaction
                                    $sub_level_transaction_data = array(
                                        'user_id' => $id,
                                        'sponsor_id' => $row_desc->user_id,
                                        'cat_id' => 3,
                                        'balance' => $total_commission,
                                        'from_credit_status' => 0,
                                        'date' => date('Y-m-d'),
                                        'time' => date('H:i:s'),
                                    );
                                    break;
                                }elseif(!empty($row->lev3 == $id)){
                                    //get user package 
                                    $user_package = DB::table('packages')
                                        ->select('packages.fees')
                                        ->leftjoin('users','users.package_id','packages.id')
                                        ->where('users.id',$id)
                                        ->first();
                                    //get level commission %
                                    $level3_commission = DB::table('compensations')
                                        ->select('bonus')
                                        ->where('ewallet_category_id',3)
                                        ->where('level',3)
                                        ->first();
                                    $total_commission = ($level3_commission->bonus / 100) * $user_package->fees;
                                    //set data for transaction
                                    $sub_level_transaction_data = array(
                                        'user_id' => $id,
                                        'sponsor_id' => $row_desc->user_id,
                                        'cat_id' => 3,
                                        'balance' => $total_commission,
                                        'from_credit_status' => 0,
                                        'date' => date('Y-m-d'),
                                        'time' => date('H:i:s'),
                                    );
                                    break; 
                                }elseif(!empty($row->lev4 == $id)){
                                    //get user package 
                                    $user_package = DB::table('packages')
                                        ->select('packages.fees')
                                        ->leftjoin('users','users.package_id','packages.id')
                                        ->where('users.id',$id)
                                        ->first();
                                    //get level commission %
                                    $level4_commission = DB::table('compensations')
                                        ->select('bonus')
                                        ->where('ewallet_category_id',3)
                                        ->where('level',4)
                                        ->first();
                                    $total_commission = ($level4_commission->bonus / 100) * $user_package->fees;
                                    //set data for transaction
                                    $sub_level_transaction_data = array(
                                        'user_id' => $id,
                                        'sponsor_id' => $row_desc->user_id,
                                        'cat_id' => 3,
                                        'balance' => $total_commission,
                                        'from_credit_status' => 0,
                                        'date' => date('Y-m-d'),
                                        'time' => date('H:i:s'),
                                    );
                                    break;
                                }elseif(!empty($row->lev5 == $id)){
                                    //get user package 
                                    $user_package = DB::table('packages')
                                        ->select('packages.fees')
                                        ->leftjoin('users','users.package_id','packages.id')
                                        ->where('users.id',$id)
                                        ->first();
                                    //get level commission %
                                    $level5_commission = DB::table('compensations')
                                        ->select('bonus')
                                        ->where('ewallet_category_id',3)
                                        ->where('level',5)
                                        ->first();
                                    $total_commission = ($level5_commission->bonus / 100) * $user_package->fees;
                                    //set data for transaction
                                    $sub_level_transaction_data = array(
                                        'user_id' => $id,
                                        'sponsor_id' => $row_desc->user_id,
                                        'cat_id' => 3,
                                        'balance' => $total_commission,
                                        'from_credit_status' => 0,
                                        'date' => date('Y-m-d'),
                                        'time' => date('H:i:s'),
                                    );
                                    break; 
                                }else{
                                    $sub_level_transaction_data = array();
                                }
                            }
                            $insert_level_commission = DB::table('transactions')
                                    ->insert($sub_level_transaction_data);
                        }
                    }
                    else{
                        $level_transaction_data = array();
                    }
    				if(!empty($transaction_data || $level_transaction_data)){
    					//insert transaction data
    					$insert_transaction = DB::table('transactions')
    							->insert($transaction_data);
    					//insert level commission data
    					$insert_level_commission = DB::table('transactions')
    							->insert($level_transaction_data);
    					if(!empty($insert_transaction == 1 || $insert_level_commission == 1)){
    						$notifications = array(
    							'message' => 'Member Updated Successfully',
    							'alert-type' => 'success'
    						);
    						return redirect()->route('all_members')->with($notifications);
    					}
    					else{
    						$notifications = array(
    							'message' => 'Something went wrong',
    							'alert-type' => 'error'
    						);
    						return redirect()->back()->with($notifications);
    					}
    				}
    				else{
    					$notifications = array(
    						'message' => 'Something went wrong in transaction',
    						'alert-type' => 'error'
    					);
    					return redirect()->back()->with($notifications);
    				}
				}
				else{
    				$notifications = array(
    					'message' => 'Member Updated Successfully',
    					'alert-type' => 'success'
    				);
    				return redirect()->route('all_members')->with($notifications);
				}
				}
			}
			else{
				$notifications = array(
					'message' => 'Something Went Wrong',
					'alert-type' => 'error'
				);
				return redirect()->route('all_members')->with($notifications);
			}
		}
		else{
			return redirect()->route('admin_login');
		}
	}

	public function upgrade_package(Request $request){
		if(!empty($request->session()->has('id') && $request->session()->get('role') == 0)){
			
			$packages = DB::table('packages')
							->select('packages.id as package_id','packages.package','packages.fees')
							->leftjoin('users','users.package_id','<','packages.id')
							->where('users.id','=',$request->session()->get('id'))
							->where('packages.status',0);//0 for active and 1 for inactive
							
			$result['packages'] = $packages->get();
			$result['count'] = $packages->count();
			$result['user_id'] = $request->session()->get('id');
			return view('admin.packages.package-upgrade',$result);
		}
		else{
			return redirect()->route('admin_login');
		}
	}

	public function upgrade_user_package(Request $request,$id){
		if(!empty($request->session()->has('id') && $request->session()->get('role') == 0 && $id)){
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

            //getting package fees
            $package_fees = DB::table('packages')
                        ->select('fees')
                        ->where('id',$request->input('package_id'))
                        ->first();
            if(!empty($total_amount >= $package_fees->fees)){
                //set data as coloumns
                $data = array(
                    'package_id' => $request->input('package_id'),
                    'updated_date_time' => date('Y-m-d H:i:s')
                );
                //upgrade query
                $update_package = DB::table('users')
                                 ->where('id',$id)
                                 ->update($data);
                //get package price
                $query = DB::table('packages')
                        ->select('fees')
                        ->where('id',$request->input('package_id'))
                        ->first();
                //set transaction data
                $data = array(
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
                            ->insert($data);
                //get user package
                $last_package = DB::table('users')
                            ->select('package_id')
                            ->where('id',$request->session()->get('id'))
                            ->first();
                if(!empty($last_package)){
                    //set data for package upgrade
                    $package_data = array(
                        'ip_address' => $request->ip(),
                        'user_id' => $request->session()->get('id'),
                        'old_package_id' => $last_package->package_id,
                        'new_package_id' => $request->input('package_id'),
                        'updated_date_time' => date('Y-m-d H:i:s')
                    );
                    $insert_upgrade = DB::table('upgrade_package_histories')
                            ->insert($package_data);
                }
                if(!empty($update_package && $insert == 1)){
                    $notifications = array(
                        'message' => 'Package Upgraded Successfully',
                        'alert-type' => 'success'
                    );  
                    return redirect()->route('upgrade_package')->with($notifications);
                }
                else{
                    $notifications = array(
                        'message' => 'Something went wrong',
                        'alert-type' => 'error'
                    );  
                    return redirect()->route('upgrade_package')->with($notifications);
                }
            }
            else{
                $notifications = array(
                    'message' => 'You dont have enough amount in your ewallet',
                    'alert-type' => 'error'
                );  
                return redirect()->route('upgrade_package')->with($notifications);
            }
		}
		else{
			return redirect()->route('admin_login');
		}
	}

	public function search_members(Request $request){
		if(!empty($request->session()->has('id') && $request->session()->get('role') == 0)){
			$query = DB::table('users')
						->select('users.ip_address','users.id as user_id','users.first_name','users.sur_name','users.name','users.email','users.address','users.contact','users.role','users.parent','u.name as parent_name','users.sponsor','users.position','users.image','users.cover','users.unique_code','users.status as user_status','users.created_date_time as registration_date','packages.*','countries.country_code')
						->leftjoin('users as u','u.id','users.parent')
						->leftjoin('packages','users.package_id','=','packages.id')
						->leftjoin('countries','users.country_id','countries.id')
						->where('users.name','not like','%adminuser%')
						->where('users.id','>',1)
						->where('users.status',0);
						if(!empty($request->input('first_name'))){
							$query->where('first_name','like','%'.$request->input('first_name').'%');
						}
						if(!empty($request->input('sur_name'))){
							$query->where('sur_name','like','%'.$request->input('sur_name').'%');
						}
						if(!empty($request->input('email'))){
							$query->where('email','like','%'.$request->input('email').'%');
						}
						if(!empty($request->input('name'))){
							$query->where('name','like','%'.$request->input('name').'%');
						}
			
			$result['count'] = $query->count();
			$result['query'] = $query->paginate(20,$result['count']);
			$result['no'] = 1;
			return view('admin.members.all-members',$result);
		}
		else{
			return redirect()->route('admin_login');
		}
	}

	// public function search_members_by_name(Request $request){
	// 	if(!empty($request->session()->has('id') && $request->session()->get('role') == 0)){
	// 		$query = DB::table('users')
	// 					->select('users.name')
	// 					->where('users.first_name','not like','%admin%')
	// 					->where('name','like','%'.$request->input('name').'%');
	// 		$result = $query->get();
	// 		 $ajax_response_data = array(
	//             'ERROR' => 'FALSE',
	//             'DATA' => '',
	//         );

	//         $html = '';
	//         if(count($result) > 0){
	//         	foreach($result as $row){
	//         		$html .= '<span aria-live="assertive" id="edit-uid-autocomplete-aria-live">'.$row->name.'</span>';
	//         	}
	//         	$ajax_response_data = array(
	// 	            'ERROR' => 'FALSE',
	// 	            'DATA' => $html,
	// 	        );
	//             echo json_encode($ajax_response_data);
	//         }else{
	//         	$html .= '<option>No user found !!</option>';
	//         	$ajax_response_data = array(
	// 	            'ERROR' => 'FALSE',
	// 	            'DATA' => $html,
	// 	        );
	//             echo json_encode($ajax_response_data);
	//         }
			
	// 	}
	// 	else{
	// 		echo '<script>alert("request failed")</script>';
	// 	}
	// }

	public function block_members(Request $request){
		if(!empty($request->session()->has('id') && $request->session()->get('role') == 0)){
			$query = DB::table('users')
						->select('users.ip_address','users.id as user_id','users.first_name','users.sur_name','users.name','users.email','users.address','users.contact','users.role','users.parent','u.name as parent_name','users.sponsor','users.position','users.image','users.cover','users.status as user_status','users.created_date_time as registration_date','packages.*')
						->leftjoin('users as u','u.id','users.parent')
						->leftjoin('packages','users.package_id','=','packages.id')
						->where('users.name','not like','%adminuser%')
						->where('users.id','>',1)
						->where('users.status',1)//0 for active 1 for block ,2 for unverified
						->orderby('id','desc');
			$result['count'] = $query->count();
			$result['query'] = $query->paginate(20,$result['count']);
			$result['no'] = 1;
			return view('admin.members.block-members',$result);
		}
		else{
			return redirect()->route('admin_login');
		}
	}

	public function search_block_members(Request $request){
		if(!empty($request->session()->has('id') && $request->session()->get('role') == 0)){
			$query = DB::table('users')
						->select('users.ip_address','users.id as user_id','users.first_name','users.sur_name','users.name','users.email','users.address','users.contact','users.role','users.parent','u.name as parent_name','users.sponsor','users.position','users.image','users.cover','users.unique_code','users.status as user_status','users.created_date_time as registration_date','packages.*','countries.country_code')
						->leftjoin('users as u','u.id','users.parent')
						->leftjoin('packages','users.package_id','=','packages.id')
						->leftjoin('countries','users.country_id','countries.id')
						->where('users.name','not like','%adminuser%')
						->where('users.id','>',1)
						->where('users.status',1);//0 for active 1 for block ,2 for unverified
						if(!empty($request->input('first_name'))){
							$query->where('first_name','like','%'.$request->input('first_name').'%');
						}
						if(!empty($request->input('sur_name'))){
							$query->where('sur_name','like','%'.$request->input('sur_name').'%');
						}
						if(!empty($request->input('email'))){
							$query->where('email','like','%'.$request->input('email').'%');
						}
						if(!empty($request->input('name'))){
							$query->where('name','like','%'.$request->input('name').'%');
						}
			$result['count'] = $query->count();
			$result['query'] = $query->paginate(20,$result['count']);
			$result['no'] = 1;
			return view('admin.members.block-members',$result);
		}
		else{
			return redirect()->route('admin_login');
		}
	}

	public function unverified_members(Request $request){
		if(!empty($request->session()->has('id') && $request->session()->get('role') == 0)){
			$query = DB::table('users')
						->select('users.ip_address','users.id as user_id','users.first_name','users.sur_name','users.name','users.email','users.address','users.contact','users.role','users.parent','u.name as parent_name','users.sponsor','users.position','users.image','users.cover','users.status as user_status','users.created_date_time as registration_date','packages.*')
						->leftjoin('users as u','u.id','users.parent')
						->leftjoin('packages','users.package_id','=','packages.id')
						->where('users.name','not like','%adminuser%')
						->where('users.id','>',1)
						->where('users.status',2);//0 for active 1 for block ,2 for unverified
			
			$result['count'] = $query->count();
			$result['query'] = $query->paginate(20,$result['count']);
			$result['no'] = 1;
			return view('admin.members.unverified-members',$result);
		}
		else{
			return redirect()->route('admin_login');
		}
	}

	public function search_unverified_members(Request $request){
		if(!empty($request->session()->has('id') && $request->session()->get('role') == 0)){
			$query = DB::table('users')
						->select('users.ip_address','users.id as user_id','users.first_name','users.sur_name','users.name','users.email','users.address','users.contact','users.role','users.parent','u.name as parent_name','users.sponsor','users.position','users.image','users.cover','users.unique_code','users.status as user_status','users.created_date_time as registration_date','packages.*','countries.country_code')
						->leftjoin('users as u','u.id','users.parent')
						->leftjoin('packages','users.package_id','=','packages.id')
						->leftjoin('countries','users.country_id','countries.id')
						->where('users.name','not like','%adminuser%')
						->where('users.id','>',1)
						->where('users.status',2);//0 for active 1 for block ,2 for unverified
						if(!empty($request->input('first_name'))){
							$query->where('first_name','like','%'.$request->input('first_name').'%');
						}
						if(!empty($request->input('sur_name'))){
							$query->where('sur_name','like','%'.$request->input('sur_name').'%');
						}
						if(!empty($request->input('email'))){
							$query->where('email','like','%'.$request->input('email').'%');
						}
						if(!empty($request->input('name'))){
							$query->where('name','like','%'.$request->input('name').'%');
						}
			$result['count'] = $query->count();
			$result['query'] = $query->paginate(20,$result['count']);
			$result['no'] = 1;
			return view('admin.members.unverified-members',$result);
		}
		else{
			return redirect()->route('admin_login');
		}
	}

	public function referal_members(Request $request){
		if(!empty($request->session()->has('id') && $request->session()->get('role') == 0)){
			$query = DB::table('users as u')
						->select('u.id as user_id','u.first_name','u.sur_name','u.name','p.name as parent_name','u.email','u.address','u.contact','u.role','u.parent','u.sponsor','u.position','u.image','u.cover','u.status','u.created_date_time as registration_date','packages.*')
						->leftjoin('packages','u.package_id','=','packages.id')
						->leftjoin('users as p','p.id','u.parent')
						->where('u.first_name','not like','%admin%')
						->where('u.sponsor','=',$request->session()->get('username'))
						->where('u.status',0);
			$result['count'] = $query->count();
			$result['query'] = $query->paginate(20,$result['count']);
			$result['no'] = 1;
			return view('admin.members.referal-members',$result);
		}
		else{
			return redirect()->route('admin_login');
		}
	}

	// public function get_referal_user(Request $request){
	// 	if(!empty($request->session()->has('id') && $request->session()->get('role') == 0)){
	// 		$query = DB::table('users')
	// 					->select('name')
	// 					->where('name','=',$request->input('referal_name'))
	// 					->first();
	// 		if(!empty($query)){
	// 			echo json_encode($query->name);
	// 		}
	// 	}
	// 	else{
	// 		echo json_encode("fail");
	// 	}
			
	// }

	public function get_referal_user(Request $request){
		if(!empty($request->session()->has('id') && $request->session()->get('role') == 0)){
			$query = DB::select(DB::raw("select id, name,parent from (select * from users order by parent, id) users_sorted, (select @pv := '".$request->session()->get('id')."') initialisation where find_in_set(parent, @pv) and length(@pv := concat(@pv, ',', id)) and users_sorted.name like '%".$request->input('q')."%'"));
			$count = count($query);
			if(!empty($count) > 0){
				foreach ($query as $row) {
    			    $all_users[] = DB::table('users')
    			            ->select('id','name')
    			            ->where('users.id',$row->parent)
    			            ->groupBy('id')
    			            ->get();
				}
				dd($all_users);
				foreach($all_users as $row){
				    $data[] = array(
						'id' => $row[0]->name,
						'text' => $row[0]->name
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

	//users which are on both left and right legs view
	public function network_explorer(Request $request){
		if(!empty($request->session()->has('id') && $request->session()->get('role') == 0)){
			//return view
			return view('admin.members.network-explorer');
		}
		else{
			return redirect()->route('admin_login');
		}
	}
	//users which are on both left and right legs data
	public function network_explorer_tree(Request $request){
		//get all network data
			return \App\Users::with('children')->get()->where('parent', null);
	}

	//users which are on left leg view
	public function network_explorer_left_view(Request $request){
		if(!empty($request->session()->has('id') && $request->session()->get('role') == 0)){
			//return view
			return view('admin.members.network-explorer-left');
		}
		else{
			return redirect()->route('admin_login');
		}
	}

	//users which are on left leg data
	public function network_explorer_left(Request $request){
	    if(!empty($request->session()->has('id') && $request->session()->get('role') == 0)){
    		//get all left network data
    		return \App\Models\Network_Left_Users\Users::with('children')->get()->where('parent', null);
	    }
	    else{
	        return redirect()->route('admin_login');
	    }
	}

	//users which are on right leg view
	public function network_explorer_right_view(Request $request){
		if(!empty($request->session()->has('id') && $request->session()->get('role') == 0)){
			//return view
			return view('admin.members.network-explorer-right');
		}
		else{
			return redirect()->route('admin_login');
		}
	}
	//users which are on right leg data
	public function network_explorer_right(Request $request){
	    if(!empty($request->session()->has('id') && $request->session()->get('role') == 0)){
    		//get all left network data
    		return \App\Models\Right_Users\Users::with('children')->get()->where('parent', null);
	    }
	    else{
	        return redirect()->route('admin_login');
	    }
	}

	//users on genealogy tree
	public function genealogy_tree(Request $request){
	    if(!empty($request->session()->has('id') && $request->session()->get('role') == 0)){
    		//all users
            if(!empty($request->input('id'))){
                $users = \App\Models\Left_Users\Users::with('children')->with('child')->withCount('left_count')->withCount('right_count')->where('id', '=', $request->input('id'))->get();
            }else{
                $users = \App\Models\Left_Users\Users::with('children')->with('child')->withCount('left_count')->withCount('right_count')->where('id', '=', $request->session()->get('id'))->get();
            }
    		//$users = \App\Models\Left_Users\Users::with('children')->get();
            //return ['users' => $users,'lev3' => $last_level];
            return view('admin/members/tree',compact('users'));
	    }
	    else{
	        return redirect()->route('admin_login');
	    }
	}

	public function matching_bonus_members(Request $request){
		if(!empty($request->session()->has('id') && $request->session()->get('role') == 0)){
			//Getting all members who avial matching bonus or ranking members
			$query = DB::table('users')
					->select('users.id','users.first_name','users.sur_name','users.name as username','users.email','users.contact','users.status','users.rank_id','users.created_date_time','users.updated_date_time','leadership_ranks.rank_name','packages.package')
					->leftjoin('packages','users.package_id','packages.id')
					->leftjoin('leadership_ranks','leadership_ranks.id','users.rank_id')
					->where('users.status',0)
					->where('users.rank_id','>',0);
			$result['matching_bonus_users'] = $query->paginate(20);
			$result['total_records'] = $query->count();
			//return view
			return view('admin.members.matching-bonus-members',$result); 
		}
		else{
			return redirect()->route('admin_login');
		}
	}

	public function test_tree(Request $request){
		$users = DB::table('users')
				->select('id')
				->get();

		foreach ($users as $row) {
			$left_query = DB::table('users')
    				->where('parent',$row->id)
                    ->where('position',0)
    				->first();

    		$right_query = DB::table('users')
    				->where('parent',$row->id)
                    ->where('position',1)
    				->first();
    		$parent[] = DB::table('users')
    				->select('name')
    				->where('id',$row->id)
    				->first();
    		$right_users[] = DB::select(DB::raw("select users_sorted.name as name,users_sorted.first_name,users_sorted.sur_name,users_sorted.created_date_time,packages.package from (select * from users order by parent, id) users_sorted left join packages on packages.id = users_sorted.package_id, (select @pv := '".$row->id."') initialisation where find_in_set(users_sorted.parent, @pv) and length(@pv := concat(@pv, ',',users_sorted.id)) and users_sorted.position = 1"));

        

        	$left_users[] = DB::select(DB::raw("select users_sorted.name as name,users_sorted.first_name,users_sorted.sur_name,users_sorted.created_date_time,packages.package from (select * from users order by parent, id) users_sorted left join packages on packages.id = users_sorted.package_id, (select @pv := '".$row->id."') initialisation where find_in_set(users_sorted.parent, @pv) and length(@pv := concat(@pv, ',',users_sorted.id))  and users_sorted.position = 0"));
		}
		$user = DB::table('users')
				->select('*')
				->where('id',1)
				->first();
        $result = array(
        	'parent' => $parent[0]->name = array(
        		'childrens' => $right_users,
        	),
        );
        echo json_encode($result);die;
        return view('tree',$result);
	}
}