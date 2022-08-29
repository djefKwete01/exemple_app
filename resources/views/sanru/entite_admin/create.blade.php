@extends('layouts.app')

@section('content')

<div class="container mt-2">
    @error('id')
        <div class="alert alert-danger mb-1 mt-1">{{ $errors->first('id') }}</div>
    @enderror

<form method="POST" action="{{ route('entite_admin.store') }}">
    @csrf
    @method('POST')
  <div class="mb-3">
    <label for="name" class="label-control">nom</label><br>
    <input type="text" class="form-control" id="name" name="name" value="">
    @error('name')
        <div class="alert alert-danger mb-1 mt-1">{{ $errors->first('name') }}</div>
    @enderror
</div>
<div class="mb-3">
    <select name="type_entite_admin" id="type_entite_admin" class="form-control">
        <option value="Type'entité Administrative" class="text-center align-baseline">Type d'entité Administrative</option>
        @foreach($TypeEntiteAdmins as $type)
        <option value="{{ $type->id }}" class="text-center align-baseline">{{$type->nom  }}</option>
        @endforeach
    </select>
    @error('type_entite_admin')
        <div class="alert alert-danger mb-1 mt-1">{{ $errors->first('type_entite_admin') }}</div>
    @enderror
</div>
  <button type="submit" class="btn btn-primary">Ajouter</button>
</form>
</div>
@endsection