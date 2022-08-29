@extends('layouts.app')

@section('title')
Entrepots
@endsection
@section('content')

<div class="container-fluid mt-2 " style="max-width: 80%;">
    <div class="">
    <a href="{{ route('entrepot.create') }} " class="btn btn-success mb-2">Ajouter</a>
    <table class="table  table-hover sm">
    <tr>
        <th class="text-center">Nom</th>
        <th class="text-center">Localisation</th>
        <th class="text-center" colspan="2">Options</th>
    </tr>
    @foreach($entrepots as $entrepot)
    <tr>
        <td class="align-middle text-center"><a href="{{-- route('ListeCategorie',["categorie"=>$type->id]) --}}" >{{ $entrepot->nom }}</a></td>
        <td class="align-middle text-center"><a href="{{-- route('ListeCategorie',["categorie"=>$type->id]) --}}" >
           @foreach($entrepot->entite_admin()->get() as $entiteAdmin)
                {{  $entiteAdmin->nom }}
            @endforeach
        </a></td>
        <td class="align-middle text-center">
            <a href="{{ route('entrepot.edit',$entrepot) }}" class="btn btn-sm btn-primary">Modifier</a>
        </td>
        <td  class="align-middle text-center">
            <form action="{{ route('entrepot.destroy',$entrepot) }}" method="POST">
                @csrf
                @method('DELETE')
                <button class="btn btn-sm btn-danger" type="submit" onsubmit="">Supprimer</button>
            </form>
        </td>
    </tr>
    @endforeach
    </table>
    {{ $entrepots->links() }}
    </div>
</div>
@endsection