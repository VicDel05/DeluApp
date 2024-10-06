<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_sale extends Model{

    protected $table = 'product_sale';

    protected $fillable = [
        'products_id',
        'sales_id',
        'cantidad',
        'precio_unitario'
    ];

    public function sales(){
        return $this->belongsTo(Sales::class);
    }

    public function products(){
        return $this->belongsTo(Products::class);
    }

    use HasFactory;
}
