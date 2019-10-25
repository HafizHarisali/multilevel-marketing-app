<?php
namespace App\Http\Controllers\Admin\Settings;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use session;
use DB;

class SettingsController extends Controller{

	public function profile(Request $request,$name){
		if(!empty($request->session()->has('id') && $request->session()->get('role') == 0)){
			if(!empty($request->session()->has('profile-password'))){
				//getting all data for user profile
				$query = DB::table('users')
						->select('*')
						->where('name',$name);
				$result['data'] = $query->first();
				return view('admin.settings.profile',$result);
			}
			else{
				return redirect()->route('profile_login');
			}
		}
		else{
			return redirect()->route('admin_login');
		}
	}

	public function edit_cover_image(Request $request){
		if(!empty($request->session()->has('id') && $request->session()->get('role') == 0)){
			$query = DB::table('users')
					->select('id','cover')
					->where('id',$request->session()->get('id'));
			$result['data'] = $query->first();
			return view('admin.settings.edit-cover-image',$result);
		}
		else{
			return redirect()->route('admin_login');
		}
	}

	public function update_cover_image(Request $request,$id){
		if(!empty($request->session()->has('id') && $request->session()->get('role') == 0 && $id)){
			//edit image
			if(!empty($request->file('cover_image'))){
				//Upload Image
	        	$image = rand().'.'.$request->file('cover_image')->guessExtension();
		        $image_path = $request->file('cover_image')->move(public_path().'/assets/images/users/covers/', $image);
		        //set data for update
		        $data = array(
		        	'cover' => $image,
		        	'updated_date_time' => date('Y-m-d H:i:s')
		        );
			}
			else{
				$data = array(
		        	'updated_date_time' => date('Y-m-d H:i:s')
		        );
			}
			if(!empty($data)){
				//query for insert
				$insert = DB::table('users')
						->where('id',$id)
						->update($data);
				$notifications = array(
					'message' => 'Cover Image Updated Successfully',
					'alert-type' => 'success'
				);
				return redirect()->route('user_profile',$request->session()->get('username'))->with($notifications);
			}
		}
		else{
			return redirect()->route('admin_login');
		}
	}

	public function edit_profile_image(Request $request){
		if(!empty($request->session()->has('id') && $request->session()->get('role') == 0)){
			$query = DB::table('users')
					->select('id','image')
					->where('id',$request->session()->get('id'));
			$result['data'] = $query->first();
			return view('admin.settings.edit-profile-image',$result);
		}
		else{
			return redirect()->route('admin_login');
		}
	}

	public function update_profile_image(Request $request,$id){
		if(!empty($request->session()->has('id') && $request->session()->get('role') == 0 && $id)){
			//edit image
			if(!empty($request->file('profile_image'))){
				//Upload Image
	        	$image = rand().'.'.$request->file('profile_image')->guessExtension();
		        $image_path = $request->file('profile_image')->move(public_path().'/assets/images/users/profiles/', $image);
		        //set data for update
		        $data = array(
		        	'image' => $image,
		        	'updated_date_time' => date('Y-m-d H:i:s')
		        );
			}
			else{
				$data = array(
		        	'updated_date_time' => date('Y-m-d H:i:s')
		        );
			}
			if(!empty($data)){
				//query for insert
				$insert = DB::table('users')
						->where('id',$id)
						->update($data);
				$notifications = array(
					'message' => 'Profile Image Updated Successfully',
					'alert-type' => 'success'
				);
				return redirect()->route('user_profile',$request->session()->get('username'))->with($notifications);
			}
		}
		else{
			return redirect()->route('admin_login');
		}
	}

	public function edit_profile(Request $request,$id){
		if(!empty($request->session()->has('id') && $request->session()->get('role') == 0 && $id)){
			if(!empty($request->session()->has('profile-password'))){
				//getting old data of user
				$query = DB::table('users')
						->select('*')
						->where('id',$request->session()->get('id'));
				$result['data'] = $query->first();
				return view('admin.settings.edit-profile',$result);
			}
			else{
				return redirect()->route('profile_login');
			}
			
		}
		else{
			return redirect()->route('admin_login');
		}
	}

