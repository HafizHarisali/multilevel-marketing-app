<?php
namespace App\Http\Controllers\Admin\Support;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use session;
use DB;
use Carbon\Carbon;

class SupportController extends Controller{

	public function index(Request $request){
		if(!empty($request->session()->has('id') && $request->session()->get('role') == 0)){
			//getting data
			$query = DB::table('support')
						->select('support.id as support_id','support.title','support.priority','support.status','support.created_date_time',DB::raw('count(support_comments.support_id) as answer_count'))
						->leftjoin('support_comments','support_comments.support_id','=','support.id')
						->groupBy('support.id');
			$result['query'] = $query->paginate(20);
			$result['total_records'] = $query->count();
			//return view
			return view('admin.support.all-supports',$result);
		}
		else{
			return redirect()->route('admin_login');
		}
	}

	public function add_support(Request $request){
		if(!empty($request->session()->has('id') && $request->session()->get('role') == 0)){
			//return view
			return view('admin.support.create');
		}
		else{
			return redirect()->route('admin_login');
		}
	}

	public function insert_support(Request $request){
		if(!empty($request->session()->has('id') && $request->session()->get('role') == 0)){
			$validateData = $request->validate([
				'title' => 'required',
				'priority' => 'required',
				'description' => 'required',
				'support_file' => 'required|mimes:png,jpeg,jpg,doc,docx,pdf',
			]);
			if(!empty($request->file('support_file'))){
				$file = $request->file('support_file');
				$file_name = rand().'_'.$file->getClientOriginalName();
				$path = $file->move(public_path().'/assets/support/support_files/',$file_name);
				//set data for insert
				$data = array(
					'user_id' => $request->session()->get('id'),
					'title' => $request->input('title'), 
					'priority' => $request->input('priority'),//1 for highest, 2 for high, 3 for medium , 4 for low and 5 for lowest 
					'description' => $request->input('description'),
					'file' => $file_name,
					'status' => 0, //0 for open 1 for closed and 2 for completed
					'created_date_time' => date('Y-m-d H:i:s'),
					'updated_date_time' => date('Y-m-d H:i:s')
 				);
			}
			else{
				$data = array(
					'user_id' => $request->session()->get('id'),
					'title' => $request->input('title'), 
					'priority' => $request->input('priority'),
					'description' => $request->input('description'),
					'status' => 0, //0 for open 1 for closed and 2 for completed
					'created_date_time' => date('Y-m-d H:i:s'),
					'updated_date_time' => date('Y-m-d H:i:s')
 				);
			}
			if(!empty($data)){
				//query for insert
				$id = DB::table('support')
							->insertGetId($data);
				if(!empty($id)){
					$notifications = array(
					'message' => 'Support Request Submitted Successfully',
					'alert-type' => 'success'
					);
					return redirect()->route('support_details',$id)->with($notifications);
				}
				else{
					$notifications = array(
					'message' => 'someting went wrong',
					'alert-type' => 'warning'
					);
					return redirect()->back()->with($notifications);
				}	
			}
		}
		else{
			return redirect()->route('admin_login');
		}
	}

	public function edit_support(Request $request,$id){
		if(!empty($request->session()->has('id') && $request->session()->get('role') == 0)){
			//getting old data
			$query = DB::table('support')
						->select('*');
			$result['query'] = $query->first();
			//return view
			return view('admin.support.edit-support',$result);
		}
		else{
			return redirect()->route('admin_login');
		}
	}

	public function update_support(Request $request,$id){
		if(!empty($request->session()->has('id') && $request->session()->get('role') == 0)){
			$validateData = $request->validate([
				'title' => 'required',
				'priority' => 'required',
				'description' => 'required',
				'file' => 'required|mimes:png,jpeg,jpg,doc,docx,pdf',
			]);
			if(!empty($request->file('support_file'))){
				$file = $request->file('support_file');
				$file_name = rand().'_'.$file->getClientOriginalName();
				$path = $file->move(public_path().'/assets/support/support_files/',$file_name);
				//set data for insert
				$data = array(
					'user_id' => $request->session()->get('id'),
					'title' => $request->input('title'), 
					'priority' => $request->input('priority'),//1 for highest, 2 for high, 3 for medium , 4 for low and 5 for lowest 
					'description' => $request->input('description'),
					'file' => $file_name,
					'status' => 0, //0 for open 1 for closed and 2 for completed
					'updated_date_time' => date('Y-m-d H:i:s')
 				);
			}
			else{
				$data = array(
					'user_id' => $request->session()->get('id'),
					'title' => $request->input('title'), 
					'priority' => $request->input('priority'),
					'description' => $request->input('description'),
					'status' => 0, //0 for open 1 for closed and 2 for completed
					'updated_date_time' => date('Y-m-d H:i:s')
 				);
			}
			if(!empty($data)){
				//query for insert
				$query = DB::table('support')
							->where('id',$id)
							->update($data);
				if(!empty($query)){
					$notifications = array(
					'message' => 'Support Request Updated Successfully',
					'alert-type' => 'success'
					);
					return redirect()->route('all_supports')->with($notifications);
				}
				else{
					$notifications = array(
					'message' => 'someting went wrong',
					'alert-type' => 'warning'
					);
					return redirect()->back()->with($notifications);
				}	
			}
		}
		else{

		}
	}

