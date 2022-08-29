@extends('layouts.app')

@section('title')
Articles
@endsection
@section('content')

<div class="container-fluid mt-2 " style="max-width: 80%;">
    <div class="">
    <a href="{{ route('article.create') }} " class="btn btn-success mb-2">Ajouter</a>
    <table class="table  table-hover sm">
    <tr>
        <th class="text-center">Nom</th>
        <th class="text-center">Catégories</th>
        <th class="text-center" colspan="2">Options</th>
    </tr>
    @foreach($articles as $article)
    <tr>
        <td class="align-middle text-center"><a href="{{ route('article.show',$article) }}" >{{ $article->nom }}</a></td>
        <td class="align-middle text-center"><a href="{{-- route('ListeCategorie',["categorie"=>$type->id]) --}}" >
           @foreach($article->categorie()->get() as $categorie)
                {{  $categorie->nom }}
            @endforeach
        </a></td>
        <td class="align-middle text-center">
            <a href="{{ route('article.edit',$article) }}" class="btn btn-sm btn-primary">Modifier</a>
        </td>
        <td  class="align-middle text-center">
            <form action="{{ route('article.destroy',$article) }}" method="POST">
                @csrf
                @method('DELETE')
                <button class="btn btn-sm btn-danger" type="submit" onsubmit="">Supprimer</button>
            </form>
        </td>
    </tr>
    @endforeach
    </table>
    {{ $articles->links() }}
    </div>
</div>
@endsection