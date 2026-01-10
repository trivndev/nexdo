<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tags = [
            'work', 'personal', 'urgent', 'idea', 'study',
            'finance', 'health', 'home', 'project', 'bug',
        ];

        foreach ($tags as $tag) {
            Tag::findOrCreate($tag);
        }
    }
}
