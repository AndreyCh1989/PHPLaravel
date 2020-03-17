@extends('layouts.main')

@section('content')
    <form method="POST" action="{{ route('news.resource.store') }}" class="mb-5">
        @csrf
        <div class="input-group mt-3">
            <div class="input-group-prepend">
                <span class="input-group-text">URL</span>
            </div>
            <input name="url" type="text" aria-label="name" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary mt-3">Add</button>
    </form>

    <b>Existed resources</b><br>
    @forelse ($resources as $item)
        {{ $item->url }}
        <form method="POST" action="{{ route('news.resource.destroy', $item) }}">
            @method('DELETE')
            @csrf
            <button type="submit" class="btn btn-secondary">Delete</button>
        </form><br>
    @empty
        <p>No news</p>
    @endforelse
@endsection