	public function support_details(Request $request,$id){
		if(!empty($request->session()->has('id') && $request->session()->get('role') == 0)){
			//getting data for specific support
			$query = DB::table('support')
						->select('support.id as support_id','support.title','support.priority','support.description','support.file','support.status','support.updated_date_time','users.username as user_name','users.email as user_email','users.contact as user_phone','users.image as profile_image')
						->leftjoin('users','users.id','support.user_id')
						->where('support.id',$id);
			$result['query'] = $query->first();
			if(!empty($result['query'])){
				$comment_query = DB::table('support_comments')
									->select('support_comments.id as comment_id','support_comments.user_id as comment_user_id','support_comments.support_id as comment_support_id','support_comments.title as comment_title','support_comments.description as comment_description','support_comments.file as comment_file','support_comments.status as comment_status','support_comments.updated_date_time','users.username as comment_user_name','users.image as profile_image')
									->leftjoin('support','support.id','=','support_comments.support_id')
									->leftjoin('users','users.id','support_comments.user_id')
									->where('support.id',$id)
									->orderby('support_comments.id','desc');
				$result['comments'] = $comment_query->get();
				$result['count'] = $comment_query->count();
			}
			$ago = Carbon::parse($result['query']->updated_date_time)->diffForHumans();
			$result['ago'] = $ago;
			//return view
			return view('admin.support.support-details',$result);
		}
		else{
			return redirect()->route('admin_login');
		}
	}

