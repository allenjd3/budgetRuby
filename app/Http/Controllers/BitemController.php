<?php

namespace App\Http\Controllers;

use App\Bitem;
use App\Budget;
use App\Http\Resources\BitemResource;
use Illuminate\Http\Request;

class BitemController extends Controller
{
	public function __construct()
	{
	   	$this->middleware('auth'); 
	}
    public function index()
    {
        return Bitem::onlyUser(auth()->user())->get();
    } 

	public function show($id)
	{
		return Bitem::findOrFail($id);

	}
	public function store(Request $request)
	{
		$user = auth()->user();
	   	$bitem = new Bitem();	 
		$bitem->budget = $request->budget;
		$bitem->name = $request->name;
		$bitem->category = $request->category;
		$bitem->user_id = $user->id;
		$budget=Budget::onlyUser($user)->latest('updated_at')->first();
		$bitem->budget_id =	$budget->id; 
		if($bitem->save()){
			return response()->json([
					'created'=>true
			]);
		}
	}


	public function update(Request $request, $id)
	{
	    $item = Bitem::findOrFail($id);
		$item->name = $request->name;
		$item->category = $request->category;
		$item->budget = $request->budget;
		return response()->json([
			'updated'=>true,
			'bitem'=>$item
		]);
		
	}
	public function delete($id)
	{
		
	    $item = Bitem::findOrFail($id);
	    if($item->delete())
		{
				return response()->json([
					'deleted'=>true	
				]);
		}
	}

	public function category($category)
	{
	   $items = Bitem::onlyUser(auth()->user())->where('category', $category)->get(); 

	   return response()->json([$category => $items]);
	}

	public function allcategories()
	{
	   	$items = Bitem::onlyUser(auth()->user())->get(); 
		return new BitemResource($items);
	}
}

