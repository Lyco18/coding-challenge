<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

use Faker\Generator as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
      $faker = \Faker\Factory::create();

      foreach (range(1,100) as $index) {
        DB::table('contacts')->insert([
            'name' => $faker->firstName,
            'surname' => $faker->lastName,
            'dob' => $faker->date,
            'company' => $faker->company,
            'position' => $faker->jobTitle,
            'email' => $faker->email,
            'number' => 1234567890,
        ]);
      }
    }
}
