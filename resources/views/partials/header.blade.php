<!-- DESKTOP -->
<div class="desktop-nav d-none d-lg-block">

    <div class="top-header position-relative">
        
       <div class="language-dropdown d-none d-lg-block">
    <a href="#" class="selected-lang" onclick="toggleLangMenu(); return false;">
        <i class="fas fa-globe"></i> {{ strtoupper(app()->getLocale()) }}
    </a>

    <div class="lang-menu" id="langMenu">
        <a href="{{ route('lang.switch', 'pt') }}">
            <div><img src="https://flagcdn.com/w20/br.png"> Português</div>
        </a>
        <a href="{{ route('lang.switch', 'en') }}">
            <div><img src="https://flagcdn.com/w20/us.png"> English</div>
        </a>
        <a href="{{ route('lang.switch', 'es') }}">
            <div><img src="https://flagcdn.com/w20/es.png"> Español</div>
        </a>
    </div>
</div>

       @if(Auth::check())
    <form action="{{ route('logout') }}" method="POST" style="display:inline;">
        @csrf
        <button type="submit" class="btn-login-fixed" style="background:#d59c20; color:#fff; border:none; padding:8px 15px; border-radius:5px;">
            {{ __('Logout') }}
        </button>
    </form>
@else
    <a href="{{ route('login') }}" class="btn-login-fixed" style="background:#d59c20; color:#fff; padding:8px 15px; border-radius:5px;">
        {{ __('Login') }}
    </a>
@endif

        <div class="row align-items-center py-3 px-xl-5 m-0">
            
            <div class="col-lg-3 d-none d-lg-block @if(request()->routeIs('login')) d-none @endif">
    <img src="{{ asset('img/pbar.png') }}" alt="{{ __('Pablo Barbershop') }}" style="height: 120px;">
</div>

            <div class="col-lg-6">
                <nav class="navbar navbar-expand-lg navbar-light py-3 py-lg-0 justify-content-center">
                    <div class="navbar-wrapper">
                        <div class="navbar-nav custom-nav-box">

                            <a href="{{ route('home') }}"
                               class="nav-item nav-link {{ request()->routeIs('home') ? 'active' : '' }}">
                               {{ __('Home') }}
                            </a>

                            <a href="{{ route('servicos') }}"
                               class="nav-item nav-link {{ request()->routeIs('servicos') ? 'active' : '' }}">
                               {{ __('Services') }}
                            </a>

                            <a href="{{ route('equipe') }}"
                               class="nav-item nav-link {{ request()->routeIs('equipe') ? 'active' : '' }}">
                               {{ __('Team') }}
                            </a>

                        </div>

                    </div>

                </nav>
            </div>
            
            <div class="col-lg-3 d-none d-lg-block"></div>
        </div>
    </div>
</div>


<!-- MENU MOBILE -->
<div class="mobile-nav d-lg-none">
    <nav class="navbar navbar-dark px-3">
        <a class="navbar-brand" href="{{ route('home') }}">
            <img src="{{ asset('img/pbar.png') }}" alt="Logo" style="height:60px;">
        </a>

        <button class="navbar-toggler custom-toggler" type="button" data-toggle="collapse" data-target="#mobileMenu">
            <span></span>
            <span></span>
            <span></span>
        </button>

        <div class="collapse navbar-collapse text-center" id="mobileMenu">
            <ul class="navbar-nav mt-4">

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}">Home</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('servicos') }}">Services</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('equipe') }}">Team</a>
                </li>

                <li class="nav-item mt-3">
    @if(Auth::check())
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-warning w-100 fw-bold">
                {{ __('Logout') }}
            </button>
        </form>
    @else
        <a href="{{ route('login') }}" class="btn btn-warning w-100 fw-bold">
            {{ __('Login') }}
        </a>
    @endif
</li>
                <li class="nav-item mt-3">
                    <div class="lang-inside">
                        <a href="{{ route('lang.switch', 'pt') }}">PT</a>
                        <a href="{{ route('lang.switch', 'en') }}">EN</a>
                        <a href="{{ route('lang.switch', 'es') }}">ES</a>
                    </div>
                </li>

            </ul>
        </div>

    </nav>

</div>
