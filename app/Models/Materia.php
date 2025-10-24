<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materia extends Model
{
    use HasFactory;
    protected $table = 'materias';

    protected $fillable = [
        'carrera_id',
        'nombre',
        'docente_id',
        'codigo',
        'anio',
    ];
    //relacion unos a muchos

    public function carrera()
    {
       return $this->belongsTo(Carrera::class);
    }

    public function docente()
    {
        return $this->belongsTo(Administrativo::class, 'docente_id');
    }
}

