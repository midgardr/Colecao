<?php

namespace App\Http\Controllers;

use App\Models\Figura;
use App\Services\FiguraService;
use Illuminate\Http\Request;

class FiguraController extends Controller
{
    private $figuraService;

    public function __construct(FiguraService $figuraService)
    {
        $this->figuraService = $figuraService;
    }

    public function index(Request $request, bool $eLixeira = false)
    {
        $figuras = $this->figuraService->index($request->pesquisa, $eLixeira);
        return view('figuras.index', compact('figuras'));
    }

    public function delete(Figura $figura){
        $this->figuraService->delete($figura);
        return redirect()->route('figuras')->with(['tipo' => 'success', 'mensagem' => 'Figura deletada com sucesso!']);
    }

    public function restore(int $id){
        $this->figuraService->restore($id);
        return redirect()->route('figuras', true)->with(['tipo' => 'success', 'mensagem' => 'Figura restaurada com sucesso!']);
    }
}
