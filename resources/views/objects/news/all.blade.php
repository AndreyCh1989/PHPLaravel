@extends('layouts.main')

@section('content')
    <div style="margin-bottom: 15px">
        {{ $category->name }} News
    </div>
    @forelse ($news as $item)
        <p>
            <a href="{{ route('news.one', $item->id) }}"> {{ $item->title }}</a>
        </p>
    @empty
        <p>No news</p>
    @endforelse
@endsection
