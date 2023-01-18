<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory,softDeletes;

    protected $fillable = [
        'name',
        'serial',
        'price',
        'stock',
        'description',
        'category'
    ];

    public function orderProduct(){
        return $this->hasTo(OrderProduct::class);
    }
}
