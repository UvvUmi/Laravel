<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Client;
use Faker\Factory as Faker;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 1; $i <= 350; $i++) {
            Client::create([
                'name'=>$faker->firstName,
                'surname'=>$faker->lastName,
                'phone'=>$faker->phoneNumber,
                'email'=>$faker->email,
                'address'=>$faker->address,
            ]);
        }
    }
}
