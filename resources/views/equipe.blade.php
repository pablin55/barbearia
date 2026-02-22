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
        display: flex;
        flex-direction: column;
        height: 100%;
    }

    html {
        height: 100%;
    }

    .bg-secondary { background-color: var(--secondary) !important; }

    .navbar-light .navbar-nav .nav-link {
        color: #e0e0e0;
    }

    .navbar-light .navbar-nav .active,
    .navbar-light .navbar-nav .nav-link:hover {
        color: var(--accent);
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
    .top-header {
        background: linear-gradient(180deg, #0b0b0b 0%, #141414 100%);
        border-bottom: 1px solid rgba(255,255,255,0.05);
    }

    /* TEAM SECTION */
    .team-section {
        padding: 80px 20px;
        background-color: #0e0e0e;
        flex: 1;
    }

    .team-title {
        text-align: center;
        font-size: 2.5rem;
        font-weight: 700;
        margin-bottom: 60px;
        color: #fff;
        letter-spacing: 2px;
    }

    .team-title span {
        color: var(--accent);
    }

    .team-card {
        background-color: #111;
        padding: 35px;
        border-radius: 15px;
        text-align: center;
        margin-bottom: 30px;
        border: 1px solid rgba(255,255,255,0.05);
        transition: all 0.3s ease;
    }

    .team-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 35px rgba(0,0,0,0.6);
        border: 1px solid var(--accent);
    }

    /* IMAGEM MAIOR */
    .team-image img {
        width: 200px;
        height: 200px;
        border-radius: 50%;
        object-fit: cover;
        margin-bottom: 25px;
        border: 4px solid var(--accent);
    }

    .team-role {
        color: var(--accent);
        font-size: 1rem;
        margin-bottom: 10px;
    }

    .team-description {
        font-size: 0.95rem;
        color: #e0e0e0;
        background-color: rgba(201, 162, 77, 0.08);
        border-left: 4px solid var(--accent);
        padding: 15px 18px;
        border-radius: 8px;
        line-height: 1.6;
        margin-top: 15px;
        transition: all 0.3s ease;
    }

    .team-card:hover .team-description {
        background-color: rgba(201, 162, 77, 0.12);
        border-left-color: #b18d3f;
    }

    .team-card h4 {
        color: var(--accent);
        font-size: 1.4rem;
        font-weight: 700;
        margin: 15px 0;
        letter-spacing: 1px;
    }

    .team-social {
        display: flex;
        justify-content: center;
        gap: 15px;
        margin: 20px 0;
    }

    .team-social-link {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 50px;
        height: 50px;
        background-color: #1a1a1a;
        color: var(--accent);
        border: 2px solid var(--accent);
        border-radius: 50%;
        font-size: 22px;
        transition: all 0.3s ease;
        text-decoration: none;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.5);
    }

    .team-social-link:hover {
        background-color: #b18d3f;
        color: #000;
        transform: translateY(-2px);
        text-decoration: none;
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

    footer {
    border-top: 1px solid var(--accent);
    background: linear-gradient(180deg, #141414 0%, #0b0b0b 100%);
}

.footer-icon {
    color: #aaa;
    font-size: 22px;
    margin: 0 10px;
    transition: all 0.3s ease;
    text-decoration: none;
}

.footer-icon:hover {
    color: var(--accent);
    text-shadow: 0 0 10px var(--accent);
    transform: scale(1.2);
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

<!-- EQUIPE -->
<section class="team-section">
    <div class="container">

        <h1 class="team-title">NOSSA <span>EQUIPE</span></h1>

        <div class="row justify-content-center">

            <div class="col-md-4">
                <div class="team-card">
                    <div class="team-image">
                        <img src="img/juan1.jpeg" alt="Barbeiro 1">
                    </div>
                    <h4>Juan Pablo</h4>
                    <div class="team-social">
                        <a class="team-social-link" href="https://wa.me/5583986945989" title="WhatsApp">
                            <i class="fab fa-whatsapp"></i>
                        </a>
                        <a class="team-social-link" href="https://www.instagram.com/juanzinxq_" title="Instagram">
                            <i class="fab fa-instagram"></i>
                        </a>
                    </div>
                    <p class="team-description">
                    Telefone e instagram para entrar em contato com o barbeiro para tirar dúvidas sobre os serviços oferecidos.
                    </p>
                </div>
            </div>

        <div class="col-md-4">
                <div class="team-card">
                    <div class="team-image">
                        <img src="img/pablo.jpeg" alt="Barbeiro 1">
                    </div>
                    <h4>Pablo Apolinario</h4>
                    <div class="team-social">
                        <a class="team-social-link" href="https://wa.me/558396232639" title="WhatsApp">
                            <i class="fab fa-whatsapp"></i>
                        </a>
                        <a class="team-social-link" href="https://www.instagram.com/pablo_barbearia" title="Instagram">
                            <i class="fab fa-instagram"></i>
                        </a>
                    </div>
                    <p class="team-description">
                    Telefone e instagram para entrar em contato com o barbeiro para tirar dúvidas sobre os serviços oferecidos.
                    </p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="team-card">
                    <div class="team-image">
                        <img src="" alt="Barbeiro 1">
                    </div>
                    <h4>Wesley "WS"</h4>
                    <div class="team-social">
                        <a class="team-social-link" href="https://wa.me/558396232639" title="WhatsApp">
                            <i class="fab fa-whatsapp"></i>
                        </a>
                        <a class="team-social-link" href="https://www.instagram.com/pablo_barbearia" title="Instagram">
                            <i class="fab fa-instagram"></i>
                        </a>
                    </div>
                    <p class="team-description">
                       Telefone e instagram para entrar em contato com o barbeiro para tirar dúvidas sobre os serviços oferecidos.
                    </p>
                </div>
            </div>

             <div class="col-md-4">
                <div class="team-card">
                    <div class="team-image">
                        <img src="img/vn3.jpeg" alt="Barbeiro 1">
                    </div>
                    <h4>Vinícius "VN"</h4>
                    <div class="team-social">
                        <a class="team-social-link" href="https://wa.me/5583998852577" title="WhatsApp">
                            <i class="fab fa-whatsapp"></i>
                        </a>
                        <a class="team-social-link" href="https://www.instagram.com/vn_docortee" title="Instagram">
                            <i class="fab fa-instagram"></i>
                        </a>
                    </div>
                    <p class="team-description">
                       Telefone e instagram para entrar em contato com o barbeiro para tirar dúvidas sobre os serviços oferecidos.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- AVALIAÇÃO GOOGLE -->
<section style="padding: 80px 20px; text-align: center; background-color: #111; border-top: 1px solid rgba(255,255,255,0.05);">
    
    <h2 style="color: #fff; font-weight: 700; margin-bottom: 10px;">
        Gostou do nosso atendimento?
    </h2>

    <p style="color: #ccc; margin-bottom: 30px;">
        Sua avaliação no Google é muito importante para nós.
    </p>

    <div style="margin-bottom: 25px;">
        <i class="fas fa-star star-avaliar" onclick="avaliar()" style="font-size:32px;color:#c9a24d;margin:0 6px;cursor:pointer;"></i>
        <i class="fas fa-star star-avaliar" onclick="avaliar()" style="font-size:32px;color:#c9a24d;margin:0 6px;cursor:pointer;"></i>
        <i class="fas fa-star star-avaliar" onclick="avaliar()" style="font-size:32px;color:#c9a24d;margin:0 6px;cursor:pointer;"></i>
        <i class="fas fa-star star-avaliar" onclick="avaliar()" style="font-size:32px;color:#c9a24d;margin:0 6px;cursor:pointer;"></i>
        <i class="fas fa-star star-avaliar" onclick="avaliar()" style="font-size:32px;color:#c9a24d;margin:0 6px;cursor:pointer;"></i>
    </div>

    <button onclick="avaliar()" 
        style="background:#c9a24d;color:#000;border:none;padding:12px 30px;border-radius:30px;font-weight:600;cursor:pointer;transition:0.3s;">
        Avaliar no Google
    </button>

</section>



<!-- RODAPÉ -->
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
                    📱 (83)9 9623-2639
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



<script>
function avaliar() {
    window.open("https://search.google.com/local/writereview?placeid=ChIJ5xhIrKvprAcRDFs-8o47x00", "_blank");
}
</script>

<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>

</body>
</html>
