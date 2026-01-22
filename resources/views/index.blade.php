<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Pablo Barbearia</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <!-- img titulo -->
    <link rel="icon" type="image/png" href="{{ asset('img/pbarbe.png') }}">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet"> 

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">

    <!-- CORES MASCULINAS -->
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

    /* BOTÃO LOGIN FIXO À DIREITA */
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
    }

    .btn-login-fixed:hover {
        background-color: #b18d3f;
        color: #000;
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

    /* HERO CAROUSEL CENTRALIZADO */
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

    /* IMAGENS DO CAROUSEL */
    #header-carousel .carousel-item img {
        width: 100%;
        height: 410px;
        object-fit: cover;
    }

    /* =========================
       ADIÇÕES — TOPO DIFERENCIAL
       ========================= */

    .top-header {
        background: linear-gradient(
            180deg,
            #0b0b0b 0%,
            #141414 100%
        );
        border-bottom: 1px solid rgba(255,255,255,0.05);
    }

    .navbar-nav .nav-link {
        font-weight: 500;
        margin: 0 14px;
        position: relative;
        transition: 0.3s ease;
    }

    .navbar-nav .nav-link.active {
        color: var(--accent);
    }

    .navbar-nav .nav-link.active::after {
        content: "";
        position: absolute;
        left: 0;
        bottom: -6px;
        width: 100%;
        height: 2px;
        background-color: var(--accent);
    }

    .btn-login-fixed {
        box-shadow: 0 10px 25px rgba(0,0,0,0.4);
        transition: all 0.3s ease;
    }

    .btn-login-fixed:hover {
        transform: translateY(-2px);
    }
</style>

</head>

<body>

<!-- TOPO -->
<div class="top-header position-relative">

    <!-- BOTÃO LOGIN FIXO -->
    <a href="/login" class="btn-login-fixed">Login</a>

    <div class="row align-items-center py-3 px-xl-5 m-0">

        <!-- LOGO -->
        <div class="col-lg-3 d-none d-lg-block">
            <img 
                src="{{ asset('img/pbarbe.png') }}" 
                alt="Pablo Barbearia"
                style="height: 80px;"
            >
        </div>

        <!-- MENU -->
        <div class="col-lg-6">
            <nav class="navbar navbar-expand-lg navbar-light py-3 py-lg-0 justify-content-center">
                <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse justify-content-center" id="navbarCollapse">
                    <div class="navbar-nav">
                        <a href="#" class="nav-item nav-link active">Home</a>
                        <a href="#" class="nav-item nav-link">Serviços</a>
                        <a href="#" class="nav-item nav-link">Equipe</a>
                    </div>
                </div>
            </nav>
        </div>

        <!-- COLUNA VAZIA (EQUILÍBRIO) -->
        <div class="col-lg-3 d-none d-lg-block"></div>

    </div>
</div>

<!-- CAROUSEL -->

<section class="hero-carousel">
    <div id="header-carousel" class="carousel slide" data-ride="carousel" data-interval="3000">

            <!-- CAROUSEL AUTOMÁTICO -->
            <div id="header-carousel" class="carousel slide" data-ride="carousel" data-interval="3000">

                <div class="carousel-inner">

                    <div class="carousel-item active" style="height:410px;">
                        <img class="img-fluid" src="img/corte02.jpeg" alt="">
                        <div class="carousel-caption d-flex align-items-center justify-content-center">
                            <div>
                                <h3 class="text-white">Estilo & Precisão</h3>
                                <p class="text-light">Corte e barba premium</p>
                                <a class="btn btn-primary">Agendar Agora</a>
                            </div>
                        </div>
                    </div>

                    <div class="carousel-item" style="height:410px;">
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
        </div>
    </div>
</div>
</section>

<!-- RODAPÉ -->
<footer class="container-fluid bg-secondary text-center py-4">
    <div class="mb-3">
        <a class="footer-icon" href="https://www.instagram.com/pablo_barbearia?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==" aria-label="Instagram">
            <i class="fab fa-instagram"></i>
        </a>
        <a class="footer-icon" href="https://wa.me/558396232639" aria-label="WhatsApp">
            <i class="fab fa-whatsapp"></i>
        </a>
    </div>

    <p class="mb-0 text-muted">
        © Pablo Barbearia • Todos os direitos reservados
    </p>
</footer>


<!-- JS (OBRIGATÓRIO PRA ANIMAÇÃO) -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
<script src="lib/easing/easing.min.js"></script>
<script src="lib/owlcarousel/owl.carousel.min.js"></script>
<script src="js/main.js"></script>

<script>
    $('#header-carousel').carousel({
        interval: 3000,
        ride: 'carousel'
    });
</script>

</body>
</html>
