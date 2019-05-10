<nav class="navbar navbar-expand-md navbar-dark">
    <div class="container-fluid">
        <a href="{{ route('home') }}">
            <img src="{{ asset('img/schedule.png') }}"
                 alt="Time"
                 height="40px"/>
        </a>
        <h4 class="ml-2 color-orange">
            @if(Auth::check())
                {{Auth::user()->name}}
            @endif
        </h4>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                data-target="#navbar" aria-controls="navbar-ul" aria-expanded="false"
                aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div id="navbar" class="collapse navbar-collapse w-100">
            @if(Auth::check())
                <ul class="navbar-nav ml-auto w-100">
                    <li class=" ml-auto nav-item {{ Route::current()->getName() == 'group_index' ? 'active' : '' }}">
                        <a href="{{ route('group_index') }}" class="nav-link">
                            Grupos
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            Perfil
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('logout')}}" class="nav-link">
                            <i class="fas fa-sign-in-alt"></i>
                        </a>
                    </li>
                </ul>
            @endif
        </div>
    </div>
</nav>
