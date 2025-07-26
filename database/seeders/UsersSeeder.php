<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;
use Spatie\Permission\Models\Role;

class UsersSeeder extends Seeder
{
    public function run(): void
    {
        // Crear roles si no existen
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $userRole = Role::firstOrCreate(['name' => 'user']);

        // Crear usuarios
        $users = [
            [
                'uuid' => Str::uuid(),
                'name' => 'Admin FESC',
                'email' => 'admin@fesc.edu.co',
                'password' => Hash::make('password'),
                'gender_id' => 1,
                'user_type_id' => 3,
                'document_type_id' => 1,
                'document_number' => '123456789',
                'created_at' => now(),
                'updated_at' => now(),
                'role' => 'admin',
            ],
            [
                'uuid' => Str::uuid(),
                'name' => 'Estudiante Prueba',
                'email' => 'estudiante@fesc.edu.co',
                'password' => Hash::make('password'),
                'gender_id' => 2,
                'user_type_id' => 1,
                'document_type_id' => 1,
                'document_number' => '987654321',
                'created_at' => now(),
                'updated_at' => now(),
                'role' => 'user',
            ],
        ];

        foreach ($users as $userData) {
            $user = User::create($userData);
            $user->assignRole($userData['role']);
        }
    }
}
