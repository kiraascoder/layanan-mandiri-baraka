<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminSedeer extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $adminData =
            [
                [
                    'name' => 'Admin Kecamatan',
                    'email' => 'kecamatanbaraka@gmail.com',
                    'password' => bcrypt('password123'),
                    'role' => 'superadmin',
                ],
                [
                    'name' => 'Admin Kelurahan Tomenawa',
                    'email' => 'kelurahantomenawa@gmail.com',
                    'password' => bcrypt('password123'),
                    'role' => 'kelurahan',
                ],
                [
                    'name' => 'Admin Kelurahan Baraka',
                    'email' => 'kelurahanbaraka@gmail.com',
                    'password' => bcrypt('password123'),
                    'role' => 'kelurahan',
                ]
            ];

        foreach ($adminData as $val) {
            \App\Models\User::create($val);
        }
    }
}
