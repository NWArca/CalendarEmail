@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Elenco Polizze</h2>

        <a href="{{ route('polizze.create') }}" class="btn btn-primary mb-3">Nuova Polizza</a>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table">
            <thead>
                <tr>
                    <th>Numero Polizza</th>
                    <th>Scadenza Polizza</th>
                    <th>Assicurazione</th>
                    <th>Azioni</th>
                </tr>
            </thead>
            <tbody>
                @foreach($polizze as $polizza)
                    <tr>
                        <td>{{ $polizza->numero_polizza }}</td>
                        <td>{{ $polizza->scadenza_polizza }}</td>
                        <td>{{ $polizza->assicurazione->nome_compagnia }}</td>
                        <td>
                            <a href="{{ route('polizze.show', $polizza->id) }}" class="btn btn-info">Dettagli</a>
                            <a href="{{ route('polizze.edit', $polizza->id) }}" class="btn btn-warning">Modifica</a>
                            <form action="{{ route('polizze.destroy', $polizza->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Sei sicuro di voler eliminare questa polizza?')">Elimina</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
