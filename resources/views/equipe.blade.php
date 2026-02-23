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

<!-- EQUIPE -->
<section class="team-section">
    <div class="container">

        <h1 class="team-title" data-i18n="team-title">NOSSA <span style="color: var(--accent);">EQUIPE</span></h1>

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
                        <img src="img/wss.jpeg" alt="Barbeiro 1">
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
                        <img src="img/vnz.jpeg" alt="Barbeiro 1">
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

<section style="padding: 80px 20px; text-align: center; background-color: #111; border-top: 1px solid rgba(255,255,255,0.05);">
    
    <h2 style="color: #fff; font-weight: 700; margin-bottom: 10px;" data-i18n="team-feedback">
        Gostou do nosso atendimento?
    </h2>

    <p style="color: #ccc; margin-bottom: 30px;" data-i18n="team-feedback-desc">
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
        style="background:#c9a24d;color:#000;border:none;padding:12px 30px;border-radius:30px;font-weight:600;cursor:pointer;transition:0.3s;"
        data-i18n="team-feedback-btn">
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
                <h4 class="footer-section-title" data-i18n="footer-title">Pablo Barbearia</h4>
                <p class="text-muted" data-i18n="footer-desc">
                    Tradição, estilo e precisão em cada corte.
                </p>
            </div>

            <!-- CONTATO -->
            <div class="col-md-4 mb-4 mb-md-0">
                <h5 class="footer-section-title" data-i18n="footer-contato">Contato</h5>

                <p class="footer-contact-item">
                    📱 (83)9 9623-2639
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



<script>
function avaliar() {
    window.open("https://search.google.com/local/writereview?placeid=ChIJ5xhIrKvprAcRDFs-8o47x00", "_blank");
}
</script>

<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>

<script>
const translations = {
    pt: {
        'nav-home': 'Home',
        'nav-servicos': 'Serviços',
        'nav-equipe': 'Equipe',
        'team-title': 'NOSSA <span style="color: var(--accent);">EQUIPE</span>',
        'team-feedback': 'Gostou do nosso atendimento?',
        'team-feedback-desc': 'Sua avaliação no Google é muito importante para nós.',
        'team-feedback-btn': 'Avaliar no Google',
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
        'team-title': 'OUR <span style="color: var(--accent);">TEAM</span>',
        'team-feedback': 'Did you like our service?',
        'team-feedback-desc': 'Your rating on Google is very important to us.',
        'team-feedback-btn': 'Rate on Google',
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
        'team-title': 'NUESTRO <span style="color: var(--accent);">EQUIPO</span>',
        'team-feedback': '¿Te gustó nuestro servicio?',
        'team-feedback-desc': 'Tu calificación en Google es muy importante para nosotros.',
        'team-feedback-btn': 'Calificar en Google',
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
