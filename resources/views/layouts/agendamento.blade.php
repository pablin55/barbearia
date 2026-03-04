<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <title>Agendar Horário - Pablo Barbearia</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <!-- Ícone do site -->
    <link rel="icon" type="image/png" href="{{ asset('img/pbar.png') }}">
    
    <!-- Fontes do Google -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    
    <!-- Font Awesome para ícones -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    
    <!-- CSS principal e específico do agendamento (localizado em public/css) -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/agendamento.css') }}" rel="stylesheet">
    
    <!-- Stack para estilos adicionais -->
    @stack('styles')
</head>

<body>
    <!-- Link para voltar aos serviços -->
    <div class="back-link">
        <a href="{{ route('servicos') }}">
            <i class="fas fa-arrow-left"></i> Voltar aos Serviços
        </a>
    </div>

    <!-- Conteúdo principal da página -->
    @yield('content')

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    
    <!-- Scripts adicionais -->
    @stack('scripts')
</body>

</html>

