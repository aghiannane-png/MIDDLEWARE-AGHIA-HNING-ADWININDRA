<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $users = [
            ['Mahasiswa', 'mhs@test.com', 'mahasiswa'],
            ['Dosen Wali', 'dosen@test.com', 'dosen_wali'],
            ['Kaprodi', 'kaprodi@test.com', 'kaprodi'],
        ];

        foreach ($users as [$name, $email, $role]) {
            User::create([
                'name' => $name,
                'email' => $email,
                'password' => 'password',
                'role' => $role,
                'email_verified_at' => now(),
            ]);
        }
    }
}