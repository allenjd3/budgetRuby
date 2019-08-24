<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Bitem;
use Faker\Generator as Faker;

$factory->define(Bitem::class, function (Faker $faker) {
    return [
			'name'=>$faker->name,
		    'budget'=>rand(1, 200000),
			'user_id'=>1,
			'category'=>'groceries'
				
    ];
});
