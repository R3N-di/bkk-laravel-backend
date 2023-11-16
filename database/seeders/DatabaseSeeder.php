<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Alumni;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
            'id' => Str::uuid(),
            'name' => "Super Admin - Faizal",
            'email' => "superadminfaizal@admin.com",
            'password' => Hash::make('superadminfaizal'),
            'role' => 'super-admin',
            'jk' => 'Laki-laki',
            'tgl_lahir' => Date::now()->format('Y-m-d H:i:s'),
        ]);

        User::create([
            'id' => Str::uuid(),
            'name' => "Admin - Faizal",
            'email' => "adminfaizal@admin.com",
            'password' => Hash::make('adminfaizal'),
            'role' => 'admin',
            'jk' => 'Laki-laki',
            'tgl_lahir' => Date::now()->format('Y-m-d H:i:s'),
        ]);

        $idAlumni = Str::uuid();
        User::create([
            'id' => $idAlumni,
            'name' => "Alumni - Faizal",
            'email' => "alumnifaizal@alumni.com",
            'password' => Hash::make('alumnifaizal'),
            'role' => 'alumni',
            'jk' => 'Laki-laki',
            'tgl_lahir' => Date::now()->format('Y-m-d H:i:s'),
        ]);
        Alumni::create([
            'id' => Str::uuid(),
            'id_users' => $idAlumni,
            'is_verified' => 'verified',
            'is_lulusan' => true,
        ]);

    }
}
