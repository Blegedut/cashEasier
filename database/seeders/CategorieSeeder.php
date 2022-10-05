<?php

namespace Database\Seeders;

use App\Models\Categorie;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Categorie::create([
            'category' => 'Lubricant'
        ]);

        Categorie::create([
            'category' => 'Accessories'
        ]);

        Categorie::create([
            'category' => 'Spare Parts'
        ]);
    }
}
