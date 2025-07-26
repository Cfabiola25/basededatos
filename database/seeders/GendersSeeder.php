<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class GendersSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('genders')->insert([
            [
                'uuid' => Str::uuid(),
                'name' => 'Masculino',
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => null
            ],
            [
                'uuid' => Str::uuid(),
                'name' => 'Femenino',
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => null
            ],
            [
                'uuid' => Str::uuid(),
                'name' => 'Otro',
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => null
            ]
        ]);
    }
}
