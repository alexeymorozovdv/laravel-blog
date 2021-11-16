<?php

namespace Database\Seeders;

use App\Models\BlogCategory;
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
         \App\Models\BlogCategory::factory(10)->create();
         \App\Models\BlogPost::factory(100)->create();
         \App\Models\BlogComment::factory(150)->create();
    }
}
