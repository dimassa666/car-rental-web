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
                'nama'=>'Mas Pelanggan',
                'email'=>'pelanggan@gmail.com',
                'role'=>'pelanggan',
                'no_telepon'=>'0811111111',
                'password'=>bcrypt('123456'),
            ], 
            [
                'nama'=>'Mas Karyawan',
                'email'=>'karyawan@gmail.com',
                'role'=>'karyawan',
                'no_telepon'=>'0822222222',
                'password'=>bcrypt('123456'),
            ]
        ];

        foreach($userData as $key => $val){
            User::create($val);
        }
    }
}
