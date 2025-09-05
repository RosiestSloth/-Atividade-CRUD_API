<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'preco',
        'quantidade',
        'distribuidora_id',
        'categoria_id',
        'created_by',
    ];

    public function distribuidora()
    {
        return $this->belongsTo(Distribuidora::class);
    }

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

    public function criador()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
