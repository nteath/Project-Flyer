<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});


$factory->define(App\Flyer::class, function (Faker\Generator $faker) {

    $user = factory(App\User::class)->make();
    $user->password = bcrypt('nteat');
    $user->save();

    return [
        'user_id' => $user->id,
        'street' => $faker->streetAddress,
        'city' => $faker->city,
        'zip' => $faker->postcode,
        'state' => $faker->state,
        'country' => $faker->countryCode,
        'price' => $faker->numberBetween(1000000, 10000000),
        'description' => implode(' ', $faker->paragraphs(3)),
    ];
});
