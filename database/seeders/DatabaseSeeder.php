<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\BreachEvent;
use App\Models\Identity;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(LeakedDataTypesSeeder::class);
        Identity::factory()->count(5)->domain()->create();
        Identity::factory()->count(5)->individual()->create();
        BreachEvent::factory()->count(10)->create();
    }
}
