<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable = ['name', 'gender', 'birth_date', 'address', 'phone_number'];


    public function books()
    {
        return $this->belongsToMany('App\Book', 'borrowings')
            ->withPivot('borrowing_date', 'returning_date', 'created_at', 'updated_at');;
    }
}
