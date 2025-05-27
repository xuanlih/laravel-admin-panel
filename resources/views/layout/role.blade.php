@extends('home')

@section('content')
<div class="container">
    <h2 class="mb-4 d-flex justify-content-between align-items-center">
        Role List
        <a href="{{ route('addRole') }}" class="btn btn-primary">Add New Role</a>
    </h2>

    <table class="table table-bordered table-striped">
        <thead class="table-primary">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($roles as $role)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $role->name }}</td>
                    <td>{{ $role->description }}</td>
                    <td>{{ $role->created_at->format('Y-m-d H:i:s') }}</td>
                    <td>{{ $role->updated_at->format('Y-m-d H:i:s') }}</td>
                    <td>
                        <a href="" class="btn btn-sm btn-warning">Edit</a>
                    </td>
                </tr>
            @empty
                <tr><td colspan="5">No role found.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
