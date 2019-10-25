<?php
namespace App\Http\Controllers\Admin\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use session;
use DB;

class AuthController extends Controller{

	//Admin Login
	public function admin_login(Request $request){
		
		if(!empty($request->session()->has('id') && $request->session()->get('role') == 0)){
			return redirect()->route('index');
		}
		else{
			return view('admin.auth.login');
		}
	}

	public function validating_credentials(Request $request){

		if(!empty($request->input('name') && $request->input('password'))){
			$query = DB::table('users')
				->select('id','name','role','image')
				->where('name',$request->input('name'))
				->where('password',sha1($request->input('password')))
				->where('id',1);
			$result = $query->first();
			if(!empty($result)){
				$notification = array(
					'message' => 'Login Successfully',
					'alert-type' => 'success'
				);
				$session = session([
					'id' => $result->id,
					'role' => $result->role,
					'username' => $result->name,
					'profile' => $result->image,
				]);
				$data=array(
					'ip_address' => $request->ip(),
					'user_id' => $request->session()->get('id'),
					'status' => 1,
					'date_time' => date('Y-m-d H:i:s')
				);
				$query = DB::table('login_activities')
							->InsertGetId($data);
				return redirect()->route('index')->with($notification);
			}
			else{
				$notification = array(
					'message' => 'You are using wrong credentials',
					'alert-type' => 'error'
				);
				return redirect()->route('admin_login')->with($notification);
			}
		}	
		else{
			$notification = array(
					'message' => 'Please fill all fields',
					'alert-type' => 'warning'
				);
				return redirect()->route('admin_login')->with($notification);
		}
	}

	public function admin_logout(Request $request){
    	//Updating login_activity
    	$data = array(
			'ip_address' => $request->ip(),
			'user_id' => $request->session()->has('id'),
			'status'  => 0,
			'date_time' => date('Y-m-d H:i:s')
		);
		$query = DB::table('login_activities')
				->InsertGetId($data);
        $request->session()->flush();
        return redirect()->route('admin_login');
	}
}