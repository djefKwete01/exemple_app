@extends('layouts.app')
@section('content')
<div class="container mt-2">
    @error('id')
        <div class="alert alert-danger mb-1 mt-1">{{ $errors->first('id') }}</div>
    @enderror

<form method="POST" action="{{ route('type_mouvement.update', $type_mouvement) }}">
    @csrf
    @method('PUT')
    <input type="hidden" value="{{ $type_mouvement->id }}" required name="id">
  <div class="mb-3">
    <label for="name" class="label-control">nom</label><input type="text" class="form-control" id="name" name="name" value="{{ $type_mouvement->nom }}">
    @error('name')
        <div class="alert alert-danger mb-1 mt-1">{{ $errors->first('name') }}</div>
    @enderror
</div>
  <button type="submit" class="btn btn-primary">Modifier</button>
</form>
</div>
@endsection