<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
   protected $guarded = [];

   public function item()
   {
       return $this->belongsTo(Bitem::class, 'bitem_id'); 
   }
}
