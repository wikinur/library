<?php

namespace Database\Seeders;

use App\Models\Publisher;
use Faker\Factory;
use Illuminate\Database\Seeder;

class PublisherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Factory::create('en_US');
        for ($i = 0; $i <= 20; $i++) {
            $publisher = new Publisher();

            $publisher->name = $faker->name;
            $publisher->email = $faker->email;
            $publisher->phone_number = '0812' . $faker->randomNumber(8);
            $publisher->address = $faker->address;

            $publisher->save();
        }
    }
}
