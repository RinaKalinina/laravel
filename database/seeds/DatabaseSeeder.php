<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Category;
use App\Product;
use App\News;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class, 10)->create();

        factory(Category::class, 5)->create()->each(function ($category) {
            $category->products()->saveMany(factory(Product::class, 10)->make());
        });

        factory(News::class, 20)->create();
    }
}
