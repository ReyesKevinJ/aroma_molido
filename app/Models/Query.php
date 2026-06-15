<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Query extends Model
{
    protected $table = 'query';
    protected $fillable = [
        'user_id',
        'subject',
        'message',
        'status',
    ];

    //relationships
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }


    public function getStatusTextAttribute()
    {
        return $this->state ? 'Leído' : 'No leído';
    }
}
