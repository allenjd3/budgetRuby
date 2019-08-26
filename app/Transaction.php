<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{

   public function item()
   {
       return $this->belongsTo(Bitem::class, 'bitem_id'); 
   }

   public function user()
   {
      	return $this->belongsTo(User::class); 
   }

   public function scopeOnlyUser($query, $user)
   {

		  return $query->where('user_id', $user->id);
   }
}
