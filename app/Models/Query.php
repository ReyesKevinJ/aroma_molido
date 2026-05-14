<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Query extends Model
{

    protected $fillable = [
        'id_user',
        'subject',
        'message',
        'state',
    ];

    //relationships
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }


    public function getStatusTextAttribute()
    {
        return $this->state ? 'Leído' : 'No leído';
    }
}