	//for create transaction password
	public function create_profile_password(Request $request){
		if(!empty($request->session()->has('id') && $request->session()->get('role') == 0)){
		    $validatedData = $request->validate([
				'new_password' => 'required_with:confirm_password|same:confirm_password|min:6',
				'confirm_password' => 'required',
		    ]);
			//getting inputs
			$password = sha1($request->input('new_password'));
			$confirm_password = sha1($request->input('confirm_password'));
			if(!empty($password == $confirm_password)){
				$data = array(
					'transaction_password' => $password,
					'user_id' => $request->session()->get('id'),
					'for_what' => 0,
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
						return redirect()->route('profile_login')->with($notifications);
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

	public function profile_login(Request $request){
		if(!empty($request->session()->has('id') && $request->session()->get('role') == 0)){
			//check profile password
			$query = DB::table('transaction_credentials')
					->select('transaction_password')
					->where('user_id',$request->session()->get('id'))
					->where('for_what',0)
					->first();//0 for transactions and 1 for edit-profile
			if(!empty($query->transaction_password)){
				return view('admin.settings.edit-profile-login');
			}
			else{
				return view('admin.settings.edit-profile-auth');
			}
			
		}
		else{
			return redirect()->route('admin_login');
		}
	}

	public function validate_credentials(Request $request){
		if(!empty($request->session()->has('id') && $request->session()->get('role') == 0)){
			//check password
			$trans_query = DB::table('transaction_credentials')
					->select('transaction_password')
					->where('user_id',$request->session()->get('id'))
					->where('for_what',0)
					->first();//0 for transactions 1 for edit-profile
			if(!empty($trans_query->transaction_password == sha1($request->input('password')))){
				
				$session = session()->put([
					'profile-password' => $trans_query->transaction_password
				]);
				$notifications = array(
					'message' => 'Authorized Successfully',
					'alert-type' => 'success',
				);
				return redirect()->route('edit_profile',$request->session()->get('id'))->with($notifications);
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

	public function update_profile(Request $request,$id){
		if(!empty($request->session()->has('id') && $request->session()->get('role') == 0 && $id)){
			//checking current password
			$query = DB::table('users')
					->select('password')
					->where('id',$id)
					->first();
			if(!empty(sha1($request->input('current_password')) == $query->password)){
				//set data as coloumns
				if(!empty(sha1($request->input('new_password')) == sha1($request->input('confirm_password')))){
					$data = array(
						'first_name' => $request->input('first_name'),
						'sur_name' => $request->input('sur_name'),
						'password' => sha1($request->input('new_password')),
						'email' => $request->input('email'),
						'status' => $request->input('status'),
						'contact' => $request->input('contact'),
					);
					if(!empty($data)){
						//Query for update
						$update = DB::table('users')
								->where('id',$id)
								->update($data);
						if(!empty($update == 1)){
							$notifications = array(
								'message' => 'Profile Update Successfully',
								'alert-type' => 'success',
							);
							return redirect()->back()->with($notifications);
						}
						else{
							$notifications = array(
								'message' => 'Something went wrong in while update profile',
								'alert-type' => 'info',
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
	
	public function ewallet_settings(Request $request){
	    if(!empty($request->session()->has('id') && $request->session()->get('role') == 0)){
	        //get updated ewallet settings
	        $query = DB::table('ewallet_settings')
	                ->select('minimum_amount','processing_tax')
	                ->where('id',1);
	       //set data in array
	       $result['ewallet_settings'] = $query->first();
	                
	        return view('admin.settings.ewallet-settings',$result);
	    }
	    else{
	        return redirect()->route('admin_login');
	    }
	}
	
	public function ewallet_settings_update(Request $request){
	    if(!empty($request->session()->has('id') && $request->session()->get('role') == 0)){
	        $validateData = $request->validate([
	            'minimum_amount' => 'required|numeric',
	            'processing_tax' => 'required|numeric', 
	       ]);
	       //getting input
	       $data = array(
	            'ip_address' => $request->ip(),
	            'minimum_amount' => $request->input('minimum_amount'),
	            'processing_tax' => $request->input('processing_tax'),
	            'updated_date_time' => date('Y-m-d H:i:s')
	       );
	       if(!empty($data)){
	           $query = DB::table('ewallet_settings')
	                    ->where('id',1)
	                    ->update($data);
	           if(!empty($query == 1)){
	               $notifications = array(
	                    'message' => 'Ewallet Settings Updated Successfully',
	                    'alert-type' => 'success',
	               );
	               return redirect()->back()->with($notifications);
	           }
	           else{
	                $notifications = array(
	                    'message' => 'Something went wrong',
	                    'alert-type' => 'error',
	               );
	               return redirect()->back()->with($notifications);
	           }
	       }
	                
	        return view('admin.settings.ewallet-settings',$result);
	    }
	    else{
	        return redirect()->route('admin_login');
	    }
	}
}