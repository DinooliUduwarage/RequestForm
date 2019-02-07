<?php

use Faker\Generator as Faker;

$factory->define(AssetRequest::class, function (Faker $faker) {
    return [
        
        'type' => $faker->text(50),
        'from' => $faker->date(50),
        'to' => $faker->date(50),
        'description' => $faker->text(50),
        'status' => $faker->boolean,
        'depHeadName' => $faker->text(20),
        'reason' => $faker->text(20),
        'user_id' => $faker->integer(5),
     
        'department_id' => $faker->integer(5)


     
    ];
});
