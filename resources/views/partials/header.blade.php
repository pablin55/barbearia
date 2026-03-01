<!-- TOPO -->
<div class="top-header position-relative">
    <div class="language-dropdown">
        <a href="#" class="selected-lang" onclick="toggleLangMenu(); return false;">
            <i class="fas fa-globe"></i> {{ strtoupper(app()->getLocale()) }}
        </a>
        <div class="lang-menu" id="langMenu">
            <a href="{{ route('lang.switch', 'pt') }}" style="text-decoration: none;">
                <div><img src="https://flagcdn.com/w20/br.png" alt="PT"> Português</div>
            </a>
            <a href="{{ route('lang.switch', 'en') }}" style="text-decoration: none;">
                <div><img src="https://flagcdn.com/w20/us.png" alt="EN"> English</div>
            </a>
            <a href="{{ route('lang.switch', 'es') }}" style="text-decoration: none;">
                <div><img src="https://flagcdn.com/w20/es.png" alt="ES"> Español</div>
            </a>
        </div>
    </div>
    <a href="/login" class="btn-login-fixed">{{ __('Login') }}</a>

    <div class="row align-items-center py-3 px-xl-5 m-0">
        <div class="col-lg-3 d-none d-lg-block">
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
