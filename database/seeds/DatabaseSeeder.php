<?php
//외래키 때문에 시딩 순서가 무조건 필요함 따라서 마스터시더를 무조건 사용해야함
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        if(config('database.default') !== 'sqlite'){
            DB::statement('SET FOREIGN_KEY_CHECKS=0');
        }
        
        App\User::truncate();
        $this->call(UserTableSeeder::class);
        
        App\Article::truncate();
        $this->call(ArticlesTableSeeder::class);
        
        if(config('database.default') !== 'sqlite'){
            DB::statement('SET FOREIGN_KEY_CHECKS=1');
        }
        
        $faker = app(Faker\Generator::class);
        $articles = App\User::all();

        $articles->each(function($article){
            $article->comments()->save(factory(App\Comment::class)->make());
            $article->comments()->save(factory(App\Comment::class)->make());
        });

    
        $articles->each(function ($article) use ($faker){
            $commentIds = App\Comment::pluck('id')->toArray();

            foreach (range(1,5) as $index) {
                $article->comments()->save(
                    factory(App\Comment::class)->make([
                        'parent_id' => $faker->randomElement($commentIds)
                    ])
                    );
            }
        });

        /*App\Tag::truncate();
        DB::table('article_tag')->truncate();
        $tag = config('project.tags');

        foreach($tags as $slug => $name){
            App\Tag::create([
                'name' => $name,
                'slug' => str_slug($slug)
            ]);
        }

        $this->command->info('Seeded: tags table');

        $faker = app(Faker\Generator::class);
        $users = App\User::all();
        $articles = App\Article::all();
        $tags = App\Tag::all();

        foreach($articles as $article){
            $article->tags()->sync(
                $faker->randomElements(
                    $tags->pluck('id')->toArray() , rand(1,3)
                )
                );
        }
        
        $this->command->info('Seeded: article_tag table');*/
        $this->command->info('Seeded: comments table');
    }
}
