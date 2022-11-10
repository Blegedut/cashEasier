<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Contracts\Permission;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create(['name' => 'manager']);

        Role::create(['name' => 'cashier']);

        $manager = User::create([
            'name' => 'Admin',
            'email' => 'primamandiriservice@mail.com',
            'password' => Hash::make('password')
        ]);
        $manager->assignRole('manager');

        $cashier = User::create([
            'name' => 'kasir',
            'email' => 'primamandiri@mail.com',
            'password' => Hash::make('password')
        ]);
        $cashier->assignRole('cashier');
    }
}
