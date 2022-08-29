@extends('layouts.app')
@section('content')
<div class="container mt-2">
    

<form method="POST" action="{{ route('type_mouvement.store') }}">
    @csrf
    @method('POST')
  <div class="mb-3">
    <label for="name" class="label-control">nom</label><input type="text" class="form-control" id="name" name="name" value="">
    @error('name')
        <div class="alert alert-danger mb-1 mt-1">{{ $errors->first('name') }}</div>
    @enderror
</div>
  <button type="submit" class="btn btn-primary">Ajouter</button>
</form>
</div>
@endsection