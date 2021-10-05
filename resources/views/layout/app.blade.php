<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <style>
        body {
            min-height: 75rem;
            padding-top: 4.5rem;
        }
    </style>

    <meta name="_token" content="{{ csrf_token() }}">
</head>
<body>
<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">l'Idem</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav me-auto mb-2 mb-md-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('articles.index') }}">Articles</a>
                </li>
            </ul>
            <form class="d-flex" method="POST" action="{{ route('articles.search') }}">
                @csrf
                <input class="form-control me-2 @error('search') is-invalid @enderror" type="search" name="search" id="search" placeholder="Votre recherche" aria-label="Search" value="{{ old('search') }}">
                <button class="btn btn-outline-success" type="submit">Chercher</button>
            </form>
        </div>
    </div>
</nav>

@error('search')
<div class="container">
    <div class="alert alert-danger">{{ $message }}</div>
</div>
@enderror

<div class="container">
@yield('content')
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</body>
</html>