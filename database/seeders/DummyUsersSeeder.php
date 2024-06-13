<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DummyUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userData = [
            [
                'nama'=>'Rendy Fernando',
                'email'=>'pelanggan@gmail.com',
                'role'=>'pelanggan',
                'no_telepon'=>'0811111111',
                'password'=>bcrypt('12345678'),
            ], 
            [
                'nama'=>'Kamka Mahendra',
                'email'=>'karyawan@gmail.com',
                'role'=>'karyawan',
                'no_telepon'=>'0822222222',
                'password'=>bcrypt('12345678'),
            ],
        ];

        foreach($userData as $key => $val){
            User::create($val);
        }
    }
}
