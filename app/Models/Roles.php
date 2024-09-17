<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Roles extends Model{
    use HasFactory;

    protected $table = 'roles';

    protected $fillable = ['nombre']; 

    // Relación de un rol con muchos usuarios
    public function users(){
        return $this->hasMany(User::class);
    }
}
