<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'id_user',
        'total_amount',
        'status',
        'payment_method',
        'payment_status',
        'shipped_at',
        'address',
        'city',
        'postal_code',
        'notes',
        'slug',
        'shipping_cost'
    ];

    //relationships
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function items()
    {
        return $this->hasMany(OrderItem::class, 'order_id');
    }

    public function totalAmountFormat()
    {
        return number_format($this->total_amount, 2, ',', '.');
    }

    public function shippingCostFormat()
    {
        return number_format($this->shipping_cost, 2, ',', '.');
    }

    public function shippedAtFormat()
    {
        return $this->shipped_at ? $this->shipped_at->format('d/m/Y ') : 'No enviado';
    }
}