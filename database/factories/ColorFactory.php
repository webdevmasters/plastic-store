<?php

namespace Database\Factories;

use App\Models\Color;
use Illuminate\Database\Eloquent\Factories\Factory;

class ColorFactory extends Factory {

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Color::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition() {
        $color_name = Color::inRandomOrder()->where('id', '>', 0)->pluck('name')->first();
        $color_code = Color::inRandomOrder()->where('id', '>', 0)->pluck('code')->first();

        return [
            'code' => $color_code,
            'name' => $color_name,
        ];
    }
}