	public function mark_closed(Request $request,$id){
		if(!empty($request->session()->has('id') && $request->session()->get('role') == 0)){
			//query for close support request
			$query = DB::table('support')
						->where('id',$id)
						->update(array('status' => 1));
			if(!empty($query)){
				$notifications = array(
				'message' => 'Support Request Closed Successfully',
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

	public function mark_completed(Request $request,$id){
		if(!empty($request->session()->has('id') && $request->session()->get('role') == 0)){
			//query for close support request
			$query = DB::table('support')
						->where('id',$id)
						->update(array('status' => 2));
			if(!empty($query)){
				$notifications = array(
				'message' => 'Support Request Completed Successfully',
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

	public function delete_support(Request $request,$id){
		if(!empty($request->session()->has('id') && $request->session()->get('role') == 0)){
			//query for close support request
			$query = DB::table('support')
						->where('id',$id)
						->delete();
			if(!empty($query)){
				$notifications = array(
				'message' => 'Support Request Deleted Successfully',
				'alert-type' => 'success'
				);
				return redirect()->route('support_add')->with($notifications);
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

	public function insert_support_comment(Request $request,$support_id){
		if(!empty($request->session()->has('id') && $request->session()->get('role') == 0)){
			$validateData = $request->validate([
				'title' => 'required',
				'description' => 'required',
				'support_comment_file' => 'required|mimes:png,jpeg,jpg,doc,docx,pdf',
			]);
			if(!empty($request->file('support_comment_file'))){
				$file = $request->file('support_comment_file');
				$file_name = rand().'_'.$file->getClientOriginalName();
				$path = $file->move(public_path().'/assets/support/support_comment_files/',$file_name);
				//set data for insert
				$data = array(
					'ip_address' => $request->ip(),
					'user_id' => $request->session()->get('id'),
					'support_id' => $support_id,
					'title' => $request->input('title'), 
					'description' => $request->input('description'),
					'file' => $file_name,
					'status' => $request->input('status'), //0 for open, 1 for onhold, 2 for ascalated, 3 											for pending, 4 for waiting for customer 												reply, 5 for waiting on third party and 6 												for customer reply
					'created_date_time' => date('Y-m-d H:i:s'),
					'updated_date_time' => date('Y-m-d H:i:s')
 				);
			}
			else{
				$data = array(
					'ip_address' => $request->ip(),
					'user_id' => $request->session()->get('id'),
					'support_id' => $support_id,
					'title' => $request->input('title'), 
					'description' => $request->input('description'),
					'status' => $request->input('status'), //0 for open, 1 for onhold, 2 for ascalated, 3 											for pending, 4 for waiting for customer 												reply, 5 for waiting on third party and 6 												for customer reply
					'created_date_time' => date('Y-m-d H:i:s'),
					'updated_date_time' => date('Y-m-d H:i:s')
 				);
			}
			if(!empty($data)){
				//query for insert
				$query = DB::table('support_comments')
							->insert($data);
				if(!empty($query)){
					$notifications = array(
					'message' => 'Support Comment Submitted Successfully',
					'alert-type' => 'success'
					);
					return redirect()->back()->with($notifications);
				}
				else{
					$notifications = array(
					'message' => 'someting went wrong',
					'alert-type' => 'warning'
					);
					return redirect()->back()->with($notifications);
				}	
			}
		}
		else{
			return redirect()->route('admin_login');
		}
	}

	public function edit_support_comment(Request $request,$id,$support_id){
		if(!empty($request->session()->has('id') && $request->session()->get('role') == 0)){
			//getting old data
			$query = DB::table('support_comments')
						->select('support_comments.*','support.id as support_id')
						->leftjoin('support','support.id','support_comments.support_id')
						->where('support_comments.id',$id);
			$result['query'] = $query->first();
			//return view
			return view('admin.support.edit-support-comment',$result);
		}
		else{
			return redirect()->route('admin_login');
		}
	}

	public function update_support_comment(Request $request,$id,$support_id){
		if(!empty($request->session()->has('id') && $request->session()->get('role') == 0)){
			$validateData = $request->validate([
				'title' => 'required',
				'description' => 'required',
				'file' => 'required|mimes:png,jpeg,jpg,doc,docx,pdf',
			]);
			if(!empty($request->file('support_file'))){
				$file = $request->file('support_file');
				$file_name = rand().'_'.$file->getClientOriginalName();
				$path = $file->move(public_path().'/assets/support/support_comment_files/',$file_name);
				//set data for insert
				$data = array(
					'ip_address' => $request->ip(),
					'user_id' => $request->session()->get('id'),
					'support_id' => $support_id,
					'title' => $request->input('title'), 
					'description' => $request->input('description'),
					'file' => $file_name,
					'status' => $request->input('status'), //0 for open, 1 for onhold, 2 for 										escalated, 3 for pending, 4 for 										waiting for customer 													reply, 5 for waiting on third 											party and 6 for customer reply
					'updated_date_time' => date('Y-m-d H:i:s')
 				);
			}
			else{
				$data = array(
					'ip_address' => $request->ip(),
					'user_id' => $request->session()->get('id'),
					'support_id' => $support_id,
					'title' => $request->input('title'), 
					'description' => $request->input('description'),
					'status' => $request->input('status'), //0 for open, 1 for onhold, 2 for 											escalated, 3 															for pending, 4 for waiting 												for customer reply, 5 for 												waiting on third party and 6 												for customer reply
					'updated_date_time' => date('Y-m-d H:i:s')
 				);
			}
			if(!empty($data)){
				//query for insert
				$query = DB::table('support_comments')
							->where('id',$id)
							->update($data);
				if(!empty($query)){
					$notifications = array(
					'message' => 'Support Comment Updated Successfully',
					'alert-type' => 'success'
					);
					return redirect()->route('support_details',$support_id)->with($notifications);
				}
				else{
					$notifications = array(
					'message' => 'someting went wrong',
					'alert-type' => 'warning'
					);
					return redirect()->back()->with($notifications);
				}	
			}
		}
		else{
			return redirect()->route('admin_login');
		}
	}

	public function delete_support_comment(Request $request,$id){
		if(!empty($request->session()->has('id') && $request->session()->get('role') == 0)){
			//query for delete comment
			$query = DB::table('support_comments')
						->where('id',$id)
						->delete();
			if(!empty($query)){
				$notifications = array(
				'message' => 'Support Comment Deleted Successfully',
				'alert-type' => 'success'
				);
				return redirect()->back()->with($notifications);
			}
			else{
				$notifications = array(
				'message' => 'someting went wrong',
				'alert-type' => 'warning'
				);
				return redirect()->back()->with($notifications);
			}
		}
		else{
			return redirect()->route('admin_login');
		}
	}

	public function filter_support(Request $request){
		if(!empty($request->session()->has('id') && $request->session()->get('role') == 0)){
			//getting data
			$query = DB::table('support')
						->select('support.id as support_id','support.title','support.priority','support.status','support.created_date_time',DB::raw('count(support_comments.support_id) as answer_count'))
						->leftjoin('support_comments','support_comments.support_id','=','support.id')
						->groupBy('support.id');
						if(!empty($request->input('priority'))){
							$query->where('support.priority','like','%'.$request->input('priority').'%');
						}
						if(!empty($request->input('status'))){
							$query->where('support.status','like','%'.$request->input('status').'%');
						}
						if(!empty($request->input('title'))){
							$query->where('support.title','like','%'.$request->input('title').'%');
						}
						
			$result['query'] = $query->paginate(20);
			$result['total_records'] = $query->count();
			//return view
			return view('admin.support.all-supports',$result);
		}
		else{
			return redirect()->route('admin_login');
		}
	}

}