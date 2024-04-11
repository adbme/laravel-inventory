<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    use HasFactory;

    protected $table = 'materiels'; 

    protected $fillable = [
        'type_id', 
        'numero',
        'assigne_a',
        'metier',
        'marque',
    ];

    public function type()
    {
        return $this->belongsTo(Type::class);
    }
}
