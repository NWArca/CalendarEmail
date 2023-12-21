@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>{{ isset($condominio) ? 'Modifica Condominio' : 'Nuovo Condominio' }}</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ isset($condominio) ? route('condomini.update', $condominio->id) : route('condomini.store') }}">
            @csrf

            @if (isset($condominio))
                @method('PUT')
            @endif

            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" name="nome" class="form-control" value="{{ isset($condominio) ? $condominio->nome : old('nome') }}" required>
            </div>

            <div class="form-group">
                <label for="inizio_anno_condominiale">Inizio Anno Condominiale:</label>
                <input type="date" name="inizio_anno_condominiale" class="form-control" value="{{ isset($condominio) ? $condominio->inizio_anno_condominiale : old('inizio_anno_condominiale') }}" required>
            </div>

            <div class="form-group">
                <label for="fine_anno_condominiale">Fine Anno Condominiale:</label>
                <input type="date" name="fine_anno_condominiale" class="form-control" value="{{ isset($condominio) ? $condominio->fine_anno_condominiale : old('fine_anno_condominiale') }}" required>
            </div>

            <div class="form-group">
                <label for="scadenza_prima_rata">Scadenza Prima Rata:</label>
                <input type="date" name="scadenza_prima_rata" class="form-control" value="{{ isset($condominio) ? $condominio->scadenza_prima_rata : old('scadenza_prima_rata') }}" required>
            </div>

            <div class="form-group">
                <label for="scadenza_seconda_rata">Scadenza Seconda Rata:</label>
                <input type="date" name="scadenza_seconda_rata" class="form-control" value="{{ isset($condominio) ? $condominio->scadenza_seconda_rata : old('scadenza_seconda_rata') }}" required>
            </div>

            <div class="form-group">
                <label for="indirizzo">Indirizzo:</label>
                <input type="text" name="indirizzo" class="form-control" value="{{ isset($condominio) ? $condominio->indirizzo : old('indirizzo') }}" required>
            </div>

            <div class="form-group">
                <label for="codice_fiscale">Codice Fiscale:</label>
                <input type="text" name="codice_fiscale" class="form-control" value="{{ isset($condominio) ? $condominio->codice_fiscale : old('codice_fiscale') }}" maxlength="11" required>
            </div>

            <div class="form-group">
                <label for="polizza_id">Polizza:</label>
                <select name="polizza_id" class="form-control" required>
                    @foreach ($polizze as $polizza)
                        <option value="{{ $polizza->id }}" {{ (isset($condominio) && $condominio->polizza_id == $polizza->id) ? 'selected' : '' }}>
                            {{ $polizza->numero }} - {{ $polizza->assicurazione->nome_compagnia }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">{{ isset($condominio) ? 'Modifica Condominio' : 'Salva Condominio' }}</button>
        </form>
    </div>
@endsection
