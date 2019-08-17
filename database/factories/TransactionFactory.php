<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Transaction;
use Carbon\Carbon;
use Faker\Generator as Faker;

$factory->define(Transaction::class, function (Faker $faker) {
    return [
		'name'=> $faker->name,
		'amount'=>rand(1, 6000),
		'added_at'=>Carbon::now()->subDay(30),
		'bitem_id'=>1		
    ];
});
