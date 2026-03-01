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
        background-color: #0e0e0e;
        color: #e0e0e0;
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

    .btn-primary:focus, 
    .btn-primary.focus,
    .btn-primary:active,
    .btn-primary:not(:disabled):not(.disabled):active,
    .btn-primary:not(:disabled):not(.disabled).active {
        background-color: var(--accent) !important;
        border-color: var(--accent) !important;
        color: #000 !important;
        box-shadow: none !important;
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
    margin-top: 50px;
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

.about-divider {
    width: 80px;
    height: 3px;
    background: var(--accent);
    margin: 25px auto 0;
    margin-bottom: 30px;
    border-radius: 3px;
}

.gold {
    color: var(--accent);
}

.about-article {
    position: relative;
}

.about-article p {
    font-size: 1.05rem;
    line-height: 1.9;
    color: #cfcfcf;
    margin-bottom: 20px;
    text-align: justify;
}

.about-destaque-box {
    background: rgba(201, 162, 77, 0.08);
    border-left: 4px solid var(--accent);
    padding: 20px 25px;
    margin: 30px 0;
    border-radius: 8px;
}

.about-highlight {
    margin-top: 40px;
    font-size: 1.2rem;
    font-weight: 700;
    color: var(--accent);
    text-align: center;
    letter-spacing: 1px;
}
/* SECTION DIFERENCIAIS */
.features-section {
    padding: 80px 20px;
    display: flex;
    justify-content: center;
}

.features-container {
    max-width: 1100px;
    width: 100%;
    display: grid;
    grid-template-columns: repeat(5, 1fr);
    gap: 20px;
    
}

@media (max-width: 1200px) {
    .features-container {
        grid-template-columns: repeat(3, 1fr);
    }
}

@media (max-width: 768px) {
    .features-container {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media (max-width: 480px) {
    .features-container {
        grid-template-columns: 1fr;
    }
}

/* CARDS */
.feature-card {
     background: #111;
    padding: 35px 25px;
    border-radius: 15px;
    text-align: center;
    border-top: 3px solid var(--accent);
    transition: all 0.3s ease;
    box-shadow: 0 15px 35px rgba(0,0,0,0.6);
    display: flex;
    flex-direction: column;
    justify-content: center;
}
.feature-card:hover {
    transform: translateY(-10px);
}

/* ÍCONE */
.feature-icon {
    font-size: 35px;
    color: var(--accent);
    margin-bottom: 15px;
    transition: 0.3s ease;
}
.feature-card:hover .feature-icon {
    transform: scale(1.15);
}

/* TÍTULO */
.feature-card h4 {
    color: #fff;
    margin-bottom: 12px;
    font-weight: 600;
}

/* TEXTO */
.feature-card p {
    font-size: 0.95rem;
    color: #aaa;
    line-height: 1.6;
    
}

/* RESPONSIVO */
@media (max-width: 992px) {
    .features-container {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media (max-width: 576px) {
    .features-container {
        grid-template-columns: 1fr;
    }
}
.about-container {
    display: grid;
    grid-template-columns: 1fr 1fr;
    max-width: 1100px;
    gap: 50px;
    align-items: center;
}

.about-image img {
    width: 100%;
    border-radius: 20px;
    box-shadow: 0 20px 50px rgba(0,0,0,0.7);
    border-left: 6px solid var(--accent);
    border-top: 6px solid var(--accent);
}

.about-content h2 span {
    background: linear-gradient(to right, #d2a056, #9e7c2f, #e3a74e);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    display: flex;
    text-align: center;
}

@media (max-width: 992px) 
    .about-container {
        grid-template-columns: 1fr;
    }

    .language-dropdown {
    position: absolute;
    top: 25px;
    right: 200px;
    z-index: 1000;
}

.selected-lang {
    background: #1a1a1a;
    color: #fff;
    padding: 10px 14px;
    border-radius: 8px;
    cursor: pointer;
    font-size: 14px;
    border: 1px solid #333;
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
}
/* Classes para animação de Scroll (Aparecer quando descer) */
.hidden-left{
        opacity: 0;
        filter: blur(5px);
        transform: translateX(-100px);
        transition: all 1.1s ease-out;
}
.hidden-right{
        opacity: 0;
        filter: blur(5px);
        transform: translateX(100px);
        transition: all 1.1s ease-out;
}
.hidden-down{
        opacity: 0;
        filter: blur(5px);
        transform: translateY(100px);
        transition: all 1.1s ease-out;
}
.hidden-top{
        opacity: 0;
        filter: blur(5px);
        transform: translateY(100px);
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
    <a href="/login" class="btn-login-fixed ">Login</a>
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
        <div class="col-lg-3 d-none d-lg-block ">
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

<!-- CAROUSEL -->
<section class="hero-carousel">
    <div id="header-carousel" class="carousel slide" data-ride="carousel" data-interval="3000">

        <div class="carousel-inner">

            <div class="carousel-item active">
                <img class="img-fluid" src="img/corte02.jpeg" alt="">
                <div class="carousel-caption d-flex align-items-center justify-content-center">
                    <div>
                        <h3 class="text-white" data-i18n="carousel-1-title">Estilo & Precisão</h3>
                        <p class="text-light" data-i18n="carousel-1-desc">Corte e barba premium</p>
                       <a href="{{ route('servicos') }}" class="btn btn-primary" data-i18n="carousel-btn">ver mais</a>
                    </div>
                </div>
            </div>

            <div class="carousel-item">
                <img class="img-fluid" src="img/corte01.jpeg" alt="">
                <div class="carousel-caption d-flex align-items-center justify-content-center">
                    <div>
                        <h3 class="text-white" data-i18n="carousel-2-title">Barbearia Moderna</h3>
                        <p class="text-light" data-i18n="carousel-2-desc">Conforto e Cuidado</p>
                        <a href="{{ route('servicos') }}" class="btn btn-primary" data-i18n="carousel-btn">ver mais</a>
                    </div>
                </div>
            </div>

        </div>

        <a class="carousel-control-prev" href="#header-carousel" data-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </a>
        <a class="carousel-control-next" href="#header-carousel" data-slide="next">
            <span class="carousel-control-next-icon"></span>
        </a>

    </div>
</section>

<!-- SOBRE NÓS (AGORA CORRETAMENTE ABAIXO DAS IMAGENS) -->
<section class="about-section">
    <div class="about-container">

        <div class="about-image hidden-left">
            <img src="img/barbearia.jpeg" alt="Pablo Barbearia">
        </div>

        <article class="about-content ">
            <h2 class="hidden-right " style="color:#fff;  transition: all 1.1s ease-out">Sobre</h2><h2 class="hidden-right" style="color: #d59c20;  transition: all 1.3s ease-out">Pablo Barbearia</h2>
            <div class="about-divider"></div>

        
            <p class="hidden-right" style=" text-indent: 20px; text-align: justify;" data-i18n="about-p1">
                Desde 2018, a <strong class="gold">Pablo Barbearia</strong> é referência em cuidado masculino no Cristo.
                Unimos técnica, precisão e atendimento personalizado para valorizar a identidade de cada cliente.
            </p>

    
            <p class="hidden-right" style=" text-indent: 20px; text-align: justify;  transition: all 1.3s ease-out; data-i18n="about-p2">
                Fundada por <strong class="gold">Pablo Apolinário Alves</strong>,
                a barbearia nasceu com a missão de elevar o padrão do serviço na região,
                oferecendo estrutura moderna, ambiente sofisticado e profissionais qualificados.
            </p>

            <div class="about-destaque-box" data-i18n="about-destaque">
                Atendimento especializado para crianças e crianças autistas,
                com respeito, paciência e sensibilidade.
            </div>

            <p class="about-highlight" data-i18n="about-highlight">
                Mais que um corte. Uma experiência.
            </p>

        </article>

    </div>
</section>

<!-- DIFERENCIAIS -->
<div class="about-header" style="text-align:center; margin-bottom:50px; color:#fff;">
    <h2  style="color: #fff;" data-i18n="comodidades-title">Nossas<span class="gold" data-i18n="comodidades-title"> Comodidades</span></h2>
    <div class="about-divider"></div>
</div>

<!-- cards -->
<section class="features-section">
    <div class="features-container">
    <div class="feature-card hidden-top" style=" transition: all 1.0s ease-out;">
    <i class="fas fa-snowflake feature-icon"></i>
    <h4 data-i18n="feature-1-title">Ambiente Climatizado</h4>
    <p data-i18n="feature-1-desc">Conforto térmico garantido durante todo o seu atendimento.</p>
</div>

<div class="feature-card hidden-top" style=" transition: all 1.3s ease-out;">
    <i class="fas fa-wifi feature-icon"></i>
    <h4 data-i18n="feature-2-title">Wi-Fi Gratuito</h4>
    <p data-i18n="feature-2-desc">Internet rápida seu conforto enquanto aguarda.</p>
</div>

<div class="feature-card hidden-top" style=" transition: all 1.6s ease-out;">
    <i class="fas fa-child feature-icon"></i>
    <h4 data-i18n="feature-3-title">Atendimento Infantil</h4>
    <p data-i18n="feature-3-desc">Ambiente preparado para atender crianças com cuidado e paciência.</p>
</div>

<div class="feature-card hidden-top" style=" transition: all 1.9s ease-out;">
    <i class="fas fa-puzzle-piece feature-icon"></i>
    <h4 data-i18n="feature-4-title">Inclusão e Respeito</h4>
    <p data-i18n="feature-4-desc">Atendimento humanizado e adaptado para crianças autistas.</p>
</div>

<div class="feature-card hidden-top" style=" transition: all 2.2s ease-out;">
    <i class="fas fa-graduation-cap feature-icon"></i>
    <h4 data-i18n="feature-5-title">Curso Profissional</h4>
    <p data-i18n="feature-5-desc">Formação completa para novos barbeiros com visão empreendedora.</p>
</div>

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
                    📱   (83)9 9623-2639
                </p>

                <p class="footer-contact-item">
                    ✉ alvespablo600@gmail.com
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
                <a href="https://www.google.com/maps/search/?api=1&query=R.+Elias+Cavalcanti+de+Albuquerque,+2165,+Cristo+Redentor,+João+Pessoa,+PB,+58070-400"
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

        const hiddenElements = document.querySelectorAll('.hidden-down, .hidden-right, .hidden-left, .hidden-top');
        hiddenElements.forEach((el) => observer.observe(el));
</script>

<script>
// Dicionário de traduções
const translations = {
    pt: {
        'nav-home': 'Home',
        'nav-servicos': 'Serviços',
        'nav-equipe': 'Equipe',
        'carousel-1-title': 'Estilo & Precisão',
        'carousel-1-desc': 'Corte e barba premium',
        'carousel-2-title': 'Barbearia Moderna',
        'carousel-2-desc': 'Conforto e Cuidado',
        'carousel-btn': 'Agendar Agora',
        'about-title': 'Sobre <span style="color: var(--accent);">Pablo Barbearia</span>',
        'about-p1': 'Desde 2018, a Pablo Barbearia é referência em cuidado masculino no Cristo. Unimos técnica, precisão e atendimento personalizado para valorizar a identidade de cada cliente.',
        'about-p2': 'Fundada por Pablo Apolinário Alves, a barbearia nasceu com a missão de elevar o padrão do serviço na região, oferecendo estrutura moderna, ambiente sofisticado e profissionais qualificados.',
        'about-destaque': 'Atendimento especializado para crianças e crianças autistas, com respeito, paciência e sensibilidade.',
        'about-highlight': 'Mais que um corte. Uma experiência.',
        'comodidades-title': 'Nossas <span style="color: var(--accent);">Comodidades</span>',
        'feature-1-title': 'Ambiente Climatizado',
        'feature-1-desc': 'Conforto térmico garantido durante todo o seu atendimento.',
        'feature-2-title': 'Wi-Fi Gratuito',
        'feature-2-desc': 'Internet rápida seu conforto enquanto aguarda.',
        'feature-3-title': 'Atendimento Infantil',
        'feature-3-desc': 'Ambiente preparado para atender crianças com cuidado e paciência.',
        'feature-4-title': 'Inclusão e Respeito',
        'feature-4-desc': 'Atendimento humanizado e adaptado para crianças autistas.',
        'feature-5-title': 'Curso Profissional',
        'feature-5-desc': 'Formação completa para novos barbeiros com visão empreendedora.',
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
        'carousel-1-title': 'Style & Precision',
        'carousel-1-desc': 'Premium haircut and beard',
        'carousel-2-title': 'Modern Barbershop',
        'carousel-2-desc': 'Comfort and Care',
        'carousel-btn': 'Schedule Now',
        'about-title': 'About <span style="color: var(--accent);">Pablo Barbershop</span>',
        'about-p1': 'Since 2018, Pablo Barbershop has been a reference in men\'s care in Cristo. We combine technique, precision and personalized service to enhance each client\'s identity.',
        'about-p2': 'Founded by Pablo Apolinário Alves, the barbershop was born with the mission to raise the standard of service in the region, offering modern structure, sophisticated environment and qualified professionals.',
        'about-destaque': 'Specialized service for children and autistic children, with respect, patience and sensitivity.',
        'about-highlight': 'More than a haircut. An experience.',
        'comodidades-title': 'Our <span style="color: var(--accent);">Amenities</span>',
        'feature-1-title': 'Air Conditioning',
        'feature-1-desc': 'Guaranteed thermal comfort throughout your service.',
        'feature-2-title': 'Free Wi-Fi',
        'feature-2-desc': 'Fast internet for your comfort while you wait.',
        'feature-3-title': 'Children\'s Service',
        'feature-3-desc': 'Environment prepared to serve children with care and patience.',
        'feature-4-title': 'Inclusion and Respect',
        'feature-4-desc': 'Humanized and adapted service for autistic children.',
        'feature-5-title': 'Professional Course',
        'feature-5-desc': 'Complete training for new barbers with entrepreneurial vision.',
        'footer-title': 'Pablo Barbershop',
        'footer-desc': 'Tradition, style and precision in every haircut.',
        'footer-contato': 'Contact',
        'footer-horario': 'Mon–Sat: 08:00 to 18:00 <br> Sun: 08:00 to 12:00',
        'footer-localizacao': 'Location',
        'footer-endereco': 'Next to Cristo Pharmacy <br> R. Elias Cavalcanti de Albuquerque, 2165 <br> Cristo Redentor, João Pessoa - PB',
        'footer-maps': 'View on Google Maps',
        'footer-copyright': '© 2026 Pablo Barbershop • All rights reserved'
    },
    es: {
        'nav-home': 'Inicio',
        'nav-servicos': 'Servicios',
        'nav-equipe': 'Equipo',
        'carousel-1-title': 'Estilo y Precisión',
        'carousel-1-desc': 'Corte de barba premium',
        'carousel-2-title': 'Barbería Moderna',
        'carousel-2-desc': 'Comodidad y Cuidado',
        'carousel-btn': 'Agendar Ahora',
        'about-title': 'Sobre <span style="color: var(--accent);">Pablo Barbería</span>',
        'about-p1': 'Desde 2018, Pablo Barbería es referencia en cuidado masculino en Cristo. Unimos técnica, precisión y atención personalizada para valorar la identidad de cada cliente.',
        'about-p2': 'Fundada por Pablo Apolinário Alves, la barbería nació con la misión de elevar el estándar de servicio en la región, ofreciendo estructura moderna, ambiente sofisticado y profesionales calificados.',
        'about-destaque': 'Servicio especializado para niños y niños autistas, con respeto, paciencia y sensibilidad.',
        'about-highlight': 'Más que un corte. Una experiencia.',
        'comodidades-title': 'Nuestras <span style="color: var(--accent);">Comodidades</span>',
        'feature-1-title': 'Ambiente Climatizado',
        'feature-1-desc': 'Confort térmico garantizado durante todo su servicio.',
        'feature-2-title': 'Wi-Fi Gratis',
        'feature-2-desc': 'Internet rápida para su comodidad mientras espera.',
        'feature-3-title': 'Servicio Infantil',
        'feature-3-desc': 'Ambiente preparado para atender niños con cuidado y paciencia.',
        'feature-4-title': 'Inclusión y Respeto',
        'feature-4-desc': 'Servicio humanizado y adaptado para niños autistas.',
        'feature-5-title': 'Curso Profesional',
        'feature-5-desc': 'Capacitación completa para nuevos barberos con visión empresarial.',
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
