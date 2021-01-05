<?php

namespace Database\Seeders;

use App\Models\Color;
use App\Models\Image;
use App\Models\Price;
use App\Models\Product;
use App\Models\Size;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run() {

        $this->call([
            CategorySeeder::class,
            ColorSeeder::class,
            SubCategorySeeder::class
        ]);
        $products = Product::factory()->count(1000)
            ->has(Image::factory()->count(4))
            ->hasAttached(Size::factory()->count(3))
            ->hasAttached(Price::factory()->count(3), [
                'discounted_price' => 0
            ])
            ->create();

        foreach($products as $product) {
            $product->colors()->attach(Color::whereIn('id', [1,6,8,14])->get());
        }
    }
}
