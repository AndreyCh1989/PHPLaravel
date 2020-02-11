@extends('layouts.main-nav')

@section('content')
    <div style="margin-bottom: 15px">
        Choose category
    </div>
    @foreach ($categories as $category)
        <p>
            <a href="{{ route('news.getByCategory', $category['id']) }}"> {{ $category['name'] }}</a>
        </p>
    @endforeach
@endsection
