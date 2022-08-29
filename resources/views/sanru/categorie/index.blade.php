@extends('layouts.app')

@section('title')
Categorie
@endsection
@section('content')

<div class="container-fluid mt-2 " style="max-width: 80%;">
    <div class="">
    <a href="{{ route('categorie.create') }} " class="btn btn-success mb-2">Ajouter</a>
    <table class="table  table-hover sm">
    <tr>
        <th class="text-center">Categories des articles</th>
        <th class="text-center" colspan="2">Options</th>
    </tr>
    @foreach($categories as $categorie)
    <tr>
        <td class="align-middle text-center"><a href="{{-- route('ListeCategorie',["categorie"=>$type->id]) --}}" >{{ $categorie->nom }}</a></td>
        <td class="align-middle text-center">
            <a href="{{ route('categorie.edit',$categorie) }}" class="btn btn-sm btn-primary">Modifier</a>
        </td>
        <td  class="align-middle text-center">
            <form action="{{ route('categorie.destroy',$categorie) }}" method="POST">
                @csrf
                @method('DELETE')
                <button class="btn btn-sm btn-danger" type="submit" onsubmit="">Supprimer</button>
            </form>
        </td>
    </tr>
    @endforeach
    </table>
    {{ $categories->links() }}
    </div>
</div>
@endsection