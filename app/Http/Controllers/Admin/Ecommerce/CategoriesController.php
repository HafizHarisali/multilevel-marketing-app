<?php
namespace App\Http\Controllers\Admin\Ecommerce;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use session;
use DB;

class CategoriesController extends Controller{

	public function index(Request $request){
		if(!empty($request->session()->has('id') && $request->session()->get('role') == 0)){
			$query = DB::table('categories')
						->select('*')
						->orderby('id','desc');
			$result['query'] = $query->paginate();
			$result['total_records'] = $query->count();
			return view('admin.ecommerce.categories.manage',$result);
		}
		else{
			return redirect()->route('admin_login');
		}
	}

	public  function add(Request $request){
		if(!empty($request->session()->has('id') && $request->session()->get('role') == 0)){
			return view('admin.ecommerce.categories.add');
		}
		else{
			return redirect()->route('admin_login');
		}
	}

	public  function insert(Request $request){
		if(!empty($request->session()->has('id') && $request->session()->get('role') == 0)){
			
			$data = array(
	        	'name' => $request->input('name'),
	        	'created_date_time' => date('Y-m-d H:i:s'),
	        	'updated_date_time' => date('Y-m-d H:i:s')
		        );
			$insert_query = DB::table('categories')
							->insertGetId($data);
			$notifications = array(
				'message' => 'Category Added Successfully',
				'alert-type' => 'success'
			);
			return redirect()->route('add_categories')->with($notifications);
		}
		else{
			return redirect()->route('admin_login');
		}
	}

	public  function edit(Request $request,$id){
		if(!empty($request->session()->has('id') && $request->session()->get('role') == 0 && $id)){
			$query = DB::table('categories')
						->select('*')
						->where('id',$id);
			$result['query'] = $query->first();
			return view('admin.ecommerce.categories.edit',$result);
		}
		else{
			return redirect()->route('admin_login');
		}
	}

	public  function update(Request $request,$id){
		if(!empty($request->session()->has('id') && $request->session()->get('role') == 0)){
			$data = array(
	        	'name' => $request->input('name'),
	        	'updated_date_time' => date('Y-m-d H:i:s')
		        );
			$insert_query = DB::table('categories')
							->where('id',$id)
							->update($data);
			$notifications = array(
				'message' => 'Category Update Successfully',
				'alert-type' => 'success'
			);
			return redirect()->route('manage_categories')->with($notifications);
		}
		else{
			return redirect()->route('admin_login');
		}
	}

	public  function delete(Request $request,$id){
		if(!empty($request->session()->has('id') && $request->session()->get('role') == 0)){
			$query = DB::table('categories')
						->where('id',$id)
						->delete();
			$notifications = array(
				'message' => 'Category Deleted Successfully',
				'alert-type' => 'success'
			);
			return redirect()->route('manage_categories')->with($notifications);
		}
		else{
			return redirect()->route('admin_login');
		}
	}








}