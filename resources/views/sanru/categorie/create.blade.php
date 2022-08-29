@extends('layouts.app')

@section('title')
Categories
@endsection
@section('content')
<div class="container mt-2">

<form method="POST" action="{{ route('categorie.store') }}">
    @csrf
    @method('POST')
    <input type="hidden" value="" required name="id">
  <div class="mb-3">
    <label for="name" class="label-control">Nom categorie</label><input type="text" class="form-control" id="name" name="name" value="">
    @error('name')
        <div class="alert alert-danger mb-1 mt-1">{{ $errors->first('name') }}</div>
    @enderror
</div>
  <button type="submit" class="btn btn-primary">Ajouter</button>
</form>
</div>
@endsection