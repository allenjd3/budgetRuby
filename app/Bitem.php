<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bitem extends Model
{
	protected $guarded = [];
    public function transactions()
    {
        return $this->hasMany(Transaction::class); 
    } 
	public function user()
	{
	   	return $this->belongsTo(User::class); 
	}
    public function scopeOnlyUser($query, $user)
    {

  		  return $query->where('user_id', $user->id);
    }
    public function setCategoryAttribute($value)
    {
        $this->attributes['category'] = strtolower($value);
    }	
}
