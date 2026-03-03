@extends('layouts.app')

@section('title', __('Home'))

@push('styles')
<link href="{{ asset('css/index.css') }}" rel="stylesheet">
@endpush

@section('content')
<!-- CAROUSEL -->
<section class="hero-carousel">
    <div id="header-carousel" class="carousel slide" data-ride="carousel" data-interval="3000">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="img-fluid" src="{{ asset('img/corte02.jpeg') }}" alt="">
                <div class="carousel-caption d-flex align-items-center justify-content-center">
                    <div>
                        <h3 class="text-white">{{ __('Style & Precision') }}</h3>
                        <p class="text-light">{{ __('Premium haircut and beard') }}</p>
                        <a href="{{ route('servicos') }}" class="btn btn-primary">{{ __('See more') }}</a>
                    </div>
                </div>
            </div>

            <div class="carousel-item">
                <img class="img-fluid" src="{{ asset('img/corte01.jpeg') }}" alt="">
                <div class="carousel-caption d-flex align-items-center justify-content-center">
                    <div>
                        <h3 class="text-white">{{ __('Modern Barbershop') }}</h3>
                        <p class="text-light">{{ __('Comfort and Care') }}</p>
                        <a href="{{ route('servicos') }}" class="btn btn-primary">{{ __('See more') }}</a>
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

<!-- SOBRE NÓS -->
<section class="about-section">
    <div class="about-container">
        <div class="about-image hidden-left">
            <img src="{{ asset('img/barbearia.jpeg') }}" alt="{{ __('Pablo Barbershop') }}">
        </div>

        <article class="about-content">
            <h2 class="hidden-right" style="color:#fff; transition: all 1.1s ease-out">{{ __('About') }}</h2>
            <h2 class="hidden-right" style="color: #d59c20; transition: all 1.3s ease-out">{{ __('Pablo Barbershop') }}</h2>
            <div class="about-divider"></div>

            <p class="hidden-right" style="text-indent: 20px; text-align: justify;">
                {!! __('about-p1') !!}
            </p>

            <p class="hidden-right" style="text-indent: 20px; text-align: justify; transition: all 1.3s ease-out;">
                {!! __('about-p2') !!}
            </p>

            <div class="about-destaque-box">
                {{ __('Specialized service for children and autistic children, with respect, patience and sensitivity.') }}
            </div>

            <p class="about-highlight">
                {{ __('More than a haircut. An experience.') }}
            </p>
        </article>
    </div>
</section>

<!-- DIFERENCIAIS -->
<div class="about-header" style="text-align:center; margin-bottom:50px; color:#fff;">
    <h2 style="color: #fff;">{{ __('Our') }} <span class="gold">{{ __('Amenities') }}</span></h2>
    <div class="about-divider"></div>
</div>

<!-- Cards de Comodidades -->
<section class="features-section">
    <div class="features-container">
        <div class="feature-card hidden-top" style="transition: all 1.0s ease-out;">
            <i class="fas fa-snowflake feature-icon"></i>
            <h4>{{ __('Air Conditioning') }}</h4>
            <p>{{ __('Guaranteed thermal comfort throughout your service.') }}</p>
        </div>

        <div class="feature-card hidden-top" style="transition: all 1.3s ease-out;">
            <i class="fas fa-wifi feature-icon"></i>
            <h4>{{ __('Free Wi-Fi') }}</h4>
            <p>{{ __('Fast internet for your comfort while you wait.') }}</p>
        </div>

        <div class="feature-card hidden-top" style="transition: all 1.6s ease-out;">
            <i class="fas fa-child feature-icon"></i>
            <h4>{{ __("Children's Service") }}</h4>
            <p>{{ __('Environment prepared to serve children with care and patience.') }}</p>
        </div>

        <div class="feature-card hidden-top" style="transition: all 1.9s ease-out;">
            <i class="fas fa-puzzle-piece feature-icon"></i>
            <h4>{{ __('Inclusion and Respect') }}</h4>
            <p>{{ __('Humanized and adapted service for autistic children.') }}</p>
        </div>

        <div class="feature-card hidden-top" style="transition: all 2.2s ease-out;">
            <i class="fas fa-graduation-cap feature-icon"></i>
            <h4>{{ __('Professional Course') }}</h4>
            <p>{{ __('Complete training for new barbers with entrepreneurial vision.') }}</p>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>
    $('#header-carousel').carousel({
        interval: 3000,
        ride: 'carousel'
    });
</script>
@endpush
