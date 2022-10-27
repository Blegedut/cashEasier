<?php

namespace Database\Seeders;
use App\Models\User;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'kasir 1',
            'email' => 'primamandiriservice@mail.com',
            'password' => Hash::make('password')
        ]);

        User::create([
            'name' => 'kasir 2',
            'email' => 'primamandiri@mail.com',
            'password' => Hash::make('password')
        ]);
    }
}
