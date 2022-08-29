@extends('layouts.app')

@section('title')
Mouvement
@endsection

@section('content')

<div class="container mt-2 col-6">
  
<form method="POST" action="{{ route('mouvement.store') }}">
    @csrf
    @method('POST')
    <div class="mb-3 form-control-sm">
        <select name="typeMouvement" id="article" class="form-control form-control-sm">
            
            <option value="" class="text-center align-baseline">Type de mouvement</option>
            
            @foreach($typeMouvements as $typeMouvement)
            <option value="{{  $typeMouvement->id }}" class="text-center align-baseline">{{  $typeMouvement->nom  }}</option>
            @endforeach
        </select>
        @error('typeMouvement')
            <div class="alert alert-danger mb-1 mt-1">{{ $errors->first('typeMouvement') }}</div>
        @enderror
    </div>
    <div class="mb-3 form-control-sm">
        <select name="expediteur" id="expediteur" class="form-control form-control-sm">
            
            <option value="" class="text-center align-baseline">Expediteur</option>
            
            @foreach($entrepots as $entrepot)
            <option value="{{ $entrepot->id }}" class="text-center align-baseline">{{  $entrepot->nom  }}</option>
            @endforeach
        </select>
        @error('expediteur')
            <div class="alert alert-danger mb-1 mt-1">{{ $errors->first('expediteur') }}</div>
        @enderror
    </div>
    <div class="mb-3 form-control-sm">
        <select name="beneficiaire" id="beneficiaire" class="form-control form-control-sm">
            
            <option value="" class="text-center align-baseline">Beneficiaire</option>
            
            @foreach($entrepots as $entrepot)
            <option value="{{ $entrepot->id }}" class="text-center align-baseline">{{  $entrepot->nom  }}</option>
            @endforeach
        </select>
        @error('beneficiaire')
            <div class="alert alert-danger mb-1 mt-1">{{ $errors->first('beneficiaire') }}</div>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary form-control f">Ajouter</button>
</form>
</div>
@endsection