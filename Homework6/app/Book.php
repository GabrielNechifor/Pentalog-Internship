<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Support\Facades\DB;

class Book extends Model
{
    protected $fillable = [
        'title',
        'type',
        'volume',
        'copies_number',
        'author_id',
        'publisher_id',
        'publish_year',
        'cover_link'
    ];


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

    public function getFullTitleAttribute()
    {
        return "{$this->title}, Volume {$this->volume}";
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
        $borrowedBooks = Borrowing::whereNull('returning_date')
            ->groupBy('book_id')
            ->select('book_id', DB::raw('count(*) as total'))
            ->pluck('total', 'book_id');

        $books = collect(new Book);
        foreach (Book::all() as $book) {
            if ($borrowedBooks->has($book->id)) {
                if ($book->copies_number > $borrowedBooks[$book->id]) {
                    $books->add($book);
                }
            } else {
                $books->add($book);
            }
        }
        return $books;
    }


    public function scopeUnreturnedBooks($query, $id = null)
    {
        $borrowedBooksId = Borrowing::whereNull('returning_date')->pluck('book_id');
        if (! $id){
            return $query->whereIn('id', $borrowedBooksId);
        }
        else{
            return $query->whereIn($id, $borrowedBooksId);
        }
    }

    public function getAvailableAttribute()
    {
        $borrowedBooks = Borrowing::whereNull('returning_date')
            ->groupBy('book_id')
            ->select('book_id', DB::raw('count(*) as total'))
            ->pluck('total', 'book_id');
        //dd($query->first()->id);
        if ($this->copies_number > ($borrowedBooks[$this->id] ?? 0)){
            return true;
        }
        return false;
    }


    public static function boot()
    {
        parent::boot();

        static::deleting(function ($book) {
            Storage::disk('public')->delete($book->cover_link);
        });
    }
}
