<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Car::factory(1)->create([
            'model' => 'Nissan',
        ]);

        \App\Models\Car::factory(1)->create([
            'model' => 'Lada',
        ]);

        \App\Models\Car::factory(1)->create([
            'model' => 'Ferrari',
        ]);

        \App\Models\Car::factory(1)->create([
            'model' => 'BMW',
        ]);

        \App\Models\Car::factory(1)->create([
            'model' => 'Mercedes',
        ]);
    }
}
