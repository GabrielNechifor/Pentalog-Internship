<nav class="navbar navbar-expand-md navbar-dark bg-primary sticky-top">
    <div class="navbar-collapse collapse" id="collapsingNavbar">
        <ul class="navbar-nav">
            @guest
                @foreach (['books', 'authors', 'publishers'] as $page)
                    @if ($page == $active)
                        <li class="nav-item active">
                            <a class="nav-link h5" href="/{{$page}}">{{ucfirst($page)}}</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link h5" href="/{{$page}}">{{ucfirst($page)}}</a>
                        </li>
                    @endif
                @endforeach
            @endguest

            @auth('user')
                @foreach (['books', 'authors', 'publishers'] as $page)
                    @if ($page == $active)
                        <li class="nav-item active">
                            <a class="nav-link h5" href="/{{$page}}">{{ucfirst($page)}}</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link h5" href="/{{$page}}">{{ucfirst($page)}}</a>
                        </li>
                    @endif
                @endforeach
            @endauth

            @auth('admin')
                @foreach (['books', 'authors', 'publishers', 'users', 'borrowings'] as $page)
                    @if ($page == $active)
                        <li class="nav-item active">
                            <a class="nav-link h5" href="/{{$page}}">{{ucfirst($page)}}</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link h5" href="/{{$page}}">{{ucfirst($page)}}</a>
                        </li>
                    @endif
                @endforeach
            @endauth
        </ul>

        <ul class="navbar-nav ml-auto">
            @guest
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        Login <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('user.login') }}"
                        onclick="event.preventDefault();
                                        document.getElementById('login-form').submit();">
                            {{ __('Login as user') }}
                        </a>
                        <a class="dropdown-item" href="{{ route('admin.login') }}"
                        onclick="event.preventDefault();
                                        document.getElementById('admin-login-form').submit();">
                            {{ __('Login as admin') }}
                        </a>

                        <form id="login-form" action="{{ route('user.login') }}" style="display: none;">
                            @csrf
                        </form>
                        <form id="admin-login-form" action="{{ route('admin.login') }}" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>

                @if (Route::has('admin.register', 'user.register'))
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            Register <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('user.register') }}"
                            onclick="event.preventDefault();
                                            document.getElementById('register-form').submit();">
                                {{ __('Register as user') }}
                            </a>
                            <a class="dropdown-item" href="{{ route('admin.register') }}"
                            onclick="event.preventDefault();
                                            document.getElementById('admin-register-form').submit();">
                                {{ __('Register as admin') }}
                            </a>

                            <form id="register-form" action="{{ route('user.register') }}" style="display: none;">
                                @csrf
                            </form>
                            <form id="admin-register-form" action="{{ route('admin.register') }}" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endif
            @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                        <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            @endguest
        </ul>
    </div>
</nav>
