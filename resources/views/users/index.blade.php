@extends('layouts.app')

@section('content')
<div class="container-fluid mt-2 " style="max-width: 80%;">
    <div class="">
        @if(Session::has('success'))

        <div class="alert alert-success">{{ $success }}</div>

        @endif
    <a href="{{ route('users.create')}} " class="btn btn-success mb-2">Créer un utilisateur</a>
    <table class="table  table-hover">
    <tr>
        <td>id</td>
        <td>name</td>
        <td>email</td>
        <td>password</td>
        <td>Options</td>
    </tr>
    @foreach($users as $user)
    <tr>
        <td>{{ $user->id }}</td>
        <td>{{ $user->name }}</td>
        <td>{{ $user->email }}</td>
        <td>{{ $user->password }}</td>
        <td>
            <a href="{{ route('users.edit', $user) }}" class="btn btn-sm btn-primary">Modifier</a>
            <form action="{{ route('users.destroy', $user) }}" method="POST">
                @csrf
                @method('DELETE')
                <button class="btn btn-sm btn-danger" type="submit">Supprimer</button>
            </form>
        </td>
    </tr>
    @endforeach
    </table>
    {{ $users->links() }}
    </div>
</div>
@endsection