@extends('layouts.categorie.app')

@section('content')
<div class="container mt-2">
    <h4>Creation d'une categorie</h4>
<form method="POST" action="{{ route('categories.store') }}">
    @csrf
  <div class="mb-3">
    <input type="text" class="form-control" id="label" name="label" value="{{ @old('label') }}" placeholder="Nom de la catégorie">
    @error('label')
        <div class="alert alert-danger mb-1 mt-1">{{ $errors->first('label') }}</div>
    @enderror
</div>
  <button type="submit" class="btn btn-primary">Ajouter</button>
</form>
</div>
@endsection

@section('title')
Creation 
@endsection