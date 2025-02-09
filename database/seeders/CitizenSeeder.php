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
                'kelurahan_id' => 1
            ],
        ];

        foreach ($citizen as $key => $val) {
            Citizen::create($val);
        }
    }
}
