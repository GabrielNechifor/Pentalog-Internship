<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $fillable = ['user_id', 'admin_id', 'message', 'name', 'seen'];

    public function scopeSeen($query)
    {
        return $query->where('seen', true);
    }

    public function scopeUnseen($query)
    {
        return $query->where('seen', false);
    }

    public function scopeUnseenNumber($query)
    {
        return $query->where('seen', false)->count();
    }

    public function scopeAllSeen($query)
    {
        return $query->update(['seen' => true]);
    }
}
