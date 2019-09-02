<?php

use App\BudgetSchema;
use Illuminate\Database\Seeder;

class BudgetSchemaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
			BudgetSchema::create([
				'bitems'=>[1,2,3,4,5,6,7,8,9,10,11,12,13,14],
				'user_id'=>1	
			]);	
    }
}
