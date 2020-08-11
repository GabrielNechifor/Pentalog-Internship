<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Author extends Model
{
    protected $fillable = ['name', 'gender', 'country', 'birth_date', 'death_date', 'image_url'];

    function books()
    {
        return $this->hasMany('App\Book');
    }

    function publishers()
    {
        return $this->belongsToMany('App\Publisher', 'books');
    }

    public static function boot()
    {
        parent::boot();

        static::deleting(function ($author) {
            $books = $author->books();
            foreach ($books as $book) {
                $book->delete();
            }
            Storage::disk('public')->delete($author->image_url);
        });
    }
}
