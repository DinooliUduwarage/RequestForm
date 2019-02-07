<?php

use Faker\Generator as Faker;

$factory->define(App\Department::class, function (Faker $faker) {
    return [
        'name' => $faker->text(50),
        'depHeadName' => $faker->text(50)
    ];
});
