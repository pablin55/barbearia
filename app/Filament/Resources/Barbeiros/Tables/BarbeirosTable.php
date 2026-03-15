<?php

namespace App\Filament\Resources\Barbeiros\Tables;

use Filament\Actions\Action;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Notifications\Notification;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;

class BarbeirosTable
{
    public static function configure(Table $table): Table
    {
        $recordActions = [
            ViewAction::make(),
        ];

        if (auth()->user()?->role === 'admin') {

            $recordActions[] = EditAction::make();

            $recordActions[] = Action::make('resetarSenha')
                ->label('Resetar senha')
                ->icon('heroicon-o-key')
                ->color('warning')
                ->requiresConfirmation()
                ->action(function ($record) {

                    $novaSenha = Str::random(8);

                    // se não existir usuário cria
                    if (!$record->user) {

                        $email = Str::slug($record->nome, '.') . rand(1, 99) . '@barbearia.com';

                        $user = User::create([
                            'name' => $record->nome,
                            'email' => $email,
                            'password' => Hash::make($novaSenha),
                            'role' => 'barbeiro',
                        ]);

                        // conecta o usuário ao barbeiro
                        $record->user()->save($user);

                    } else {

                        $user = $record->user;

                        $user->update([
                            'password' => Hash::make($novaSenha),
                        ]);

                        $email = $user->email;
                    }

                    $telefone = preg_replace('/[^0-9]/', '', $record->telefone);

                    $mensagem = urlencode(
                        "Olá {$record->nome}! 👋\n\n".
                        "Sua senha foi redefinida.\n\n".
                        "Login: {$email}\n".
                        "Senha: {$novaSenha}\n\n".
                        "Acesse o sistema e altere sua senha."
                    );

                    $linkWhatsapp = "https://wa.me/55{$telefone}?text={$mensagem}";

                    Notification::make()
                        ->title('Senha redefinida')
                        ->body("Login: {$email} | Nova senha: {$novaSenha}")
                        ->success()
                        ->persistent()
                        ->actions([
                            \Filament\Actions\Action::make('whatsapp')
                                ->label('Enviar no WhatsApp')
                                ->url($linkWhatsapp)
                                ->openUrlInNewTab(),
                        ])
                        ->send();
                });
        }

        $toolbarActions = [];

        if (auth()->user()?->role === 'admin') {
            $toolbarActions = [
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ];
        }

        return $table
            ->columns([

                ImageColumn::make('foto_url')
                    ->label('Foto')
                    ->circular()
                    ->size(50),

                TextColumn::make('nome')
                    ->label('Nome')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),

                TextColumn::make('telefone')
                    ->label('Telefone')
                    ->searchable()
                    ->icon('heroicon-o-phone')
                    ->copyable(),

                TextColumn::make('especialidade')
                    ->label('Especialidade')
                    ->searchable()
                    ->limit(30)
                    ->tooltip(fn ($record) => $record->especialidade),

                BadgeColumn::make('anos_experiencia')
                    ->label('Experiência')
                    ->colors([
                        'warning' => 0,
                        'info' => [1, 2, 3],
                        'success' => [4, 5, 6],
                        'primary' => fn ($state) => $state >= 7,
                    ])
                    ->formatStateUsing(fn ($state) => $state ? "{$state} anos" : '-'),

                BadgeColumn::make('ativo')
                    ->label('Status')
                    ->colors([
                        'success' => true,
                        'danger' => false,
                    ])
                    ->formatStateUsing(fn ($state) => $state ? 'Ativo' : 'Inativo'),

                TextColumn::make('user.email')
                    ->label('Login (Email)')
                    ->visible(fn () => auth()->user()?->role === 'admin')
                    ->copyable(),

                TextColumn::make('created_at')
                    ->label('Criado em')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

            ])
            ->filters([])
            ->recordActions($recordActions)
            ->toolbarActions($toolbarActions)
            ->emptyStateIcon('heroicon-o-users')
            ->emptyStateHeading('Nenhum barbeiro encontrado')
            ->emptyStateDescription('Comece adicionando seu primeiro barbeiro.');
    }
}