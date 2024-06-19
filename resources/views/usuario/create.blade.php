@extends('layouts.app')

@section('content')
    <div style="display: flex; flex-direction: column; align-items: center;">
        <div>
            <h2>Cadastro de Usuário</h2>
        </div>
        <div>
            <form class="form" method="POST" action="{{ route('register') }}">
                @csrf
                <div>
                    <label for="name">Nome:</label>
                    <input type="text" id="name" name="name" required>
                </div>
                <div>
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div>
                    <label for="password">Senha:</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <div>
                    <label for="password_confirmation">Confirmar Senha:</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" required>
                </div>
                <button class="button" type="submit">Cadastrar</button>
                <a class="button" href="{{ route('loginForm') }}">voltar</a>
            </form>
        </div>
    </div>
@endsection
