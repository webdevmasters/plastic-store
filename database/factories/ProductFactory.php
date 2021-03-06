<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\Subcategory;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory {

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition() {
        $category_id = $this->faker->numberBetween(1, 7);
        $subcategory_id = Subcategory::where("category_id", $category_id)->inRandomOrder()->first()->id;

        return [
            'code'            => $this->faker->unique()->numberBetween(0, 1000000),
            'name'            => 'Product '.$this->faker->unique()->numberBetween(0,1000),
            'description'     => $this->faker->text(200),
            'manufacturer'    => $this->faker->company,
            'available'       => $this->faker->boolean(50),
            'sale'            => $this->faker->boolean(10),
            'category_id'     => $category_id,
            'subcategory_id' => $subcategory_id,
        ];
    }
}
