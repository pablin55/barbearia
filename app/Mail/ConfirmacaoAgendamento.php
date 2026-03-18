<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ConfirmacaoAgendamento extends Mailable
{
    use Queueable, SerializesModels;

    public $agendamento;

    public function __construct($agendamento)
    {
        $this->agendamento = $agendamento;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Confirmação de Agendamento - Pablo Barbearia',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.confirmacao',
            with: [
                'agendamento' => $this->agendamento
            ],
        );
    }

    public function attachments(): array
    {
        return [];
    }
}