<?php

namespace Database\Seeders;

use App\Models\Book;
use Faker\Factory;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Factory::create();
        for ($i = 1; $i <= 20; $i++) {
            $catalog = new Book;

            $catalog->isbn = $faker->randomNumber(9);
            $catalog->title = $faker->name;
            $catalog->year = rand(2010, 2023);

            $catalog->publisher_id = rand(1, 20);
            $catalog->author_id = rand(1, 20);
            $catalog->catalog_id = rand(1, 20);

            $catalog->qty = rand(10, 20);
            $catalog->price = rand(10000, 25000);

            $catalog->save();
        }
    }
}
