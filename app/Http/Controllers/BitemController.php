<?php

namespace App\Http\Controllers;

use App\Bitem;
use Illuminate\Http\Request;

class BitemController extends Controller
{
    public function index()
    {
        return Bitem::all();
    } 

	public function show($id)
	{
		return Bitem::findOrFail($id);

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
}

