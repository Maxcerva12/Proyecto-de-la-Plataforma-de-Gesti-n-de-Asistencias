<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * se debe crear este archivo para poder utilizar los factory en el archivo seeder
 */

class post extends Model
{
    use HasFactory;
    protected $fillable = [
        'identi',
        'nombre',
        'apellido',
        'correo',
        'celular',
        'materia',
        'slug',
    ];
    public function user()
    {
        return $this->belongsTo(user::class);
    }
}