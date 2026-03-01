<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Pablo Barbearia - @yield('title', 'Home')</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <link rel="icon" type="image/png" href="{{ asset('img/pbar.png') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="{{ asset('lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @stack('styles')
</head>

<body>
    @include('partials.header')

    @yield('content')

    @include('partials.footer')

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    
    <script>
        const observer = new IntersectionObserver((entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('show');
                }
            });
        });

        const hiddenElements = document.querySelectorAll('.hidden, .hidden-down, .hidden-right, .hidden-left, .hidden-top');
        hiddenElements.forEach((el) => observer.observe(el));
    </script>

    <script>
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
                'services-title': 'Nossos <span style="color: var(--accent);">Serviços</span>',
                'combos-title': 'Nossos <span style="color: var(--accent);">Planos Mensais</span>',
                'team-title': 'NOSSA <span style="color: var(--accent);">EQUIPE</span>',
                'team-feedback': 'Gostou do nosso atendimento?',
                'team-feedback-desc': 'Sua avaliação no Google é muito importante para nós.',
                'team-feedback-btn': 'Avaliar no Google',
                'footer-title': 'Pablo Barbearia',
                'footer-desc': 'Tradição, estilo e precisão em cada corte.',
                'footer-contato': 'Contato',
                'footer-horario': '🕒 Seg–Sáb: 08:00 às 18:00 <br> Dom: 08:00 às 12:00',
                'footer-localizacao': 'Localização',
                'footer-endereco': 'Ao lado da Farmácia Cristo <br> R. Elias Cavalcanti de Albuquerque, 2165 <br> Cristo Redentor, João Pessoa - PB',
                'footer-maps': '<i class="fas fa-map-marker-alt"></i> Ver no Google Maps',
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
                'services-title': 'Our <span style="color: var(--accent);">Services</span>',
                'combos-title': 'Our <span style="color: var(--accent);">Monthly Plans</span>',
                'team-title': 'OUR <span style="color: var(--accent);">TEAM</span>',
                'team-feedback': 'Did you like our service?',
                'team-feedback-desc': 'Your rating on Google is very important to us.',
                'team-feedback-btn': 'Rate on Google',
                'footer-title': 'Pablo Barbershop',
                'footer-desc': 'Tradition, style and precision in every haircut.',
                'footer-contato': 'Contact',
                'footer-horario': '🕒 Mon–Sat: 08:00 to 18:00 <br> Sun: 08:00 to 12:00',
                'footer-localizacao': 'Location',
                'footer-endereco': 'Next to Cristo Pharmacy <br> R. Elias Cavalcanti de Albuquerque, 2165 <br> Cristo Redentor, João Pessoa - PB',
                'footer-maps': '<i class="fas fa-map-marker-alt"></i> View on Google Maps',
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
                'services-title': 'Nuestros <span style="color: var(--accent);">Servicios</span>',
                'combos-title': 'Nuestros <span style="color: var(--accent);">Planes Mensuales</span>',
                'team-title': 'NUESTRO <span style="color: var(--accent);">EQUIPO</span>',
                'team-feedback': '¿Te gustó nuestro servicio?',
                'team-feedback-desc': 'Tu calificación en Google es muy importante para nosotros.',
                'team-feedback-btn': 'Calificar en Google',
                'footer-title': 'Pablo Barbería',
                'footer-desc': 'Tradición, estilo y precisión en cada corte.',
                'footer-contato': 'Contacto',
                'footer-horario': '🕒 Lun–Sáb: 08:00 a 18:00 <br> Dom: 08:00 a 12:00',
                'footer-localizacao': 'Ubicación',
                'footer-endereco': 'Al lado de la Farmacia Cristo <br> R. Elias Cavalcanti de Albuquerque, 2165 <br> Cristo Redentor, João Pessoa - PB',
                'footer-maps': '<i class="fas fa-map-marker-alt"></i> Ver en Google Maps',
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

    @stack('scripts')
</body>
</html>
