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
                    <form action="{{ route('categorias', isset(request()->route()->parameters['eLixeira'])) }}" method="get" enctype="application/x-www-form-urlencoded">
                        <div class="input-group mb-3">
                            <span class="input-group-text">
                                <button class="btn btn-success"><i class="bi bi-plus-square-fill"></i></button>
                            </span>
                            <input type="search" name="pesquisa" class="form-control" value="{{ $_GET['pesquisa'] ?? '' }}" placeholder="Buscar..." required autofocus>
                            <span class="input-group-text">
                                <button type="submit" class="btn btn-secundary"><i class="bi bi-search"></i></button>
                                <a href="{{ route('categorias', isset(request()->route()->parameters['eLixeira'])) }}" class="btn"><i class="bi bi-x-square-fill"></i></a>
                                @if(isset(request()->route()->parameters['eLixeira']))
                                    <a href="{{ route('categorias') }}" class="btn btn-success"><i class="bi bi-table"></i></a>
                                @else
                                    <a href="{{ route('categorias', true) }}" class="btn btn-danger"><i class="bi bi-trash"></i></a>
                                @endif
                            </span>
                        </div>
                    </form>
                </td>
            </tr>
            <tr>
                <th>Título</th>
                <th>Descrição</th>
                <th>{{ isset(request()->route()->parameters['eLixeira']) ? 'Excluído em' : 'Cadastrada em' }}</th>
                <th>#</th>
            </tr>
        </thead>
        <tbody>
            @forelse($categorias as $categoria)
                <tr>
                    <td width="30%">{{ $categoria->nome }}</td>
                    <td width="50%">{{ Str::limit($categoria->descricao, 30, '...', true) }}</td>
                    <td width="10%">{{ isset(request()->route()->parameters['eLixeira']) ? $categoria->deleted_at : $categoria->created_at }}</td>
                    <td width="10%">
                        @if(isset(request()->route()->parameters['eLixeira']))
                            <a href="{{ route('categorias.restore', $categoria->id) }}" class="btn btn-success"><i class="bi bi-recycle"></i> Restaurar</a>
                        @else
                            <a href="#" class="btn btn-success"><i class="bi bi-pencil-square"></i> Editar</a>
                            <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalCategoriaDelete" data-bs-categoria-id="{{ $categoria->id }}" data-bs-categoria-nome="{{ $categoria->nome }}"><i class="bi bi-trash"></i> Excluir</button>
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
                    {{ $categorias->appends($_GET)->links() }}
                </td>
            </tr>
        </tfoot>
    </table>
    <div class="modal fade" id="modalCategoriaDelete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Apagar a categoria?</h1>
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
        const modalCategoriaDelete = document.getElementById('modalCategoriaDelete')
        if (modalCategoriaDelete) {
            modalCategoriaDelete.addEventListener('show.bs.modal', event => {
                const button = event.relatedTarget
                const id = button.getAttribute('data-bs-categoria-id')
                const nome = button.getAttribute('data-bs-categoria-nome')
                const modalBodySpan = modalCategoriaDelete.querySelector('.modal-body span')
                modalBodySpan.innerHTML = "Deseja realmente apagar a categoria <strong>" + nome + "</strong>?"
                const modalBodySim = modalCategoriaDelete.querySelector('#btnSim')
                modalBodySim.setAttribute('href', '/categorias/delete/' + id)
            })
        }
    </script>
@endsection
