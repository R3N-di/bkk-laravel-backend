<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PerusahaanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Factory::create();
        foreach (range(1, 10) as $index) {
            DB::table('perusahaan')->insert([
                'id' => Str::uuid(),
                'nama_perusahaan' => fake()->text(10),
                'logo_perusahaan' => fake()->text(10),
                'alamat_perusahaan' => fake()->text(50),
                'kontak_perusahaan' => fake()->numerify(),

            ]);
        }
    }
}
