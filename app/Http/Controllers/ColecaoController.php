<?php

namespace App\Http\Controllers;

use App\Models\Colecao;
use App\Services\ColecaoService;
use Illuminate\Http\Request;

class ColecaoController extends Controller
{
    private $colecaoService;

    public function __construct(ColecaoService $colecaoService)
    {
        $this->colecaoService = $colecaoService;
    }

    public function index(Request $request)
    {
        $colecoes = $this->colecaoService->index($request->pesquisa);
        return view('colecao.index', compact('colecoes'));
    }
}
