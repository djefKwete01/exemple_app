@extends('layouts.app')

@section('title')
Entité administrative
@endsection
@section('content')

<div class="container-fluid mt-2 " style="max-width: 80%;">
    <div class="">
    <a href="{{ route('entite_admin.create') }} " class="btn btn-success mb-2">Ajouter</a>
    <table class="table  table-hover sm">
    <tr>
        <th class="text-center">Nom</th>
        <th class="text-center">Type d'entité administrative</th>
        <th class="text-center" colspan="2">Options</th>
    </tr>
    @foreach($EntiteAdmins as $entite)
    <tr>
        <td class="align-middle text-center"><a href="{{-- route('ListeCategorie',["categorie"=>$type->id]) --}}" >{{ $entite->nom }}</a></td>
        <td class="align-middle text-center"><a href="{{-- route('ListeCategorie',["categorie"=>$type->id]) --}}" >
           @foreach($entite->type_entite_admin()->get() as $typeEntiteAdmin)
                {{  $typeEntiteAdmin->nom }}
            @endforeach
        </a></td>
        <td class="align-middle text-center">
            <a href="{{ route('entite_admin.edit',$entite) }}" class="btn btn-sm btn-primary">Modifier</a>
        </td>
        <td  class="align-middle text-center">
            <form action="{{ route('entite_admin.destroy',$entite) }}" method="POST">
                @csrf
                @method('DELETE')
                <button class="btn btn-sm btn-danger" type="submit">Supprimer</button>
            </form>
        </td>
    </tr>
    @endforeach
    </table>
    {{ $EntiteAdmins->links() }}
    </div>
</div>
@endsection