<?php

namespace Database\Seeders;

use App\Models\Source;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SourceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $defaultSources = [
            'Facebook',
            'Telegram Channel',
            'Dark Web',
            'Google',
            'Gmail',
            'Github',
            'Twitter',
            'Linkedin',
            'Dropbox',
            'GDrive'
        ];

        foreach ($defaultSources as $sourceName) {
            Source::updateOrCreate(['name' => $sourceName]);
        }
    }
}
