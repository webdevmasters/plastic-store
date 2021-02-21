<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Role;
use App\Models\Subcategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

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
//        $products = Product::factory()->count(1000)
//            ->has(Image::factory()->count(4))
//            ->hasAttached(Size::factory()->count(3))
//            ->hasAttached(Price::factory()->count(3), [
//                'discounted_price' => 0
//            ])
//            ->create();
//
//        foreach($products as $product) {
//            $product->colors()->attach(Color::whereIn('id', [1, 6, 8, 14])->get());
//        }
//
        $categories = Category::all();
        $subcategories = Subcategory::all();
        foreach($categories as $category) {
            $category->slug = Str::slug($category->name);
            $category->save();
        }
        foreach($subcategories as $subcategory) {
            $subcategory->slug = Str::slug($subcategory->name);
            $subcategory->save();
        }

        Role::create(['name' => 'admin']);
        Role::create(['name' => 'customer']);
    }
}
