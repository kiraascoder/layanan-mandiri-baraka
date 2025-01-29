<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Citizen;

class CitizenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $citizen = [
            [
                'nik' => "0987654321",
                'name' => "Jane Doe",
                'email' => "V2wGj@example.com",
                'tanggal_lahir' => "1995-05-05",
                'tempat_lahir' => 'Jakarta',
                'jenis_kelamin' => "Perempuan",
                'alamat' => "Jalan Raya, Jakarta",
                'agama' => "Islam",
                'status_perkawinan' => "Kawin",
                'pekerjaan' => "Pelajar",
                'kewarganegaraan' => "WNI",
                'golongan_darah' => "B",
                'password' => bcrypt('password123'),
            ],
            [
                'nik' => "5678901234",
                'name' => "John Doe",
                'email' => "Zs5mG@example.com",
                'tanggal_lahir' => "1990-01-01",
                'tempat_lahir' => 'Jakarta',
                'jenis_kelamin' => "Laki-laki",
                'alamat' => "Jalan Raya, Jakarta",
                'agama' => "Islam",
                'status_perkawinan' => "Belum Kawin",
                'pekerjaan' => "Pelajar",
                'kewarganegaraan' => "WNI",
                'golongan_darah' => "A",
                'password' => bcrypt('password123'),
            ],
            [
                'nik' => "4321098765",
                'name' => "Jane Doe",
                'email' => "V2wGj@example.com",
                'tanggal_lahir' => "1995-05-05",
                'tempat_lahir' => 'Jakarta',
                'jenis_kelamin' => "Perempuan",
                'alamat' => "Jalan Raya, Jakarta",
                'agama' => "Islam",
                'status_perkawinan' => "Kawin",
                'pekerjaan' => "Pelajar",
                'kewarganegaraan' => "WNI",
                'golongan_darah' => "B",
                'password' => bcrypt('password123'),
            ],
            [
                'nik' => "9876543210",
                'name' => "John Doe",
                'email' => "Zs5mG@example.com",
                'tanggal_lahir' => "1990-01-01",
                'tempat_lahir' => 'Jakarta',
                'jenis_kelamin' => "Laki-laki",
                'alamat' => "Jalan Raya, Jakarta",
                'agama' => "Islam",
                'status_perkawinan' => "Belum Kawin",
                'pekerjaan' => "Pelajar",
                'kewarganegaraan' => "WNI",
                'golongan_darah' => "A",
                'password' => bcrypt('password123'),
            ]
        ];

        foreach ($citizen as $key => $val) {
            Citizen::create($val);
        }
    }
}
