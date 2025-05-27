@extends('home')

@section('content')
<div class="container">
    <h2 class="mb-4">Add New Role</h2>

    <form action="{{ route('addRole') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <input type="description" name="description" class="form-control">
        </div>

       <div class="mb-3">
            <label for="active" class="form-label">Status</label>
            <select name="active" class="form-select" required>
                <option value="">-- Select Status --</option>
                <option value="1">Active</option>
                <option value="0">Inactive</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">add New Role</button>
    </form>
</div>
@endsection
