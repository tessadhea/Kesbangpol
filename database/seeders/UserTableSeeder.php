<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([

            'name' => 'Admin',
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('12345')

            





        ] );
        $user->assignRole(['admin','validator','user']);
        User::create([ 'name' => 'tessa',
        'username' => 'tessah',
        'email' => 'tessa@gmail.com',
        'email_verified_at' => now(),
        'password' => Hash::make('12345')])->assignRole(['admin']);
    }
   
}
