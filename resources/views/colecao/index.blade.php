@extends('template')
@section('conteudo')
    <table class="table table-striped table-bordered table-hover">
        <thead class="table-primary">
            <tr>
                <td colspan="3">
                    <form action="{{ route('colecoes') }}" method="get" enctype="application/x-www-form-urlencoded">
                        <div class="input-group mb-3">
                            <span class="input-group-text">
                                <button class="btn btn-success"><i class="bi bi-plus-square-fill"></i></button>
                            </span>
                            <input type="search" name="pesquisa" class="form-control" value="{{ $_GET['pesquisa'] ?? '' }}" placeholder="Buscar..." required autofocus>
                            <span class="input-group-text">
                                <button type="submit" class="btn btn-secundary"><i class="bi bi-search"></i></button>
                                <a href="{{ route('colecoes') }}" class="btn"><i class="bi bi-x-square-fill"></i></a>
                            </span>
                        </div>
                    </form>
                </td>
            </tr>
            <tr>
                <th>Título</th>
                <th>Descrição</th>
                <th>Cadastrada em</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($colecoes as $colecao)
                <tr>
                    <td>{{ $colecao->nome }}</td>
                    <td>{{ Str::limit($colecao->descricao, 30, '...', true) }}</td>
                    <td>{{ $colecao->created_at }}</td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="3">
                    {{ $colecoes->appends($_GET)->links() }}
                </td>
            </tr>
        </tfoot>
    </table>
@endsection
