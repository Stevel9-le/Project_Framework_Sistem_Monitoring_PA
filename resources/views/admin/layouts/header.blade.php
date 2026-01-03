<header class="mb-3">
    <div class="d-flex justify-content-between align-items-center">
        <h4>Dashboard</h4>

        <div class="dropdown">
            <a href="#" data-bs-toggle="dropdown">
                <img src="{{ asset('assets-admin/images/faces/1.jpg') }}"
                     class="rounded-circle" width="40">
            </a>

            <ul class="dropdown-menu dropdown-menu-end">
                <li class="dropdown-item-text">
                    <div class="dropdown">
    @if(auth()->check())
        <span>{{ auth()->user()->name }}</span>
    @else
        <a href="{{ route('login') }}" class="btn btn-sm btn-primary">Login</a>
    @endif
</div>
                </li>
                <li><hr class="dropdown-divider"></li>
                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button class="dropdown-item">Logout</button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</header>
