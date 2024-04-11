<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Metier extends Model
{
    use HasFactory;

    protected $table = 'metier'; 

    protected $fillable = ['nom'];

    public function materials()
    {
        return $this->hasMany(Material::class);
    }
}
