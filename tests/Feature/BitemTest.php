<?php

namespace Tests\Feature;

use App\Bitem;
use App\Transaction;
use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BitemTest extends TestCase
{
	use DatabaseMigrations;
	/** @test */
	public function a_user_can_get_all_bitems()
	{
	   $this->withoutExceptionHandling();
	   $user = factory(User::class)->create();
	   $item = factory(Bitem::class, 2)->create(); 
	   $request = $this->actingAs($user)->json('GET', '/api/bitem'); 
	   $request->assertJson($item->toArray());
	}

	/** @test **/
	public function a_user_can_show_a_bitem()
	{
	   $this->withoutExceptionHandling();
	   $user = factory(User::class)->create();
	   $item = factory(Bitem::class, 2)->create(); 
	   $request = $this->actingAs($user)->json('GET', '/api/1/bitem');
	   $request->assertJson($item->first()->toArray());
	}

	/** @test */
	public function a_user_can_update_a_bitem()
	{
	     
		$this->withoutExceptionHandling();
	    $user = factory(User::class)->create();
	    $item = factory(Bitem::class, 2)->create(); 
		$item2 = factory(Bitem::class, 1)->make(['name'=>'NewName']);
		$request = $this->actingAs($user)->json('PUT', '/api/1/bitem', $item2->first()->toArray());
		$request->assertJson([
			'updated'=>true,	
			'bitem'=>[
				'name'=>'NewName'	
			]	
			
		]);
	}

	/** @test */
	public function a_user_can_delete_a_bitem()
	{
		$this->withoutExceptionHandling();
	    $user = factory(User::class)->create();
		$item = factory(Bitem::class, 2)->create();
		$request= $this->actingAs($user)->json('delete', '/api/1/bitem');
		$request->assertJson([
			'deleted'=>true	
		]);
	}
	/** @test */
	public function a_bitem_can_have_many_transactions()
	{
	    $item = factory(Bitem::class, 2)->create(); 
		$transactions = factory(Transaction::class, 2)->create();
		$this->assertCount(2, $item->first()->transactions);
	}
	/** @test */
	public function a_bitem_belongs_to_a_user()
	{
		$user = factory(User::class)->create();	    
		$user = $user->fresh();
		$item = factory(Bitem::class)->create([
			'user_id'=>$user->id	
		]);
		$item = $item->fresh();
		$this->assertEquals($user->id, $item->user_id);
		$this->assertEquals($user, $item->user);
	}


	/** @test */
	public function a_user_cannot_view_another_users_bitem()
	{
		$this->withoutExceptionHandling();
	   	$user1 = factory(User::class)->create(); 
		$user2 = factory(User::class)->create();
		$user2 = $user2->fresh();
		$user1 = $user1->fresh();
		$transaction = factory(Bitem::class)->create([
			'user_id'=>$user1->id	
		]);
		$this->assertFalse($user2->can('view', $transaction));
		$this->assertTrue($user1->can('view', $transaction));
	}

	/** @test */
	public function a_user_cannot_update_another_users_bitem()
	{
		$this->withoutExceptionHandling();
	   	$user1 = factory(User::class)->create(); 
		$user2 = factory(User::class)->create();
		$user2 = $user2->fresh();
		$user1 = $user1->fresh();
		$transaction = factory(Bitem::class)->create([
			'user_id'=>$user1->id	
		]);
		$this->assertFalse($user2->can('update', $transaction));
		$this->assertTrue($user1->can('update', $transaction));
	}

	/** @test */
	public function a_user_cannot_delete_another_users_bitem()
	{
		$this->withoutExceptionHandling();
	   	$user1 = factory(User::class)->create(); 
		$user2 = factory(User::class)->create();
		$user2 = $user2->fresh();
		$user1 = $user1->fresh();
		$transaction = factory(Bitem::class)->create([
			'user_id'=>$user1->id	
		]);
		$this->assertFalse($user2->can('delete', $transaction));
		$this->assertTrue($user1->can('delete', $transaction));
	}

	/** @test */
	
	public function a_user_cannot_view_another_users_bitems()
	{
	    
		$user = factory(User::class)->create();
		$user1 = factory(User::class)->create();
		$transaction = factory(Bitem::class)->create([
			'user_id'=>$user1->id	
		]);
		$response = $this->actingAs($user)->json('GET', 'api/bitem');
		$response->assertExactJson([]);
	}

	/** @test */
	public function a_user_can_view_bitems_by_category()
	{
		$this->withoutExceptionHandling();
		$this->withoutMiddleware();
		$transportations = factory(Bitem::class, 2)->create([
			'category'=>'transportation'
		]);
		$groceries = factory(Bitem::class, 2)->create([
			'category'=>'groceries'
		]);
		$transportations = $transportations->fresh();
		$groceries = $groceries->fresh();

		$transportationResponse = $this->json('GET', 'api/bitem/transportation/category');		
		$groceryResponse = $this->json('GET', 'api/bitem/groceries/category');

		$transportationResponse->assertJson(['transportation'=>$transportations->toArray()]);
		$groceryResponse->assertJson(['groceries'=>$groceries->toArray()]);
		
	}
}
