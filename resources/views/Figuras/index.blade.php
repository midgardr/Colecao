@extends('template')
@section('conteudo')
    @if(session()->has('mensagem'))
        <div class="alert alert-{{ session('tipo') }}" role="alert">
            {{ session('mensagem') }}
        </div>
    @endif
    <table class="table table-striped table-bordered table-hover">
        <thead class="table-primary">
            <tr>
                <td colspan="4">
                    <form action="{{ route('figuras', isset(request()->route()->parameters['eLixeira'])) }}" method="get" enctype="application/x-www-form-urlencoded">
                        <div class="input-group mb-3">
                            <span class="input-group-text">
                                <button class="btn btn-success"><i class="bi bi-plus-square-fill"></i></button>
                            </span>
                            <input type="search" name="pesquisa" class="form-control" value="{{ $_GET['pesquisa'] ?? '' }}" placeholder="Buscar..." required autofocus>
                            <span class="input-group-text">
                                <button type="submit" class="btn btn-secundary"><i class="bi bi-search"></i></button>
                                <a href="{{ route('figuras', isset(request()->route()->parameters['eLixeira'])) }}" class="btn"><i class="bi bi-x-square-fill"></i></a>
                                @if(isset(request()->route()->parameters['eLixeira']))
                                    <a href="{{ route('figuras') }}" class="btn btn-success"><i class="bi bi-table"></i></a>
                                @else
                                    <a href="{{ route('figuras', true) }}" class="btn btn-danger"><i class="bi bi-trash"></i></a>
                                @endif
                            </span>
                        </div>
                    </form>
                </td>
            </tr>
            <tr>
                <th>Nome</th>
                <th>Obsevações</th>
                <th>{{ isset(request()->route()->parameters['eLixeira']) ? 'Excluído em' : 'Cadastrada em' }}</th>
                <th>#</th>
            </tr>
        </thead>
        <tbody>
            @forelse($figuras as $figura)
                <tr>
                    <td width="30%">{{ $figura->nome }}</td>
                    <td width="50%">{{ Str::limit($figura->observacoes, 30, '...', true) }}</td>
                    <td width="10%">{{ isset(request()->route()->parameters['eLixeira']) ? $figura->deleted_at : $figura->created_at }}</td>
                    <td width="10%">
                        @if(isset(request()->route()->parameters['eLixeira']))
                            <a href="{{ route('figuras.restore', $figura->id) }}" class="btn btn-success"><i class="bi bi-recycle"></i> Restaurar</a>
                        @else
                            <a href="#" class="btn btn-success"><i class="bi bi-pencil-square"></i> Editar</a>
                            <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalFiguraDelete" data-bs-prateleira-id="{{ $figura->id }}" data-bs-prateleira-nome="{{ $figura->nome }}"><i class="bi bi-trash"></i> Excluir</button>
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">Nenhuma coleção para exibir...</td>
                </tr>
            @endforelse
        </tbody>
        <tfoot>
            <tr>
                <td colspan="4">
                    {{ $figuras->appends($_GET)->links() }}
                </td>
            </tr>
        </tfoot>
    </table>
    <div class="modal fade" id="modalFiguraDelete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Apagar a figura?</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <span></span>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Não</button>
                    <a href="" type="button" id="btnSim" class="btn btn-danger">Sim</a>
                </div>
            </div>
        </div>
    </div>
    <script>
        const modalFiguraDelete = document.getElementById('modalFiguraDelete')
        if (modalFiguraDelete) {
            modalFiguraDelete.addEventListener('show.bs.modal', event => {
                const button = event.relatedTarget
                const id = button.getAttribute('data-bs-prateleira-id')
                const nome = button.getAttribute('data-bs-prateleira-nome')
                const modalBodySpan = modalFiguraDelete.querySelector('.modal-body span')
                modalBodySpan.innerHTML = "Deseja realmente apagar a figura <strong>" + nome + "</strong>?"
                const modalBodySim = modalFiguraDelete.querySelector('#btnSim')
                modalBodySim.setAttribute('href', '/figuras/delete/' + id)
            })
        }
    </script>
@endsection
