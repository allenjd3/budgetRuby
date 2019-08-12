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
	public function show(Transaction $transaction)
	{
	    return $transaction; 
	}
}
