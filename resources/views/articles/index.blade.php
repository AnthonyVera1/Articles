@extends('layout.app')

@section('title', 'Nos derniers articles')

@section('content')
<h2 class="pb-2 border-bottom">Nos derniers articles</h2>

<div class="row row-cols-1 row-cols-lg-3 align-items-stretch g-4 py-5">
    @foreach( $articles as $article )
        <div class="col">
            <a href="{{ route('articles.show', $loop->iteration) }}" style="text-decoration: none;">
            <div class="card card-cover h-100 overflow-hidden text-white bg-dark rounded-5 shadow-lg" style="background-image: url('{{ $article['urlToImage'] }}'); background-size: cover">
                <div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1">

                    <h2 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold">
                        {{ $article['title'] }}
                    </h2>
                    <ul class="d-flex list-unstyled mt-auto">
                        <li class="me-auto">
                            <img src="https://github.com/twbs.png" alt="Bootstrap" width="32" height="32" class="rounded-circle border border-white">
                        </li>
                        <li class="d-flex align-items-center me-3">
                            <svg class="bi me-2" width="1em" height="1em"><use xlink:href="#geo-fill"></use></svg>
                            <small>{{ $article['source']['name'] }}</small>
                        </li>
                        <li class="d-flex align-items-center">
                            <svg class="bi me-2" width="1em" height="1em"><use xlink:href="#calendar3"></use></svg>
                            <small>{{ $article['publishedAt'] }}</small>
                        </li>
                    </ul>
                </div>
            </div>
            </a>
        </div>
    @endforeach

</div>
@endsection