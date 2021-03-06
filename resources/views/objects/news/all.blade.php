@extends('layouts.main')

@section('content')
    @forelse ($news as $item)
        @include('objects.news.news_link')
    @empty
        <p>No news</p>
    @endforelse
    {{ $news->links() }}
@endsection
