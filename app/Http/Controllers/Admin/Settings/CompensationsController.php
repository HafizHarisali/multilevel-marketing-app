<?php
namespace App\Http\Controllers\Admin\Settings;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use session;
use DB;

class CompensationsController extends Controller{

	//compensations view
	public function index(Request $request){
		if(!empty($request->session()->has('id') && $request->session()->get('role') == 0)){
			//getting data
			$query = DB::table('ewallet_categories')
						->select('*')
						->where('slug','not like','%ewallet-purchase%')
						->where('slug','not like','%matching-bonus%')
						->where('slug','not like','%fund-debit%')
						->where('slug','not like','%ewallet-fund-transfer%')
						->where('slug','not like','%enrollment-package-upgrade%')
						->where('slug','not like','%withdraw-fund%')
						->where('slug','not like','%withdrawal-cancellation%')
						->where('slug','not like','%binary-bonus%')
						->where('slug','not like','%activation-fees%')
						->where('slug','not like','%capping%');
			$result['query'] = $query->get();
			$result['total_records'] = $query->count();
			//return view
			return view('admin.settings.package-compensations',$result);
		}
		else{
			return redirect()->route('admin_login');
		}
	}

	//update ewallet-categories status
	public function ajax_update_status(Request $request,$id){
		if(!empty($request->session()->has('id') && $request->session()->get('role') == 0)){
			//query for update
			$status = $request->input('status');
			if(!empty($status == 0)){
				$status = 0;
			}
			else{
				$status = 1;
			}
			$data = array(
				'status' => $status
			);
			$query = DB::table('ewallet_categories')
						->where('id',$id)
						->update($data);
			if(!empty($query)){
				echo json_encode("success");
			}
			else{
				echo json_encode("error");
			}
			
		}
		else{
			echo json_encode("error");
		}
	}

	//packages bonuses config view
	public function package_bonus_config(Request $request,$slug){
		if(!empty($request->session()->has('id') && $request->session()->get('role') == 0)){
			//getting data
			$query = DB::table('compensations')
						->select('packages.id as packages_id','packages.package','compensations.package_id','compensations.ewallet_category_id','compensations.bonus','compensations.level','ewallet_categories.name','ewallet_categories.slug')
						->leftjoin('packages','packages.id','=','compensations.package_id')
						->leftjoin('ewallet_categories','ewallet_categories.id','compensations.ewallet_category_id')
						->where('ewallet_categories.slug','=',$slug);
			$result['query'] = $query->get();
			$result['total_records'] = $query->count();
			$result['slug'] = $slug;
			//return view
			return view('admin.settings.package-bonus-config',$result);
		}
		else{
			return redirect()->route('admin_login');
		}
	}

