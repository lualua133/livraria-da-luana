@extends('layouts.app')

@section('content')
    <div style="display: flex; flex-direction: column; align-items: center;">
        <div>
            <h2>login</h2>
        </div>
        <div>
            <form class="form" method="POST" action="{{ route('login') }}">
                @csrf
                <div style="margin-bottom: 10px;">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div style="margin-bottom: 10px;">
                    <label for="password">Senha:</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <button class="button" type="submit">Login</button>
                <a class="button" href="{{ route('usuario.create') }}">Registrar</a>
            </form>
        </div>
    </div>
@endsection
