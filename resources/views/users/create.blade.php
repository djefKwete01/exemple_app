@extends('layouts.app')
@section('content')
<div class="container mt-2">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left mb-2">
                <h2>Add User</h2>
            </div>
            <div class="pull-right">
                <a href="{{ route('users.index') }}" class="btn btn-primary">Back</a>
            </div>
        </div>
    </div>
    {{-- @if(session('status'))
        <div class="alert alert-success mb-1 mt-1">
            {{ session('status') }}
        </div>
    @endif --}}
<form method="POST" action="{{ route('users.store') }}">
    @csrf
  <div class="mb-3">
    <label for="name" class="form-label">Username</label>
    <input type="text" class="form-control" id="name" name="name" value="{{ @old('name') }}">
    @error('name')
        <div class="alert alert-danger mb-1 mt-1">Le champ est requis</div>
    @enderror
</div>
  <div class="mb-3">
    <label for="email" class="form-label">Email</label>
    <input type="email" class="form-control" id="email" name="email" value="{{ @old('email') }}">
    @error('email')
        <div class="alert alert-danger mb-1 mt-1">{{ $errors->first('email') }}</div>
    @enderror
    </div>
  <div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <input type="password" class="form-control" id="password" name="password">
    @error('password')
        <div class="alert alert-danger mb-1 mt-1">{{ $errors->first('password') }}</div>
    @enderror
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
@endsection