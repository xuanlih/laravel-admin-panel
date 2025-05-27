<form action="{{ url('/layout/login') }}" method="POST">
    @csrf
    <label for="name">Username</label>
    <input type="text" name="username" id="username" value="{{ old('username') }}" class="form-control" required>

    <label for="password" class="mt-2">Password</label>
    <input type="password" name="password" id="password" value="{{ old('password') }}" class="form-control" required>

    <button type="submit" class="btn btn-primary mt-3">Login</button>
</form>
