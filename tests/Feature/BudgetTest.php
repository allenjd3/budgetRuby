<?php

namespace Tests\Feature;

use App\Bitem;
use App\Budget;
use App\BudgetSchema;
use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BudgetTest extends TestCase
{
	use DatabaseMigrations;
	/** @test */
	public function a_user_can_create_a_new_budget()
	{
			$this->withoutExceptionHandling();
			$user = factory(User::class)->create();
			$budget = factory(Budget::class, 2)->create([
				'user_id' => $user->id	
			]);
			$budget	= $budget->fresh();
			$response = $this->actingAs($user)->json('GET', '/api/budget');
			$response->assertJson($budget->toArray());
			
	}

	/** @test */
	public function a_user_can_show_a_budget()
	{
		$this->withoutExceptionHandling();
		$user = factory(User::class)->create();
		$budget = factory(Budget::class)->create([
				'user_id'=>$user->id
		]);
		$budget = $budget->fresh();
		$response= $this->actingAs($user)->json('GET', '/api/1/budget');
		$response->assertJson($budget->toArray());
	}

	/** @test */
	public function a_user_can_update_a_budget()
	{
	    //
		$this->withoutExceptionHandling();
	    $user = factory(User::class)->create();
	    $budget = factory(Budget::class, 2)->create(); 
		$budget2 = factory(Budget::class, 1)->make(['month'=>2]);
		$request = $this->actingAs($user)->json('PUT', '/api/1/budget', $budget2->first()->toArray());
		$request->assertJson([
			'updated'=>true,	
			'budget'=>[
				'month'=>2	
			]	
			
		]);
	}

	/** @test */
	public function a_user_can_delete_a_bitem()
	{
		$this->withoutExceptionHandling();
	    $user = factory(User::class)->create();
		$item = factory(Budget::class, 2)->create();
		$request= $this->actingAs($user)->json('delete', '/api/1/budget');
		$request->assertJson([
			'deleted'=>true	
		]);
	}
	/** @test */
	public function a_user_can_store_a_budget()
	{
			$this->withoutExceptionHandling();
			$user = factory(User::class)->create();
			$schema = factory(BudgetSchema::class)->create();
			$bitem = factory(Bitem::class, 3)->create();
			$request = $this->actingAs($user)->json('post', '/api/budget', ['month'=>10, 'year'=>2019]);
			$request->assertJson([
					'created'=>true,
			]);
	}
}
