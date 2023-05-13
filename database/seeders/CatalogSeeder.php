<?php

namespace Database\Seeders;

use App\Models\Catalog;
use Faker\Factory;
use Illuminate\Database\Seeder;

class CatalogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Factory::create();
        for ($i = 1; $i <= 20; $i++) {
            $catalog = new Catalog;

            $catalog->name = $faker->name;

            $catalog->save();
        }
    }
}
