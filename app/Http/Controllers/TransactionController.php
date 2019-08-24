<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaction;

class TransactionController extends Controller
{

	public function __construct() {
		$this->middleware('auth');
	}
	public function index()
	{
	    return Transaction::all();
	}

	public function show($id)
	{
		$transaction = Transaction::findOrFail($id);
	    return $transaction; 
	}

	public function store(Request $request)
	{
	   $transaction = Transaction::create($request->all()); 
	   return response()->json([
	   		'created'=>true,
			'transaction'=>$transaction
	   ], 201);
	}

	public function delete($id)
	{
	   	$transaction = Transaction::findOrFail($id);

		if($transaction->delete()) {	
		
			return response()->json(['deleted'=>true], 202);
		}
	}

	public function update(Request $request, $id)
	{
	   	$transaction = Transaction::findOrFail($id); 
	    $transaction->name = $request->name;	
		$transaction->amount = $request->amount;
		$transaction->added_at = $request->added_at;
		$transaction->bitem_id = $request->bitem_id;

		if($transaction->save()){
			return response()->json([
				'updated'=>true,
				'transaction'=> $transaction				
			], 202);
		}
	}
}
