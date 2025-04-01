<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Figura extends Model
{
    use SoftDeletes;
    protected $table = 'figuras';
    protected $fillable = [
        'categoria_id',
        'prateleira_id',
        'nome',
        'lancamento',
        'recebimento',
        'observacoes',
        'foto'
    ];
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'categoria_id', 'id');
    }
    public function prateleira()
    {
        return $this->belongsTo(Prateleira::class, 'prateleira_id', 'id');
    }
}
