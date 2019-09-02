<?php

use App\Budget;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class BudgetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		Budget::create([
       		'month'=>Carbon::now()->month, 
	   		'year'=>Carbon::now()->year,
			'user_id'=>1,	
		]);
    }
}
