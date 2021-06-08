<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        
       $users =  [
           [
                'nama' => 'Widiareta Safitri',
                'username' => 'admin1',
                'email' => 'admin1@gmail.com',
                'password' => Hash::make('password'),
                'no_telp' => '0897463528211',
                'is_admin' => 1
            ],
            [
                'nama' => 'Hanum Aisyahqilla A.',
                'username' => 'admin2',
                'email' => 'admin2@gmail.com',
                'password' => Hash::make('password'),
                'no_telp' => '0897463528211',
                'is_admin' => 1
            ],
            [
                'nama' => 'Daffa Usman',
                'username' => 'admin3',
                'email' => 'admin3@gmail.com',
                'password' => Hash::make('password'),
                'no_telp' => '0897463528211',
                'is_admin' => 1
            ],
            [
                'nama' => 'Meliska Yava Ivana',
                'username' => 'admin4',
                'email' => 'admin4@gmail.com',
                'password' => Hash::make('password'),
                'no_telp' => '0897463528211',
                'is_admin' => 1
            ],
           
          ];

          User::insert($users);

    }
}
