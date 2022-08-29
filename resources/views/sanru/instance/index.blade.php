@extends('layouts.app')

@section('title')
Article
@endsection
@section('content')

<div class="container-fluid mt-2 " style="max-width: 80%;">
    <div class="">
    <a href="{{ route('instance.create') }} " class="btn btn-success mb-2">Ajouter</a>
    <table class="table  table-hover sm">
    <tr>
        <th class="text-center">Nom</th>
        <th class="text-center">Numero de serie</th>
        <th class="text-center">Utilisable</th>
        <th class="text-center">Status</th>
        <th class="text-center">Localisation</th>
        <th class="text-center" colspan="2">Options</th>
    </tr>
    @foreach($instances as $instance)
    <tr>
        <td class="align-middle text-center h5">
                @foreach($instance->article()->get() as $article)
                    {{  Str::upper($article->categorie()->first()->nom)   }}  /  {{  Str::upper($article->nom)  }}
                @endforeach 
        </td>
        <td class="align-middle text-center"><a href="" >{{ $instance->numero_serie }}</a></td>
        <td class="align-middle text-center">
            @if($instance->utilisable)
                Oui 
            @else
                Non
            @endif
        </td>
        <td class="align-middle text-center"><a href="" >{{ $instance->status }}</a></td>
        
        <td class="align-middle text-center">
            <a href="#">
                @foreach($instance->entrepot()->get() as $entrepot)
                    {{  $entrepot->nom }}
                @endforeach
            </a> 
        </td>
        
        <td class="align-middle text-center">
            <a href="{{ route('instance.edit',$instance) }}" class="btn btn-sm btn-primary">Modifier</a>
        </td>
        <td  class="align-middle text-center">
            <form action="{{ route('instance.destroy',$instance) }}" method="POST">
                @csrf
                @method('DELETE')
                <button class="btn btn-sm btn-danger" type="submit" onsubmit="">Supprimer</button>
            </form>
        </td>
    </tr>
    @endforeach
    </table>
    {{ $instances->links() }}
    </div>
</div>
@endsection