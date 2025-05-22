<?php

namespace App\Services;

use App\Models\Colecao;

class ColecaoService
{
    private $colecaoModel;

    public function __construct(Colecao $colecao)
    {
        $this->colecaoModel = $colecao;
    }

    public function index(String $pesquisa = null)
    {
        return $this->colecaoModel
            ->when(!is_null($pesquisa), function ($q1) use ($pesquisa) {
                $q1->where('nome', 'LIKE', "%{$pesquisa}%")
                    ->orWhere('descricao', 'LIKE', "%{$pesquisa}%");
            })
            ->orderBy('nome')
            ->paginate(2);
    }
}
