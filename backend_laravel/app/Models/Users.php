<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    use HasFactory;

    protected $fillable = [];
    public $timestamps = false; // Para desactivar completamente las marcas de tiempo

    public function cargos() {
        return $this->belongsTo(Cargos::class);
    }

    public function departamento() {
        return $this->belongsTo(Departamentos::class);
    }


}
