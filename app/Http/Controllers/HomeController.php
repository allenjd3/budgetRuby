<?php

namespace App\Http\Controllers;

use App\Budget;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$budget = Budget::latest('updated_at')->first();
		$budget_month = $budget->month;
		$budget_year = $budget->year;
		
        return view('home', compact('budget_month', 'budget_year'));
    }
}
