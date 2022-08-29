<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="app.css">
    <!-- Bootstrap CSS -->
    <link href="{{asset('bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('mystyle/js/app.css')}}">
    
    @yield('script')

    <title>@yield('title')</title>
</head>
<body>
    @include('sweetalert::alert')
</body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('type_entite_admin.index') }}">Type d'entité administrative</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('entite_admin.index') }}">Entité administrative</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('entrepot.index') }}">Entrepots</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('categorie.index') }}">Categories</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('article.index') }}">Articles</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('instance.index') }}">Instance</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('type_mouvement.index') }}">TypeMouvement</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('mouvement.index') }}">Mouvement</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('ligne_mouvement.index') }}">Ligne Mouvement</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
    @yield('content')

    <script src="{{asset('bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('mystyle/js/main.js')}}"></script>
    <script src="{{asset('mystyle/js/jquery-3.6.0.min.js')}}"></script>
</html>