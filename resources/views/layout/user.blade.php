@extends('home')

@section('content')
<div class="container">
    <h2 class="mb-4 d-flex justify-content-between align-items-center">
        User List
        <a href="{{ route('register') }}" class="btn btn-primary">Add New User</a>
    </h2>

    <table class="table table-bordered table-striped">
        <thead class="table-primary">
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Name</th>
                <th>Email</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($users as $user)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $user->username }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->created_at->format('Y-m-d H:i:s') }}</td>
                    <td>{{ $user->updated_at->format('Y-m-d H:i:s') }}</td>
                    <td>
                        <a href="" class="btn btn-sm btn-warning">Edit</a>
                    </td>
                </tr>
            @empty
                <tr><td colspan="5">No user found.</td></tr>
            @endforelse
        </tbody>
    </table>

    <div class="d-flex justify-content-center">
        {{ $users->withQueryString()->links() }}
    </div>
</div>
@endsection
