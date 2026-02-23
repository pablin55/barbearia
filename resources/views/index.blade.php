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
/* NAV BOX PREMIUM */
.navbar-wrapper {
    display: flex;
    justify-content: center;
}

.custom-nav-box {
    background: #111;
    padding: 12px 25px;
    border-radius: 50px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.6);
    border: 1px solid rgba(255,255,255,0.05);
    display: flex;
    gap: 25px;
}

/* Links */
.custom-nav-box .nav-link {
    color: #ccc;
    font-weight: 500;
    transition: 0.3s ease;
    padding: 8px 14px;
    border-radius: 20px;
}

/* Hover */
.custom-nav-box .nav-link:hover {
    background-color: rgba(201,162,77,0.15);
    color: var(--accent);
}

/* Ativo */
.custom-nav-box .active {
    background-color: var(--accent);
    color: #000 !important;
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
    
    /* Classes para animação de Scroll (Aparecer quando descer) */
    .hidden {
        opacity: 0;
        filter: blur(5px);
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
    <a href="/login" class="btn-login-fixed ">Login</a>

    <div class="row align-items-center py-3 px-xl-5 m-0">
        <div class="col-lg-3 d-none d-lg-block ">
            <img src="{{ asset('img/pbar.png') }}" alt="Pablo Barbearia" style="height: 120px;">
        </div>

        <div class="col-lg-6">
            <nav class="navbar navbar-expand-lg navbar-light py-3 py-lg-0 justify-content-center">
    <div class="navbar-wrapper">
        <div class="navbar-nav custom-nav-box">

            <a href="{{ route('home') }}"
               class="nav-item nav-link {{ request()->routeIs('home') ? 'active' : '' }}">
               Home
            </a>

            <a href="{{ route('servicos') }}"
               class="nav-item nav-link {{ request()->routeIs('servicos') ? 'active' : '' }}">
               Serviços
            </a>

            <a href="{{ route('equipe') }}"
               class="nav-item nav-link {{ request()->routeIs('equipe') ? 'active' : '' }}">
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
                        <h3 class="text-white">Estilo & Precisão</h3>
                        <p class="text-light">Corte e barba premium</p>
                        <a class="btn btn-primary">Agendar Agora</a>
                    </div>
                </div>
            </div>

            <div class="carousel-item">
                <img class="img-fluid" src="img/corte01.jpeg" alt="">
                <div class="carousel-caption d-flex align-items-center justify-content-center">
                    <div>
                        <h3 class="text-white">Barbearia Moderna</h3>
                        <p class="text-light">Conforto e Cuidado</p>
                        <a class="btn btn-primary">Agendar Agora</a>
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

        <div class="about-image hidden">
            <img src="img/barbearia.jpeg" alt="Pablo Barbearia">
        </div>

        <article class="about-content hidden">
            <h2 style="color:#fff;">Sobre <span>Pablo Barbearia</span></h2>
            <div class="about-divider"></div>

            <p style=" text-indent: 20px; text-align: justify;">
                Desde 2018, a <strong class="gold">Pablo Barbearia</strong> é referência em cuidado masculino no Cristo.
                Unimos técnica, precisão e atendimento personalizado para valorizar a identidade de cada cliente.
            </p>

            <p style=" text-indent: 20px; text-align: justify;">
                Fundada por <strong class="gold">Pablo Apolinário Alves</strong>,
                a barbearia nasceu com a missão de elevar o padrão do serviço na região,
                oferecendo estrutura moderna, ambiente sofisticado e profissionais qualificados.
            </p>

            <div class="about-destaque-box">
                Atendimento especializado para crianças e crianças autistas,
                com respeito, paciência e sensibilidade.
            </div>

            <p class="about-highlight">
                Mais que um corte. Uma experiência.
            </p>

        </article>

    </div>
</section>

<!-- DIFERENCIAIS -->
<div class="about-header" style="text-align:center; margin-bottom:50px; color:#fff;">
    <h2  class="hidden" style="color:#fff;">Nossos <span class="gold hidden" >Diferenciais</span></h2>
    <div class="about-divider"></div>
</div>

<!-- cards -->
<section class="features-section hidden">
    <div class="features-container">
    <div class="feature-card">
    <i class="fas fa-snowflake feature-icon"></i>
    <h4>Ambiente Climatizado</h4>
    <p>Conforto térmico garantido durante todo o seu atendimento.</p>
</div>

<div class="feature-card">
    <i class="fas fa-wifi feature-icon"></i>
    <h4>Wi-Fi Gratuito</h4>
    <p>Internet rápida seu conforto enquanto aguarda.</p>
</div>

<div class="feature-card">
    <i class="fas fa-child feature-icon"></i>
    <h4>Atendimento Infantil</h4>
    <p>Ambiente preparado para atender crianças com cuidado e paciência.</p>
</div>

<div class="feature-card">
    <i class="fas fa-puzzle-piece feature-icon"></i>
    <h4>Inclusão e Respeito</h4>
    <p>Atendimento humanizado e adaptado para crianças autistas.</p>
</div>

<div class="feature-card">
    <i class="fas fa-graduation-cap feature-icon"></i>
    <h4>Curso Profissional</h4>
    <p>Formação completa para novos barbeiros com visão empreendedora.</p>
</div>

    </div>
</section>

<!-- RODAPÉ PREMIUM -->
<footer class="container-fluid bg-secondary pt-5 pb-3">

    <div class="container">
        <div class="row">

            <!-- LOGO + FRASE -->
            <div class="col-md-4 mb-4 mb-md-0">
                <h4 class="footer-section-title">Pablo Barbearia</h4>
                <p class="text-muted">
                    Tradição, estilo e precisão em cada corte.
                </p>
            </div>

            <!-- CONTATO -->
            <div class="col-md-4 mb-4 mb-md-0">
                <h5 class="footer-section-title">Contato</h5>

                <p class="footer-contact-item">
                    📱   (83)9 9623-2639
                </p>

                <p class="footer-contact-item">
                    ✉ alvespablo600@gmail.com
                </p>

                <p class="footer-contact-item">
                    🕒 Seg–Sáb: 08:00 às 18:00 <br>
                    Dom: 08:00 às 12:00
                </p>
            </div>

            <!-- LOCALIZAÇÃO -->
            <div class="col-md-4 d-flex flex-column justify-content-center">
                <h5 class="footer-section-title">Localização</h5>
                <p class="text-muted mb-3" style="font-size: 0.9rem;">
                    Ao lado da Farmácia Cristo <br>
                    R. Elias Cavalcanti de Albuquerque, 2165 <br>
                    Cristo Redentor, João Pessoa - PB
                </p>
                <a href="https://www.google.com/maps/search/?api=1&query=R.+Elias+Cavalcanti+de+Albuquerque,+2165,+Cristo+Redentor,+João+Pessoa,+PB,+58070-400"
                   target="_blank"
                   class="location-button">
                    <i class="fas fa-map-marker-alt"></i>
                    Ver no Google Maps
                </a>
            </div>

        </div>

        <hr class="footer-divider">

        <div class="text-center text-muted">
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
                } else {
                    entry.target.classList.remove('show');
                }
            });
        });

        const hiddenElements = document.querySelectorAll('.hidden');
        hiddenElements.forEach((el) => observer.observe(el));
</script>

</body>
</html>
