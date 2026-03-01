<!-- TOPO -->
<div class="top-header position-relative">
    <div class="language-dropdown">
        <a href="#" class="selected-lang" onclick="toggleLangMenu(); return false;">
            <i class="fas fa-globe"></i> PT
        </a>
        <div class="lang-menu" id="langMenu">
            <div onclick="setLanguage('pt')"><img src="https://flagcdn.com/w20/br.png" alt="PT"> Português</div>
            <div onclick="setLanguage('en')"><img src="https://flagcdn.com/w20/us.png" alt="EN"> English</div>
            <div onclick="setLanguage('es')"><img src="https://flagcdn.com/w20/es.png" alt="ES"> Español</div>
        </div>
    </div>
    <a href="/login" class="btn-login-fixed">Login</a>

    <div class="row align-items-center py-3 px-xl-5 m-0">
        <div class="col-lg-3 d-none d-lg-block">
            <img src="{{ asset('img/pbar.png') }}" alt="Pablo Barbearia" style="height: 120px;">
        </div>

        <div class="col-lg-6">
            <nav class="navbar navbar-expand-lg navbar-light py-3 py-lg-0 justify-content-center">
                <div class="navbar-wrapper">
                    <div class="navbar-nav custom-nav-box">
                        <a href="{{ route('home') }}"
                           class="nav-item nav-link {{ request()->routeIs('home') ? 'active' : '' }}"
                           data-i18n="nav-home">
                           Home
                        </a>

                        <a href="{{ route('servicos') }}"
                           class="nav-item nav-link {{ request()->routeIs('servicos') ? 'active' : '' }}"
                           data-i18n="nav-servicos">
                           Serviços
                        </a>

                        <a href="{{ route('equipe') }}"
                           class="nav-item nav-link {{ request()->routeIs('equipe') ? 'active' : '' }}"
                           data-i18n="nav-equipe">
                           Equipe
                        </a>
                    </div>
                </div>
            </nav>
        </div>

        <div class="col-lg-3 d-none d-lg-block"></div>
    </div>
</div>
