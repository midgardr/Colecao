<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Prateleira extends Model
{
    use SoftDeletes, HasFactory;
    protected $table = 'prateleiras';
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

    public function getCreatedAtAttribute()
    {
        return Carbon::parse($this->attributes['created_at'])->format('d/m/Y H:i:s');
    }
    public function getUpdatedAtAttribute()
    {
        return Carbon::parse($this->attributes['updated_at'])->format('d/m/Y H:i:s');
    }
    public function getDeletedAtAttribute()
    {
        return Carbon::parse($this->attributes['deleted_at'])->format('d/m/Y H:i:s');
    }

    public function colecao()
    {
        return $this->belongsTo(Colecao::class, 'colecao_id', 'id');
    }
    public function figuras()
    {
        return $this->hasMany(Figura::class, 'prateleira_id', 'id');
    }
}
