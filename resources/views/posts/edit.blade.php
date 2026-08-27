@extends('layouts.app')

@section('content')

    <h1>Edit Post {{ $post }}</h1>

    <form method="POST" action="/posts/{{ $post }}">
        @csrf
        @method('PUT')

        <label>Post Title:</label>
        <input type="text" name="title">

        <button type="submit">Update Post</button>
    </form>

@endsection