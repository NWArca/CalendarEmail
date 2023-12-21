<!-- resources/views/polizze/form.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>{{ isset($polizza) ? 'Modifica Polizza' : 'Nuova Polizza' }}</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ isset($polizza) ? route('polizze.update', $polizza->id) : route('polizze.store') }}">
            @csrf

            @if (isset($polizza))
                @method('PUT')
            @endif

            <div class="form-group">
                <label for="numero_polizza">Numero Polizza:</label>
                <input type="text" name="numero_polizza" class="form-control" value="{{ isset($polizza) ? $polizza->numero_polizza : old('numero_polizza') }}" required>
            </div>

            <div class="form-group">
                <label for="premio">Premio:</label>
                <input type="text" name="premio" class="form-control" value="{{ isset($polizza) ? $polizza->premio : old('premio') }}" required>
            </div>

            <div class="form-group">
                <label for="decorrenza_polizza">Decorrenza Polizza:</label>
                <input type="date" name="decorrenza_polizza" class="form-control" value="{{ isset($polizza) ? $polizza->decorrenza_polizza : old('decorrenza_polizza') }}" required>
            </div>

            <div class="form-group">
                <label for="scadenza_prima_rata">Scadenza Prima Rata:</label>
                <input type="date" name="scadenza_prima_rata" class="form-control" value="{{ isset($polizza) ? $polizza->scadenza_prima_rata : old('scadenza_prima_rata') }}" required>
            </div>

            <div class="form-group">
                <label for="scadenza_polizza">Scadenza Polizza:</label>
                <input type="date" name="scadenza_polizza" class="form-control" value="{{ isset($polizza) ? $polizza->scadenza_polizza : old('scadenza_polizza') }}" required>
            </div>

            <div class="form-group">
                <label for="periodicita">Periodicità:</label>
                <select name="periodicita" class="form-control" required>
                    <option value="annuale" {{ (isset($polizza) && $polizza->periodicita == 'annuale') ? 'selected' : '' }}>Annuale</option>
                    <option value="semestrale" {{ (isset($polizza) && $polizza->periodicita == 'semestrale') ? 'selected' : '' }}>Semestrale</option>
                    <option value="trimestrale" {{ (isset($polizza) && $polizza->periodicita == 'trimestrale') ? 'selected' : '' }}>Trimestrale</option>
                </select>
            </div>

            <div class="form-group">
                <label for="assicurazione_id">Assicurazione:</label>
                <select name="assicurazione_id" class="form-control" required>
                    @foreach ($assicurazioni as $assicurazione)
                        <option value="{{ $assicurazione->id }}" {{ (isset($polizza) && $polizza->assicurazione_id == $assicurazione->id) ? 'selected' : '' }}>
                            {{ $assicurazione->nome_compagnia }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">{{ isset($polizza) ? 'Modifica Polizza' : 'Salva Polizza' }}</button>
        </form>
    </div>
@endsection
