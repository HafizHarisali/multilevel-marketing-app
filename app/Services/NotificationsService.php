<?php

namespace App\Services;

class NotificationsService
{   
    public  $notify_count;
    public function __construct()
    {
        $total_notifications = \DB::table('notifications')
                ->select(\DB::raw('count(*) as total_notifications'))
                ->first();
        $notify_count = $total_notifications;
        return $notify_count;
    }
}

?>