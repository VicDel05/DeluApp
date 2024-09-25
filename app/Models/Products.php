<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'nombre',
        'descripcion',
        'precio',
        'stock',
        'categories_id',
    ];

    public function categories(){
        return $this->belongsTo(Categories::class);
    }

    public function sales(){
        return $this->belongsToMany(Sales::class)
                    ->withPivot('cantidad'); // Si deseas acceder a la cantidad
    }
}
