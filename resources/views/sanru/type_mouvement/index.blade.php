@extends('layouts.app')

@section('title')
Type Mouvement
@endsection
@section('content')

<div class="container-fluid mt-2 " style="max-width: 80%;">
    <div class="">
    <a href="{{ route('type_mouvement.create') }} " class="btn btn-success mb-2">Ajouter</a>
    <table class="table  table-hover sm">
    <tr>
        <th class="text-center">Nom</th>
        <th class="text-center" colspan="2">Options</th>
    </tr>
    @foreach($typeMouvements as $type)
    <tr>
        <td class="align-middle text-center"><a href="{{-- route('ListeCategorie',["categorie"=>$type->id]) --}}" >{{ $type->nom }}</a></td>
        <td class="align-middle text-center">
            <a href="{{ route('type_mouvement.edit',$type) }}" class="btn btn-sm btn-primary">Modifier</a>
        </td>
        <td  class="align-middle text-center">
            <form action="{{ route('type_mouvement.destroy',$type) }}" method="POST">
                @csrf
                @method('DELETE')
                <button class="btn btn-sm btn-danger" type="submit">Supprimer</button>
            </form>
        </td>
    </tr>
    @endforeach
    </table>
    {{ $typeMouvements->links() }}
    </div>
</div>
@endsection