@extends('layouts.app')

@section('title')
Mouvement
@endsection

@section('content')

<div class="container mt-2 col-6">
  
<form method="POST" action="{{ route('ligne_mouvement.store') }}">
    @csrf
    @method('POST')
    <div class="mb-3 form-control-sm">
        <select name="mouvement" id="mouvement" class="form-control form-control-sm">
            
            <option value="" class="text-center align-baseline">Mouvement</option>
            
            @foreach($mouvements as $mouvement)
                <option value="{{  $mouvement->id }}" class="text-center align-baseline">{{  $mouvement->nom  }}</option>
            @endforeach
        </select>
        @error('mouvement')
            <div class="alert alert-danger mb-1 mt-1">{{ $errors->first('mouvement') }}</div>
        @enderror
    </div>
    <div class="mb-3 form-control-sm">
        <select name="numSerie" id="numSerie" class="form-control form-control-sm">
            
            <option value="" class="text-center align-baseline">Article</option>
            
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
    <input type="text" class="form-control form-control-sm text-center" id="quantite" name="quantite" >
    @error('quantite')
        <div class="alert alert-danger mb-1 mt-1">{{ $errors->first('quantite') }}</div>
    @enderror
</div>

  <button type="submit" class="btn btn-primary">Ajouter</button>
</form>
</div>
@endsection