<?php

namespace Database\Factories;

use App\Models\Page;
use App\Models\SourceType;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class FollowingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'person_id' => function () {
                return User::all()->random();
            },
            'following_page_id' => function () {
                return Page::all()->random();
            },
            'following_person_id' => function () {
                return User::all()->random();
            },
            'source_type_id' => function () {
                return SourceType::all()->random();
            }
        ];
    }
}
