<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Group;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $groups = ['PS24', 'PS23', 'PS22', 'IST24', 'IST23', 'IST22'];

        foreach ($groups as $group) {
            Group::create(
                [
                    'pavadinimas' => $group,
                    'kodas' => rand(100, 9999),
                ]
            );
        }


    }
}
