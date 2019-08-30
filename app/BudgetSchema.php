<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BudgetSchema extends Model
{
	protected $casts = [
		'bitems' => 'array'	
	];
    //
	public function newMonth(Budget $budget, User $user)
	{
	   	foreach($this->bitems as $item) {
			$bitem2 = new Bitem();
			$bitem = Bitem::findOrFail($item);
			$bitem->budget_id = $budget->id;
			$bitem->user_id = $user->id; 
			$oldArray = $bitem->toArray();
			unset($oldArray['id']);
			$bitem2->create($oldArray);	
		}	
		return true;
	
	}
}

