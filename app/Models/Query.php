<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Query extends Model
{
    protected $table = 'query';

    protected $fillable = [
        'asunto',
        'mensaje',
        'state',
        'cliente_id'
    ];

   
    public function getEstadoTextoAttribute()
    {
        return $this->state ? 'Leído' : 'No leído';
    }
}