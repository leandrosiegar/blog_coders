<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Post;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    // En todos los métodos SIEMPRE como mínimo hay que pasar el $user

    // ******************************
    public function esAutorDelPost(User $user, Post $post) {
        if ($user->id == $post->user_id) {
            return true;
        }
        else {
            return false;
        }
    }

    // ******************************
    public function estaPublicado(?User $user, Post $post) {
        if ($post->status == 2) {
            return true;
        }
        else {
            return false;
        }
    }

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
}
