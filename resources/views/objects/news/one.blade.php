@extends('layouts.main')

@section('content')
    <div style="margin-bottom: 15px">
        <h1>{{ $item->title }}</h1>
        <p>{{ $item->text }}</p>
    </div>
    @include('objects.news.action_buttons')
@endsection
