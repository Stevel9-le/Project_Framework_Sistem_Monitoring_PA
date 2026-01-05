<header class="mb-3">
    <div class="d-flex justify-content-between align-items-center">
        <h4>Dashboard</h4>

        <div class="dropdown">
            <a href="#" data-bs-toggle="dropdown">
                <img
                    src="{{ auth()->check() && auth()->user()->profile?->photo
                        ? asset('storage/avatars/'.auth()->user()->profile->photo)
                        : asset('assets-admin/images/faces/1.jpg') }}"
                    class="rounded-circle"
                    width="40"
                    height="40"
                    style="object-fit: cover"
                    alt="Profile">
            </a>

            <ul class="dropdown-menu dropdown-menu-end">
                <li class="dropdown-item-text text-center">
                    @auth
                        <strong>{{ auth()->user()->name }}</strong><br>
                        <small class="text-muted">
                            {{ auth()->user()->getRoleNames()->first() }}
                        </small>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-sm btn-primary">
                            Login
                        </a>
                    @endauth
                </li>

                @auth
                <li><hr class="dropdown-divider"></li>

                <li>
                    <a href="{{ route('profile.edit') }}" class="dropdown-item">
                        <i class="bi bi-person"></i> Profile
                    </a>
                </li>

                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button class="dropdown-item text-danger">
                            <i class="bi bi-box-arrow-right"></i> Logout
                        </button>
                    </form>
                </li>
                @endauth
            </ul>
        </div>
    </div>
</header>
