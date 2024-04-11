<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    use HasFactory;

    protected $table = 'materiels'; 

    protected $fillable = [
        'type', 
        'numero',
        'assigne_a',
        'metier',
        'marque',
    ];
}
