@extends('layouts.app')

@section('title')
Entrepots
@endsection

@section('content')

<div class="container mt-2">

<form method="POST" action="{{ route('entrepot.store') }}">
    @csrf
    @method('POST')
  <div class="mb-3">
    <label for="name" class="label-control">nom</label><br>
    <input type="text" class="form-control text-center" id="name" name="name" value="">
    @error('name')
        <div class="alert alert-danger mb-1 mt-1">{{ $errors->first('name') }}</div>
    @enderror
</div>
<div class="mb-3">
    <select name="localisation" id="type_entite_admin" class="form-control">
        <option value="" class="text-center align-baseline">Locatisation</option>
        @foreach($entiteAdmins as $entiteAdmin)
        <option value="{{ $entiteAdmin->id }}" class="text-center align-baseline">{{$entiteAdmin->nom  }}</option>
        @endforeach
    </select>
    @error('localisation')
        <div class="alert alert-danger mb-1 mt-1">{{ $errors->first('localisation') }}</div>
    @enderror
</div>
  <button type="submit" class="btn btn-primary">Ajouter</button>
</form>
</div>
@endsection