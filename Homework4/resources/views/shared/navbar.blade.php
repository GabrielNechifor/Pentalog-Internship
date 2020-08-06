<nav class="navbar navbar-expand-lg navbar-light bg-light justify-content-center bg-primary sticky-top">
    <ul class="navbar-nav navbar-center bg-primary nav-fill w-100">
        @foreach (['users', 'books', 'authors', 'publishers', 'borrowings'] as $page)
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
    </ul>
</nav>
