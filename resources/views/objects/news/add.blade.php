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
                <option value="{{ $item->id }}"
                        @if (old('category_id') == $item->id)
                            selected
                        @elseif (isset($category_id) && $category_id == $item->id)
                            selected
                        @endif>
                    {{ $item->name }}
                </option>
            @endforeach
        </select>
    </div>
    @error('category_id')
        <div class="alert alert-danger" role="alert">
            {{ $message }}
        </div>
    @enderror
    <div class="input-group mt-3">
        <div class="input-group-prepend">
            <span class="input-group-text">Title</span>
        </div>
        <input name="title" type="text" aria-label="name" class="form-control"
               @if (old('title'))
                   value="{{ old('title') }}"
               @elseif (isset($news))
                   value="{{ $news->title }}"
               @endif>
    </div>
    @error('title')
        <div class="alert alert-danger" role="alert">
            {{ $message }}
        </div>
    @enderror
    <div class="input-group mt-3">
        <div class="input-group-prepend">
            <span class="input-group-text">Text</span>
        </div>
        <textarea id="text-area" name="text" class="form-control" rows="8" aria-label="With textarea">@if (old('text')){{ old('text') }}@elseif (isset($news)){{ $news->text }}@endif</textarea>
    </div>
    @error('text')
        <div class="alert alert-danger" role="alert">
            {{ $message }}
        </div>
    @enderror
    <div class="form-check input-group mt-3">
        <input type="hidden" name="is_private" value="0" />
        <input name="is_private" class="form-check-input"
               @if (old('is_private') == true)
                   checked
               @elseif (isset($news) && $news->is_private == true)
                   checked
               @endif
               value="1" type="checkbox" id="defaultCheck1">
        <label class="form-check-label" for="defaultCheck1">
            Is private
        </label>
    </div>
    <button type="submit" class="btn btn-primary mt-3">Submit</button>
    <script>
        let options = {
            filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
            filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
            filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
            filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
        };
        CKEDITOR.create(document.querySelector('#text-area'), options);
    </script>
</form>
@endsection
