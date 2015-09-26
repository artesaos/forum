<?php

use Illuminate\Database\Seeder;
use Artesaos\Domain\Categories\Category;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::truncate();

        factory(Category::class, 20)->create();
    }
}
