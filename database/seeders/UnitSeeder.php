<?php

namespace Database\Seeders;

use App\Models\Unit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Unit::create([
            'unit' => 'Gln'
        ]);

        Unit::create([
            'unit' => 'Liter'
        ]);

        Unit::create([
            'unit' => 'Pcs'
        ]);

        Unit::create([
            'unit' => 'Set'
        ]);
    }
}
