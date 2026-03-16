@extends('layouts.agendamento')

@section('title', __('Schedule Appointment'))

@push('styles')
<link href="{{ asset('css/agendamento.css') }}" rel="stylesheet">
@endpush

@section('content')
<section class="schedule-section">
    <div class="schedule-container">
        <h2>{{ __('Schedule Your Appointment') }}</h2>
        <p class="text-muted">{{ __('Select a service, date and time for your appointment') }}</p>

        <!-- Formulário de Agendamento -->
        <form id="appointment-form" method="POST" action="{{ route('agendamento.store') }}">
            @csrf
            
            <!-- Seleção de Serviço -->
            <div class="form-group">
                <label for="service">{{ __('Select Service') }}</label>
                <select id="service" name="service" class="form-control" required>
                    <option value="">{{ __('Choose a service...') }}</option>
                    
                    <!-- Serviços Individuais -->
                    <option value="corte_simples" {{ request('service') == 'corte_simples' ? 'selected' : '' }}>
                        {{ __('Simple Cut / Machine only') }} - R$19,90
                    </option>
                    <option value="corte_social" {{ request('service') == 'corte_social' ? 'selected' : '' }}>
                        {{ __('Social Cut / Fade / Surfer') }} - R$29,90
                    </option>
                    <option value="corte_tesoura" {{ request('service') == 'corte_tesoura' ? 'selected' : '' }}>
                        {{ __('Scissor Cut') }} - R$49,90
                    </option>
                    <option value="corte_barba" {{ request('service') == 'corte_barba' ? 'selected' : '' }}>
                        {{ __('Cut with Beard') }} - R$59,90
                    </option>
                    <option value="corte_luzes" {{ request('service') == 'corte_luzes' ? 'selected' : '' }}>
                        {{ __('Cut + Highlights / Platinum') }} - R$99,90
                    </option>
                    <option value="corte_pigmentacao" {{ request('service') == 'corte_pigmentacao' ? 'selected' : '' }}>
                        {{ __('Cut with Pigmentation') }} - R$49,90
                    </option>
                    <option value="barba" {{ request('service') == 'barba' ? 'selected' : '' }}>
                        {{ __('Beard') }} - R$29,90
                    </option>
                    <option value="barba_pigmentacao" {{ request('service') == 'barba_pigmentacao' ? 'selected' : '' }}>
                        {{ __('Beard with Pigmentation') }} - R$39,90
                    </option>
                    <option value="corte_hidratacao" {{ request('service') == 'corte_hidratacao' ? 'selected' : '' }}>
                        {{ __('Cut + Hydration') }} - R$49,90
                    </option>
                    <option value="sobrancelha" {{ request('service') == 'sobrancelha' ? 'selected' : '' }}>
                        {{ __('Eyebrow') }} - R$9,90
                    </option>
                    <option value="colorimetria_corte" {{ request('service') == 'colorimetria_corte' ? 'selected' : '' }}>
                        {{ __('Colorimetry + Cut') }} - R$149,90
                    </option>
                    <option value="corte_infantil" {{ request('service') == 'corte_infantil' ? 'selected' : '' }}>
                        {{ __('Children\'s Cut') }} - R$39,90
                    </option>
                    
                    <!-- Planos Mensais -->
                    <optgroup label="{{ __('Monthly Plans') }}">
                        <option value="plano_corte_simples" {{ request('service') == 'plano_corte_simples' ? 'selected' : '' }}>
                            {{ __('Simple Cut Plan (Monthly)') }} - R$59,90
                        </option>
                        <option value="plano_corte_normal" {{ request('service') == 'plano_corte_normal' ? 'selected' : '' }}>
                            {{ __('Normal Cut Plan (Monthly)') }} - R$99,90
                        </option>
                        <option value="plano_corte_pigmentacao" {{ request('service') == 'plano_corte_pigmentacao' ? 'selected' : '' }}>
                            {{ __('Cut + Pigmentation Plan (Monthly)') }} - R$179,90
                        </option>
                        <option value="plano_corte_infantil" {{ request('service') == 'plano_corte_infantil' ? 'selected' : '' }}>
                            {{ __('Children\'s Cut Plan (Monthly)') }} - R$139,90
                        </option>
                        <option value="plano_barba" {{ request('service') == 'plano_barba' ? 'selected' : '' }}>
                            {{ __('Beard Plan (Monthly)') }} - R$99,90
                        </option>
                        <option value="plano_sobrancelha" {{ request('service') == 'plano_sobrancelha' ? 'selected' : '' }}>
                            {{ __('Eyebrow Plan (Monthly)') }} - R$29,90
                        </option>
                        <option value="plano_cabelo_barba" {{ request('service') == 'plano_cabelo_barba' ? 'selected' : '' }}>
                            {{ __('Hair + Beard Plan (Monthly)') }} - R$219,90
                        </option>
                        <option value="plano_corte_tesoura" {{ request('service') == 'plano_corte_tesoura' ? 'selected' : '' }}>
                            {{ __('Scissor Cut Plan (Monthly)') }} - R$180,00
                        </option>
                    </optgroup>
                </select>
            </div>

            <!-- Nome do Cliente -->
            <div class="form-group">
                <label for="name">{{ __('Your Name') }}</label>
                <input type="text" id="name" name="name" class="form-control" placeholder="{{ __('Enter your full name') }}" required>
            </div>

            <!-- Telefone -->
            <div class="form-group">
                <label for="phone">{{ __('Phone Number') }}</label>
                <input type="tel" id="phone" name="phone" class="form-control" placeholder="(00) 00000-0000" required>
            </div>

            <!-- E-mail -->
            <div class="form-group">
                <label for="email">{{ __('Email') }}</label>
                <input type="email" id="email" name="email" class="form-control" placeholder="seu@email.com">
            </div>

            <!-- Escolha do Barbeiro -->
            <div class="form-group">
                <label>{{ __('Choose Barber') }}</label>
                <p class="text-muted" style="font-size: 0.85rem; margin-bottom: 15px;">{{ __('Select preferred barber') }}</p>
                
                <div class="barber-selection">
                    <!-- Qualquer Barbeiro -->
                    <label class="barber-card {{ request('barber') == 'any' || !request('barber') ? 'selected' : '' }}">
                        <input type="radio" name="barber" value="any" {{ request('barber') == 'any' || !request('barber') ? 'checked' : '' }}>
                        <div class="barber-image">
                            <img src="{{ asset('img/barbearia.jpeg') }}" alt="{{ __('Any Barber') }}">
                        </div>
                        <div class="barber-info">
                            <span class="barber-name">{{ __('Any Barber') }}</span>
                            <span class="barber-role">{{ __('Best availability') }}</span>
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
                            <span class="barber-role">{{ __('Founder & CEO') }}</span>
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
                            <span class="barber-role">{{ __('Barber') }}</span>
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
                            <span class="barber-role">{{ __('Barber') }}</span>
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
                            <span class="barber-role">{{ __('Barber') }}</span>
                        </div>
                    </label>
                </div>
            </div>

            <!-- Seleção de Data -->
            <div class="form-group">
                <label for="date">{{ __('Select Date') }}</label>
                <input type="date" id="date" name="date" class="form-control" required>
            </div>

            <!-- Seleção de Horário -->
            <div class="form-group">
                <label for="time">{{ __('Select Time') }}</label>
                <select id="time" name="time" class="form-control" required>
                    <option value="">{{ __('Choose a time...') }}</option>
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
                
              <!-- ALERTA -->
    <div id="alert-horario" style="
