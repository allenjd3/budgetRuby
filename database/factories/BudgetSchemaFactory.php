<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\BudgetSchema;
use Faker\Generator as Faker;

$factory->define(BudgetSchema::class, function (Faker $faker) {
    return [
        //
		'bitems'=>[1,2,3],
		'user_id'=>1
    ];
});
