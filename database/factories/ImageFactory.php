<?php

namespace Database\Factories;

use App\Models\Image;
use Illuminate\Database\Eloquent\Factories\Factory;

class ImageFactory extends Factory {

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Image::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition() {
        return [
            'name' => str_replace('public/storage/images/', '', $this->random_pic('public/storage/images')),
            'path' => '/images'
        ];
    }

    function random_pic($dir) {
        $files = glob($dir . '/*.*');
        $file = array_rand($files);

        return $files[$file];
    }
}
