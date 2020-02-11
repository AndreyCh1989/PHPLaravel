@extends('layouts.main-nav')

@section('content')
    <div style="margin-bottom: 15px">
        {{ $category['name'] }} News
    </div>
    @foreach ($news as $n)
        <p>
            <a href="{{ route('news.one', $n['id']) }}"> {{ $n['title'] }}</a>
        </p>
    @endforeach
@endsection
