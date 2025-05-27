<div class="d-flex justify-content-between align-items-center mb-0 bg-primary text-white">
    <a class="nav-link active text-white" href="{{ route('home') }}">
        <h1 class="mb-0 p-3">Test</h1>
    </a>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-3 col-lg-2 bg-light p-3">
            <h4>Menu</h4>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}">Home</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#adminSubMenu" role="button" aria-expanded="false" aria-controls="adminSubMenu">
                        Administrator
                    </a>
                    <div class="collapse" id="adminSubMenu">
                        <ul class="nav flex-column ms-3">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin') }}">Admin</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('role') }}">Roles</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('user') }}">User</a>
                </li>

                <li class="nav-item mt-3">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-outline-danger w-100">Logout</button>
                    </form>
                </li>
            </ul>
        </div>

        <div class="col-md-9 col-lg-10 p-4">
            @include('component.flashMessage')

            @hasSection('content')
                @yield('content')
            @else
                <h1>Welcome!</h1>
                <p>Your content goes here.</p>
            @endif
        </div>
    </div>
</div>
