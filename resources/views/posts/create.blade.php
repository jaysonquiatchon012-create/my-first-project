@extends('layouts.app')

@section('content')

    <h1>Create Post</h1>

    <form method="POST" action="/posts">
        @csrf

        <label>Post Title:</label>
        <input type="text" name="title">

        <button type="submit">Save Post</button>
    </form>

@endsection