<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = collect(['Code', 'Programming', 'Database', 'Tools', 'Help']);
        $tags->each(function ($c) {
            \App\Models\Tag::create([
                'name' => $c,
                'slug' => Str::slug($c)
            ]);
        });
    }
}
