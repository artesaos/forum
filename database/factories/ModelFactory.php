<?php

$factory->define(Artesaos\Domain\Users\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'user' => uniqid(),
        'email' => strtolower($faker->email),
        'password' => bcrypt(str_random(10)),
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
