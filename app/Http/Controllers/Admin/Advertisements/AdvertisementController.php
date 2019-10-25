<?php
namespace App\Http\Controllers\Admin\Advertisements;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\ImageManagerStatic as Image;
use session;
use DB;

class AdvertisementController extends Controller{

	//banners 125*125
	public function banners(Request $request){
		if(!empty($request->session()->has('id') && $request->session()->get('role') == 0)){
			//getting banners
			$query = DB::table('promotional_banners')
						->select('*')
						->where('banner_size','=','125x125');
			$result['query'] = $query->get();
			
			$result['total_records'] = $query->count();
			//return view
			return view('admin.advertisements.banners.banners',$result);
		}
		else{
			return redirect()->route('admin_login');
		}
	}

	//banners 160*600
	public function banners_160x600(Request $request){
		if(!empty($request->session()->has('id') && $request->session()->get('role') == 0)){
			//getting banners
			$query = DB::table('promotional_banners')
						->select('*')
						->where('banner_size','=','160x600');
			$result['query'] = $query->get();
			$result['total_records'] = $query->count();
			//return view
			return view('admin.advertisements.banners.banners_160x600',$result);
		}
		else{
			return redirect()->route('admin_login');
		}
	}

	//banners 300*250
	public function banners_300x250(Request $request){
		if(!empty($request->session()->has('id') && $request->session()->get('role') == 0)){
			//getting banners
			$query = DB::table('promotional_banners')
						->select('*')
						->where('banner_size','=','300x250');
			$result['query'] = $query->get();
			$result['total_records'] = $query->count();
			//return view
			return view('admin.advertisements.banners.banners_300x250',$result);
		}
		else{
			return redirect()->route('admin_login');
		}
	}

	//banners 468*60
	public function banners_468x60(Request $request){
		if(!empty($request->session()->has('id') && $request->session()->get('role') == 0)){
			//getting banners
			$query = DB::table('promotional_banners')
						->select('*')
						->where('banner_size','=','468x160');
			$result['query'] = $query->get();
			$result['total_records'] = $query->count();
			//return view
			return view('admin.advertisements.banners.banners_468x60',$result);
		}
		else{
			return redirect()->route('admin_login');
		}
	}

	//banners 728*90
	public function banners_728x90(Request $request){
		if(!empty($request->session()->has('id') && $request->session()->get('role') == 0)){
			//getting banners
			$query = DB::table('promotional_banners')
						->select('*')
						->where('banner_size','=','728x90');
			$result['query'] = $query->get();
			$result['total_records'] = $query->count();
			//return view
			return view('admin.advertisements.banners.banners_728x90',$result);
		}
		else{
			return redirect()->route('admin_login');
		}
	}

	public function banners_create(Request $request){
		if(!empty($request->session()->has('id') && $request->session()->get('role') == 0)){
			return view('admin.advertisements.banners.create');
		}
		else{
			return redirect()->route('admin_login');
		}
	}

