@extends('layout.app')

@section('title', $article['title'])

@section('content')
    <div class="card bg-dark text-white">
        <img src="{{ $article['urlToImage'] }}" class="card-img img-fluid" alt="{{ $article['title'] }}" />
        <div class="card-img-overlay">
            <h1 class="card-title">{{ $article['title'] }}</h1>
            <p class="card-text">{{ $article['description'] }}</p>
            <p class="card-text">{{ $article['publishedAt'] }}</p>
        </div>
    </div>

    {{ $article['content'] }}

    <div class="d-flex justify-content-center align-items-center mt-5">
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <li class="page-item"><a class="page-link" href="{{ route('articles.navigate', ['id' => $id, 'left']) }}">Précédent</a></li>

                <li class="page-item"><a class="page-link" href="{{ route('articles.navigate', ['id' => $id, 'right']) }}">Suivant</a></li>
            </ul>
        </nav>
    </div>

@endsection