<nav class="navbar navbar-expand-lg navbar-light bg-primary shadow" id="navbar" style="position:fixed;top:0;left:0;right:0;">
    <a href="{{route('index')}}" class="navbar-brand text-white">quinnzipse.dev</a>
    <button class="navbar-toggler " type="button" data-toggle="collapse" data-target=".navbar-collapse"
            aria-controls="navbar1" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fas fa-bars text-white" style="font-size: .9em"></i>
    </button>
    <div class="collapse navbar-collapse" id="navbar">
        <ul class="navbar-nav ml-auto">
            @guest
                <li class="nav-item"><a href="{{"login"}}" class="nav-link text-white">Login</a></li>
            @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link text-white dropdown-toggle" href="#" role="button"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        Hello, {{ Auth::user()->name }}! <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{route('home')}}">
                            Dashboard
                        </a>
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
<br>
<br>