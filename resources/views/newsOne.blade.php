@extends('layouts.main-nav')

@section('content')
    <div style="margin-bottom: 15px">
        <h1>{{ $news['title'] }}</h1>
        <p>{{ $news['text'] }}</p>
    </div>
@endsection
