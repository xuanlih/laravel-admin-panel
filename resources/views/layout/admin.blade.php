@extends('home')

@section('content')
<div class="container">
    <h2 class="mb-4 d-flex justify-content-between align-items-center">
        Admin List
        <a href="{{ route('register') }}" class="btn btn-primary">Add New Admin</a>
    </h2>

    <form method="GET" action="{{ route('admin') }}" class="mb-3 row g-3">
        <div class="col-md-4">
            <label for="role_id" class="form-label">Filter by Role</label>
            <select name="role_id" id="role_id" class="form-select" onchange="this.form.submit()">
                <option value="">-- All Roles --</option>
                @foreach ($roles as $role)
                    <option value="{{ $role->id }}" {{ request('role_id') == $role->id ? 'selected' : '' }}>
                        {{ $role->name }}
                    </option>
                @endforeach
            </select>
        </div>
    </form>

    <table class="table table-bordered table-striped">
        <thead class="table-primary">
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Role</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($admins as $admin)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $admin->username }}</td>
                    <td>{{ $admin->roles->name }}</td>
                    <td>{{ $admin->created_at->format('Y-m-d H:i:s') }}</td>
                    <td>{{ $admin->updated_at->format('Y-m-d H:i:s') }}</td>
                    <td>
                        <a href="{{ route('admin.edit', $admin->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    </td>
                </tr>
            @empty
                <tr><td colspan="5">No admins found.</td></tr>
            @endforelse
        </tbody>
    </table>

    <div class="d-flex justify-content-center">
        {{ $admins->withQueryString()->links() }}
    </div>
</div>
@endsection
