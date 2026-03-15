<?php

namespace App\Http\Controllers;

use App\Models\Agendamento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AgendamentoController extends Controller
{
    /**
     * Exibe o formulário de agendamento.
     */
    public function create()
    {
        return view('agendamento');
    }

    /**
     * Processa o agendamento e salva no banco de dados.
     */
    public function store(Request $request)
    {
        // Validação dos dados do formulário
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'nullable|email|max:255',
            'service' => 'required|string',
            'barber' => 'nullable|string',
            'date' => 'required|date|after_or_equal:today',
            'time' => 'required',
            'notes' => 'nullable|string|max:1000',
            'terms' => 'required|accepted',
        ], [
            'name.required' => 'O campo nome é obrigatório.',
            'phone.required' => 'O campo telefone é obrigatório.',
            'service.required' => 'É necessário selecionar um serviço.',
            'date.required' => 'A data do agendamento é obrigatória.',
            'date.after_or_equal' => 'A data não pode ser no passado.',
            'time.required' => 'O horário é obrigatório.',
            'terms.required' => 'Você deve aceitar os termos de uso.',
        ]);

        // Se a validação falhar, retorna com os erros
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Obtém o preço do serviço selecionado
        $services = Agendamento::getServiceOptions();
        $serviceKey = $request->input('service');
        $price = $services[$serviceKey]['preco'] ?? 0;

        // Verifica se o serviço existe
        if (!$price) {
            return redirect()->back()
                ->with('error', 'Serviço inválido.')
                ->withInput();
        }

        // Obtém o barbeiro selecionado
        $barber = $request->input('barber', 'any');
        
        // Mapeamento entre a chave do barbeiro e o nome na tabela barbeiros
        // Usa o método getBarberOptions() do modelo Agendamento para obter os nomes corretos
        $barberOptions = Agendamento::getBarberOptions();
        $barbeiroId = null;
        
        if ($barber !== 'any' && isset($barberOptions[$barber])) {
            $barberName = $barberOptions[$barber]['name'];
            // Remove aspas e caracteres especiais do nome para busca
            $searchName = str_replace(['"', "'"], '', $barberName);
            // Busca o barbeiro pelo nome na tabela barbeiros
            $barbeiro = \App\Models\Barbeiro::where('nome', 'like', '%' . $searchName . '%')->first();
            if ($barbeiro) {
                $barbeiroId = $barbeiro->id;
            }
        }

        // Verifica se o horário já está ocupado (considerando também o barbeiro se selecionado)
        $query = Agendamento::where('data_agendamento', $request->input('date'))
            ->where('horario_agendamento', $request->input('time'))
            ->whereIn('status', ['pending', 'confirmed']);

        // Se o cliente escolheu um barbeiro específico, verifica só nesse barbeiro
        if ($barber !== 'any') {
            $query->where(function ($q) use ($barber) {
                $q->where('barbeiro', $barber)
                  ->orWhere('barbeiro', 'any');
            });
        }

        $existingAgendamento = $query->first();

        if ($existingAgendamento) {
            return redirect()->back()
                ->with('error', 'Este horário com o barbeiro escolhido já está agendado. Por favor, escolha outro horário ou barbeiro.')
                ->withInput();
        }

        // Cria o agendamento com colunas em português
        $agendamento = Agendamento::create([
            'nome_cliente' => $request->input('name'),
            'telefone' => $request->input('phone'),
            'email' => $request->input('email'),
            'servico' => $serviceKey,
            'preco' => $price,
            'barbeiro' => $barber,
            'barbeiro_id' => $barbeiroId,
            'data_agendamento' => $request->input('date'),
            'horario_agendamento' => $request->input('time'),
            'status' => 'pending',
            'observacoes' => $request->input('notes'),
        ]);

        // Obtém informações do barbeiro
        $barbers = Agendamento::getBarberOptions();
        $barberName = $barbers[$barber]['name'] ?? 'Qualquer Barbeiro';

        return redirect()->route('agendamento')
            ->with('success', "Agendamento realizado com sucesso! Você será atendido pelo(a) {$barberName}. Compareça à barbearia no horário agendado.");
    }

}

