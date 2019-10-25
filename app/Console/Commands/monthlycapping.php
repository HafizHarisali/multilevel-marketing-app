<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Http\Request;
use session;
use DB;
use Carbon\Carbon;

class monthlycapping extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'monthlycapping:check';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This laravel cronjob is used to update';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
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
                        $sales_query = DB::select(DB::raw("select sum(packages.fees) as total_sales from (select * from users order by parent, id) users_sorted left join packages on packages.id = users_sorted.package_id, (select @pv := '".$row->id."') initialisation where find_in_set(users_sorted.parent, @pv) and length(@pv := concat(@pv, ',',users_sorted.id)) and users_sorted.created_date_time between '".$date."' and '".$startdate."'"));
                        dd($date.' '.$startdate);
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
                            $capping_amount = $sales_query->total_sales - $double_price;
                            if(!empty($capping_amount > 0)){
                                //set data for transactions
                                $transaction_data = array(
                                    'ip_address' => \Request::ip(),
                                    'user_id' => $row->id,
                                    'sponsor_id' => \Request::session()->get('id'),
                                    'cat_id' => 2,
                                    'balance' => $capping_amount,
                                    'from_credit_status' => 0,
                                    'to_credit_status' => 0,
                                    'date' => date('Y-m-d'),
                                    'time' => date('H:i:s') 
                                );
                                $insert_transaction = DB::table('transactions')
                                    ->insert($transaction_data);
                                //set data for notifications
                                $notifications_data = array(
                                    'user_id' => \Request::session()->get('id'),
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
                    $sales_query = DB::select(DB::raw("select sum(packages.fees) as total_sales from (select * from users order by parent, id) users_sorted left join packages on packages.id = users_sorted.package_id, (select @pv := '".$row->id."') initialisation where find_in_set(users_sorted.parent, @pv) and length(@pv := concat(@pv, ',',users_sorted.id)) and users_sorted.created_date_time between '".$date."' and '".$startdate."'"));
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
                        $capping_amount = $sales_query[0]->total_sales - $double_price;
                        if(!empty($capping_amount > 0)){
                            //set data for transactions
                            $transaction_data = array(
                                'ip_address' => \Request::ip(),
                                'user_id' => $row->id,
                                'sponsor_id' => \Request::session()->get('id'),
                                'cat_id' => 2,
                                'balance' => $capping_amount,
                                'from_credit_status' => 0,
                                'to_credit_status' => 0,
                                'date' => date('Y-m-d'),
                                'time' => date('H:i:s') 
                            );
                            $insert_transaction = DB::table('transactions')
                                ->insert($transaction_data);
                            //set data for notifications
                            $notifications_data = array(
                                'user_id' => \Request::session()->get('id'),
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
}
