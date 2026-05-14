<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Query extends Model
{

    protected $fillable = [
        'id_user',
        'subject',
        'message',
        'status',
    ];


    public function getEstadoTextoAttribute()
    {
        return $this->state ? 'Leído' : 'No leído';
    }
}
