@extends('layouts.app')

@section('title')
Entité administrative
@endsection
@section('content')

<div class="container-fluid mt-2 " style="max-width: 80%;">
    <div class="">
    <a href="{{ route('type_entite_admin.create') }} " class="btn btn-success mb-2">Ajouter</a>
    <table class="table  table-hover sm">
    <tr>
        <th class="text-center">Nom</th>
        <th class="text-center" colspan="2">Options</th>
    </tr>
    @foreach($typeEntiteAdmins as $type)
    <tr>
        <td class="align-middle text-center"><a href="{{-- route('ListeCategorie',["categorie"=>$type->id]) --}}" >{{ $type->nom }}</a></td>
        <td class="align-middle text-center">
            <a href="{{ route('type_entite_admin.edit',$type) }}" class="btn btn-sm btn-primary">Modifier</a>
        </td>
        <td  class="align-middle text-center">
            <form action="{{ route('type_entite_admin.destroy',$type) }}" method="POST">
                @csrf
                @method('DELETE')
                <button class="btn btn-sm btn-danger" type="submit">Supprimer</button>
            </form>
        </td>
    </tr>
    @endforeach
    </table>
    {{ $typeEntiteAdmins->links() }}
    </div>
</div>
@endsection