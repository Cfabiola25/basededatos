<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class SpeakerSocialSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('speaker_socials')->insert([
            [
                'uuid' => Str::uuid(),
                'speaker_id' => 1, // Federico
                'platform' => 'LinkedIn',
                'url' => 'https://www.linkedin.com/in/federico-arteaga',
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => null,
            ],
            [
                'uuid' => Str::uuid(),
                'speaker_id' => 2, // Javier
                'platform' => 'Instagram',
                'url' => 'https://www.instagram.com/javier.suescun',
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => null,
            ],
            [
                'uuid' => Str::uuid(),
                'speaker_id' => 2, // Javier con doble red
                'platform' => 'YouTube',
                'url' => 'https://www.youtube.com/@javiercocina',
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => null,
            ],
        ]);
    }
}
