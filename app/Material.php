<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    public function person(){
    	return $this->belongsTo('App\Person');
    }
}
