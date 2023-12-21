@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Elenco Assicurazioni</h2>

        <a href="{{ route('assicurazioni.create') }}" class="btn btn-primary mb-3">Nuova Assicurazione</a>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table">
            <thead>
                <tr>
                    <th>Compagnia</th>
                    <th>Referente</th>
                    <th>Azioni</th>
                </tr>
            </thead>
            <tbody>
                @foreach($assicurazioni as $assicurazione)
                    <tr>
                        <td>{{ $assicurazione->nome_compagnia }}</td>
                        <td>{{ $assicurazione->nome_referente }}</td>
                        <td>
                            <a href="{{ route('assicurazioni.show', $assicurazione->id) }}" class="btn btn-info">Dettagli</a>
                            <a href="{{ route('assicurazioni.edit', $assicurazione->id) }}" class="btn btn-warning">Modifica</a>
                            <form action="{{ route('assicurazioni.destroy', $assicurazione->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Sei sicuro di voler eliminare questa assicurazione?')">Elimina</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
