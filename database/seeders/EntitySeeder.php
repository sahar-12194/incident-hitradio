<?php

namespace Database\Seeders;

use App\Models\Entity;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EntitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        Entity::create(['name' => 'HR', 'observation' => 'Hiradio',]);
        Entity::create(['name' => 'HRA', 'observation' => 'Hiradio  Afrique',]);
        Entity::create(['name' => 'AZ', 'observation' => 'Radio Azawan',]);
    }
}
