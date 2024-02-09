<?php

namespace Database\Seeders;

use App\Models\route;
use App\Models\horaire;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class seederHoraire extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        route::factory()->count(10)->create();

    }
}
