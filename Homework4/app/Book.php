<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Book extends Model
{
    protected $fillable = ['title', 'author_id', 'publisher_id', 'publish_year', 'cover_link'];


    public function author()
    {
        return $this->belongsTo('App\Author');
    }

    public function publisher()
    {
        return $this->belongsTo('App\Publisher');
    }

    public function borrowings()
    {
        return $this->hasMany('App\Borrowing');
    }

    public function currentBorrowing()
    {
        return $this->hasMany('App\Borrowing')->where('returning_date', null);
    }

    public function users()
    {
        return $this->belongsToMany('App\User', 'borrowings')
            ->withPivot('borrowing_date', 'returning_date', 'created_at', 'updated_at');
    }

    public function currentUser()
    {
        return $this->belongsToMany('App\User', 'borrowings')
            ->wherePivot('returning_date', null);
    }

    public function scopeUnborrowedBooks($query)
    {
        $borrowedBooksId = Borrowing::whereNull('returning_date')->pluck('book_id');
        return $query->whereNotIn('id', $borrowedBooksId);
    }

    public function scopeUnreturnedBooks($query)
    {
        $borrowedBooksId = Borrowing::whereNull('returning_date')->pluck('book_id');
        return $query->whereIn('id', $borrowedBooksId);
    }


    public static function boot()
    {
        parent::boot();

        static::deleting(function ($book) {
            Storage::disk('public')->delete($book->cover_link);
        });
    }
}
