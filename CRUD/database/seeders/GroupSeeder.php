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
        $groups = ['IST24', 'IST23', 'IST22', 'PS24', 'PS23', 'PS22'];

        foreach ($groups as $group) {
            Group::create([
                "name" => $group,
                "code" => rand(1000, 9999),
            ]);
        }
    }
}
