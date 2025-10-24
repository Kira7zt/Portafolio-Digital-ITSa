<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Documentacion extends Model
{
    use HasFactory;

    // campos asignables en masa
    protected $fillable = [
        'titulo',
        'descripcion',
        'archivo',
    ];

    /**
     * Usuarios relacionados (muchos a muchos)
     */
    public function users()
    {
        return $this->belongsToMany(\App\Models\User::class, 'documentacion_user', 'documentacion_id', 'user_id')->withTimestamps();
    }

    /**
     * Obtener URL pública del archivo (si existe)
     */
    public function archivoUrl()
    {
        if (! $this->archivo) {
            return null;
        }
        return Storage::url($this->archivo); // requiere storage:link
    }
}
