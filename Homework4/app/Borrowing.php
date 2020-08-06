<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Book;

class Borrowing extends Model
{
    protected $fillable = ['book_id', 'user_id', 'birth_date', 'borrowing_date', 'returning_date'];

    public function book()
    {
        return $this->belongsTo('App\Book');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public static function boot()
    {
        parent::boot();

        static::updating(function ($borrowing) {
            if ($borrowing->returning_date == null) {
                $oldBorrowing = Borrowing::whereId($borrowing->id);
                $borrowing->returning_date = $oldBorrowing->returning_date;
            }
        });
    }
}
