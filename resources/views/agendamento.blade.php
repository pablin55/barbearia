@extends('layouts.agendamento')

@section('title', 'Agendar Horário')

@push('styles')
<link href="{{ asset('css/agendamento.css') }}" rel="stylesheet">
@endpush

@section('content')
<section class="schedule-section">
    <div class="schedule-container">
        <h2>Agende Seu Horário</h2>
        <p class="text-muted">Selecione um serviço, data e horário para seu agendamento</p>

        <!-- Formulário de Agendamento -->
        <form id="appointment-form" method="POST" action="{{ route('agendamento.store') }}">
            @csrf
            
            <!-- Seleção de Serviço -->
            <div class="form-group">
                <label for="service">Selecione o Serviço</label>
                <select id="service" name="service" class="form-control" required>
                    <option value="">Escolha um serviço...</option>
                    
                    <!-- Serviços Individuais -->
                    <option value="simple_cut" {{ request('service') == 'simple_cut' ? 'selected' : '' }}>
                        Corte Simples / Máquina - R$19,90
                    </option>
                    <option value="social_cut" {{ request('service') == 'social_cut' ? 'selected' : '' }}>
                        Corte Social / Fade / Surfer - R$29,90
                    </option>
                    <option value="scissor_cut" {{ request('service') == 'scissor_cut' ? 'selected' : '' }}>
                        Corte Tesoura - R$49,90
                    </option>
                    <option value="cut_beard" {{ request('service') == 'cut_beard' ? 'selected' : '' }}>
                        Corte com Barba - R$59,90
                    </option>
                    <option value="cut_highlights" {{ request('service') == 'cut_highlights' ? 'selected' : '' }}>
                        Corte + Luzes / Platinum - R$99,90
                    </option>
                    <option value="cut_pigmentation" {{ request('service') == 'cut_pigmentation' ? 'selected' : '' }}>
                        Corte com Pigmentação - R$49,90
                    </option>
                    <option value="beard" {{ request('service') == 'beard' ? 'selected' : '' }}>
                        Barba - R$29,90
                    </option>
                    <option value="beard_pigmentation" {{ request('service') == 'beard_pigmentation' ? 'selected' : '' }}>
                        Barba com Pigmentação - R$39,90
                    </option>
                    <option value="cut_hydration" {{ request('service') == 'cut_hydration' ? 'selected' : '' }}>
                        Corte + Hidratação - R$49,90
                    </option>
                    <option value="eyebrow" {{ request('service') == 'eyebrow' ? 'selected' : '' }}>
                        Sobrancelha - R$9,90
                    </option>
                    <option value="colorimetry_cut" {{ request('service') == 'colorimetry_cut' ? 'selected' : '' }}>
                        Colorimetria + Corte - R$149,90
                    </option>
                    <option value="children_cut" {{ request('service') == 'children_cut' ? 'selected' : '' }}>
                        Corte Infantil - R$39,90
                    </option>
                    
                    <!-- Planos Mensais -->
                    <optgroup label="Planos Mensais">
                        <option value="simple_cut_plan" {{ request('service') == 'simple_cut_plan' ? 'selected' : '' }}>
                            Plano Corte Simples (Mensal) - R$59,90
                        </option>
                        <option value="normal_cut_plan" {{ request('service') == 'normal_cut_plan' ? 'selected' : '' }}>
                            Plano Corte Normal (Mensal) - R$99,90
                        </option>
                        <option value="cut_pigmentation_plan" {{ request('service') == 'cut_pigmentation_plan' ? 'selected' : '' }}>
                            Plano Corte + Pigmentação (Mensal) - R$179,90
                        </option>
                        <option value="children_cut_plan" {{ request('service') == 'children_cut_plan' ? 'selected' : '' }}>
                            Plano Corte Infantil (Mensal) - R$139,90
                        </option>
                        <option value="beard_plan" {{ request('service') == 'beard_plan' ? 'selected' : '' }}>
                            Plano Barba (Mensal) - R$99,90
                        </option>
                        <option value="eyebrow_plan" {{ request('service') == 'eyebrow_plan' ? 'selected' : '' }}>
                            Plano Sobrancelha (Mensal) - R$29,90
                        </option>
                        <option value="hair_beard_plan" {{ request('service') == 'hair_beard_plan' ? 'selected' : '' }}>
                            Plano Cabelo + Barba (Mensal) - R$219,90
                        </option>
                        <option value="scissor_cut_plan" {{ request('service') == 'scissor_cut_plan' ? 'selected' : '' }}>
                            Plano Corte Tesoura (Mensal) - R$180,00
                        </option>
                    </optgroup>
                </select>
            </div>

            <!-- Nome do Cliente -->
            <div class="form-group">
                <label for="name">Seu Nome</label>
                <input type="text" id="name" name="name" class="form-control" placeholder="Digite seu nome completo" required>
            </div>

            <!-- Telefone -->
            <div class="form-group">
                <label for="phone">Telefone</label>
                <input type="tel" id="phone" name="phone" class="form-control" placeholder="(00) 00000-0000" required>
            </div>

            <!-- E-mail -->
            <div class="form-group">
                <label for="email">E-mail</label>
                <input type="email" id="email" name="email" class="form-control" placeholder="seu@email.com">
            </div>

            <!-- Escolha do Barbeiro -->
            <div class="form-group">
                <label>Escolha o Barbeiro (Opcional)</label>
                <p class="text-muted" style="font-size: 0.85rem; margin-bottom: 15px;">Selecione seu barbeiro preferido ou escolha "Qualquer Barbeiro" para melhor disponibilidade</p>
                
                <div class="barber-selection">
                    <!-- Qualquer Barbeiro -->
                    <label class="barber-card {{ request('barber') == 'any' || !request('barber') ? 'selected' : '' }}">
                        <input type="radio" name="barber" value="any" {{ request('barber') == 'any' || !request('barber') ? 'checked' : '' }}>
                        <div class="barber-image">
                            <img src="{{ asset('img/barbearia.jpeg') }}" alt="Qualquer Barbeiro">
                        </div>
                        <div class="barber-info">
                            <span class="barber-name">Qualquer Barbeiro</span>
                            <span class="barber-role">Melhor disponibilidade</span>
                        </div>
                    </label>

                    <!-- Pablo -->
                    <label class="barber-card {{ request('barber') == 'pablo' ? 'selected' : '' }}">
                        <input type="radio" name="barber" value="pablo" {{ request('barber') == 'pablo' ? 'checked' : '' }}>
                        <div class="barber-image">
                            <img src="{{ asset('img/pablo.jpeg') }}" alt="Pablo Apolinario">
                            <span class="barber-badge">CEO</span>
                        </div>
                        <div class="barber-info">
                            <span class="barber-name">Pablo Apolinario</span>
                            <span class="barber-role">Fundador & CEO</span>
                        </div>
                    </label>

                    <!-- Juan -->
                    <label class="barber-card {{ request('barber') == 'juan' ? 'selected' : '' }}">
                        <input type="radio" name="barber" value="juan" {{ request('barber') == 'juan' ? 'checked' : '' }}>
                        <div class="barber-image">
                            <img src="{{ asset('img/juan1.jpeg') }}" alt="Juan Pablo">
                        </div>
                        <div class="barber-info">
                            <span class="barber-name">Juan Pablo</span>
                            <span class="barber-role">Barbeiro</span>
                        </div>
                    </label>

                    <!-- Wesley -->
                    <label class="barber-card {{ request('barber') == 'wesley' ? 'selected' : '' }}">
                        <input type="radio" name="barber" value="wesley" {{ request('barber') == 'wesley' ? 'checked' : '' }}>
                        <div class="barber-image">
                            <img src="{{ asset('img/wss.jpeg') }}" alt="Wesley WS">
                        </div>
                        <div class="barber-info">
                            <span class="barber-name">Wesley "WS"</span>
                            <span class="barber-role">Barbeiro</span>
                        </div>
                    </label>

                    <!-- Vinicius -->
                    <label class="barber-card {{ request('barber') == 'vinicius' ? 'selected' : '' }}">
                        <input type="radio" name="barber" value="vinicius" {{ request('barber') == 'vinicius' ? 'checked' : '' }}>
                        <div class="barber-image">
                            <img src="{{ asset('img/vnz.jpeg') }}" alt="Vinícius VN">
                        </div>
                        <div class="barber-info">
                            <span class="barber-name">Vinícius "VN"</span>
                            <span class="barber-role">Barbeiro</span>
                        </div>
                    </label>
                </div>
            </div>

            <!-- Seleção de Data -->
            <div class="form-group">
                <label for="date">Selecione a Data</label>
                <input type="date" id="date" name="date" class="form-control" required>
            </div>

            <!-- Seleção de Horário -->
            <div class="form-group">
                <label for="time">Selecione o Horário</label>
                <select id="time" name="time" class="form-control" required>
                    <option value="">Escolha um horário...</option>
                    <option value="09:00">09:00</option>
                    <option value="09:30">09:30</option>
                    <option value="10:00">10:00</option>
                    <option value="10:30">10:30</option>
                    <option value="11:00">11:00</option>
                    <option value="11:30">11:30</option>
                    <option value="12:00">12:00</option>
                    <option value="12:30">12:30</option>
                    <option value="13:00">13:00</option>
                    <option value="13:30">13:30</option>
                    <option value="14:00">14:00</option>
                    <option value="14:30">14:30</option>
                    <option value="15:00">15:00</option>
                    <option value="15:30">15:30</option>
                    <option value="16:00">16:00</option>
                    <option value="16:30">16:30</option>
                    <option value="17:00">17:00</option>
                    <option value="17:30">17:30</option>
                    <option value="18:00">18:00</option>
                </select>
            </div>

            <!-- Forma de Pagamento -->
            <div class="form-group">
                <label for="payment_method">Forma de Pagamento</label>
                <select id="payment_method" name="payment_method" class="form-control" required>
                    <option value="">Escolha a forma de pagamento...</option>
                    
                    <!-- Pagamento na Barbearia -->
                    <optgroup label="Pagamento na Barbearia">
                        <option value="dinheiro">
                            💵 Dinheiro
                        </option>
                        <option value="pix">
                            🔵 PIX
                        </option>
                        <option value="credit_card">
                            💳 Cartão de Crédito
                        </option>
                        <option value="debit_card">
                            💳 Cartão de Débito
                        </option>
                    </optgroup>
                    
                    <!-- Pagamento Online (Stripe) -->
                    <optgroup label="Pagamento Online (Stripe)">
                        <option value="stripe_credit">
                            💳 Cartão de Crédito
                        </option>
                        <option value="stripe_debit">
                            💳 Cartão de Débito
                        </option>
                        <option value="stripe_pix">
                            🔵 PIX
                        </option>
                    </optgroup>
                </select>
            </div>

            <!-- Observações Adicionais -->
            <div class="form-group">
                <label for="notes">Observações Adicionais (Opcional)</label>
                <textarea id="notes" name="notes" class="form-control" rows="3" placeholder="Alguma solicitação especial ou observação..."></textarea>
            </div>

            <!-- Termos de Uso -->
            <div class="form-group">
                <div class="terms-box">
                    <input type="checkbox" id="terms" name="terms" required>
                    <label for="terms">Eu li e aceito os <a href="#" target="_blank">Termos de Uso</a> e <a href="#" target="_blank">Política de Privacidade</a></label>
                </div>
            </div>

            <!-- Botão de Confirmar Agendamento -->
            <button type="submit" class="btn btn-primary btn-block">Confirmar Agendamento</button>
        </form>

        <!-- Informações de Contato -->
        <div class="contact-info">
            <h4>Entre em Contato</h4>
            <p><i class="fas fa-phone"></i> Telefone: (11) 99999-9999</p>
            <p><i class="fas fa-map-marker-alt"></i> Endereço: Rua Exemplo, 123</p>
            <p><i class="fab fa-instagram"></i> @pablobarbershop</p>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>
    // Define a data mínima como sendo hoje
    document.addEventListener('DOMContentLoaded', function() {
        const dateInput = document.getElementById('date');
        const today = new Date().toISOString().split('T')[0];
        dateInput.setAttribute('min', today);
        
        // Máscara de telefone
        const phoneInput = document.getElementById('phone');
        phoneInput.addEventListener('input', function(e) {
            let value = e.target.value.replace(/\D/g, '');
            if (value.length > 10) {
                value = value.substring(0, 11);
            }
            if (value.length >= 6) {
                value = value.replace(/(\d{2})(\d{5})(\d{4})/, '($1) $2-$3');
            } else if (value.length >= 2) {
                value = value.replace(/(\d{2})(\d{4})/, '($1) $2');
            }
            e.target.value = value;
        });

        // Highlight da seleção de barbeiro
        const barberCards = document.querySelectorAll('.barber-card');
        barberCards.forEach(card => {
            card.addEventListener('click', function() {
                barberCards.forEach(c => c.classList.remove('selected'));
                this.classList.add('selected');
            });
        });
    });
</script>
@endpush