	public function banners_insert(Request $request){
		if(!empty($request->session()->has('id') && $request->session()->get('role') == 0)){
			$validateData = $request->validate([
				'title' => 'required',
				'banner_image' => 'required|max:5000|mimes:png,jpg,jpeg,gif',
				'banner_size' => 'required',
			]);
			if(!empty($request->file('banner_image')) && $request->input('banner_size') == '125x125'){
				$image       = $request->file('banner_image');
			    $filename    = rand().'_'.$request->input('banner_size').'_'.$image->getClientOriginalName();
			    $image_resize = Image::make($image->getRealPath());              
			    $image_resize->resize(125, 125);
			    $image_resize->save(public_path('assets/images/advertisement/banners/'.$filename));
			    //set data according to table coloumn
			    $data = array(
			    	'banner_title' => $request->input('title'),
			    	'banner_image' => $filename,
			    	'banner_size' => $request->input('banner_size'),
			    	'banner_location' => 4,
			    	'created_date_time' => date('Y-m-d H:i:s')
			    );
			    //query for insert
			    $query = DB::table('promotional_banners')
			    			->insert($data);
			    if(!empty($query)){
			    	$notifications = array(
					'message' => 'Banner'.$data['banner_title'].'Added Successfully',
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
			elseif(!empty($request->file('banner_image')) && $request->input('banner_size') == '160x600'){
				$image       = $request->file('banner_image');
			    $filename    = rand().'_'.$request->input('banner_size').'_'.$image->getClientOriginalName();
			    $image_resize = Image::make($image->getRealPath());              
			    $image_resize->resize(160, 600);
			    $image_resize->save(public_path('assets/images/advertisement/banners/'.$filename));
			    //set data according to table coloumn
			    $data = array(
			    	'banner_title' => $request->input('title'),
			    	'banner_image' => $filename,
			    	'banner_size' => $request->input('banner_size'),
			    	'banner_location' => 4,
			    	'created_date_time' => date('Y-m-d H:i:s')
			    );
			    //query for insert
			    $query = DB::table('promotional_banners')
			    			->insert($data);
			    if(!empty($query)){
			    	$notifications = array(
					'message' => 'Banner'.$data['banner_title'].'Added Successfully',
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
			elseif(!empty($request->file('banner_image')) && $request->input('banner_size') == '300x250'){
				$image       = $request->file('banner_image');
			    $filename    = rand().'_'.$request->input('banner_size').'_'.$image->getClientOriginalName();
			    $image_resize = Image::make($image->getRealPath());              
			    $image_resize->resize(300, 250);
			    $image_resize->save(public_path('assets/images/advertisement/banners/'.$filename));
			    //set data according to table coloumn
			    $data = array(
			    	'banner_title' => $request->input('title'),
			    	'banner_image' => $filename,
			    	'banner_size' => $request->input('banner_size'),
			    	'banner_location' => 4,
			    	'created_date_time' => date('Y-m-d H:i:s')
			    );
			    //query for insert
			    $query = DB::table('promotional_banners')
			    			->insert($data);
			    if(!empty($query)){
			    	$notifications = array(
					'message' => 'Banner'.$data['banner_title'].'Added Successfully',
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
			elseif(!empty($request->file('banner_image')) && $request->input('banner_size') == '468x60'){
				$image       = $request->file('banner_image');
			    $filename    = rand().'_'.$request->input('banner_size').'_'.$image->getClientOriginalName();
			    $image_resize = Image::make($image->getRealPath());              
			    $image_resize->resize(468, 60);
			    $image_resize->save(public_path('assets/images/advertisement/banners/'.$filename));
			    //set data according to table coloumn
			    $data = array(
			    	'banner_title' => $request->input('title'),
			    	'banner_image' => $filename,
			    	'banner_size' => $request->input('banner_size'),
			    	'banner_location' => 4,
			    	'created_date_time' => date('Y-m-d H:i:s')
			    );
			    //query for insert
			    $query = DB::table('promotional_banners')
			    			->insert($data);
			    if(!empty($query)){
			    	$notifications = array(
					'message' => 'Banner'.$data['banner_title'].'Added Successfully',
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
			elseif(!empty($request->file('banner_image')) && $request->input('banner_size') == '728x90'){
				$image       = $request->file('banner_image');
			    $filename    = rand().'_'.$request->input('banner_size').''.$image->getClientOriginalName();
			    $image_resize = Image::make($image->getRealPath());              
			    $image_resize->resize(1920, 603);
			    $image_resize->save(public_path('assets/images/advertisement/banners/'.$filename));
			    //set data according to table coloumn
			    $data = array(
			    	'banner_title' => $request->input('title'),
			    	'banner_image' => $filename,
			    	'banner_size' => $request->input('banner_size'),
			    	'banner_location' => 4,
			    	'created_date_time' => date('Y-m-d H:i:s')
			    );
			    //query for insert
			    $query = DB::table('promotional_banners')
			    			->insert($data);
			    if(!empty($query)){
			    	$notifications = array(
					'message' => 'Banner'.$data['banner_title'].'Added Successfully',
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

	public function banners_edit(Request $request,$id){
		if(!empty($request->session()->has('id') && $request->session()->get('role') == 0 && $id)){
			//getting old data
			$query = DB::table('promotional_banners')
						->select('*')
						->where('id',$id);
			$result['query'] = $query->first();
			//return view
			return view('admin.advertisements.banners.edit',$result);
		}
		else{
			return redirect()->route('admin_login');
		}
	}

	public function banners_update(Request $request,$id){
		if(!empty($request->session()->has('id') && $request->session()->get('role') == 0)){
			$validateData = $request->validate([
				'title' => 'required',
				'banner_image' => 'max:5000|mimes:png,jpg,jpeg,gif',
				'banner_size' => 'required',
			]);
			if(!empty($request->file('banner_image')) && $request->input('banner_size') == '125x125'){
				$image       = $request->file('banner_image');
			    $filename    = rand().'_'.$request->input('banner_size').'_'.$image->getClientOriginalName();
			    $image_resize = Image::make($image->getRealPath());              
			    $image_resize->resize(125, 125);
			    $image_resize->save(public_path('assets/images/advertisement/banners/'.$filename));
			    //set data according to table coloumn
			    $data = array(
			    	'banner_title' => $request->input('title'),
			    	'banner_image' => $filename,
			    	'banner_size' => $request->input('banner_size'),
			    	'banner_location' => 4,
			    	'created_date_time' => date('Y-m-d H:i:s')
			    );
			}
			elseif(!empty($request->file('banner_image')) && $request->input('banner_size') == '160x600'){
				$image       = $request->file('banner_image');
			    $filename    = rand().'_'.$request->input('banner_size').'_'.$image->getClientOriginalName();
			    $image_resize = Image::make($image->getRealPath());              
			    $image_resize->resize(160,600);
			    $image_resize->save(public_path('assets/images/advertisement/banners/'.$filename));
			    //set data according to table coloumn
			    $data = array(
			    	'banner_title' => $request->input('title'),
			    	'banner_image' => $filename,
			    	'banner_size' => $request->input('banner_size'),
			    	'banner_location' => 4,
			    	'created_date_time' => date('Y-m-d H:i:s')
			    );
			}
			elseif(!empty($request->file('banner_image')) && $request->input('banner_size') == '300x250'){
				$image       = $request->file('banner_image');
			    $filename    = rand().'_'.$request->input('banner_size').'_'.$image->getClientOriginalName();
			    $image_resize = Image::make($image->getRealPath());              
			    $image_resize->resize(300, 250);
			    $image_resize->save(public_path('assets/images/advertisement/banners/'.$filename));
			    //set data according to table coloumn
			    $data = array(
			    	'banner_title' => $request->input('title'),
			    	'banner_image' => $filename,
			    	'banner_size' => $request->input('banner_size'),
			    	'banner_location' => 4,
			    	'created_date_time' => date('Y-m-d H:i:s')
			    );
			}
			elseif(!empty($request->file('banner_image')) && $request->input('banner_size') == '468x60'){
				$image       = $request->file('banner_image');
			    $filename    = rand().'_'.$request->input('banner_size').'_'.$image->getClientOriginalName();
			    $image_resize = Image::make($image->getRealPath());              
			    $image_resize->resize(468,60);
			    $image_resize->save(public_path('assets/images/advertisement/banners/'.$filename));
			    //set data according to table coloumn
			    $data = array(
			    	'banner_title' => $request->input('title'),
			    	'banner_image' => $filename,
			    	'banner_size' => $request->input('banner_size'),
			    	'banner_location' => 4,
			    	'created_date_time' => date('Y-m-d H:i:s')
			    );
			}
			elseif(!empty($request->file('banner_image')) && $request->input('banner_size') == '728x90'){
				$image       = $request->file('banner_image');
			    $filename    = rand().'_'.$request->input('banner_size').'_'.$image->getClientOriginalName();
			    $image_resize = Image::make($image->getRealPath());              
			    $image_resize->resize(728,90);
			    $image_resize->save(public_path('assets/images/advertisement/banners/'.$filename));
			    //set data according to table coloumn
			    $data = array(
			    	'banner_title' => $request->input('title'),
			    	'banner_image' => $filename,
			    	'banner_size' => $request->input('banner_size'),
			    	'banner_location' => 4,
			    	'created_date_time' => date('Y-m-d H:i:s')
			    );
			}
			else{
				$data = array(
			    	'banner_title' => $request->input('title'),
			    	'banner_size' => $request->input('banner_size'),
			    	'banner_location' => 4,
			    	'created_date_time' => date('Y-m-d H:i:s')
			    );
			}
			if(!empty($data)){
				//query for update
				$query = DB::table('promotional_banners')
							->where('id',$id)
							->update($data);
				if(!empty($query)){
					$notifications = array(
					'message' => 'Banner'.$data['banner_title'].'Updated Successfully',
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

	// public function ajax_image_upload(Request $request){
	// 	if(!empty($request->session()->has('id') && $request->session()->get('role') == 0)){
	// 		if(!empty($request->file('banner_image'))){
	// 			$image       = $request->file('banner_image');
	// 		    $filename    = $image->getClientOriginalName();
	// 		    $image_resize = Image::make($image->getRealPath());              
	// 		    $image_resize->resize(125, 125);
	// 		    $image_resize->save(public_path('assets/images/advertisement/banners/'.$filename));
	// 		    if(!empty($image_resize)){
	// 		    	return response()->json([
	// 			       'message'   => 'Image Upload Successfully',
	// 			       'class_name'  => 'alert-success'
	// 			    ]);
	// 		    }
	// 		    else{
	// 		    	return response()->json([
	// 			       'message'   => 'Fail',
	// 			       'class_name'  => 'alert-danger'
	// 			    ]);
	// 		    }
	// 		}
	// 	}
	// 	else{

	// 	}
	// }

}
