@extends('layouts.main')

@section('content')
    <div class="alert alert-primary" role="alert">
        Hello
        @guest
            Guest!
        @else
            {{ Auth::user()->name }}!
        @endguest
    </div>
@endsection
