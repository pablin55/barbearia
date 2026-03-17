<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agendamento Confirmado - Pablo Barbearia</title>
    <style>
        body { font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif; line-height: 1.6; color: #333; max-width: 600px; margin: 0 auto; padding: 20px; background: #f8f9fa; }
        .container { background: white; border-radius: 12px; padding: 40px; box-shadow: 0 4px 20px rgba(0,0,0,0.1); }
        h2 { color: #28a745; font-size: 28px; margin-bottom: 10px; text-align: center; }
        p { margin-bottom: 20px; }
        .details { background: #f8f9ff; padding: 20px; border-radius: 8px; border-left: 4px solid #28a745; }
        strong { color: #495057; }
        .barbearia { text-align: center; color: #6c757d; font-size: 14px; margin-top: 30px; border-top: 1px solid #dee2e6; padding-top: 20px; }
        @media (max-width: 600px) { .container { padding: 20px; } }
    </style>
</head>
<body>
    <div class="container">
        <h2>Agendamento Confirmado ✔</h2>
        
        <p>Olá <strong>{{ $agendamento->nome_cliente }}</strong>,</p>
        
        <p>Seu horário foi agendado com sucesso!</p>
        
        <div class="details">
            <p>
                <strong>Serviço:</strong> {{ $agendamento->service_name }} (R$ {{ number_format($agendamento->service_price, 2, ',', '.') }}) <br>
                <strong>Barbeiro:</strong> {{ $agendamento->barber_info['name'] ?? $agendamento->barbeiro }} <br>
                <strong>Data:</strong> {{ $agendamento->data_agendamento->format('d/m/Y') }} <br>
                <strong>Horário:</strong> {{ $agendamento->horario_agendamento->format('H:i') }}
            </p>
        </div>
        
        <p>Obrigado por escolher a <strong>Pablo Barbearia</strong>!</p>
        <p>Qualquer dúvida, entre em contato conosco.</p>
        
        <div class="barbearia">
            <strong>Pablo Barbearia</strong><br>
            Atendimento de qualidade com carinho e profissionalismo.
        </div>
    </div>
</body>
</html>
