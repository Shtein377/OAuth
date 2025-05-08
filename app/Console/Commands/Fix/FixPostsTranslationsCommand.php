<?php

namespace App\Console\Commands\Fix;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class FixPostsTranslationsCommand extends Command
{

    protected $signature = 'fix:posts-translations';


    protected $description = 'Translation posts in DB';


    public function handle()
    {

        $this->fixPosts();
        $this->info('Done');
    }

    private function fixPosts()
    {

        $posts = DB::table('posts')->get();

        //   dd($posts);


        foreach ($posts as $post) {

            $title = json_encode(['ru' => $post->title], JSON_UNESCAPED_UNICODE);

            $content = json_encode(['ru' => $post->content], JSON_UNESCAPED_UNICODE);

            // dd($title,$content);

            DB::table('posts')
                ->where('id', $post->id)
                ->update(compact('title', 'content'));
        }
    }
}
