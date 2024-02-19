<?php

namespace Database\Factories;

use App\Models\game;
use Illuminate\Support\Str;

use Illuminate\Database\Eloquent\Factories\Factory;

class KeyGameFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    function generateRandomCode()
{
    $pattern = 'XXXXX-XXXXX-XXXXX'; // X represents a random alphanumeric character
    $code = '';

    for ($i = 0; $i < strlen($pattern); $i++) {
        if ($pattern[$i] === 'X') {
            $code .= Str::random(1);
        } else {
            $code .= $pattern[$i];
        }
    }

    return $code;
}
    public function definition()
    {
        return [
            
            'key' => $this->faker->generateRandomCode(),
            'game_id' => game::factory(),

        ];
    }
}
