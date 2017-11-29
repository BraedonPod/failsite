<?php

use Illuminate\Database\Seeder;
use App\Article;
use App\Vote;

class ArticleDraftTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        
        for ($i = 0; $i < rand(10,50); $i++) {
            $gender = $faker->randomElement(['m', 'f']);
            $category = array('School','Miscellaneous','Geek','Holidays','Transportation','Health','Kids','Animals','Intimacy','Money','Work','Love');
            $article =  Article::create([
                'author' => $faker->name,
                'body' => $faker->paragraph,
                'gender' =>$gender,
                'status' => 0,
                'categories' => $category[rand(0,11)]
            ]);
            
            Vote::create([
                'article_id' => $article->id,
                'vote' => 0,
                'vote1' => 0,
                'smile1' => 0,
                'smile2' => 0,
                'smile3' => 0,
                'smile4' => 0,
            ]);
        }
    }
}
