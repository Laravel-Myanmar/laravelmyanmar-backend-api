<?php

use App\Modules\Articles\Models\Article;
use Illuminate\Database\Seeder;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Article::truncate();

        $faker = Faker\Factory::create();

        for ($i = 0; $i < 50; ++$i) {
            Article::create([
                'title' => $faker->sentence,
                'slug' => $faker->slug,
                'preview' => $faker->text,
                'description' => $faker->realText,
            ]);
        }
    }
}