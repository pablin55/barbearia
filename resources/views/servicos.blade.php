@extends('layouts.app')

@section('title', __('Services'))

@push('styles')
<link href="{{ asset('css/servicos.css') }}" rel="stylesheet">
@endpush

@section('content')
<!-- SERVIÇOS -->
<section class="services-section">
    <div class="services-container">
        <h2>
            {{ __('Our Services') }}
        </h2>

        <div class="services-grid">
            <div class="service-card hidden">
                <img src="{{ asset('img/simp.jpeg') }}" alt="{{ __('Simple Cut / Machine only') }}">
                <div class="service-info">
                    <h3>{{ __('Simple Cut / Machine only') }}</h3>
                    <p>R$19,90</p>
                    <a class="btn btn-primary">{{ __('Schedule Now') }}</a>
                </div>
            </div>

            <div class="service-card hidden">
                <img src="{{ asset('img/nv.jpeg') }}" alt="{{ __('Social Cut / Fade / Surfer') }}">
                <div class="service-info">
                    <h3>{{ __('Social Cut / Fade / Surfer') }}</h3>
                    <p>R$29,90</p>
                    <a class="btn btn-primary">{{ __('Schedule Now') }}</a>
                </div>
            </div>

            <div class="service-card hidden">
                <img src="{{ asset('img/tes.jpeg') }}" alt="{{ __('Scissor Cut') }}">
                <div class="service-info">
                    <h3>{{ __('Scissor Cut') }}</h3>
                    <p>R$49,90</p>
                    <a class="btn btn-primary">{{ __('Schedule Now') }}</a>
                </div>
            </div>

            <div class="service-card hidden">
                <img src="{{ asset('img/cb.jpeg') }}" alt="{{ __('Cut with Beard') }}">
                <div class="service-info">
                    <h3>{{ __('Cut with Beard') }}</h3>
                    <p>R$59,90</p>
                    <a class="btn btn-primary">{{ __('Schedule Now') }}</a>
                </div>
            </div>

            <div class="service-card hidden">
                <img src="{{ asset('img/nv.jpeg') }}" alt="{{ __('Cut + Highlights / Platinum') }}">
                <div class="service-info">
                    <h3>{{ __('Cut + Highlights / Platinum') }}</h3>
                    <p>R$99,90</p>
                    <a class="btn btn-primary">{{ __('Schedule Now') }}</a>
                </div>
            </div>

            <div class="service-card hidden">
                <img src="{{ asset('img/nrm.jpeg') }}" alt="{{ __('Cut with Pigmentation') }}">
                <div class="service-info">
                    <h3>{{ __('Cut with Pigmentation') }}</h3>
                    <p>R$49,90</p>
                    <a class="btn btn-primary">{{ __('Schedule Now') }}</a>
                </div>
            </div>

            <div class="service-card hidden">
                <img src="{{ asset('img/barb.jpeg') }}" alt="{{ __('Beard') }}">
                <div class="service-info">
                    <h3>{{ __('Beard') }}</h3>
                    <p>R$29,90</p>
                    <a class="btn btn-primary">{{ __('Schedule Now') }}</a>
                </div>
            </div>

            <div class="service-card hidden">
                <img src="{{ asset('img/bp.png') }}" alt="{{ __('Beard with Pigmentation') }}">
                <div class="service-info">
                    <h3>{{ __('Beard with Pigmentation') }}</h3>
                    <p>R$39,90</p>
                    <a class="btn btn-primary">{{ __('Schedule Now') }}</a>
                </div>
            </div>

            <div class="service-card hidden">
                <img src="{{ asset('img/bb.jpeg') }}" alt="{{ __('Cut + Hydration') }}">
                <div class="service-info">
                    <h3>{{ __('Cut + Hydration') }}</h3>
                    <p>R$49,90</p>
                    <a class="btn btn-primary">{{ __('Schedule Now') }}</a>
                </div>
            </div>

            <div class="service-card hidden">
                <img src="{{ asset('img/sobraa.png') }}" alt="{{ __('Eyebrow') }}">
                <div class="service-info">
                    <h3>{{ __('Eyebrow') }}</h3>
                    <p>R$9,90</p>
                    <a class="btn btn-primary">{{ __('Schedule Now') }}</a>
                </div>
            </div>

            <div class="service-card hidden">
                <img src="{{ asset('img/pint.jpeg') }}" alt="{{ __('Colorimetry + Cut') }}">
                <div class="service-info">
                    <h3>{{ __('Colorimetry + Cut') }}</h3>
                    <p>R$149,90</p>
                    <small style="color:#999; display:block; margin-bottom:10px;">
                        {{ __('(Bleaching + dye application + cut)') }}
                    </small>
                    <a class="btn btn-primary">{{ __('Schedule Now') }}</a>
                </div>
            </div>

            <div class="service-card hidden">
                <img src="{{ asset('img/inf.jpeg') }}" alt="{{ __("Children's Cut") }}">
                <div class="service-info">
                    <h3>{{ __("Children's Cut") }}</h3>
                    <p>R$39,90</p>
                    <a class="btn btn-primary">{{ __('Schedule Now') }}</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- PLANOS MENSAIS -->
