<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    public function tree_immediate_children() {
        return $this->hasMany('App\Users','parent','id');
    }
    
    public function children(){
        return $this->tree_immediate_children()->with('children');
    }
}
