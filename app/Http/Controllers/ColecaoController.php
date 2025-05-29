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

    public function index(Request $request, bool $eLixeira = false)
    {
        $colecoes = $this->colecaoService->index($request->pesquisa, $eLixeira);
        return view('colecao.index', compact('colecoes'));
    }

    public function store(Request $request)
    {
        if(!empty($request->nome)){
            $this->colecaoService->store($request->except('_token'));
            return redirect()->route('colecoes')->with(['tipo' => 'success', 'mensagem' => 'Coleção cadastrada com sucesso!']);
        } else {
            return redirect()->back()->with(['tipo' => 'warning', 'mensagem' => 'Nome da coleção é obrigatório!']);
        }
    }

    public function edit(Colecao $colecao){
        $colecoes = $this->colecaoService->index(null);
        return view('colecao.index', compact('colecoes', 'colecao'));
    }

    public function update(Request $request, Colecao $colecao){
        if(!empty($request->nome)){
            $this->colecaoService->update($request->except(['_token', '_method']), $colecao);
            return redirect()->route('colecoes.edit', $colecao->id)->with(['tipo' => 'success', 'mensagem' => 'Coleção atualizada com sucesso!']);
        } else {
            return redirect()->back()->with(['tipo' => 'warning', 'mensagem' => 'Nome da coleção é obrigatório!']);
        }
    }

    public function delete(Colecao $colecao){
        $this->colecaoService->delete($colecao);
        return redirect()->route('colecoes')->with(['tipo' => 'success', 'mensagem' => 'Coleção deletada com sucesso!']);
    }

    public function restore(int $id){
        $this->colecaoService->restore($id);
        return redirect()->route('colecoes', true)->with(['tipo' => 'success', 'mensagem' => 'Coleção restaurada com sucesso!']);
    }
}
