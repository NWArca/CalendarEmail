@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Dettagli Assicurazione</h2>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Compagnia: {{ $assicurazione->nome_compagnia }}</h5>
                <p class="card-text">Indirizzo: {{ $assicurazione->indirizzo }}</p>
                <p class="card-text">Referente: {{ $assicurazione->nome_referente }}</p>
                <p class="card-text">Numero Telefono: {{ $assicurazione->numero_telefono ?? 'N/D' }}</p>
                <p class="card-text">Email: {{ $assicurazione->email }}</p>
                <p class="card-text">Creato il: {{ $assicurazione->created_at }}</p>
                <p class="card-text">Aggiornato il: {{ $assicurazione->updated_at }}</p>
            </div>
        </div>

        <div class="mt-3">
            <a href="{{ route('assicurazioni.index') }}" class="btn btn-primary">Torna all'elenco</a>
            <a href="{{ route('assicurazioni.edit', $assicurazione->id) }}" class="btn btn-warning">Modifica</a>
            <a href="{{ route('assicurazioni.create') }}" class="btn btn-success">Nuova Assicurazione</a>
        </div>
    </div>
@endsection
