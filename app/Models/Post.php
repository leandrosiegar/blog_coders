<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'update_at'];

    // Relación uno a muchos (inversa)
    public function user() { // un post en concreto solo puede haber sido escrito por un único user
       //  return $this->belongsTo('App\Models\User');
       return $this->belongsTo(User::class);
    }

    // Relación uno a muchos (inversa)
    public function category() { // un post en concreto solo puede pertenecer a una única categoria
       //  return $this->belongsTo('App\Models\Category');
       return $this->belongsTo(Category::class);
    }

    // Relación muchos a muchos
    public function tags() {
        // return $this->belongsToMany('App\Models\Tag');
        return $this->belongsToMany(Tag::class);
    }

    // Relación uno a uno polimórfica
    public function image() {
       //  return $this->morphOne('App\Models\Image', 'imageable');
       return $this->morphOne(Image::class, 'imageable');
    }
}
