<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Budget extends Model
{
   	
    public function scopeOnlyUser($query, $user)
    {

  		  return $query->where('user_id', $user->id);
    }
}
