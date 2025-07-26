<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UserTypesSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('user_types')->insert([
            [
                'uuid' => Str::uuid(),
                'type' => 'Estudiante',
                'description' => 'Usuario con rol de estudiante',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'type' => 'Docente',
                'description' => 'Usuario con rol de docente',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'type' => 'Administrativo',
                'description' => 'Usuario administrativo',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