<section class="pricing-section">
    <div class="pricing-container">
        <h2>
            {{ __('Our Monthly Plans') }}
        </h2>

        <p class="text-muted" style="text-align:center; margin-top:10px; margin-bottom:20px;">
            {{ __('Monthly plan — 1 weekly appointment') }}
        </p>

        <table class="pricing-table" style="width:100%;">
            <thead>
                <tr class="pricing-row">
                    <th style="text-align:left;">{{ __('Plan') }}</th>
                    <th style="text-align:right;">{{ __('Price') }}</th>
                    <th style="text-align:center;">{{ __('Action') }}</th>
                </tr>
            </thead>

            <tbody>
                <tr class="pricing-row">
                    <td>{{ __('Simple Cut') }}</td>
                    <td style="text-align:right;">R$59,90</td>
                    <td style="text-align:center;"><a class="btn btn-primary btn-sm">{{ __('Subscribe Now') }}</a></td>
                </tr>

                <tr class="pricing-row">
                    <td>{{ __('Normal Cut') }}</td>
                    <td style="text-align:right;">R$99,90</td>
                    <td style="text-align:center;"><a class="btn btn-primary btn-sm">{{ __('Subscribe Now') }}</a></td>
                </tr>

                <tr class="pricing-row">
                    <td>{{ __('Cut + Pigmentation') }}</td>
                    <td style="text-align:right;">R$179,90</td>
                    <td style="text-align:center;"><a class="btn btn-primary btn-sm">{{ __('Subscribe Now') }}</a></td>
                </tr>

                <tr class="pricing-row">
                    <td>{{ __("Children's Cut") }}</td>
                    <td style="text-align:right;">R$139,90</td>
                    <td style="text-align:center;"><a class="btn btn-primary btn-sm">{{ __('Subscribe Now') }}</a></td>
                </tr>

                <tr class="pricing-row">
                    <td>{{ __('Beard') }}</td>
                    <td style="text-align:right;">R$99,90</td>
                    <td style="text-align:center;"><a class="btn btn-primary btn-sm">{{ __('Subscribe Now') }}</a></td>
                </tr>

                <tr class="pricing-row">
                    <td>{{ __('Eyebrow') }}</td>
                    <td style="text-align:right;">R$29,90</td>
                    <td style="text-align:center;"><a class="btn btn-primary btn-sm">{{ __('Subscribe Now') }}</a></td>
                </tr>

                <tr class="pricing-row">
                    <td>{{ __('Hair + Beard') }}</td>
                    <td style="text-align:right;">R$219,90</td>
                    <td style="text-align:center;"><a class="btn btn-primary btn-sm">{{ __('Subscribe Now') }}</a></td>
                </tr>

                <tr class="pricing-row">
                    <td>{{ __('Scissor Cut Plan') }}</td>
                    <td style="text-align:right;">R$180,00</td>
                    <td style="text-align:center;"><a class="btn btn-primary btn-sm">{{ __('Subscribe Now') }}</a></td>
                </tr>
            </tbody>
        </table>
    </div>
</section>
@endsection
