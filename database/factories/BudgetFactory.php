<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Budget;
use Carbon\Carbon;
use Faker\Generator as Faker;

$factory->define(Budget::class, function (Faker $faker) {
    return [
       	'month'=>Carbon::now()->month, 
	    'year'=>Carbon::now()->year,
		'bitems'=>json_encode([1,2,3]),
		'user_id'=>1	
    ];
});

