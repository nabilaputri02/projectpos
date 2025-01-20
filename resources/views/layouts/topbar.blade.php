<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>

    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown">
                @if(Auth::check())
                    <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->name }}</span>
                @else
                    <span class="mr-2 d-none d-lg-inline text-gray-600 small">Login</span>
                @endif
                <img class="img-profile rounded-circle" src="{{ asset('img/undraw_profile.svg') }}">
            </a>
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in">
                @if(Auth::check())
                    <form action="{{ route('logout') }}" method="POST" class="dropdown-item p-0">
                        @csrf
                        <button type="submit" class="btn btn-link text-left w-100">
                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i> Logout
                        </button>
                    </form>
                @else
                    <a class="dropdown-item" href="#">
                        <i class="fas fa-sign-in-alt fa-sm fa-fw mr-2 text-gray-400"></i> Login
                    </a>
                @endif
            </div>
        </li>
    </ul>
</nav>
