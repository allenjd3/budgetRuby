<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaction;

class TransactionController extends Controller
{
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
}
