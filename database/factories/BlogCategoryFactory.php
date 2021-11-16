<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class BlogCategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        static $i = 1;
        $title = 'Category ' . $i;
        $i++;

        return [
            'parent_id' => ($i > 5) ? rand(1, 4) : 0,
            'title'     => $title,
            'slug'      => Str::slug($title),
        ];
    }
}
