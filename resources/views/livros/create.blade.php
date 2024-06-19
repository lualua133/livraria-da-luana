@extends('layouts.app')

@section('content')
    <div style="display: flex; flex-direction: column; align-items: center;">
        <div class="container">
            <h1>Adicionar Livro</h1>
            <form class="form" action="{{ route('livro.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="autor">Autor</label>
                    <input type="text" name="autor" id="autor" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="titulo">Título</label>
                    <input type="text" name="titulo" id="titulo" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="subtitulo">Subtítulo</label>
                    <input type="text" name="subtitulo" id="subtitulo" class="form-control">
                </div>
                <div class="form-group">
                    <label for="edicao">Edição</label>
                    <input type="text" name="edicao" id="edicao" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="editora">Editora</label>
                    <input type="text" name="editora" id="editora" class="form-control" required>
                </div>
                <div class="form-group" style="margin-bottom: 10px">
                    <label for="ano_publicacao">Ano de Publicação</label>
                    <input type="number" name="ano_publicacao" id="ano_publicacao" class="form-control" placeholder="ex: 2024" required>
                </div>
                <button type="submit" class="button">Adicionar Livro</button>
                <a class="button" href="{{ route('livros.index') }}">voltar</a>
            </form>
        </div>
    </div>
@endsection
