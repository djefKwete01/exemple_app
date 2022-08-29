@extends('layouts.app')

@section('title')
Mouvement
@endsection

@section('content')

<div class="container mt-2 col-6">
    @error('id')
    <div class="alert alert-danger mb-1 mt-1">{{ $errors->first('id') }}</div>
@enderror
<form method="POST" action="{{ route('ligne_mouvement.update', $ligne_mouvement) }}">
    @csrf
    @method('PUT')
    <input type="hidden" value="{{ $ligne_mouvement->id }}" required name="id">
    <div class="mb-3 form-control-sm">
        <label for="mouvement">Mouvement</label>
        <select name="mouvement" id="mouvement" class="form-control form-control-sm">
            
            <option value="{{ $ligne_mouvement->mouvement()->get()->first()->id }}" class="text-center align-baseline">{{  $ligne_mouvement->mouvement()->get()->first()->nom   }}</option>
            
            @foreach($mouvements as $mouvement)
                <option value="{{  $mouvement->id }}" class="text-center align-baseline">{{  $mouvement->nom  }}</option>
            @endforeach
        </select>
        @error('mouvement')
            <div class="alert alert-danger mb-1 mt-1">{{ $errors->first('mouvement') }}</div>
        @enderror
    </div>
    <div class="mb-3 form-control-sm">
        <label for="numSerie">Article</label>
        <select name="numSerie" id="numSerie" class="form-control form-control-sm">
            
            <option value="{{ $ligne_mouvement->numero_serie }}" class="text-center align-baseline">{{ $ligne_mouvement->article()->get()->first()->nom }} / {{ $ligne_mouvement->numero_serie }}</option>
            
            @foreach($articles as $article)

                @foreach($article->instances()->get() as $instance)
        
                    <option value="{{ $instance->numero_serie }}">

                        {{ $article->nom }} / {{ $instance->numero_serie }}

                    </option>

                @endforeach

            @endforeach

            </option>
        </select>
        @error('numSerie')
            <div class="alert alert-danger mb-1 mt-1">{{ $errors->first('numSerie') }}</div>
        @enderror
    </div>
<div class="mb-3 form-control-sm">
    <label for="quantite" class="label-control">Quantite</label><br>
    <input type="text" class="form-control form-control-sm text-center" id="quantite" name="quantite" value="{{ $ligne_mouvement->quantite }}">
    @error('quantite')
        <div class="alert alert-danger mb-1 mt-1">{{ $errors->first('quantite') }}</div>
    @enderror
</div>

  <button type="submit" class="btn btn-primary">Modifier</button>
</form>
</div>
@endsection