@extends('layouts.app')

@section('content')

    <h1>{{ $title }}</h1>

    <x-alert type="info">
        Welcome to the Posts page!
    </x-alert>

    @foreach ($posts as $post)
        <p>{{ $post }}</p>
    @endforeach

    <form method="POST" action="/posts/1">
        @csrf
        @method('DELETE')

        <button type="submit">Delete Post 1</button>
    </form>

@endsection