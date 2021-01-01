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
            //     ColorSeeder::class,
            SubCategorySeeder::class
        ]);

        Product::factory()->count(1000)
            ->has(Image::factory()->count(4))
            ->hasAttached(Size::factory()->count(3))
            ->hasAttached(Price::factory()->count(3), [
                'discounted_price' => 0
            ])
            ->hasAttached(Color::factory()->count(4))
            ->create();

    }
}
