<?php

namespace App\Observers;

use App\Models\Post;

use Illuminate\Support\Facades\Storage;

class PostObserver
{
    /**
     * Handle the Post "created" event.
     *
     * @param  \App\Models\Post  $post
     * @return void
     */
    public function created(Post $post)
    {
        //
    }

    /**
     * Handle the Post "updated" event.
     *
     * @param  \App\Models\Post  $post
     * @return void
     */
    public function updated(Post $post)
    {
        //
    }

    /**
     * Handle the Post "deleted" event.
     *
     * @param  \App\Models\Post  $post
     * @return void
     */
    public function deleted(Post $post)
    {
        //
    }

    // creating se ejecuta justo antes de que se cree el post
    public function creating(Post $post) {
        // cuando se ejecuta desde consola (por ejemplo cuando hacemos migraciones no existe todavía ningún user auth)
        if (! \App::runningInConsole()) {
            $post->user_id = auth()->user()->id;
        }
    }

    // deleting se ejecuta justo antes de que se borre el post
    public function deleting(Post $post)
    {
        if ($post->image) { // si ese post tiene una img hay q borrarla físicamente
            Storage::delete($post->image->url);
        }
    }

    /**
     * Handle the Post "restored" event.
     *
     * @param  \App\Models\Post  $post
     * @return void
     */
    public function restored(Post $post)
    {
        //
    }

    /**
     * Handle the Post "force deleted" event.
     *
     * @param  \App\Models\Post  $post
     * @return void
     */
    public function forceDeleted(Post $post)
    {
        //
    }
}
