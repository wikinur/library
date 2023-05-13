<?php

namespace Database\Seeders;

use App\Models\Member;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class MemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        for ($i = 1; $i <= 20; $i++) {
            $member = new Member;
            $gender = $faker->randomElement($array = array('L', 'P'));

            $member->name = $faker->name;
            $member->gender = $gender;
            $member->phone_number = '0877' . $faker->randomNumber(8);
            $member->address = $faker->address;
            $member->email = $faker->email;

            $member->save();
        }
    }
}