display:none;
background:#ff4d4f;
color:white;
padding:12px;
border-radius:8px;
margin-top:10px;
font-weight:500;
">
⚠️ Este horário acabou de ser reservado por outro cliente. Escolha outro horário.
</div>

</div>
            <!-- Observações Adicionais -->
            <div class="form-group">
                <label for="notes">{{ __('Additional Notes') }} ({{ __('Optional') }})</label>
                <textarea id="notes" name="notes" class="form-control" rows="3" placeholder="{{ __('Any special requests or observations...') }}"></textarea>
            </div>

            <!-- Termos de Uso -->
            <div class="form-group">
                <div class="terms-box">
                    <input type="checkbox" id="terms" name="terms" required>
                    <label for="terms">{!! __('I accept the Terms of Use and Privacy Policy') !!}</label>
                </div>
            </div>

            <!-- Botão de Confirmar Agendamento -->
            <button type="submit" class="btn btn-primary btn-block">{{ __('Confirm Appointment') }}</button>
        </form>

        <!-- Informações de Contato -->
        <div class="contact-info">
            <h4>{{ __('Contact Us') }}</h4>
            <p><i class="fas fa-phone"></i> {{ __('Phone') }}: (83) 9 9623-2639</p>
            <p><i class="fas fa-map-marker-alt"></i> {{ __('Address') }}: {{ __('Rua Elías Cavalcanti de Albuquerque, 2165') }}</p>
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
    document.addEventListener("DOMContentLoaded", function () {

    const dateInput = document.getElementById("date");
    const timeInput = document.getElementById("time");
    const alerta = document.getElementById("alert-horario");

    timeInput.addEventListener("change", function () {

        const date = dateInput.value;
        const time = timeInput.value;

        if (!date || !time) return;

        fetch(`/verificar-horario?date=${date}&time=${time}`)
        .then(response => response.json())
        .then(data => {

            if (data.ocupado === true) {

                alerta.style.display = "block";
                timeInput.value = "";

            } else {

                alerta.style.display = "none";

            }

        })
        .catch(error => {
            console.log("Erro ao verificar horário:", error);
        });

    });

});
</script>
@endpush

