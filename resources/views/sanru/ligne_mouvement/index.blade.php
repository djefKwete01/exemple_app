@extends('layouts.app')

@section('title')
Mouvement
@endsection
@section('content')

<div class="container-fluid mt-2 " style="max-width: 80%;">
    <div class="">
    <a href="{{ route('ligne_mouvement.create') }} " class="btn btn-success mb-2">Ajouter</a>
    <table class="table  table-hover sm">
    <tr>
        <th class="text-center">Mouvement</th>
        <th class="text-center">Article</th>
        <th class="text-center">Quantite</th>
        <th class="text-center" colspan="2">Options</th>
    </tr>
    @foreach($ligneMouvements as $ligne)
    <tr>
        <td class="align-middle text-center">
            <a href="" class="btn btn-info" >
                {{ $ligne->mouvement()->get()->first()->nom }}
            </a>
        </td>
        <td class="align-middle text-center h5">
            @foreach($ligne->article()->get() as $article)
                {{  $article->nom  }} / {{ $ligne->numero_serie }}
            @endforeach
        </td>
        <td class="align-middle text-center">
            {{  $ligne->quantite  }}
        </td>

        <td class="align-middle text-center">
            <a href="{{ route('ligne_mouvement.edit',$ligne) }}" class="btn btn-sm btn-primary">Modifier</a>
        </td>
        <td  class="align-middle text-center">
            <form action="{{ route('ligne_mouvement.destroy',$ligne) }}" method="POST">
                @csrf
                @method('DELETE')
                <button class="btn btn-sm btn-danger" type="submit" onsubmit="">Supprimer</button>
            </form>
        </td>
    </tr>
    @endforeach
    </table>
    {{ $ligneMouvements->links() }}
    </div>
</div>
@endsection