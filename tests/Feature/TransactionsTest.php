<?php

namespace Tests\Feature;

use App\Transaction;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class TransactionsTest extends TestCase
{
	use DatabaseMigrations;

	/** @test */
	public function a_user_can_view_a_transaction()
	{
		$transaction = factory(Transaction::class, 1)->create();    
		$response = $this->json('GET', 'api/transaction');
		$response->assertStatus(200);
		$response->assertJson($transaction->toArray());
	}

	/** @test */
	public function a_user_can_create_a_transaction()
	{
	    $transaction = factory(Transaction::class)->make();    
		$response = $this->json('POST', 'api/transaction', $transaction->toArray());	
		$response->assertStatus(201);
		$response->assertJson([
			'created'=>true,
		]);
	}

	/** @test */
	public function a_user_can_show_a_transaction()
	{
		$this->withoutExceptionHandling();
	  	$transaction = factory(Transaction::class, 1)->create();    
		$response = $this->json('GET', 'api/1/transaction');
		$response->assertStatus(200);
		$response->assertJson($transaction->first()->toArray());
	}
	/** @test */
	public function a_user_can_delete_a_transaction()
	{
		$this->withoutExceptionHandling();
	    $transaction = factory(Transaction::class, 1)->create();    

		$response = $this->json('DELETE', 'api/1/transaction');
		//$response->assertStatus(202);
		$response->assertJson([
			'deleted'=>true	
		]);
	}
}
