<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\Agendamento;
use App\Mail\ConfirmacaoAgendamento;
use Illuminate\Support\Facades\Mail;

class SendReminderEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        // Agendamentos para amanhã, não lembrados ainda
        $agendamentos = Agendamento::whereNull('reminder_sent_at')
            ->where('data_agendamento', now()->addDay()->toDateString())
            ->whereNotNull('email')
            ->where('status', 'confirmed')
            ->get();

        foreach ($agendamentos as $agendamento) {
            Mail::to($agendamento->email)->send(new ConfirmacaoAgendamento($agendamento));
            $agendamento->update(['reminder_sent_at' => now()]);
        }
    }
}
