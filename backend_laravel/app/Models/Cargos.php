<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cargos extends Model
{
    use HasFactory;

    protected $fillable = [];

    public function users() {
        return $this->hasMany(Users::class);
    }
}
