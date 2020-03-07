@extends('layouts.main')

@section('content')
    <div style="margin-bottom: 15px">
        Choose category
    </div>
    @forelse ($categories as $category)
        <p>
            <a href="{{ route('news.getByCategory', $category) }}"> {{ $category->name }}</a>
        </p>
    @empty
        <p>No categories</p>
    @endforelse
@endsection
