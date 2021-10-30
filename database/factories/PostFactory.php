<?php

namespace Database\Factories;

use App\Models\Page;
use App\Models\Post;
use App\Models\SourceType;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'body' => $this->faker->text(),
            'user_id' => function () {
                return User::all()->random();
            },
            'page_id' => function () {
                return Page::all()->random();
            },
            'source_type_id' => function () {
                return SourceType::all()->random();
            }
        ];
    }
}
