@extends('layout.app')

@section('title', 'Article n°' . $numero)

@section('content')
    <p>C'est l'article n°{{ $numero }}</p>
@endsection