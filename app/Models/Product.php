<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'description',
        'price',
        'category_id',
        'weight_id',
        'slug',
        'is_available',
        'stock'
    ];

    //relationships

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function weight()
    {
        return $this->belongsTo(Weight::class, 'weight_id');
    }

    public function priceFormat()
    {
        return number_format($this->price, 2, ',', '.');
    }
}
