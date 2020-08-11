<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Publisher extends Model
{
    protected $fillable = ['name', 'founded', 'origin_country', 'location', 'website'];

    function books()
    {
        return $this->hasMany('App\Book');
    }

    public function authors()
    {
        return $this->belongsToMany('App\Author', 'books');
    }

    public static function boot()
    {
        parent::boot();

        static::deleting(function ($publisher) {
            $books = $publisher->books()->get();
            foreach ($books as $book) {
                $book->delete();
            }
        });
    }
}
