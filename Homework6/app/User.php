<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'password', 'gender', 'birth_date', 'address', 'phone_number'
    ];
    protected $hidden = [
        'password', 'remember_token'
    ];
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function books()
    {
        return $this->belongsToMany('App\Book', 'borrowings')
            ->withPivot('borrowing_date', 'returning_date', 'created_at', 'updated_at');;
    }
}
