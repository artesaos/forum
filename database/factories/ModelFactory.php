<?php

$factory->define(Artesaos\Domain\Users\User::class, function (Faker\Generator $faker) {
    $username = strtolower($faker->lastName);

    if ($faker->boolean(80)) {
        $username .= $faker->randomElement(['.', '$', '@', '-']);
        $username .= $faker->randomDigitNotNull();
    }

    return [
        'name' => $faker->name,
        'username' => $username,
        'email' => strtolower($faker->email),
        'password' => str_random(10),
        'remember_token' => str_random(10),
    ];
});

$factory->define(Artesaos\Domain\Questions\Question::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->sentence,
        'body' => $faker->paragraphs(6, true),
        'is_resolved' => $faker->boolean(),
    ];
});

$factory->define(Artesaos\Domain\Answers\Answer::class, function (Faker\Generator $faker) {
    return [
        'body' => $faker->paragraphs(6, true),
        'is_solution' => $faker->boolean(),
    ];
});

$factory->define(Artesaos\Domain\Categories\Category::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->country,
    ];
});
