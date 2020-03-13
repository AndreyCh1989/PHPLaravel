@extends('layouts.main')

@section('content')
    <div style="margin-bottom: 15px">
        Category: {{ $category->name }}
    </div>
    @forelse ($news as $item)
        @include('objects.news.news_link')
    @empty
        <p>No news</p>
    @endforelse
    {{ $news->links() }}
@endsection
