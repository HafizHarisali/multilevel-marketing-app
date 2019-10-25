<?php
namespace App\Http\Controllers\Admin\Packages;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use session;
use DB;

class PackagesController extends Controller{
	public function index(Request $request){
		if(!empty($request->session()->has('id') && $request->session()->get('role') == 0)){
			$query = DB::table('packages')
						->select('*');
			$result['query'] = $query->get();
			$result['total_records'] = $query->count();
			return view('admin.packages.manage-enrollment-package',$result);
		}
		else{
			return redirect()->route('admin_login');
		}
	}

	public function add(Request $request){
		if(!empty($request->session()->has('id') && $request->session()->get('role') == 0)){
			return view('admin.packages.create-enrollment-package');
		}
		else{
			return redirect()->route('admin_login');
		}
	}

	public function insert(Request $request){
		if(!empty($request->session()->has('id') && $request->session()->get('role') == 0)){
			$validateData = $request->validate([
				'title' => 'required',
				'price' => 'required|numeric',
				'badge' => 'required|mimes:png,jpeg,jpg',
			]);
			$file_name = $request->file('badge')->getClientOriginalName();
			$file = $request->file('badge')->move(public_path().'assets/images/badges/',$file_name);
			//set data as coloumns for packages
			$data = array(
				'package' => $request->input('title'),
				'fees' => $request->input('price'),
				'badge' => $file_name,
				'status' => $request->input('status'),
				'created_date_time' => date('Y-m-d H:i:s'),
				'updated_date_time' => date('Y-m-d H:i:s'),
			);
			if(!empty($data)){
				$insert = DB::table('packages')
							->insertGetId($data);
				//set data as columns for compensations sponsor
				$comp_sponsor_data = array(
					'package_id' => $insert,
					'ewallet_category_id' => 5,
					'level' => 0,
					'bonus' => 0,
					'updated_date_time' => date('Y-m-d H:i:s')
				);
				//set data as columns for compensations level
				$comp_binary_data = array(
					'package_id' => $insert,
					'ewallet_category_id' => 2,
					'level' => 0,
					'bonus' => 0,
					'updated_date_time' => date('Y-m-d H:i:s')
				);
				$sponsor_insert = DB::table('compensations')
					->insert($comp_sponsor_data);
				$binary_insert = DB::table('compensations')
					->insert($comp_binary_data);
				$notifications = array(
					'message' => 'Package Added Successfully',
					'alert-type' => 'success'
				);
				return redirect()->route('manage_packages')->with($notifications);
			}
			else{
				$notifications = array(
					'message' => 'Something went wrong',
					'alert-type' => 'error'
				);
				return redirect()->route('manage_packages')->with($notifications);
			}
		}
		else{
			return redirect()->route('admin_login');
		}
	}

	public function edit(Request $request,$id){
		if(!empty($request->session()->has('id') && $request->session()->get('role') == 0)){
			$query = DB::table('packages')
						->select('*')
						->where('id',$id);
			$result['query'] = $query->first();
			return view('admin.packages.edit-enrollment-package',$result);
		}
		else{
			return redirect()->route('admin_login');
		}
	}

	public function update(Request $request,$id){
		if(!empty($request->session()->has('id') && $request->session()->get('role') == 0)){
			if(!empty($request->file('badge'))){
				$file_name = $request->file('badge')->getClientOriginalName();
				$file = $request->file('badge')->move(public_path().'/assets/images/badges/',$file_name);
				$data = array(
					'package' => $request->input('title'),
					'fees' => $request->input('price'),
					'badge' => $file_name,
					'status' => $request->input('status'),
					'updated_date_time' => date('Y-m-d H:i:s'),
				);
			}
			else{
				$data = array(
					'package' => $request->input('title'),
					'fees' => $request->input('price'),
					'status' => $request->input('status'),
					'updated_date_time' => date('Y-m-d H:i:s'),
				);
			}
			
			if(!empty($data)){
				$update = DB::table('packages')
							->where('id',$id)
							->update($data);
				$notifications = array(
					'message' => 'Package Updated Successfully',
					'alert-type' => 'success'
				);
				return redirect()->route('manage_packages')->with($notifications);
			}
			else{
				$notifications = array(
					'message' => 'Somthing went wrong',
					'alert-type' => 'error'
				);
				return redirect()->route('manage_packages')->with($notifications);
			}
		}
		else{
			return redirect()->route('admin_login');
		}
	}

	public function delete(Request $request,$id){
		if(!empty($request->session()->has('id') && $request->session()->get('role') == 0)){
			$query = DB::table('packages')
						->where('id',$id)
						->delete();
			//delete from compensations
			$remove_comp = DB::table('compensations')
							->where('package_id',$id)
							->delete();

			if(!empty($query)){
				$notifications = array(
					'message' => 'Package Deleted Successfully',
					'alert-type' => 'success'
				);
				return redirect()->route('manage_packages')->with($notifications);
			}	
			else{
				$notifications = array(
					'message' => 'Somthing went wrong',
					'alert-type' => 'error'
				);
				return redirect()->route('manage_packages')->with($notifications);
			}
		}
		else{
			return redirect()->route('admin_login');
		}
	}

	public function filter_packages(Request $request){
		if(!empty($request->session()->has('id') && $request->session()->get('role') == 0)){
			$query = DB::table('packages')
						->select('*');
					if(!empty($request->input('title'))){
						$query->where('package','like','%'.$request->input('title').'%');
					}
					if(!empty($request->input('price'))){
						$query->where('fees','like','%'.$request->input('price').'%');
					}
			$result['query'] = $query->get();
			$result['total_records'] = $query->count();
			return view('admin.packages.manage-enrollment-package',$result);
		}
		else{
			return redirect()->route('admin_login');
		}
	}
}