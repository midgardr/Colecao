<?php

namespace App\Http\Controllers;

use App\Models\Prateleira;
use App\Services\PrateleiraService;
use Illuminate\Http\Request;

class PrateleiraController extends Controller
{
    private $prateleiraService;

    public function __construct(PrateleiraService $prateleiraService)
    {
        $this->prateleiraService = $prateleiraService;
    }

    public function index(Request $request, bool $eLixeira = false)
    {
        $prateleiras = $this->prateleiraService->index($request->pesquisa, $eLixeira);
        return view('prateleira.index', compact('prateleiras'));
    }

    public function delete(Prateleira $prateleira){
        $this->prateleiraService->delete($prateleira);
        return redirect()->route('prateleiras')->with(['tipo' => 'success', 'mensagem' => 'Prateleira deletada com sucesso!']);
    }

    public function restore(int $id){
        $this->prateleiraService->restore($id);
        return redirect()->route('prateleiras', true)->with(['tipo' => 'success', 'mensagem' => 'Prateleira restaurada com sucesso!']);
    }
}
