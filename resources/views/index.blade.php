@extends('layouts.app')

@section('title', 'Home')

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
                        <h3 class="text-white" data-i18n="carousel-1-title">Estilo & Precisão</h3>
                        <p class="text-light" data-i18n="carousel-1-desc">Corte e barba premium</p>
                        <a href="{{ route('servicos') }}" class="btn btn-primary" data-i18n="carousel-btn">ver mais</a>
                    </div>
                </div>
            </div>

            <div class="carousel-item">
                <img class="img-fluid" src="{{ asset('img/corte01.jpeg') }}" alt="">
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

<!-- SOBRE NÓS -->
<section class="about-section">
    <div class="about-container">
        <div class="about-image hidden-left">
            <img src="{{ asset('img/barbearia.jpeg') }}" alt="Pablo Barbearia">
        </div>

        <article class="about-content">
            <h2 class="hidden-right" style="color:#fff; transition: all 1.1s ease-out">Sobre</h2>
            <h2 class="hidden-right" style="color: #d59c20; transition: all 1.3s ease-out">Pablo Barbearia</h2>
            <div class="about-divider"></div>

            <p class="hidden-right" style="text-indent: 20px; text-align: justify;" data-i18n="about-p1">
                Desde 2018, a <strong class="gold">Pablo Barbearia</strong> é referência em cuidado masculino no Cristo.
                Unimos técnica, precisão e atendimento personalizado para valorizar a identidade de cada cliente.
            </p>

            <p class="hidden-right" style="text-indent: 20px; text-align: justify; transition: all 1.3s ease-out;" data-i18n="about-p2">
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
    <h2 style="color: #fff;" data-i18n="comodidades-title">Nossas<span class="gold"> Comodidades</span></h2>
    <div class="about-divider"></div>
</div>

<!-- Cards de Comodidades -->
<section class="features-section">
    <div class="features-container">
        <div class="feature-card hidden-top" style="transition: all 1.0s ease-out;">
            <i class="fas fa-snowflake feature-icon"></i>
            <h4 data-i18n="feature-1-title">Ambiente Climatizado</h4>
            <p data-i18n="feature-1-desc">Conforto térmico garantido durante todo o seu atendimento.</p>
        </div>

        <div class="feature-card hidden-top" style="transition: all 1.3s ease-out;">
            <i class="fas fa-wifi feature-icon"></i>
            <h4 data-i18n="feature-2-title">Wi-Fi Gratuito</h4>
            <p data-i18n="feature-2-desc">Internet rápida seu conforto enquanto aguarda.</p>
        </div>

        <div class="feature-card hidden-top" style="transition: all 1.6s ease-out;">
            <i class="fas fa-child feature-icon"></i>
            <h4 data-i18n="feature-3-title">Atendimento Infantil</h4>
            <p data-i18n="feature-3-desc">Ambiente preparado para atender crianças com cuidado e paciência.</p>
        </div>

        <div class="feature-card hidden-top" style="transition: all 1.9s ease-out;">
            <i class="fas fa-puzzle-piece feature-icon"></i>
            <h4 data-i18n="feature-4-title">Inclusão e Respeito</h4>
            <p data-i18n="feature-4-desc">Atendimento humanizado e adaptado para crianças autistas.</p>
        </div>

        <div class="feature-card hidden-top" style="transition: all 2.2s ease-out;">
            <i class="fas fa-graduation-cap feature-icon"></i>
            <h4 data-i18n="feature-5-title">Curso Profissional</h4>
            <p data-i18n="feature-5-desc">Formação completa para novos barbeiros com visão empreendedora.</p>
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
