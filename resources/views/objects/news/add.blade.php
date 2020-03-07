@extends('layouts.main')

@section('content')
    @if (isset($news))
        <form method="POST" action="{{ route('news.update', $news) }}">
        @method('PUT')
    @else
        <form method="POST" action="{{ route('news.store') }}">
    @endif
    @csrf
    <div class="input-group mt-3">
        <div class="input-group-prepend">
            <label class="input-group-text" for="inputGroupSelect01">Category</label>
        </div>
        <select name="category_id" class="custom-select" type="number" id="inputGroupSelect01">
            @foreach ($categories as $item)
                <option value="{{ $item->id }}" @if (isset($category_id) && $category_id == $item->id) selected @endif>{{ $item->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="input-group mt-3">
        <div class="input-group-prepend">
            <span class="input-group-text">Title</span>
        </div>
        <input name="title" type="text" aria-label="name" class="form-control" @if (isset($news)) value="{{ $news->title }}" @endif>
    </div>
    <div class="input-group mt-3">
        <div class="input-group-prepend">
            <span class="input-group-text">Text</span>
        </div>
        <textarea name="text" class="form-control" rows="8" aria-label="With textarea">@if (isset($news)) {{ $news->text }} @endif</textarea>
    </div>
    <div class="form-check input-group mt-3">
        <input name="is_private" class="form-check-input" @if (isset($news) && $news->is_private == true) checked @endif value="1" type="checkbox" id="defaultCheck1">
        <label class="form-check-label" for="defaultCheck1">
            Is private
        </label>
    </div>
    <button type="submit" class="btn btn-primary mt-3">Submit</button>
</form>
@endsection
