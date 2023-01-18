<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory,softDeletes;

    protected $fillable = [
        'reference',
        'total',
        'status',
        'subtotal',
        'category',
        'user_id'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function orderItem(){
        return $this->hasTo(OrderItem::class);
    }
}
