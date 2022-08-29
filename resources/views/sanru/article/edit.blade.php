@extends('layouts.app')

@section('title')
Article
@endsection

@section('content')

<div class="container mt-2">
    @error('id')
        <div class="alert alert-danger mb-1 mt-1">{{ $errors->first('id') }}</div>
    @enderror
<form method="POST" action="{{ route('article.update', $article) }}">
    @csrf
    @method('PUT')
    <input type="hidden" value="{{ $article->id }}" required name="id">
  <div class="mb-3">
    <label for="name" class="label-control">nom</label><br>
    <input type="text" class="form-control text-center" id="name" name="name" value="{{ $article->nom }}">
    @error('name')
        <div class="alert alert-danger mb-1 mt-1">{{ $errors->first('name') }}</div>
    @enderror
</div>
<div class="mb-3">
    <select name="categorie" id="categorie" class="form-control">
        
        {{-- Categorie de --}}

        @foreach($article->categorie()->get() as $categorie)
          <option value="{{  $categorie->id }}" class="text-center align-baseline">
                {{  $categorie->nom }}
          </option>
        @endforeach
       
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