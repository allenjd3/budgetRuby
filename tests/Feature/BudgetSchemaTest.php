<?php

namespace Tests\Feature;

use App\Bitem;
use App\Budget;
use App\BudgetSchema;
use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BudgetSchemaTest extends TestCase
{
	use DatabaseMigrations;
	/** @test */
	public function a_user_can_add_bitems_from_budget_schema()
	{
			$bitems = factory(Bitem::class, 5)->create();
			$itemsArray = [];
			foreach($bitems as $i) {
				$itemsArray[] = $i->id;

			}
			$schema = factory(BudgetSchema::class)->create([
					'bitems'=>$itemsArray
					
			]);
			$budgets = factory(Budget::class, 5)->create();
			$budget = Budget::find(5);
			$user = factory(User::class)->create();
			$bitems2 = $schema->newMonth($budget, $user);
			$this->assertCount(5, Bitem::where('budget_id', 5)->get()->toArray());
	}
}
