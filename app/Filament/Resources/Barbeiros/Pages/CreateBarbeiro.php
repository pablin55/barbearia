<?php

namespace App\Filament\Resources\Barbeiros\Pages;

use App\Filament\Resources\Barbeiros\BarbeiroResource;
use Filament\Resources\Pages\CreateRecord;
use Filament\Notifications\Notification;
use Filament\Actions\Action;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class CreateBarbeiro extends CreateRecord
{
    protected static string $resource = BarbeiroResource::class;

    protected function afterCreate(): void
    {
        $barbeiro = $this->record;

        // gerar email automático
        $email = Str::slug($barbeiro->nome, '.') . rand(1, 99) . '@barbearia.com';

        // gerar senha
        $senha = Str::random(8);

        // criar usuário
        $user = User::create([
            'name' => $barbeiro->nome,
            'email' => $email,
            'password' => Hash::make($senha),
            'role' => 'barbeiro',
            'senha_inicial' => $senha,
        ]);

        // ligar usuário ao barbeiro
        $barbeiro->user()->save($user);

        // limpar telefone
        $telefone = preg_replace('/\D/', '', $barbeiro->telefone);

        // mensagem whatsapp
        $mensagem = urlencode(
            "Olá {$barbeiro->nome}! 👋\n\n" .
            "Seu acesso ao sistema da barbearia foi criado.\n\n" .
            "Login: {$email}\n" .
            "Senha: {$senha}\n\n" .
            "Acesse o sistema."
        );

        // link whatsapp
        $linkWhatsapp = "https://wa.me/55{$telefone}?text={$mensagem}";

        // notificação
        Notification::make()
            ->title('Barbeiro criado com sucesso')
            ->body("Login: {$email} | Senha: {$senha}")
            ->success()
            ->actions([
                Action::make('whatsapp')
                    ->label('Enviar no WhatsApp')
                    ->url($linkWhatsapp)
                    ->openUrlInNewTab(),
            ])
            ->persistent()
            ->send();
    }
}