@extends('layouts.app')
@section('content')
<div class="container mt-2">
    @error('id')
        <div class="alert alert-danger mb-1 mt-1">{{ $errors->first('id') }}</div>
    @enderror

<form method="POST" action="{{ route('entite_admin.update', $entite_admin) }}">
    @csrf
    @method('PUT')
    <input type="hidden" value="{{ $entite_admin->id }}" required name="id">
  <div class="mb-3">
    <label for="name" class="label-control">nom</label><input type="text" class="form-control text-center" id="name" name="name" value="{{ $entite_admin->nom }}">
    @error('name')
        <div class="alert alert-danger mb-1 mt-1">{{ $errors->first('name') }}</div>
    @enderror
</div>
<div class="mb-3">
  <label for="type_entite_admin" class="label-control">Type d'entité administrative</label>
  <select name="type_entite_admin" class="form-control">

        @foreach($entite_admin->type_entite_admin()->get() as $typeEntiteAdmin)
          <option value="{{  $typeEntiteAdmin->id }}" class="text-center align-baseline">
                {{  $typeEntiteAdmin->nom }}
          </option>
        @endforeach
      
      @foreach($TypeEntiteAdmins as $type)
      <option value="{{ $type->id }}" class="text-center align-baseline">{{ $type->nom  }}</option>
      @endforeach
  </select>
  @error('type_entite_admin')
      <div class="alert alert-danger mb-1 mt-1">{{ $errors->first('type_entite_admin') }}</div>
  @enderror
</div>
  <button type="submit" class="btn btn-primary">Appliquer</button>
</form>
</div>
@endsection