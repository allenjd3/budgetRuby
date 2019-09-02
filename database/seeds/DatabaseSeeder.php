<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(BitemSeeder::class);
         $this->call(UserSeeder::class);
         $this->call(BudgetSeeder::class);
		 $this->call(BudgetSchemaSeeder::class);
    }
}
