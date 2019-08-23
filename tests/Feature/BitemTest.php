<?php

namespace Tests\Feature;

use App\Bitem;
use App\Transaction;
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
	   $item = factory(Bitem::class, 2)->create(); 
	   $request = $this->json('GET', '/api/bitem'); 
	   $request->assertJson($item->toArray());
	}

	/** @test **/
	public function a_user_can_get_show_a_bitem()
	{
	   $this->withoutExceptionHandling();
	   $item = factory(Bitem::class, 2)->create(); 
	   $request = $this->json('GET', '/api/1/bitem');
	   $request->assertJson($item->first()->toArray());
	}

	/** @test */
	public function a_user_can_update_a_bitem()
	{
	     
		$this->withoutExceptionHandling();
	    $item = factory(Bitem::class, 2)->create(); 
		$item2 = factory(Bitem::class, 1)->make(['name'=>'NewName']);
		$request = $this->json('PUT', '/api/1/bitem', $item2->first()->toArray());
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
		$item = factory(Bitem::class, 2)->create();
		$request= $this->json('delete', '/api/1/bitem');
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
}