	//packages bonuses config 
	public function package_bonus_config_update(Request $request,$slug){
		if(!empty($request->session()->has('id') && $request->session()->get('role') == 0)){
			
			//check packages
			$check_package = DB::table('compensations')
								->select('packages.id as packages_id','packages.package','packages.id as package_id','ewallet_categories.slug','compensations.ewallet_category_id as ewallet_id','compensations.level')
								->leftjoin('ewallet_categories','ewallet_categories.id','compensations.ewallet_category_id')
								->leftjoin('packages','packages.id','compensations.package_id')
								->where('ewallet_categories.slug','=',$slug)
								->get();
			foreach ($check_package as $row) {
				if(!empty($row->level > 0)){
					$query = DB::table('compensations')
						->where('compensations.level','=',$row->level)
						->where('compensations.ewallet_category_id','=',$row->ewallet_id)
						->update(array('bonus' => $request->input('bonus_'.$row->level),'updated_date_time' => date('Y-m-d h:i:s')));
				}
				else{
					$query = DB::table('compensations')
						->where('compensations.package_id','=',$row->package_id)
						->where('compensations.ewallet_category_id','=',$row->ewallet_id)
						->update(array('bonus' => $request->input('bonus_'.$row->package_id),'updated_date_time' => date('Y-m-d h:i:s')));
				}
				
			}
			if(!empty($query)){
				$notifications = array(
					'message' => $slug.' updated successfully',
					'alert-type' => 'success'
				);
				return redirect()->back()->with($notifications);
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

	//packages expiry plan view
	public function package_plan_config(Request $request){
		if(!empty($request->session()->has('id') && $request->session()->get('role') == 0)){
			//getting data
			$query = DB::table('packages')
						->select('*');
			$result['query'] = $query->get();
			//return view
			return view('admin.settings.package-plan-config',$result);
		}
		else{
			return redirect()->route('admin_login');
		}
	}

	//packages expiry plan
	public function package_plan_config_insert(Request $request){
		if(!empty($request->session()->has('id') && $request->session()->get('role') == 0)){
			//check packages
			$query = DB::table('packages')
						->select('*')
						->get();
			foreach ($query as $row) {
				//set data according to table coloumns
				$data = array(
					'expiry_duration' => $request->input('package_expire_duration_'.$row->id),
					'expiry_period' => $request->input('package_expiry_period_'.$row->id)
				);
				$sub_query = DB::table('packages')
								->where('id',$row->id)
								->update($data);
				$sub_query = 1;
			}
			if(!empty($sub_query == 1)){
				$notifications = array(
					'message' => 'package configurations updated successfully',
					'alert-type' => 'success'
				);
				return redirect()->back()->with($notifications);
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

	//maximum depth of downlines
	public function package_tree_config(Request $request){
		if(!empty($request->session()->has('id') && $request->session()->get('role') == 0)){
			//getting data
			$query = DB::table('site_settings')
						->select('maximum_downline_tree');
			$result['row'] = $query->first();
			//return view
			return view('admin.settings.package-tree-config',$result);
		}
		else{
			return redirect()->route('admin_login');
		}
	}

	//maximum depth of downlines update
	public function package_tree_config_update(Request $request){
		if(!empty($request->session()->has('id') && $request->session()->get('role') == 0)){
			//query for update tree settings
			if(!empty($request->input('maximum_downlines_update'))){
				$query = DB::table('site_settings')
							->update(
								array(
									'maximum_downline_tree' => $request->input('maximum_downlines_update'),
									'updated_date_time' => date('Y-m-d H:i:s')
								));
				if(!empty($query)){
					$notifications = array(
					'message' => 'genealogy settings updated',
					'alert-type' => 'success'
					);
					return redirect()->back()->with($notifications);
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
				$query = DB::table('site_settings')
							->insert(
								array(
									'maximum_downline_tree' => $request->input('maximum_downlines_insert'),
									'created_date_time' => date('Y-m-d H:i:s'),
									'updated_date_time' => date('Y-m-d H:i:s')
							));
				if(!empty($query)){
					$notifications = array(
					'message' => 'genealogy settings updated',
					'alert-type' => 'error'
					);
					return redirect()->back()->with($notifications);
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
		else{
			return redirect()->route('admin_login');
		}
	}

	//system config
	public function system_config(Request $request){
		if(!empty($request->session()->has('id') && $request->session()->get('role') == 0)){
			//getting old data
			$query = DB::table('site_settings')
						->select('*');
			$result['row'] = $query->first();
			//return view
			return view('admin.settings.site-name',$result);
		}
		else{
			return redirect()->route('admin_login');
		}
	}

	//system config update
	public function system_config_update(Request $request){
		if(!empty($request->session()->has('id') && $request->session()->get('role') == 0)){
			//query for site_name
			if(!empty($request->file('site_logo_update'))){
				$file_name = $request->file('site_logo_update')->getClientOriginalName();
				$file = $request->file('site_logo_update')->move(public_path().'/assets/images/settings/logo/',$file_name);
				$data = array(
					'site_name' => $request->input('site_name_update'),
					'site_logo' => $file_name,
					'logo_text' => $request->input('logo_text'),
					'updated_date_time' => date('Y-m-d H:i:s'),
				);
			}
			else{
				$data = array(
					'site_name' => $request->input('site_name_update'),
					'logo_text' => $request->input('logo_text'),
					'updated_date_time' => date('Y-m-d H:i:s'),
				);
			}
			if(!empty($data)){
				$query = DB::table('site_settings')
							->where('id',1)
							->update($data);
				if(!empty($query)){
					$notifications = array(
					'message' => 'setting updated successfully',
					'alert-type' => 'success'
					);
					return redirect()->back()->with($notifications);
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
		else{
			return redirect()->route('admin_login');
		}
	}

	public function rank_config(Request $request){
		if(!empty($request->session()->has('id') && $request->session()->get('role') == 0)){
			//gettings all ranks config
			$query = DB::table('leadership_ranks')
					->select('leadership_ranks.*','p.id as left_right_package_id','p.package as left_right_package','qp.id as qualify_package_id','qp.package as qualify_package')
					->leftjoin('packages as p','leadership_ranks.left_right_package','p.id')
					->leftjoin('packages as qp','leadership_ranks.qualify_package','qp.id');
			//getting all packages
			$packages = DB::table('packages')
						->select('packages.id as package_id','packages.package');
			//store data in array
			$result['rank_data'] = $query->get();
			$result['packages'] = $packages->get();
			return view('admin.settings.rank-config',$result);
		}
		else{
			return redirect()->route('admin_login');
		}
	}

	public function rank_config_update(Request $request){
		if(!empty($request->session()->has('id') && $request->session()->get('role') == 0)){
			//Getting all packages
			$ranks = DB::table('leadership_ranks')
					->select('id')
					->get();
			foreach ($ranks as $row) {
			 	//store data as coloumns
			 	$data = array(
			 		'rank_name' => $request->input('rank_name_'.$row->id),
			 		'left_earning' => $request->input('left_sale_'.$row->id),
			 		'right_earning' => $request->input('right_sale_'.$row->id),
			 		'count_left_right_package' => $request->input('count_left_right_package_'.$row->id),
			 		'left_right_package' => $request->input('left_right_package_'.$row->id),
			 		'qualify_package' => $request->input('qualify_package_'.$row->id),
			 		'referals' => $request->input('referals_'.$row->id),
			 		'incentive' => $request->input('incentive_'.$row->id),
			 		'updated_date_time' => date('Y-m-d H:i:s'),
			 	);
			 	if(!empty($data)){
			 		//query for update data
			 		$update = DB::table('leadership_ranks')
			 				->where('id','=',$row->id)
			 				->update($data);
			 	}
			}
		 	if(!empty($update == 1)){
	 			$notifications = array(
	 				'message' => 'Rank configurations Updated Successfully',
	 				'alert-type' => 'success',
	 			);
	 			return redirect()->back()->with($notifications);
	 		}
	 		else{
	 			$notifications = array(
	 				'message' => 'Rank configurations Updated Failed',
	 				'alert-type' => 'warning',
	 			);
	 			return redirect()->back()->with($notifications);
	 		} 
		}
		else{
			return redirect()->route('admin_login');
		}
	}
}