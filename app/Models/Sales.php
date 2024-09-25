<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    use HasFactory;

    protected $table = 'sales';

    protected $fillable = [
        'users_id',
        'fecha_venta',
        'total'
    ]; 

    public function products(){
        return $this->belongsToMany(Products::class)
                    ->withPivot('cantidad'); // Si deseas acceder a la cantidad
    }

    // Relación uno a muchos con Usuario
    public function users(){
        return $this->belongsTo(User::class);
    }
}
