@extends('layouts.categorie.app')

@section('title')
Modification de la Catégorie
@endsection

@section('content')
<div class="container mt-2">
    <h4>Creation d'une categorie</h4>
<form method="POST" action="{{ route('categories.update',$category) }}">
    @csrf
    @method('PUT')

    @error('id')
        <div class="alert alert-danger mb-1 mt-1">{{ $errors->first('id') }}</div>
    @enderror
    <input type="hidden" id="id" name="id" value="{{ $category->id }}">
  <div class="mb-3">
    <input type="text" class="form-control" id="label" name="label" value="{{ $category->label }}" >
    @error('name')
        <div class="alert alert-danger mb-1 mt-1"></div>
    @enderror
</div>
  <button type="submit" class="btn btn-primary">Modifier</button>
</form>
</div>
@endsection