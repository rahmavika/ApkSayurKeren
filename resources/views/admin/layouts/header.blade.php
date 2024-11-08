<header class="navbar fixed-top flex-md-nowrap p-0 shadow" style="background-color: #EDF3F2;" data-bs-theme="hijau">
    <a href="/dashboard" class="navbar-brand">
        <img src="{{ asset('images/sayurkeren.png') }}" alt="Sayur Keren" class="img-fluid navbar-image">
    </a>

    <ul class="navbar-nav flex-row d-md-none">
        <li class="nav-item text-nowrap">
            <button class="nav-link px-3 text-white" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
                <svg class="bi"><use xlink:href="#list"/></svg>
            </button>
        </li>
    </ul>

    <ul class="navbar-nav">
        <li class="nav-item px-3">
            @if (session('username')) <!-- Periksa apakah username ada di session -->
                <a href="" style="color: #07582d; font-size: 16px; text-decoration: none;">
                    <span class="me-2">
                        <i class="bi bi-person-fill" style="color: #07582d;"></i> {{ session('username') }}
                    </span>
                </a>
                {{-- <form action="/logout" method="POST" style="display:inline;">
                    @csrf
                    <button type="submit" class="btn btn-outline-success" style="color: #07582d; border-color: #07582d;">
                        <i class="bi bi-door-open"></i> LOGOUT
                    </button>
                </form> --}}
            @else
                <button class="btn-login" style="border-color: #07582d; transition: background-color 0.3s, color 0.3s;" onclick="window.location.href='/login';">
                    <i class="bi bi-person-fill" ></i> Login
                </button>
            @endif
        </li>
    </ul>
</header>
