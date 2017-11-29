<?php

use Illuminate\Database\Seeder;
use App\Article;
use App\Vote;
use App\Comment;

class ArticleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        $category = array('School','Miscellaneous','Geek','Holidays','Transportation','Health','Kids','Animals','Intimacy','Money','Work','Love');
        for ($i = 0; $i < 100; $i++) {
            $gender = $faker->randomElement(['m', 'f']);
            $article =  Article::create([
                'author' => $faker->name,
                'body' => $faker->text(500),
                'gender' =>$gender,
                'status' => 1,
                'categories' => $category[rand(0,11)]
            ]);
            
            Vote::create([
                'article_id' => $article->id,
                'vote' => rand(1,200),
                'vote1' => rand(1,200),
                'smile1' => rand(1,200),
                'smile2' => rand(1,200),
                'smile3' => rand(1,200),
                'smile4' => rand(1,200),
            ]);
            
            for($a = 0; $a < rand(1,20); $a++) {
                Comment::create([
                    'author_id' => rand(1,500),
                    'article_id' => $article->id,
                    'content' => $faker->paragraph,
                    'up' => rand(0,25),
                    'down' => rand(0,10),
                    'report' => rand(0,5)
                ]);
            }
        }
    }
}
