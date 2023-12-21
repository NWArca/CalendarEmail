@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>{{ isset($assicurazione) ? 'Modifica Assicurazione' : 'Nuova Assicurazione' }}</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ isset($assicurazione) ? route('assicurazioni.update', $assicurazione->id) : route('assicurazioni.store') }}">
            @csrf

            @if (isset($assicurazione))
                @method('PUT')
            @endif

            <div class="form-group">
                <label for="nome_compagnia">Compagnia:</label>
                <input type="text" name="nome_compagnia" class="form-control" value="{{ isset($assicurazione) ? $assicurazione->nome_compagnia : old('nome_compagnia') }}" required>
            </div>

            <div class="form-group">
                <label for="indirizzo">Indirizzo:</label>
                <input type="text" name="indirizzo" class="form-control" value="{{ isset($assicurazione) ? $assicurazione->indirizzo : old('indirizzo') }}" required>
            </div>

            <div class="form-group">
                <label for="nome_referente">Nome Referente:</label>
                <input type="text" name="nome_referente" class="form-control" value="{{ isset($assicurazione) ? $assicurazione->nome_referente : old('nome_referente') }}" required>
            </div>

            <div class="form-group">
                <label for="numero_telefono">Numero Telefono:</label>
                <input type="text" name="numero_telefono" class="form-control" value="{{ isset($assicurazione) ? $assicurazione->numero_telefono : old('numero_telefono') }}">
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" class="form-control" value="{{ isset($assicurazione) ? $assicurazione->email : old('email') }}" required>
            </div>

            <button type="submit" class="btn btn-primary">{{ isset($assicurazione) ? 'Modifica Assicurazione' : 'Salva Assicurazione' }}</button>
        </form>
    </div>
@endsection
