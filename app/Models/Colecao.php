<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Colecao extends Model
{
    use SoftDeletes, HasFactory;
    protected $table = 'colecoes';

    protected $fillable = [
        'nome',
        'descricao',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function categorias()
    {
        return $this->hasMany(Categoria::class, 'colecao_id', 'id');
    }

    public function prateleiras()
    {
        return $this->hasMany(Prateleira::class, 'colecao_id', 'id');
    }
}
