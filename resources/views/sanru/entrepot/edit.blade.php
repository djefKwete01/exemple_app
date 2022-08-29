@extends('layouts.app')

@section('title')
Entrepots
@endsection

@section('content')

<div class="container mt-2">
    @error('id')
        <div class="alert alert-danger mb-1 mt-1">{{ $errors->first('id') }}</div>
    @enderror
<form method="POST" action="{{ route('entrepot.update', $entrepot) }}">
    @csrf
    @method('PUT')
    <input type="hidden" value="{{ $entrepot->id }}" required name="id">
  <div class="mb-3">
    <label for="name" class="label-control">nom</label><br>
    <input type="text" class="form-control text-center" id="name" name="name" value="{{ $entrepot->nom }}">
    @error('name')
        <div class="alert alert-danger mb-1 mt-1">{{ $errors->first('name') }}</div>
    @enderror
</div>
<div class="mb-3">
    <select name="localisation" id="type_entite_admin" class="form-control">
        
        {{-- Entité administrative de l'entrepot--}}

        @foreach($entrepot->entite_admin()->get() as $entiteAdmin)
          <option value="{{  $entiteAdmin->id }}" class="text-center align-baseline">
                {{  $entiteAdmin->nom }}
          </option>
        @endforeach
       
        {{-- Liste des entitées administratives --}}

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