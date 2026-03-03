@extends('layouts.app')

@section('title', __('Team'))

@push('styles')
<link href="{{ asset('css/equipe.css') }}" rel="stylesheet">
@endpush

@section('content')
<!-- EQUIPE -->
<section class="team-section">
    <div class="container">
        <h1 class="team-title">
            {{ __('OUR TEAM') }}
        </h1>

        <div class="row justify-content-center">
            <!-- JUAN -->
            <div class="col-md-4">
                <div class="team-card hidden-left">
                    <div class="team-image">
                        <img src="{{ asset('img/juan1.jpeg') }}" alt="Juan Pablo">
                    </div>
                    <h4>Juan Pablo</h4>

                    <div class="team-social">
                        <a class="team-social-link" href="https://wa.me/5583986945989">
                            <i class="fab fa-whatsapp"></i>
                        </a>
                        <a class="team-social-link" href="https://www.instagram.com/juanzinxq_">
                            <i class="fab fa-instagram"></i>
                        </a>
                    </div>

                    <p class="team-description">
                        {{ __('barber-contact-description') }}
                    </p>
                </div>
            </div>

            <!-- CEO -->
            <div class="col-md-4">
                <div class="team-card hidden-top" style="border: 2px solid var(--accent); box-shadow: 0 0 20px rgba(201, 162, 77, 0.3); position: relative;">
                    <div style="position: absolute; top: -15px; right: 20px; background: linear-gradient(135deg, var(--accent), #b18d3f); color: #000; padding: 8px 20px; border-radius: 25px; font-weight: 700; font-size: 0.9rem; text-transform: uppercase; letter-spacing: 1px; box-shadow: 0 5px 15px rgba(201, 162, 77, 0.4);">
                        CEO
                    </div>

                    <div class="team-image">
                        <img src="{{ asset('img/pablo.jpeg') }}" alt="CEO - Pablo Apolinario Alves">
                    </div>

                    <h4>Pablo Apolinario</h4>
                    <div class="team-role" style="font-weight: 700; font-size: 1.1rem;">{{ __('Founder & CEO') }}</div>

                    <div class="team-social">
                        <a class="team-social-link" href="https://wa.me/558396232639">
                            <i class="fab fa-whatsapp"></i>
                        </a>
                        <a class="team-social-link" href="https://www.instagram.com/pablo_barbearia">
                            <i class="fab fa-instagram"></i>
                        </a>
                    </div>

                    <p class="team-description">
                        {{ __('ceo-description') }}
                    </p>
                </div>
            </div>

            <!-- WESLEY -->
            <div class="col-md-4">
                <div class="team-card hidden-right">
                    <div class="team-image">
                        <img src="{{ asset('img/wss.jpeg') }}" alt="Wesley">
                    </div>

                    <h4>Wesley "WS"</h4>

                    <div class="team-social">
                        <a class="team-social-link" href="https://wa.me/558396232639">
                            <i class="fab fa-whatsapp"></i>
                        </a>
                        <a class="team-social-link" href="https://www.instagram.com/pablo_barbearia">
                            <i class="fab fa-instagram"></i>
                        </a>
                    </div>

                    <p class="team-description">
                        {{ __('barber-contact-description') }}
                    </p>
                </div>
            </div>

            <!-- VINICIUS -->
            <div class="col-md-4">
                <div class="team-card hidden-down">
                    <div class="team-image">
                        <img src="{{ asset('img/vnz.jpeg') }}" alt="Vinícius">
                    </div>

                    <h4>Vinícius "VN"</h4>

                    <div class="team-social">
                        <a class="team-social-link" href="https://wa.me/5583998852577">
                            <i class="fab fa-whatsapp"></i>
                        </a>
                        <a class="team-social-link" href="https://www.instagram.com/vn_docortee">
                            <i class="fab fa-instagram"></i>
                        </a>
                    </div>

                    <p class="team-description">
                        {{ __('barber-contact-description') }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- FEEDBACK SECTION -->
<section class="feedback-section">
    <h2>
        {{ __('Did you like our service?') }}
    </h2>

    <p>
        {{ __('Your rating on Google is very important to us.') }}
    </p>

    <div style="margin-bottom: 25px;">
        <i class="fas fa-star star-avaliar" onclick="avaliar()"></i>
        <i class="fas fa-star star-avaliar" onclick="avaliar()"></i>
        <i class="fas fa-star star-avaliar" onclick="avaliar()"></i>
        <i class="fas fa-star star-avaliar" onclick="avaliar()"></i>
        <i class="fas fa-star star-avaliar" onclick="avaliar()"></i>
    </div>

    <button onclick="avaliar()" class="feedback-btn">
        {{ __('Rate on Google') }}
    </button>
</section>
@endsection

@push('scripts')
<script>
    function avaliar() {
        window.open("https://search.google.com/local/writereview?placeid=ChIJ5xhIrKvprAcRDFs-8o47x00", "_blank");
    }
</script>
@endpush
