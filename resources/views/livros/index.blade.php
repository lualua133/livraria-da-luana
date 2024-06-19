@extends('layouts.app')

@section('content')
    <div style="display: flex; flex-direction: column; align-items: center;">
        <div style="display: flex; align-items: center;">
            <h2 class="text-center" style="margin-right: 10px">Meus livros</h2>
            <a href="{{ route('livro.create') }}" class="button">Adicionar livro</a>
        </div>
        @if (isset($livros) && count($livros) > 0)
            <table class="table">
                <thead>
                    <tr>
                        <th>Título</th>
                        <th>Autor</th>
                        <th>Ano de Publicação</th>
                        <th>Editora</th>
                        <th>Edição</th>
                        <th>Data de cadastro</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($livros as $livro)
                        <tr>
                            <td>{{ $livro->titulo }}</td>
                            <td>{{ $livro->autor }}</td>
                            <td>{{ $livro->ano_publicacao }}</td>
                            <td>{{ $livro->edicao }}</td>
                            <td>{{ $livro->editora }}</td>
                            <td>{{ $livro->created_at->format('d/m/Y') }}</td>
                            <td>
                                <a href="{{ route('livro.edit', $livro) }}" class="button">Editar livro</a>
                                <form action="{{ route('livro.destroy', $livro) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="button">Apagar livro</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{-- <div class="d-flex justify-content-center">
                {!! $livros->links() !!}
            </div> --}}
            <ul class="pagination">
                <li class="{{ $livros->currentPage() == 1 ? ' disabled' : '' }}">
                    <a href="{{ $livros->url(1) }}">Previous</a>
                </li>
                @for ($i = 1; $i <= $livros->lastPage(); $i++)
                    <li class="{{ $livros->currentPage() == $i ? ' active' : '' }}">
                        <a href="{{ $livros->url($i) }}">{{ $i }}</a>
                    </li>
                @endfor
                <li class="{{ $livros->currentPage() == $livros->lastPage() ? ' disabled' : '' }}">
                    <a href="{{ $livros->url($livros->currentPage() + 1) }}">Next</a>
                </li>
            </ul>
        @else
            <div>
                <p>Nenhum livro encontrado.</p>
            </div>
        @endif
    </div>
@endsection
