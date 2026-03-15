<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Barbeiro;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class BarbeirosUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Lista de barbeiros com seus dados para login
        $barbeirosUsers = [
            [
                'nome' => 'Pablo Apolinario',
                'email' => 'pablo@barbearia.com',
                'senha' => 'pablo123',
            ],
            [
                'nome' => 'Juan Pablo',
                'email' => 'juan@barbearia.com',
                'senha' => 'juan123',
            ],
            [
                'nome' => 'Wesley WS',
                'email' => 'wesley@barbearia.com',
                'senha' => 'wesley123',
            ],
            [
                'nome' => 'Vinicius VN',
                'email' => 'vinicius@barbearia.com',
                'senha' => 'vinicius123',
            ],
            // Admin geral
            [
                'nome' => 'Admin',
                'email' => 'admin@barbearia.com',
                'senha' => 'admin123',
                'role' => 'admin',
            ],
        ];

        foreach ($barbeirosUsers as $barbeiroUser) {
            $role = $barbeiroUser['role'] ?? 'barbeiro';
            $senha = $barbeiroUser['senha'];
            $nome = $barbeiroUser['nome'];
            $email = $barbeiroUser['email'];
            
            // Remove campos extras antes de criar o usuário
            unset($barbeiroUser['role'], $barbeiroUser['senha']);

            // Verifica se o usuário já existe pelo email
            $user = User::where('email', $email)->first();

            if (!$user) {
                // Cria o usuário
                $user = User::create([
                    'name' => $nome,
                    'email' => $email,
                    'password' => Hash::make($senha),
                    'role' => $role,
                ]);

                // Se for barbeiro, vincula ao barbeiro correspondente
                if ($role === 'barbeiro') {
                    $barbeiro = Barbeiro::where('nome', 'like', '%' . explode(' ', $nome)[0] . '%')
                        ->orWhere('nome', 'like', '%' . ($nome === 'Wesley WS' ? 'Wesley' : $nome) . '%')
                        ->orWhere('nome', 'like', '%' . ($nome === 'Vinicius VN' ? 'Vinicius' : $nome) . '%')
                        ->first();

                    if ($barbeiro) {
                        $user->barbeiro_id = $barbeiro->id;
                        $user->save();
                        echo "Usuário criado: {$email} (senha: {$senha}) - vinculado ao barbeiro: {$barbeiro->nome}\n";
                    } else {
                        echo "Usuário criado: {$email} (senha: {$senha}) - ATENÇÃO: Barbeiro não encontrado para vincular\n";
                    }
                } else {
                    echo "Usuário admin criado: {$email} (senha: {$senha})\n";
                }
            } else {
                echo "Usuário já existe: {$email}\n";
            }
        }

        echo "\n=== LOGINS PRONTOS PARA TESTAR ===\n";
        echo "Admin: admin@barbearia.com / admin123\n";
        echo "Pablo: pablo@barbearia.com / pablo123\n";
        echo "Juan: juan@barbearia.com / juan123\n";
        echo "Wesley: wesley@barbearia.com / wesley123\n";
        echo "Vinicius: vinicius@barbearia.com / vinicius123\n";
        echo "=================================\n";
        echo "Acesse: http://localhost:8000/admin\n";
    }
}

