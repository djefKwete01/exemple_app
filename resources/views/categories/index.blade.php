@extends('layouts.categorie.app')

@section('title')
Catégories
@endsection
@section('content')
<div class="container-fluid mt-2 " style="max-width: 80%;">
    <div class="">
    <a href="{{ route('categories.create') }} " class="btn btn-success mb-2">Nouvelle catégorie</a>
    <table class="table  table-hover sm">
    <tr>
        <td class="text-center">Nom de la catégorie</td>
        <td class="text-center" colspan="2">Options</td>
    </tr>
    @foreach($categories as $category)
    <tr>
        <td class="align-middle text-center"><a href="{{ route('ListeCategorie', ["categorie" => $category->id]) }}" >{{ $category->label }}</a></td>
        <td class="align-middle text-center">
            <a href="{{ route('categories.edit', $category) }}" class="btn btn-sm btn-primary">Modifier</a>
        </td>
        <td  class="align-middle text-center">
            <form action="{{ route('categories.destroy', $category) }}" method="POST">
                @csrf
                @method('DELETE')
                <button class="btn btn-sm btn-danger" type="submit">Supprimer</button>
            </form>
        </td>
    </tr>
    @endforeach
    </table>
    {{ $categories->links() }}
    </div>
</div>
@endsection