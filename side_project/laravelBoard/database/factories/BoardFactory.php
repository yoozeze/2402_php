<?php

namespace Database\Factories;

use App\Models\BoardName;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Board>
 */
class BoardFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $arrImg=[
            '/img/1.gif'
            ,'/img/2.gif'
            ,'/img/3.gif'
            ,'/img/4.gif'
            ,'/img/5.gif'
            ,'/img/6.gif'
            ,'/img/7.gif'
        ];
        return [
            'user_id' => User::inRandomOrder()->first()->id
            ,'type' => BoardName::inRandomOrder()->first()->type
            ,'title' =>$this->faker->realText(50)
            ,'content' =>$this->faker->realText(1000)
            ,'img' => Arr::random($arrImg)
        ];
    }
}
