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
                'nama' => 'Yusuf Pandhu Wijaya',
                'username' => 'admin1',
                'email' => 'admin1@gmail.com',
                'password' => Hash::make('password'),
                'no_telp' => '',
                'is_admin' => 1
            ],
            [
                'nama' => 'Tunas Timur',
                'username' => 'admin2',
                'email' => 'admin2@gmail.com',
                'password' => Hash::make('password'),
                'no_telp' => '+62 812-3323-5758',
                'is_admin' => 1
            ],
            [
                'nama' => 'Daffa Usman',
                'username' => 'daffausman',
                'email' => 'customer1@gmail.com',
                'password' => Hash::make('password'),
                'no_telp' => '0897463528211',
                'is_admin' => 0
            ],
            [
                'nama' => 'Hanum Aisyahqilla A.',
                'username' => 'hanumaisyah',
                'email' => 'customer2@gmail.com',
                'password' => Hash::make('password'),
                'no_telp' => '0897463528211',
                'is_admin' => 0
            ],
            [
                'nama' => 'Widiareta Safitri',
                'username' => 'widiareta',
                'email' => 'customer3@gmail.com',
                'password' => Hash::make('password'),
                'no_telp' => '0897463528211',
                'is_admin' => 0
            ],
            [
                'nama' => 'Meliska Yava Ivana',
                'username' => 'meliska',
                'email' => 'customer4@gmail.com',
                'password' => Hash::make('password'),
                'no_telp' => '0897463528211',
                'is_admin' => 0
            ],
           
          ];

          User::insert($users);

    }
}
