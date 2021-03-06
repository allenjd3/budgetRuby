<?php

namespace App\Http\Controllers;

use App\Budget;
use Illuminate\Http\Request;

class BudgetController extends Controller
{
	public function __construct(){
		$this->middleware('auth');	
	}
	public function index()
	{
	   	return Budget::all(); 
	}    

	public function show($id)
	{
		$budget = Budget::findOrFail($id);
		return $budget;
	}

	public function update(Request $request, $id)
	{
		$budget= Budget::findOrFail($id);
		$budget->month = $request->month;
		$budget->year = $request->year;
		
		if($budget->save())
		{
			return response()->json([
					'updated'=>true,
					'budget'=>$budget
			]);
		}
	}
	public function delete($id)
	{
		
	    $budget = Budget::findOrFail($id);
	    if($budget->delete())
		{
				return response()->json([
					'deleted'=>true	
				]);
		}
	}

	public function store(Request $request)
	{
			$budget = new Budget();
			$user = auth()->user();
			$budget->month = $request->month;
			$budget->year = $request->year;	
			$budget->user_id = $user->id;
			if($budget->save()){
					$budgetSchema =  $user->budgetSchema;
					if($budgetSchema->newMonth($budget, $user)) {
						return response()->json(['created'=>true]);	
					} 	
			}
			return response()->json(['created'=>false]);
 	}
}
