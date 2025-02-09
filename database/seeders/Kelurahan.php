<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Kelurahan extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('kelurahans')->insert([
            ['nama' => 'Kelurahan Tomenawa', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Kelurahan Baraka', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Kelurahan Batulappa', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
