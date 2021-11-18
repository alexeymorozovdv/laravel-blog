<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->sentence(rand(2, 5));
        $content = $this->faker->realText(rand(1000, 4000));
        $isPublished = rand(1, 5) > 1;
        $createdAt = $this->faker->dateTimeBetween('-3 months', '-2 months');

        return [
            'user_id'      => rand(1, 10),
            'category_id'  => rand(1, 10),

            'title'        => $title,
            'slug'         => Str::slug($title),

            'excerpt'      => $this->faker->text(rand(40, 100)),

            'content_raw'  => $content,
            'content_html' => $content,

            'is_published' => $isPublished,
            'published_at' => $isPublished ? $this->faker->dateTimeBetween('-2 months', '-1 days') : null,

            'created_at'   => $createdAt,
            'updated_at'   => $createdAt,
        ];
    }
}
