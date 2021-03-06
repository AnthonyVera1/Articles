{{-- @extends('layouts.app')
 
 @section('title', 'Article #' . $id)
  
 @section('content')
  <h1>Article #{{ $id }}</h1>
  <a href="{{route('articles.show',$id+1)}}">Suivant</a>
  @if ($id > 1)
  <a href="{{route('articles.show',$id-1)}}">Précédent</a> 
  @endif
  <a href="{{ route('articles.index') }}" title="Liste des articles">Retour aux articles</a>
 @endsection --}}
  
 @extends('layouts.app')
  
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