@extends('layouts.main')

@section('content')
    <form method="POST" action="{{ route('user.update', $user) }}">
        @method('PUT')
        @csrf
        <input type="hidden" name="user_id" value="{{ $user->id }}" />
        <div class="input-group mt-3">
            <div class="input-group-prepend">
                <span class="input-group-text">Name</span>
            </div>
            <input name="name" type="text" aria-label="name" class="form-control"
               @if (old('name'))
                   value="{{ old('name') }}"
               @elseif (isset($user))
                   value="{{ $user->name }}"
            @endif>
        </div>
        @error('name')
        <div class="alert alert-danger" role="alert">
            {{ $message }}
        </div>
        @enderror

        <div class="input-group mt-3">
            <div class="input-group-prepend">
                <span class="input-group-text">Email</span>
            </div>
            <input name="email" type="text" aria-label="name" class="form-control"
               @if (old('email'))
                   value="{{ old('email') }}"
               @elseif (isset($user))
                   value="{{ $user->email }}"
            @endif>
        </div>
        @error('email')
        <div class="alert alert-danger" role="alert">
            {{ $message }}
        </div>
        @enderror

        @if(Auth::user() == $user)
        <div class="input-group mt-3">
            <div class="input-group-prepend">
                <span class="input-group-text">Old Password</span>
            </div>
            <input type="password" class="form-control" name="old_password" autocomplete="new-password">
        </div>
        @error('old_password')
            <div class="alert alert-danger" role="alert">
                {{ $message }}
            </div>
        @enderror

        <div class="input-group mt-3">
            <div class="input-group-prepend">
                <span class="input-group-text">Password</span>
            </div>
            <input id="password" type="password" class="form-control" name="password" autocomplete="new-password">
        </div>
        @error('password')
            <div class="alert alert-danger" role="alert">
                {{ $message }}
            </div>
        @enderror

        <div class="input-group mt-3">
            <div class="input-group-prepend">
                <span class="input-group-text">Confirm Password</span>
            </div>
            <input type="password" class="form-control" name="password_confirmation" autocomplete="new-password">
        </div>
        @endif

        <div class="form-check input-group mt-3">
            <input type="hidden" name="is_admin" value="0" />
            <input name="is_admin" class="form-check-input"
                   @if (old('is_admin') == true)
                   checked
                   @elseif (isset($user) && $user->is_admin == true)
                   checked
                   @endif
                   value="1" type="checkbox" id="defaultCheck1">
            <label class="form-check-label" for="defaultCheck1">
                Is Admin
            </label>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Submit</button>
    </form>
@endsection
