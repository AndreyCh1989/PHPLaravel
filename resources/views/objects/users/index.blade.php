@extends('layouts.main')

@section('content')
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">is Admin</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
            @forelse ($users as $user)
                <tr>
                    <td>{{ array_search($user->toArray(), $users->toArray()) + 1 }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        @if ($user->is_admin)
                            Yes
                        @else
                            No
                        @endif
                    </td>
                    <td><a href="{{ route('user.edit', $user) }}"><button type="button" class="btn btn-secondary">Edit</button></a></td>
                </tr>
            @empty
                <p>No users</p>
            @endforelse
        </tbody>
    </table>
@endsection
