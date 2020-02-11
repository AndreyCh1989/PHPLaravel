@extends('layouts.main')

@section('menu')
    <nav class="navbar navbar-light bg-light">
        <a class="navbar-brand" href='{{ route('index') }}'>Home</a>
        <a class="navbar-brand" href="/about">About</a>
        <a class="navbar-brand" href="{{ route('categories') }}">News</a>
    </nav>
@endsection
