<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $path = base_path() . '/database/seeds/categories.sql';
        $sql = file_get_contents($path);
        DB::unprepared($sql);
    }
}
