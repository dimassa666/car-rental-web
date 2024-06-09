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
            ],
            [
                'nama'=>'Robin Hood',
                'email'=>'pelanggan1@gmail.com',
                'role'=>'pelanggan',
                'no_telepon'=>'08214928',
                'password'=>bcrypt('123456'),
            ], 
            [
                'nama'=>'Musk Elon',
                'email'=>'pelanggan2@gmail.com',
                'role'=>'pelanggan',
                'no_telepon'=>'081442156',
                'password'=>bcrypt('123456'),
            ], 
            [
                'nama'=>'Boni Frida',
                'email'=>'pelanggan3@gmail.com',
                'role'=>'pelanggan',
                'no_telepon'=>'0812365423',
                'password'=>bcrypt('123456'),
            ], 
            [
                'nama'=>'Vero Supriyadi',
                'email'=>'pelanggan4@gmail.com',
                'role'=>'pelanggan',
                'no_telepon'=>'0844444444',
                'password'=>bcrypt('123456'),
            ], 
            [
                'nama'=>'Kamka Mahendra',
                'email'=>'pelanggan5@gmail.com',
                'role'=>'pelanggan',
                'no_telepon'=>'0842837121',
                'password'=>bcrypt('123456'),
            ], 
        ];

        foreach($userData as $key => $val){
            User::create($val);
        }
    }
}
