<?php

namespace App\Models\Left_Users;

use Illuminate\Database\Eloquent\Model;
use DB;

class Users extends Model
{
    public function tree_immediate_children() {
        return $this->hasMany('App\Models\Left_Users\Users','parent','id');
    }

    
    public function left_count() {
        return $this->hasMany('App\Models\Left_Users\Users','parent','id')->where('position',0);
    }
    
    public function right_count() {
        return $this->hasMany('App\Models\Left_Users\Users','parent','id')->where('position',1);
    }

    public function children(){
        $get_all_childs = DB::select(DB::raw("SELECT t2.id AS lev1, t3.id as lev2, t4.id as lev3, t5.id as lev4, t6.id as lev5 FROM users AS t1 LEFT JOIN users AS t2 ON t2.parent = t1.id LEFT JOIN users AS t3 ON t3.parent = t2.id LEFT JOIN users AS t4 ON t4.parent = t3.id LEFT JOIN users AS t5 ON t5.parent = t4.id LEFT JOIN users AS t6 ON t6.parent = t5.id WHERE t1.id = '".\Request::session()->get('id')."'"));
            $last_level = $get_all_childs[0]->lev3;
		return $this->tree_immediate_children()->with('children')->withCount('left_count')->withCount('right_count')->where('position',0);
    }

    public function child(){
        return $this->tree_immediate_children()->with('child')->withCount('right_count')->withCount('left_count')->where('position',1);
    }
}
