<?php

namespace App\Listeners;

//use App\Events\article.created;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class ArticlesEventListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  article.created  $event
     * @return void
     */
    // index.store로 받은 값을 $article에 넣고 \App\Article  클래스의 형식만 쓰겠다는말(App\Article는 없어도 동작하긴함,하지만 더 정확하게 쓰기위해서는 필요함)
    public function handle(\App\Events\ArticlesEvent $event)
    {
       if($event->action == 'created'){
           \Log::info(sprintf('새로운 글이 등록되었습니다.: %S',
           $event->article->title
       ));
       }
    }
}
