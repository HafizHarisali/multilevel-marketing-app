<?php

namespace App\Models\Right_Users;

use Illuminate\Database\Eloquent\Model;
use DB;

class Users extends Model
{
    public function tree_immediate_children() {
        return $this->hasMany('App\Models\Right_Users\Users','parent','id');
    }

    public function children(){
    	$query = DB::table('users')
    				->where('parent',\Request::session()->get('id'))
    				->orderby('id','asc')
    				->first();
    	if(!empty($query)){
    	    return $this->tree_immediate_children()->with('children')->where('name','!=',$query->name);
    	}
    	else{
    	    return $this->tree_immediate_children()->with('children');
    	}
        
    }
}
