@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Elenco Condomini</h2>

        <a href="{{ route('condomini.create') }}" class="btn btn-primary mb-3">Nuovo Condominio</a>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Indirizzo</th>
                    <th>Codice Fiscale</th>
                    <th>Azioni</th>
                </tr>
            </thead>
            <tbody>
                @foreach($condomini as $condominio)
                    <tr>
                        <td>{{ $condominio->nome }}</td>
                        <td>{{ $condominio->indirizzo }}</td>
                        <td>{{ $condominio->codice_fiscale }}</td>
                        <td>
                            <a href="{{ route('condomini.show', $condominio->id) }}" class="btn btn-info">Dettagli</a>
                            <a href="{{ route('condomini.edit', $condominio->id) }}" class="btn btn-warning">Modifica</a>
                            <form action="{{ route('condomini.destroy', $condominio->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Sei sicuro di voler eliminare questo condominio?')">Elimina</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
