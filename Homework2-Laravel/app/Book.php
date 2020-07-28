<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    public $timestamps = false;

    protected $fillable = ['title', 'author_id', 'publisher_id', 'publish_year', 'created_at', 'updated_at'];


    public function author()
    {
        return $this->belongsTo('App\Author', 'author_id');
    }

    public function publisher()
    {
        return $this->belongsTo('App\Publisher', 'publisher_id');
    }
}
