<?php
namespace App\Http\Controllers\Admin\Notifications;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use session;
use DB;
use Carbon\Carbon;

class NotificationsController extends Controller{
	//get notifications
	public function notifications(Request $request){
		if(!empty($request->session()->has('id') && $request->session()->get('role') == 0)){
			//Query for getting Notifications
			$query = DB::table('notifications')
					->select('notifications.*','users.image')
					->leftjoin('users','notifications.user_id','users.id')
					->limit(5)
					->orderby('created_date_time','desc')
					->get();
			$count_query = DB::table('notifications')
					->select('*')
					->where('is_seen','=','no')
					->get();
			$count = $query->count();
			if(!empty($count)){
				$html = '<a href="#" title="See all the notifications" data-toggle="dropdown" class="dropdown-toggle" aria-expanded="false"><i class="icon-bell fa-fw"></i><span class="visible-xs-inline">Notifications</span><span class="badge badge-sm up bg-danger pull-right-xs">'.$count_query->count().'</span></a><!-- dropdown -->
                                <div class="dropdown-menu w-xl animated fadeInUp">
                                    <div class="panel bg-white">
                                        <div class="panel-heading b-light bg-light">
                                            <strong>You have '.$count_query->count().' notifications</strong>
                                        </div>';
                                        foreach ($query as $row) {
                                        	$ago = Carbon::parse($row->created_date_time)->diffForHumans();
                                        	$html .= '<div class="list-group" id="afln-lists">
			                                            <a href="#" title="Withdrawal Request" class="list-group-item">
			                                                <span class="pull-left m-r thumb-sm">
			                                                    <img class="img-circle" src=public/assets/images/users/profiles/'.$row->image.' alt="">
			                                                </span>
			                                                <span class="clear block m-b-none">'.$row->title.'<br>
			                                                    <small class="text-muted">'.$ago.'</small>
			                                                </span>
			                                            </a>
			                                           </div>';
                                        }
                                        

                                        $html .= '<div class="panel-footer text-sm">
                                            <a href="http://foodfella.net/mlm.admin/admin/all-notifications" title="See all the notifications" class="active">See all the notifications</a> </div>     
                                    		</div>
                                		</div>';
				
				$response = array(
					'data' => $html,
					'error' => 'false'
				);
				echo json_encode($response);
			}
			else{
				$html = '<a href="#" title="See all the notifications" data-toggle="dropdown" class="dropdown-toggle" aria-expanded="false"><i class="icon-bell fa-fw"></i><span class="visible-xs-inline">Notifications</span><span class="badge badge-sm up bg-danger pull-right-xs">0</span></a><div class="dropdown-menu w-xl animated fadeInUp">
                        <div class="panel bg-white">
                            <div class="panel-heading b-light bg-light">
                                <strong>You have 0 notifications</strong>
                            </div>
                            <div class="list-group" id="afln-lists">
                                <a href="#" title="Withdrawal Request" class="list-group-item">
                                    <span class="pull-left m-r thumb-sm">
                                        <img class="img-circle" src="#" alt="">
                                    </span>
                                    <span class="clear block m-b-none">No notifications<br>
                                        <small class="text-muted"></small>
                                    </span>
                                </a>
                            </div>
                            <div class="panel-footer text-sm">
                                <a href="http://foodfella.net/mlm.admin/admin/all-notifications" title="See all the notifications" class="active">See all the notifications</a>
                             </div>     
                    	</div>
                	</div>';

				$response = array(
					'data' => $html,
					'error' => 'false',
				);
				echo json_encode($response);
			}
		}
		else{

		}
	}

	public function all_notifications(Request $request){
		if(!empty($request->session()->has('id') && $request->session()->get('role') == 0)){
			//Query for getting all notifications
			$query = DB::table('notifications')
					->select('notifications.*','users.image','users.id')
					->leftjoin('users','notifications.user_id','users.id')
					->orderby('created_date_time','desc');
			
			$result['total_records'] = $query->count();
			$result['notifications'] = $query->paginate(5,$result['total_records']);
			return view('admin.notifications.all-notifications',$result);
		}
		else{
			return redirect()->route('admin_login');
		}
	}
}