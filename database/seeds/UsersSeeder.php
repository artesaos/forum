<?php

use Illuminate\Database\Seeder;
use Artesaos\Domain\Users\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();

        factory(User::class, 30)->create([
            'password' => bcrypt('1234567890'),
        ]);

        factory(User::class)->create([
            'email'    => 'admin@admin.com',
            'password' => bcrypt('1234567890'),
        ]);
    }
}
