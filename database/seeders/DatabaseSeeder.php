<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserTableSeeder::class);
         \App\Models\User::factory(10)->create();
         \App\Models\Category::factory(10)->create();
         \App\Models\Post::factory(100)->create();
         \App\Models\Comment::factory(150)->create();
    }
}
