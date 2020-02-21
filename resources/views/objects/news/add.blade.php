@extends('layouts.main')

@section('content')
    <form method="POST" action="{{ route('news.add') }}">
        @csrf
        <div class="input-group mt-3">
            <div class="input-group-prepend">
                <label class="input-group-text" for="inputGroupSelect01">Category</label>
            </div>
            <select name="category_id" class="custom-select" type="number" id="inputGroupSelect01">
                <option selected>Choose...</option>
                @foreach ($categories as $item)
                    <option value="{{ $item['id'] }}">{{ $item['name'] }}</option>
                @endforeach
            </select>
        </div>
        <div class="input-group mt-3">
            <div class="input-group-prepend">
                <span class="input-group-text">Title</span>
            </div>
            <input name="title" type="text" aria-label="name" class="form-control">
        </div>
        <div class="input-group mt-3">
            <div class="input-group-prepend">
                <span class="input-group-text">Text</span>
            </div>
            <textarea name="text" class="form-control" rows="8" aria-label="With textarea"></textarea>
        </div>
        <div class="form-check input-group mt-3">
            <input name="is_private" class="form-check-input" value="false" type="checkbox" id="defaultCheck1">
            <label class="form-check-label" for="defaultCheck1">
                Is private
            </label>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Submit</button>
    </form>
@endsection
