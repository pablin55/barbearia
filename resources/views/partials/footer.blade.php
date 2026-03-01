<!-- RODAPÉ PREMIUM -->
<footer class="container-fluid bg-secondary pt-5 pb-3">
    <div class="container">
        <div class="row">
            <!-- LOGO + FRASE -->
            <div class="col-md-4 mb-4 mb-md-0">
                <h4 class="footer-section-title">{{ __('Pablo Barbershop') }}</h4>
                <p class="text-muted">
                    {{ __('Tradition, style and precision in every haircut.') }}
                </p>
            </div>

            <!-- CONTATO -->
            <div class="col-md-4 mb-4 mb-md-0">
                <h5 class="footer-section-title">{{ __('Contact') }}</h5>
                <p class="footer-contact-item">
                    📱 (83) 9 9623-2639
                </p>
                <p class="footer-contact-item">
                    ✉️ alvespablo600@gmail.com
                </p>
                <p class="footer-contact-item">
                    {!! __('business-hours') !!}
                </p>
            </div>

            <!-- LOCALIZAÇÃO -->
            <div class="col-md-4 d-flex flex-column justify-content-center">
                <h5 class="footer-section-title">{{ __('Location') }}</h5>
                <p class="text-muted mb-3" style="font-size: 0.9rem;">
                    {!! __('address') !!}
                </p>
                <a href="https://www.google.com/maps/search/?api=1&query=R.+Elias+Cavalcanti+de+Albuquerque,+2165,+Cristo+Redentor,+João+Pessoa,+PB,+58070-400"
                   target="_blank"
                   class="location-button">
                    <i class="fas fa-map-marker-alt"></i>
                    {{ __('View on Google Maps') }}
                </a>
            </div>
        </div>

        <hr class="footer-divider">

        <div class="text-center text-muted">
            {{ __('© 2026 Pablo Barbershop • All rights reserved') }}
        </div>
    </div>
</footer>
