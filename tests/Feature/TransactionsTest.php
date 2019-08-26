<?php

namespace Tests\Feature;

use App\Bitem;
use App\Transaction;
use App\User;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Support\Facades\Auth;
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
		$this->withoutMiddleware();
		$this->withoutExceptionHandling();
		$user = factory(User::class)->create();
		$transaction = factory(Transaction::class, 1)->create();    
		$transaction1 = factory(Transaction::class, 2)->create([
			'user_id'=>2	
		]);    
		$response = $this->actingAs($user)->json('GET', 'api/transaction');
		$response->assertStatus(200);
		$response->assertJson($transaction->toArray());
	}

	/** @test */
	public function a_user_can_create_a_transaction()
	{
		$this->withoutExceptionHandling();
		$user = factory(User::class)->create();
	    $transaction = factory(Transaction::class)->make();    
		$response = $this->actingAs($user)->json('POST', 'api/transaction', $transaction->toArray());	
		$response->assertStatus(201);
		$response->assertJson([
			'created'=>true,
		]);
	}

	/** @test */
	public function a_user_can_show_a_transaction()
	{
		$this->withoutExceptionHandling();
		$user = factory(User::class)->create();
		$transaction = factory(Transaction::class, 1)->create();    
		$response = $this->actingAs($user)->json('GET', 'api/1/transaction');
		$response->assertStatus(200);
		$response->assertJson($transaction->first()->toArray());
	}
	
	/** @test */
	public function a_user_can_delete_a_transaction()
	{
		$this->withoutExceptionHandling();
		$user = factory(User::class)->create();
	    $transaction = factory(Transaction::class, 1)->create();    

		$response = $this->actingAs($user)->json('DELETE', 'api/1/transaction');
		$response->assertStatus(202);
		$response->assertJson([
			'deleted'=>true	
		]);
	}

	/** @test */
	public function a_user_can_edit_a_transaction()
	{
		$this->withoutExceptionHandling();
		
		$user = factory(User::class)->create();
	     $transaction = factory(Transaction::class, 1)->create();
		 $transaction2 = factory(Transaction::class)->make(['name'=>'MyTransaction']);

		 $response = $this->actingAs($user)->json('PUT', 'api/1/transaction', $transaction2->first()->toArray()); 
		 $response->assertStatus(202);
		 $response->assertJson([
				 'updated' => true,
				 'transaction' => $transaction2->first()->toArray() 
				 
		 ]);
			
	}
	/** @test */
	public function a_transaction_belongs_to_a_bitem()
	{
		$transaction = factory(Transaction::class)->create();
		$item = factory(Bitem::class)->create();
		$this->assertInstanceOf(Bitem::class, $transaction->item);

	}
	/** @test */
	public function a_transaction_belongs_to_a_user()
	{
	   	$user = factory(User::class)->create(); 
		$user = $user->fresh();
		$transaction = factory(Transaction::class)->create([
				'user_id'=>$user->id
		]);
		$this->assertEquals($user->id, $transaction->user_id);
		$this->assertEquals($user, $transaction->user);
	}

	/** @test */
	public function a_user_cannot_view_another_users_transaction()
	{
		$this->withoutExceptionHandling();
	   	$user1 = factory(User::class)->create(); 
		$user2 = factory(User::class)->create();
		$user2 = $user2->fresh();
		$user1 = $user1->fresh();
		$transaction = factory(Transaction::class)->create([
			'user_id'=>$user1->id	
		]);
		$this->assertFalse($user2->can('view', $transaction));
		$this->assertTrue($user1->can('view', $transaction));
	}

	
	/** @test */
	public function a_user_cannot_update_another_users_transactions()
	{
		$this->withoutExceptionHandling();
	   	$user1 = factory(User::class)->create(); 
		$user2 = factory(User::class)->create();
		$user2 = $user2->fresh();
		$user1 = $user1->fresh();
		$transaction = factory(Transaction::class)->create([
			'user_id'=>$user1->id	
		]);
		$this->assertFalse($user2->can('update', $transaction));
		$this->assertTrue($user1->can('update', $transaction));
	}


	/** @test */
	public function a_user_cannot_delete_another_users_transactions()
	{
		$this->withoutExceptionHandling();
	   	$user1 = factory(User::class)->create(); 
		$user2 = factory(User::class)->create();
		$user2 = $user2->fresh();
		$user1 = $user1->fresh();
		$transaction = factory(Transaction::class)->create([
			'user_id'=>$user1->id	
		]);
		$this->assertFalse($user2->can('delete', $transaction));
		$this->assertTrue($user1->can('delete', $transaction));
	}

	/** @test */
	
	public function a_user_cannot_view_another_users_transactions()
	{
	    
		$user = factory(User::class)->create();
		$user1 = factory(User::class)->create();
		$transaction = factory(Transaction::class)->create([
			'user_id'=>$user1->id	
		]);
		$response = $this->actingAs($user)->json('GET', 'api/transaction');
		$response->assertExactJson([]);
	}
	
}

