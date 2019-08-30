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
			'bitems'=>json_encode([1,2,3,4,5,6,7,8,9,10,11,12,13,14]),
			'user_id'=>1,	
		]);
    }
}
