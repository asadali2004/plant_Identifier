<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Plant;

class PlantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */


public function run()
{
    Plant::create([
        'name' => 'Rose',
        'care_info' => 'Needs 6 hours of sunlight, well-drained soil.',
        'watering_schedule' => 'Every 3 days',
        'pest_control' => 'Use neem oil for aphids.',
    ]);
}

}
