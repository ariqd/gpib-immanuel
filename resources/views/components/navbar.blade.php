<nav class="navbar navbar-dark navbar-expand-lg" style="background: #34647A">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">GPIB Immanuel Pekanbaru</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" aria-current="page"
                        href="{{ url('/') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('worships*') ? 'active' : '' }}"
                        href="{{ route('worships.index') }}">Pendaftaran Ibadah</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('news*') ? 'active' : '' }}"
                        href="{{ route('news.index') }}">Tata Ibadah & Warta</a>
                </li>
            </ul>
            <div class="d-flex" role="search">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    @auth
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="{{ route('profile.bookings.index') }}">
                                <i class="bi-person"></i> Profil | {{ auth()->user()->name }} ({{ auth()->user()->role->role_name }})
                            </a>
                        </li>
                        <li class="nav-item">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <a class="nav-link" aria-current="page" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </a>
                            </form>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="{{ route('login') }}">
                                Login
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="{{ route('register') }}">
                                Register
                            </a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </div>
</nav>
