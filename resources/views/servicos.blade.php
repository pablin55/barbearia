<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Pablo Barbearia</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <link rel="icon" type="image/png" href="{{ asset('img/pbar.png') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet"> 
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

<style>
    :root {
        --primary: #0e0e0e;
        --secondary: #1a1a1a;
        --accent: #c9a24d;
    }

    body {
        background-color: #000000;
        color: #ededed;
    }

    .bg-primary { background-color: var(--primary) !important; }
    .bg-secondary { background-color: var(--secondary) !important; }
    .text-primary { color: var(--accent) !important; }
    .text-dark { color: #e0e0e0 !important; }
    .border { border-color: #2a2a2a !important; }

    .btn-primary {
        background-color: var(--accent);
        border-color: var(--accent);
        color: #000;
        font-weight: 600;
    }

    .btn-primary:hover {
        background-color: #b18d3f;
        border-color: #b18d3f;
    }

    .navbar-light .navbar-nav .nav-link {
        color: #e0e0e0;
    }

    .navbar-light .navbar-nav .active,
    .navbar-light .navbar-nav .nav-link:hover {
        color: var(--accent);
    }

    .carousel-caption {
        background: rgba(0,0,0,0.6);
        padding: 20px;
        border-radius: 8px;
    }

    input, .form-control {
        background-color: #1c1c1c;
        border: 1px solid #333;
        color: #fff;
    }

    input::placeholder {
        color: #aaa;
    }

    .btn-login-fixed {
        position: absolute;
        top: 25px;
        right: 30px;
        background-color: var(--accent);
        color: #000;
        padding: 20px 22px;
        font-weight: 600;
        border-radius: 4px;
        z-index: 10;
        text-decoration: none;
        box-shadow: 0 10px 25px rgba(0,0,0,0.4);
        transition: all 0.3s ease;
    }

    .btn-login-fixed:hover {
        background-color: #b18d3f;
        color: #000;
        transform: translateY(-2px);
        text-decoration: none;
    }

    .btn-translate-fixed {
        position: absolute;
        top: 25px;
        right: 160px;
        background-color: var(--accent);
        color: #000;
        padding: 20px 22px;
        font-weight: 600;
        border-radius: 4px;
        z-index: 10;
        text-decoration: none;
        box-shadow: 0 10px 25px rgba(0,0,0,0.4);
        transition: all 0.3s ease;
    }

    .btn-translate-fixed:hover {
        background-color: #b18d3f;
        color: #000;
        transform: translateY(-2px);
        cursor: pointer;
    }

    .language-dropdown {
        position: absolute;
        top: 25px;
        right: 200px;
        z-index: 1000;
    }

    .selected-lang {
        background: var(--accent);
        color: #000;
        padding: 20px 22px;
        border-radius: 4px;
        cursor: pointer;
        font-size: 14px;
        font-weight: 600;
        text-decoration: none;
        box-shadow: 0 10px 25px rgba(0,0,0,0.4);
        transition: all 0.3s ease;
        display: inline-block;
    }

    .selected-lang:hover {
        background-color: #b18d3f;
        transform: translateY(-2px);
        text-decoration: none;
        color: #000;
    }

    .lang-menu {
        display: none;
        background: #111;
        border-radius: 10px;
        margin-top: 8px;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(0,0,0,0.7);
        position: absolute;
        top: 100%;
        right: 0;
        min-width: 200px;
    }

    .lang-menu div {
        padding: 12px 15px;
        cursor: pointer;
        color: #ccc;
        transition: 0.2s;
        text-align: left;
    }

    .lang-menu div:hover {
        background: rgba(201,162,77,0.15);
        color: #c9a24d;
    }

    .lang-menu div img {
        width: 20px;
        height: 15px;
        margin-right: 8px;
        vertical-align: middle;
    }

    footer {
        border-top: 1px solid #2a2a2a;
    }

    .footer-icon {
        color: #aaa;
        font-size: 20px;
        margin: 0 10px;
        transition: 0.3s ease;
        text-decoration: none;
    }

    .footer-icon:hover {
        color: var(--accent);
        transform: scale(1.15);
    }

    .hero-carousel {
        display: flex;
        justify-content: center;
        padding: 70px 20px;
        background-color: #0e0e0e;
    }

    #header-carousel {
        width: 100%;
        max-width: 1100px;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 20px 45px rgba(0, 0, 0, 0.7);
    }

    #header-carousel .carousel-item img {
        width: 100%;
        height: 410px;
        object-fit: cover;
    }

    .top-header {
        background: linear-gradient(180deg, #0b0b0b 0%, #141414 100%);
        border-bottom: 1px solid rgba(255,255,255,0.05);
    }
    .about-section {
    display: flex;
    justify-content: center;
    padding: 80px 20px;
    background: linear-gradient(180deg, #0e0e0e 0%, #141414 100%);
}

.about-article {
    max-width: 1000px;
    background-color: #111;
    padding: 60px 50px;
    border-radius: 20px;
    box-shadow: 0 25px 60px rgba(0, 0, 0, 0.75);
    border: 1px solid rgba(255,255,255,0.05);
}

/* TÍTULO */
.about-article h2 {
    font-size: 2.4rem;
    font-weight: 700;
    margin-bottom: 30px;
    color: #fff;
    text-align: center;
}

.about-article h2 span {
    color: var(--accent);
}

/* TEXTO */
.about-article p {
    font-size: 1.05rem;
    line-height: 1.9;
    color: #cfcfcf;
    margin-bottom: 20px;
    text-align: center;
}

/* DESTAQUE FINAL */
.about-highlight {
    margin-top: 30px;
    font-size: 1.15rem;
    font-weight: 600;
    color: var(--accent);
    text-align: center;
    letter-spacing: 0.5px;
}

/* RESPONSIVO */
@media (max-width: 768px) {
    .about-article {
        padding: 40px 25px;
    }

    .about-article h2 {
        font-size: 2rem;
    }
}

/* FOOTER STYLES */
.footer-section-title {
    color: #fff;
    font-weight: 700;
    font-size: 1.1rem;
    margin-bottom: 20px;
    letter-spacing: 0.5px;
}

.footer-contact-item {
    color: #aaa;
    margin-bottom: 12px;
    font-size: 0.95rem;
    line-height: 1.6;
}

.location-button {
    display: inline-block;
    background: linear-gradient(135deg, var(--accent), #b18d3f);
    color: #000;
    padding: 15px 30px;
    border-radius: 8px;
    text-decoration: none;
    font-weight: 600;
    transition: all 0.3s ease;
    box-shadow: 0 5px 15px rgba(201, 162, 77, 0.3);
    margin-top: 10px;
    display: flex;
    align-items: center;
    gap: 10px;
}

.location-button:hover {
    transform: translateY(-3px);
    box-shadow: 0 10px 25px rgba(201, 162, 77, 0.5);
    color: #000;
    text-decoration: none;
}

.footer-divider {
    border-color: rgba(255, 255, 255, 0.1);
    margin: 30px 0;
}
/* PRICING SECTION */
.pricing-section {
    padding: 80px 20px;
    background: linear-gradient(180deg, #141414 0%, #0e0e0e 100%);
    display: flex;
    justify-content: center;
}

.pricing-container {
    max-width: 900px;
    width: 100%;
    background: #111;
    padding: 60px 50px;
    border-radius: 20px;
    box-shadow: 0 25px 60px rgba(0,0,0,0.7);
    border: 1px solid rgba(255,255,255,0.05);
}

.pricing-container h2 {
    text-align: center;
    font-size: 2.3rem;
    font-weight: 700;
    margin-bottom: 40px;
    color: #fff;
}

.pricing-container h2 span {
    color: var(--accent);
}

.pricing-table {
    width: 100%;
}

.pricing-row {
    display: flex;
    justify-content: space-between;
    padding: 18px 0;
    border-bottom: 1px solid rgba(255,255,255,0.08);
    font-size: 1.05rem;
    color: #ccc;
    transition: 0.3s ease;
}

.pricing-row:last-child {
    border-bottom: none;
}

.pricing-row:hover {
    color: var(--accent);
    transform: translateX(5px);
}
/* SERVICES SECTION */
.services-section {
    padding: 90px 20px;
    background: linear-gradient(180deg, #141414 0%, #0e0e0e 100%);
    display: flex;
    justify-content: center;
}

.services-container {
    max-width: 1200px;
    width: 100%;
    text-align: center;
}

.services-container h2 {
    font-size: 2.5rem;
    font-weight: 700;
    margin-bottom: 50px;
    color: #fff;
}

.services-container h2 span {
    color: var(--accent);
}

/* GRID */
.services-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 30px;
}

/* CARD */
.service-card {
    background: #111;
    border-radius: 20px;
    overflow: hidden;
    box-shadow: 0 20px 45px rgba(0,0,0,0.7);
    border: 1px solid rgba(255,255,255,0.05);
    transition: 0.4s ease;
    cursor: pointer;
}

.service-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 25px 55px rgba(201,162,77,0.2);
}

/* IMAGE */
.service-card img {
    width: 100%;
    height: 220px;
    object-fit: cover;
    transition: 0.4s ease;
}

.service-card:hover img {
    transform: scale(1.05);
}

/* INFO */
.service-info {
    padding: 25px;
}

.service-info h3 {
    color: #fff;
    font-size: 1.2rem;
    margin-bottom: 10px;
}

.service-info p {
    color: var(--accent);
    font-weight: 600;
    font-size: 1.1rem;
}
/* NAVBAR PREMIUM GLASS */
.navbar-wrapper {
    display: flex;
    justify-content: center;
}

/* Caixa principal */
.custom-nav-box {
    background: rgba(20, 20, 20, 0.85);
    backdrop-filter: blur(12px);
    padding: 10px 30px;
    border-radius: 60px;
    box-shadow: 0 15px 40px rgba(0,0,0,0.7);
    border: 1px solid rgba(201,162,77,0.2);
    display: flex;
    gap: 15px;
    transition: 0.3s ease;
}

/* Links */
.custom-nav-box .nav-link {
    position: relative;
    color: #ccc;
    font-weight: 500;
    padding: 10px 20px;
    border-radius: 30px;
    transition: all 0.3s ease;
    letter-spacing: 0.5px;
}

/* Linha dourada animada */
.custom-nav-box .nav-link::after {
    content: "";
    position: absolute;
    bottom: 5px;
    left: 50%;
    width: 0%;
    height: 2px;
    background: var(--accent);
    transition: 0.3s ease;
    transform: translateX(-50%);
}

/* Hover */
.custom-nav-box .nav-link:hover {
    color: var(--accent);
}

.custom-nav-box .nav-link:hover::after {
    width: 60%;
}

/* Link ativo */
.custom-nav-box .active {
    background: linear-gradient(135deg, var(--accent), #b18d3f);
    color: #000 !important;
    font-weight: 600;
    box-shadow: 0 5px 20px rgba(201,162,77,0.4);
}
/* Melhorias visuais teste SOBRE A BARBEARIA */
.about-header {
    text-align: center;
    margin-bottom: 40px;
    background: linear-gradient(
        180deg,
        #141414 0%,
        #0e0e0e 50%,
        #0e0e0e 100%
    );
}
.hidden {
    opacity: 0;
    filter: blur(0);
    transform: translateY(100px);
    /* Começa mais de baixo para efeito dramático */
    transition: all 1.1s ease-out;
    /* Demora 1s para aparecer */
}

.show {
    opacity: 1;
    filter: blur(0);
    transform: translateY(0);
    /* Vai para a posição original */
}
</style>
</head>

<body>

<!-- TOPO -->
<div class="top-header position-relative">
    <div class="language-dropdown">
        <a href="#" class="selected-lang" onclick="toggleLangMenu(); return false;"><i class="fas fa-globe"></i> PT</a>
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


<!-- SERVIÇOS COM IMAGEM -->
<!-- SERVICES -->
<section class="services-section">
    <div class="services-container">
        <h2 data-i18n="services-title">
            Nossos <span style="color: var(--accent);">Serviços</span>
        </h2>

        <div class="services-grid">

            <div class="service-card hidden">
                <img src="img/simp.jpeg" alt="Corte Simples">
                <div class="service-info">
                    <h3>Corte Simples / Só máquina</h3>
                    <p>R$19,90</p>
                    <a class="btn btn-primary">Agendar Agora</a>
                </div>
            </div>

            <div class="service-card hidden">
                <img src="img/nv.jpeg" alt="Corte Social">
                <div class="service-info">
                    <h3>Corte Social / Degradê / Surfista</h3>
                    <p>R$29,90</p>
                    <a class="btn btn-primary">Agendar Agora</a>
                </div>
            </div>

            <div class="service-card hidden">
                <img src="img/tes.jpeg" alt="Corte à Tesoura">
                <div class="service-info">
                    <h3>Corte à Tesoura</h3>
                    <p>R$49,90</p>
                    <a class="btn btn-primary">Agendar Agora</a>
                </div>
            </div>

            <div class="service-card hidden">
                <img src="img/cb.jpeg" alt="Corte com Barba">
                <div class="service-info">
                    <h3>Corte com Barba</h3>
                    <p>R$59,90</p>
                    <a class="btn btn-primary">Agendar Agora</a>
                </div>
            </div>

            <div class="service-card hidden">
                <img src="img/nv.jpeg" alt="Corte com Luzes">
                <div class="service-info">
                    <h3>Corte + Luzes / Platinado</h3>
                    <p>R$99,90</p>
                    <a class="btn btn-primary">Agendar Agora</a>
                </div>
            </div>

            <div class="service-card hidden">
                <img src="img/nrm.jpeg" alt="Corte com Pigmentação">
                <div class="service-info">
                    <h3>Corte com Pigmentação</h3>
                    <p>R$49,90</p>
                    <a class="btn btn-primary">Agendar Agora</a>
                </div>
            </div>

            <div class="service-card hidden">
                <img src="img/barb.jpeg" alt="Barba">
                <div class="service-info">
                    <h3>Barba</h3>
                    <p>R$29,90</p>
                    <a class="btn btn-primary">Agendar Agora</a>
                </div>
            </div>

            <div class="service-card hidden">
                <img src="img/bp.png" alt="Barba com Pigmentação">
                <div class="service-info">
                    <h3>Barba com Pigmentação</h3>
                    <p>R$39,90</p>
                    <a class="btn btn-primary">Agendar Agora</a>
                </div>
            </div>

            <div class="service-card hidden">
                <img src="img/bb.jpeg" alt="Corte com Hidratação">
                <div class="service-info">
                    <h3>Corte + Hidratação</h3>
                    <p>R$49,90</p>
                    <a class="btn btn-primary">Agendar Agora</a>
                </div>
            </div>

            <div class="service-card hidden">
                <img src="img/sobraa.png" alt="Sobrancelha">
                <div class="service-info">
                    <h3>Sobrancelha</h3>
                    <p>R$9,90</p>
                    <a class="btn btn-primary">Agendar Agora</a>
                </div>
            </div>

            <div class="service-card hidden">
                <img src="img/pint.jpeg" alt="Colorimetria">
                <div class="service-info">
                    <h3>Colorimetria + Corte</h3>
                    <p>R$149,90</p>
                    <small style="color:#999; display:block; margin-bottom:10px;">
                        (Descoloração + aplicação da tinta + corte)
                    </small>
                    <a class="btn btn-primary">Agendar Agora</a>
                </div>
            </div>

            <div class="service-card hidden">
                <img src="img/inf.jpeg" alt="Corte Infantil">
                <div class="service-info">
                    <h3>Corte Infantil</h3>
                    <p>R$39,90</p>
                    <a class="btn btn-primary">Agendar Agora</a>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- PLANOS -->
<section class="pricing-section">
    <div class="pricing-container">
        <h2 data-i18n="combos-title">
            Nossos <span style="color: var(--accent);">Planos Mensais</span>
        </h2>

        <p class="text-muted" style="text-align:center; margin-top:10px; margin-bottom:20px;">
            Plano mensal — 1 atendimento semanal
        </p>

        <table class="pricing-table" style="width:100%;">
            <thead>
                <tr class="pricing-row">
                    <th style="text-align:left;">Plano</th>
                    <th style="text-align:right;">Preço</th>
                    <th style="text-align:center;">Ação</th>
                </tr>
            </thead>

            <tbody>
                <tr class="pricing-row">
                    <td>Corte Simples</td>
                    <td style="text-align:right;">R$59,90</td>
                    <td style="text-align:center;"><a class="btn btn-primary btn-sm">Assinar Agora</a></td>
                </tr>

                <tr class="pricing-row">
                    <td>Corte Normal</td>
                    <td style="text-align:right;">R$99,90</td>
                    <td style="text-align:center;"><a class="btn btn-primary btn-sm">Assinar Agora</a></td>
                </tr>

                <tr class="pricing-row">
                    <td>Corte + Pigmentação</td>
                    <td style="text-align:right;">R$179,90</td>
                    <td style="text-align:center;"><a class="btn btn-primary btn-sm">Assinar Agora</a></td>
                </tr>

                <tr class="pricing-row">
                    <td>Corte Infantil</td>
                    <td style="text-align:right;">R$139,90</td>
                    <td style="text-align:center;"><a class="btn btn-primary btn-sm">Assinar Agora</a></td>
                </tr>

                <tr class="pricing-row">
                    <td>Barba</td>
                    <td style="text-align:right;">R$99,90</td>
                    <td style="text-align:center;"><a class="btn btn-primary btn-sm">Assinar Agora</a></td>
                </tr>

                <tr class="pricing-row">
                    <td>Sobrancelha</td>
                    <td style="text-align:right;">R$29,90</td>
                    <td style="text-align:center;"><a class="btn btn-primary btn-sm">Assinar Agora</a></td>
                </tr>

                <tr class="pricing-row">
                    <td>Cabelo + Barba</td>
                    <td style="text-align:right;">R$219,90</td>
                    <td style="text-align:center;"><a class="btn btn-primary btn-sm">Assinar Agora</a></td>
                </tr>

                <tr class="pricing-row">
                    <td>Corte na Tesoura</td>
                    <td style="text-align:right;">R$180,00</td>
                    <td style="text-align:center;"><a class="btn btn-primary btn-sm">Assinar Agora</a></td>
                </tr>
            </tbody>
        </table>
    </div>
</section>

<!-- RODAPÉ PREMIUM -->
<footer class="container-fluid bg-secondary pt-5 pb-3">

    <div class="container">
        <div class="row">

            <!-- LOGO + FRASE -->
            <div class="col-md-4 mb-4 mb-md-0">
                <h4 class="footer-section-title" data-i18n="footer-title">Pablo Barbearia</h4>
                <p class="text-muted" data-i18n="footer-desc">
                    Tradição, estilo e precisão em cada corte.
                </p>
            </div>

            <!-- CONTATO -->
            <div class="col-md-4 mb-4 mb-md-0">
                <h5 class="footer-section-title" data-i18n="footer-contato">Contato</h5>

                <p class="footer-contact-item">
                    📞 (83) 9 9623-2639
                </p>

                <p class="footer-contact-item">
                    ✉️ alvespablo600@gmail.com
                </p>

                <p class="footer-contact-item" data-i18n="footer-horario">
                    🕒 Seg–Sáb: 08:00 às 18:00 <br>
                    Dom: 08:00 às 12:00
                </p>
            </div>

            <!-- LOCALIZAÇÃO -->
            <div class="col-md-4 d-flex flex-column justify-content-center">
                <h5 class="footer-section-title" data-i18n="footer-localizacao">Localização</h5>
                <p class="text-muted mb-3" style="font-size: 0.9rem;" data-i18n="footer-endereco">
                    Ao lado da Farmácia Cristo <br>
                    R. Elias Cavalcanti de Albuquerque, 2165 <br>
                    Cristo Redentor, João Pessoa - PB
                </p>
                <a href="https://www.google.com/maps/search/?api=1&query=R.+Elias+Cavalcanti+de+Albuquerque,+2165,+Cristo+Redentor,+JoÃ£o+Pessoa,+PB,+58070-400"
                   target="_blank"
                   class="location-button" data-i18n="footer-maps">
                    <i class="fas fa-map-marker-alt"></i>
                    Ver no Google Maps
                </a>
            </div>

        </div>

        <hr class="footer-divider">

        <div class="text-center text-muted" data-i18n="footer-copyright">
            © 2026 Pablo Barbearia • Todos os direitos reservados
        </div>

    </div>
</footer>

<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
<script>
    $('#header-carousel').carousel({
        interval: 3000,
        ride: 'carousel'
    });

    const observer = new IntersectionObserver((entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('show');
                } 
            });
        });

        const hiddenElements = document.querySelectorAll('.hidden');
        hiddenElements.forEach((el) => observer.observe(el));

</script>

<script>
const translations = {
    pt: {
        'nav-home': 'Home',
        'nav-servicos': 'Serviços',
        'nav-equipe': 'Equipe',
        'services-title': 'Nossos <span style="color: var(--accent);">Serviços</span>',
        'combos-title': 'Nossos <span style="color: var(--accent);">Combos</span>',
        'footer-title': 'Pablo Barbearia',
        'footer-desc': 'Tradição, estilo e precisão em cada corte.',
        'footer-contato': 'Contato',
        'footer-horario': 'Seg–Sáb: 08:00 às 18:00 <br> Dom: 08:00 às 12:00',
        'footer-localizacao': 'Localização',
        'footer-endereco': 'Ao lado da Farmácia Cristo <br> R. Elias Cavalcanti de Albuquerque, 2165 <br> Cristo Redentor, João Pessoa - PB',
        'footer-maps': 'Ver no Google Maps',
        'footer-copyright': '© 2026 Pablo Barbearia • Todos os direitos reservados'
    },
    en: {
        'nav-home': 'Home',
        'nav-servicos': 'Services',
        'nav-equipe': 'Team',
        'services-title': 'Our <span style="color: var(--accent);">Services</span>',
        'combos-title': 'Our <span style="color: var(--accent);">Combos</span>',
        'footer-title': 'Pablo Barbershop',
        'footer-desc': 'Tradition, style and precision in every haircut.',
        'footer-contato': 'Contact',
        'footer-horario': 'Mon–Sat: 08:00 to 18:00 <br> Sun: 08:00 to 12:00',
        'footer-localizacao': 'Location',
        'footer-endereco': 'Next to Cristo Pharmacy <br> R. Elias Cavalcanti de Albuquerque, 2165 <br> Cristo Redentor, JoÃ£o Pessoa - PB',
        'footer-maps': 'View on Google Maps',
        'footer-copyright': '© 2026 Pablo Barbershop • All rights reserved'
    },
    es: {
        'nav-home': 'Inicio',
        'nav-servicos': 'Servicios',
        'nav-equipe': 'Equipo',
        'services-title': 'Nuestros <span style="color: var(--accent);">Servicios</span>',
        'combos-title': 'Nuestros <span style="color: var(--accent);">Combos</span>',
        'footer-title': 'Pablo Barbería',
        'footer-desc': 'Tradición, estilo y precisión en cada corte.',
        'footer-contato': 'Contacto',
        'footer-horario': 'Lun–Sáb: 08:00 a 18:00 <br> Dom: 08:00 a 12:00',
        'footer-localizacao': 'Ubicación',
        'footer-endereco': 'Al lado de la Farmacia Cristo <br> R. Elias Cavalcanti de Albuquerque, 2165 <br> Cristo Redentor, João Pessoa - PB',
        'footer-maps': 'Ver en Google Maps',
        'footer-copyright': '© 2026 Pablo Barbería • Todos los derechos reservados'
    }
};

let currentLanguage = 'pt';

function toggleLangMenu() {
    const menu = document.getElementById("langMenu");
    menu.style.display = menu.style.display === "block" ? "none" : "block";
}

function setLanguage(lang) {
    currentLanguage = lang;
    
    document.querySelector(".selected-lang").innerHTML =
        lang === "pt" ? "<i class='fas fa-globe'></i> PT" :
        lang === "en" ? "<i class='fas fa-globe'></i> EN" :
        "<i class='fas fa-globe'></i> ES";

    document.getElementById("langMenu").style.display = "none";

    const trans = translations[lang];
    
    document.querySelectorAll('[data-i18n]').forEach(element => {
        const key = element.dataset.i18n;
        if (trans[key]) {
            element.innerHTML = trans[key];
        }
    });
}

document.addEventListener("click", function(e) {
    const dropdown = document.querySelector(".language-dropdown");
    if (!dropdown.contains(e.target)) {
        document.getElementById("langMenu").style.display = "none";
    }
});
</script>

</body>
</html>
