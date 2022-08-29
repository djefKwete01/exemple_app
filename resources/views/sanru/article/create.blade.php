@extends('layouts.app')

@section('title')
Article
@endsection

@section('content')

<div class="container mt-2">
  
<form method="POST" action="{{ route('article.store') }}">
    @csrf
    @method('POST')
  <div class="mb-3">
    <label for="name" class="label-control">nom</label><br>
    <input type="text" class="form-control text-center" id="name" name="name" >
    @error('name')
        <div class="alert alert-danger mb-1 mt-1">{{ $errors->first('name') }}</div>
    @enderror
</div>
<div class="mb-3">
    <select name="categorie" id="categorie" class="form-control">
        
        <option value="" class="text-center align-baseline">Selectionez la categorie</option>
        {{-- Liste des categories --}}
        
        @foreach($categories as $categorie)
        <option value="{{  $categorie->id }}" class="text-center align-baseline">{{  $categorie->nom  }}</option>
        @endforeach
    </select>
    @error('categorie')
        <div class="alert alert-danger mb-1 mt-1">{{ $errors->first('categorie') }}</div>
    @enderror
</div>
  <button type="submit" class="btn btn-primary">Ajouter</button>
</form>
</div>
@endsection