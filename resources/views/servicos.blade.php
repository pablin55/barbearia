@extends('layouts.app')

@section('title', 'Serviços')

@push('styles')
<link href="{{ asset('css/servicos.css') }}" rel="stylesheet">
@endpush

@section('content')
<!-- SERVIÇOS -->
<section class="services-section">
    <div class="services-container">
        <h2 data-i18n="services-title">
            Nossos <span style="color: var(--accent);">Serviços</span>
        </h2>

        <div class="services-grid">
            <div class="service-card hidden">
                <img src="{{ asset('img/simp.jpeg') }}" alt="Corte Simples">
                <div class="service-info">
                    <h3>Corte Simples / Só máquina</h3>
                    <p>R$19,90</p>
                    <a class="btn btn-primary">Agendar Agora</a>
                </div>
            </div>

            <div class="service-card hidden">
                <img src="{{ asset('img/nv.jpeg') }}" alt="Corte Social">
                <div class="service-info">
                    <h3>Corte Social / Degradê / Surfista</h3>
                    <p>R$29,90</p>
                    <a class="btn btn-primary">Agendar Agora</a>
                </div>
            </div>

            <div class="service-card hidden">
                <img src="{{ asset('img/tes.jpeg') }}" alt="Corte à Tesoura">
                <div class="service-info">
                    <h3>Corte à Tesoura</h3>
                    <p>R$49,90</p>
                    <a class="btn btn-primary">Agendar Agora</a>
                </div>
            </div>

            <div class="service-card hidden">
                <img src="{{ asset('img/cb.jpeg') }}" alt="Corte com Barba">
                <div class="service-info">
                    <h3>Corte com Barba</h3>
                    <p>R$59,90</p>
                    <a class="btn btn-primary">Agendar Agora</a>
                </div>
            </div>

            <div class="service-card hidden">
                <img src="{{ asset('img/nv.jpeg') }}" alt="Corte com Luzes">
                <div class="service-info">
                    <h3>Corte + Luzes / Platinado</h3>
                    <p>R$99,90</p>
                    <a class="btn btn-primary">Agendar Agora</a>
                </div>
            </div>

            <div class="service-card hidden">
                <img src="{{ asset('img/nrm.jpeg') }}" alt="Corte com Pigmentação">
                <div class="service-info">
                    <h3>Corte com Pigmentação</h3>
                    <p>R$49,90</p>
                    <a class="btn btn-primary">Agendar Agora</a>
                </div>
            </div>

            <div class="service-card hidden">
                <img src="{{ asset('img/barb.jpeg') }}" alt="Barba">
                <div class="service-info">
                    <h3>Barba</h3>
                    <p>R$29,90</p>
                    <a class="btn btn-primary">Agendar Agora</a>
                </div>
            </div>

            <div class="service-card hidden">
                <img src="{{ asset('img/bp.png') }}" alt="Barba com Pigmentação">
                <div class="service-info">
                    <h3>Barba com Pigmentação</h3>
                    <p>R$39,90</p>
                    <a class="btn btn-primary">Agendar Agora</a>
                </div>
            </div>

            <div class="service-card hidden">
                <img src="{{ asset('img/bb.jpeg') }}" alt="Corte com Hidratação">
                <div class="service-info">
                    <h3>Corte + Hidratação</h3>
                    <p>R$49,90</p>
                    <a class="btn btn-primary">Agendar Agora</a>
                </div>
            </div>

            <div class="service-card hidden">
                <img src="{{ asset('img/sobraa.png') }}" alt="Sobrancelha">
                <div class="service-info">
                    <h3>Sobrancelha</h3>
                    <p>R$9,90</p>
                    <a class="btn btn-primary">Agendar Agora</a>
                </div>
            </div>

            <div class="service-card hidden">
                <img src="{{ asset('img/pint.jpeg') }}" alt="Colorimetria">
                <div class="service-info">
                    <h3>Colorimetria + Corte</h3>
                    <p>R$149,90</p>
                    <small style="color:#999; display:block; margin-bottom:10px;">
                        (Descoloração + aplicação da tinta + corte)
                    </small>
                    <a class="btn btn-primary">Agendar Agora</a>
                </div>
            </div>

            <div class="service-card hidden">
                <img src="{{ asset('img/inf.jpeg') }}" alt="Corte Infantil">
                <div class="service-info">
                    <h3>Corte Infantil</h3>
                    <p>R$39,90</p>
                    <a class="btn btn-primary">Agendar Agora</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- PLANOS MENSAIS -->
<section class="pricing-section">
    <div class="pricing-container">
        <h2 data-i18n="combos-title">
            Nossos <span style="color: var(--accent);">Planos Mensais</span>
        </h2>

        <p class="text-muted" style="text-align:center; margin-top:10px; margin-bottom:20px;">
            Plano mensal — 1 atendimento semanal
        </p>

        <table class="pricing-table" style="width:100%;">
            <thead>
                <tr class="pricing-row">
                    <th style="text-align:left;">Plano</th>
                    <th style="text-align:right;">Preço</th>
                    <th style="text-align:center;">Ação</th>
                </tr>
            </thead>

            <tbody>
                <tr class="pricing-row">
                    <td>Corte Simples</td>
                    <td style="text-align:right;">R$59,90</td>
                    <td style="text-align:center;"><a class="btn btn-primary btn-sm">Assinar Agora</a></td>
                </tr>

                <tr class="pricing-row">
                    <td>Corte Normal</td>
                    <td style="text-align:right;">R$99,90</td>
                    <td style="text-align:center;"><a class="btn btn-primary btn-sm">Assinar Agora</a></td>
                </tr>

                <tr class="pricing-row">
                    <td>Corte + Pigmentação</td>
                    <td style="text-align:right;">R$179,90</td>
                    <td style="text-align:center;"><a class="btn btn-primary btn-sm">Assinar Agora</a></td>
                </tr>

                <tr class="pricing-row">
                    <td>Corte Infantil</td>
                    <td style="text-align:right;">R$139,90</td>
                    <td style="text-align:center;"><a class="btn btn-primary btn-sm">Assinar Agora</a></td>
                </tr>

                <tr class="pricing-row">
                    <td>Barba</td>
                    <td style="text-align:right;">R$99,90</td>
                    <td style="text-align:center;"><a class="btn btn-primary btn-sm">Assinar Agora</a></td>
                </tr>

                <tr class="pricing-row">
                    <td>Sobrancelha</td>
                    <td style="text-align:right;">R$29,90</td>
                    <td style="text-align:center;"><a class="btn btn-primary btn-sm">Assinar Agora</a></td>
                </tr>

                <tr class="pricing-row">
                    <td>Cabelo + Barba</td>
                    <td style="text-align:right;">R$219,90</td>
                    <td style="text-align:center;"><a class="btn btn-primary btn-sm">Assinar Agora</a></td>
                </tr>

                <tr class="pricing-row">
                    <td>Corte na Tesoura</td>
                    <td style="text-align:right;">R$180,00</td>
                    <td style="text-align:center;"><a class="btn btn-primary btn-sm">Assinar Agora</a></td>
                </tr>
            </tbody>
        </table>
    </div>
</section>
@endsection
