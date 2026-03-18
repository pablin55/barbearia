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
use Filament\Forms\Components\TextInput;
use Illuminate\Support\Facades\Hash;
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

            $recordActions[] = Action::make('mudarSenha')
                ->label('Mudar acesso')
                ->icon('heroicon-o-lock-closed')
                ->color('warning')
                ->form([

                    TextInput::make('email')
                        ->label('Novo Email')
                        ->email()
                        ->required()
                        ->default(fn ($record) => $record->user?->email),

                    TextInput::make('email_confirmation')
                        ->label('Confirmar Email')
                        ->email()
                        ->required()
                        ->same('email'),

                    TextInput::make('password')
                        ->label('Nova Senha')
                        ->password()
                        ->required()
                        ->minLength(6),

                    TextInput::make('password_confirmation')
                        ->label('Confirmar Senha')
                        ->password()
                        ->required()
                        ->same('password'),
                ])
                ->action(function ($record, array $data) {

                    if (!$record->user) {

                        $user = User::create([
                            'name' => $record->nome,
                            'email' => $data['email'],
                            'password' => Hash::make($data['password']),
                            'role' => 'barbeiro',
                        ]);

                        $record->user()->save($user);

                    } else {

                        $user = $record->user;

                        $user->update([
                            'email' => $data['email'],
                            'password' => Hash::make($data['password']),
                        ]);
                    }

                    // 📱 WhatsApp
                    $telefone = preg_replace('/[^0-9]/', '', $record->telefone);

                    $mensagem = urlencode(
                        "Olá {$record->nome}! 👋\n\n".
                        "Seus dados de acesso foram atualizados.\n\n".
                        "Login: {$data['email']}\n".
                        "Senha: {$data['password']}\n\n".
                        "Acesse o sistema e altere sua senha se desejar."
                    );

                    $linkWhatsapp = "https://wa.me/55{$telefone}?text={$mensagem}";

                    Notification::make()
                        ->title('Acesso atualizado')
                        ->body("Email: {$data['email']}")
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