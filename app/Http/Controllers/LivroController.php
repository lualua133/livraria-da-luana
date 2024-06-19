<?php

namespace App\Http\Controllers;

use App\Models\livro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LivroController extends Controller
{
  public function index()
  {
    $livros = Auth::user()->livros()->paginate(5);
    return view('livros.index', compact('livros'));
  }

  public function create()
  {
    return view('livros.create');
  }

  public function store(Request $request)
  {
    $request->validate([
      'autor' => 'required',
      'titulo' => 'required',
      'subtitulo' => 'nullable',
      'edicao' => 'required',
      'editora' => 'required',
      'ano_publicacao' => 'required|integer',
    ]);

    $livro = Auth::user()->livros()->create($request->all());

    return redirect()->route('livros.index')->with('sucesso', 'Livro criado com sucesso.');
  }

  public function edit(livro $livro)
  {
    if (Auth::id() !== $livro->user_id) {
      return redirect()->route('livros.index')->with('error', 'Você não tem permissão para editar este livro.');
    }

    return view('livros.edit', compact('livro'));
  }

  public function update(Request $request, livro $livro)
  {

    $request->validate([
      'autor' => 'required',
      'titulo' => 'required',
      'edicao' => 'required',
      'editora' => 'required',
      'ano_publicacao' => 'required|integer',
    ]);

    $livro->update($request->all());

    return redirect()->route('livros.index')->with('sucesso', 'Livro atualizado com sucesso.');
  }

  public function destroy(livro $livro)
  {
    if (Auth::id() !== $livro->user_id) {
      return redirect()->route('livros.index')->with('error', 'Você não tem permissão para editar este livro.');
    }

    $livro->delete();
    return redirect()->route('livros.index')->with('sucesso', 'Livro deletado com sucesso.');
  }
}
