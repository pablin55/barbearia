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

</style>
</head>

<body>

<!-- TOPO -->
<div class="top-header position-relative">
    <a href="/login" class="btn-login-fixed">Login</a>

    <div class="row align-items-center py-3 px-xl-5 m-0">
        <div class="col-lg-3 d-none d-lg-block">
            <img src="{{ asset('img/pbar.png') }}" alt="Pablo Barbearia" style="height: 120px;">
        </div>

        <div class="col-lg-6">
            <nav class="navbar navbar-expand-lg navbar-light py-3 py-lg-0 justify-content-center">
               <div class="navbar-wrapper">
    <div class="navbar-nav custom-nav-box">
        <a href="{{ route('home') }}" class="nav-item nav-link">Home</a>
        <a href="{{ route('servicos') }}" class="nav-item nav-link">Serviços</a>
        <a href="{{ route('equipe') }}" class="nav-item nav-link active">Equipe</a>
    </div>
</div>

            </nav>
        </div>
<section class="about-section">
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
    <article class="about-article">
        <h2>Sobre <span>Pablo Barbearia</span></h2>

        <p>
            A <strong>Pablo Barbearia</strong> nasceu com o propósito de oferecer mais do que um corte de cabelo.
            Aqui, cada detalhe é pensado para proporcionar uma experiência única, unindo estilo, conforto
            e atendimento de alto nível dentro de uma comunidade no bairro do cristo.
        </p>

        <p>
    Fundada em <strong>2018</strong>, a Pablo Barbearia nasceu com a missão de elevar o conceito de cuidado masculino,
    unindo técnica, estilo e atendimento de excelência. Desde o início, o foco sempre foi oferecer muito mais
    do que um simples corte, mas uma experiência completa para cada cliente.
    <br><br>
    À frente da barbearia está <strong>Pablo Apolinário Alves</strong>, CEO e fundador, profissional com
    anos de experiência no mercado de trabalho e profundo conhecimento na arte da barbearia.
    Sua trajetória é marcada pela dedicação, constante evolução e compromisso em entregar
    qualidade, confiança e identidade em cada detalhe.
        </p>


        <p>
            Trabalhamos com técnicas modernas, produtos de qualidade e profissionais qualificados,
            sempre respeitando o estilo e a personalidade de cada cliente.
            Nosso ambiente foi criado para quem valoriza excelência e tradição.
        </p>

        <p class="about-highlight">
            Mais do que uma barbearia, somos um espaço de confiança, identidade e atitude.
        </p>
    </article>
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
                    📱  📱 (83)9 9623-2639
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
</script>

</body>
</html>
