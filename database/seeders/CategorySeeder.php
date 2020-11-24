<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = collect(
            [
                'Laravel',
                'PHP',
                'Javascript',
                'React JS',
                'CSS',
                'Tailwind CSS',
                'REST API',
                'Bootstrap'
            ]
        );

        $categories->each(function ($c) {
            \App\Models\Category::create([
                'name' => $c,
                'slug' => Str::slug($c)
            ]);
        });
    }
}
