@extends('layouts.app')
@section('content')
<div class="container mt-2">
    @error('id')
        <div class="alert alert-danger mb-1 mt-1">{{ $errors->first('id') }}</div>
    @enderror

<form method="POST" action="{{ route('categorie.update', $categorie) }}">
    @csrf
    @method('PUT')
    <input type="hidden" value="{{ $categorie->id }}" required name="id">
  <div class="mb-3">
    <label for="name" class="label-control">Nom de la categorie</label><input type="text" class="form-control" id="name" name="name" value="{{ $categorie->nom }}">
    @error('name')
        <div class="alert alert-danger mb-1 mt-1">{{ $errors->first('name') }}</div>
    @enderror
</div>
  <button type="submit" class="btn btn-primary">Modifier</button>
</form>
</div>
@endsection