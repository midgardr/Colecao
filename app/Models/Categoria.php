<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Categoria extends Model
{
    use SoftDeletes, HasFactory;
    protected $table = 'categorias';

    protected $fillable = [
        'colecao_id',
        'nome',
        'descricao',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function figuras()
    {
        return $this->hasMany(Figura::class, 'categoria_id', 'id');
    }

    public function colecao()
    {
        return $this->belongsTo(Colecao::class, 'colecao_id', 'id');
    }
}
