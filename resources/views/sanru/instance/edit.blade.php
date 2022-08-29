@extends('layouts.app')

@section('title')
Article
@endsection

@section('content')

<div class="container mt-2 col-6">
    @error('id')
        <div class="alert alert-danger mb-1 mt-1">{{ $errors->first('id') }}</div>
    @enderror
<form method="POST" action="{{ route('instance.update', $instance) }}">
    
    @csrf
    @method('PUT')
    <input type="hidden" value="{{ $instance->id }}" required name="id">
    <div class="mb-3 form-control-sm">
        <label for="article">Marque de l'article</label>
        <select name="article" id="article" class="form-control form-control-sm">
            
            @foreach($instance->article()->get() as $article)
                <option value="{{  $article->id }}" class="text-center align-baseline">
                        {{  $article->nom }}
                </option>
            @endforeach

            @foreach($articles as $article)
            <option value="{{  $article->id }}" class="text-center align-baseline">{{  $article->nom  }}</option>
            @endforeach
        </select>
        @error('article')
            <div class="alert alert-danger mb-1 mt-1">{{ $errors->first('article') }}</div>
        @enderror
    </div>
<div class="mb-3 form-control-sm">
    <label for="numSerie" class="label-control">Numero de serie</label><br>
    <input type="text" class="form-control form-control-sm text-center" id="numSerie" name="numSerie" value="{{ $instance->numero_serie }}" >
    @error('numSerie')
        <div class="alert alert-danger mb-1 mt-1">{{ $errors->first('numSerie') }}</div>
    @enderror
</div>
<div class="mb-3 form-control-sm">
    <select name="utilisable" id="utilisable" class="form-control text-center form-control-sm">
        <option value="{{ $instance->utilisable }}">
            @if($instance->utilisable)
                Oui
            @else
                Non
            @endif
        </option>
        <option value="1">0ui</option>
        <option value="0">Non</option>
    </select>
    @error('utilisable')
        <div class="alert alert-danger mb-1 mt-1">{{ $errors->first('utilisable') }}</div>
    @enderror
</div>
<div class="mb-3 form-control-sm">
    <label for="status" class="label-control">Status</label><br>
    <input type="text" class="form-control text-center form-control-sm" id="" name="status" value="{{ $instance->status }}" >
    @error('status')
        <div class="alert alert-danger mb-1 mt-1">{{ $errors->first('status') }}</div>
    @enderror
</div>
<div class="mb-3 form-control-sm">
    <label for="entrepot">Entrepot</label>
    <select name="entrepot" id="entrepot" class="form-control form-control-sm">
        
        @foreach($instance->entrepot()->get() as $entrepot)
                <option value="{{  $entrepot->id }}" class="text-center align-baseline">
                        {{  $entrepot->nom }}
                </option>
        @endforeach

        @foreach($entrepots as $entrepot)
            <option value="{{  $entrepot->id }}" class="text-center align-baseline">{{  $entrepot->nom  }}</option>
        @endforeach
    </select>
    @error('entrepot')
        <div class="alert alert-danger mb-1 mt-1">{{ $errors->first('entrepot') }}</div>
    @enderror
</div>
  <button type="submit" class="btn btn-primary">Modifier</button>
</form>
</div>
@endsection