@extends('layouts.app')

@section('title')
Article
@endsection

@section('content')

<div class="container mt-2 col-6">
  
<form method="POST" action="{{ route('instance.store') }}">
    @csrf
    @method('POST')
    <div class="mb-3 form-control-sm">
        <select name="article" id="article" class="form-control form-control-sm">
            
            <option value="" class="text-center align-baseline">Marque de l'article</option>
            
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
    <input type="text" class="form-control form-control-sm text-center" id="serie" name="numSerie" >
    @error('numSerie')
        <div class="alert alert-danger mb-1 mt-1">{{ $errors->first('numSerie') }}</div>
    @enderror
</div>
<div class="mb-3 form-control-sm">
    <select name="utilisable" id="utilisable" class="form-control text-center form-control-sm">
        <option value="">Utilisable</option>
        <option value="1">0ui</option>
        <option value="0">Non</option>
    </select>
    @error('utilisable')
        <div class="alert alert-danger mb-1 mt-1">{{ $errors->first('utilisable') }}</div>
    @enderror
</div>
<div class="mb-3 form-control-sm">
    <label for="status" class="label-control">Status</label><br>
    <input type="text" class="form-control text-center form-control-sm" id="" name="status" >
    @error('status')
        <div class="alert alert-danger mb-1 mt-1">{{ $errors->first('status') }}</div>
    @enderror
</div>
<div class="mb-3 form-control-sm">
    <select name="entrepot" id="entrepot" class="form-control form-control-sm">
        
        <option value="" class="text-center align-baseline">Selectionez l'entrepot</option>
        
        @foreach($entrepots as $entrepot)
        <option value="{{  $entrepot->id }}" class="text-center align-baseline">{{  $entrepot->nom  }}</option>
        @endforeach
    </select>
    @error('entrepot')
        <div class="alert alert-danger mb-1 mt-1">{{ $errors->first('entrepot') }}</div>
    @enderror
</div>
  <button type="submit" class="btn btn-primary">Ajouter</button>
</form>
</div>
@endsection