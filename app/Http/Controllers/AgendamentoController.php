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
            'payment_method' => 'required|string',
            'notes' => 'nullable|string|max:1000',
            'terms' => 'required|accepted',
        ], [
            'name.required' => 'O campo nome é obrigatório.',
            'phone.required' => 'O campo telefone é obrigatório.',
            'service.required' => 'É necessário selecionar um serviço.',
            'date.required' => 'A data do agendamento é obrigatória.',
            'date.after_or_equal' => 'A data não pode ser no passado.',
            'time.required' => 'O horário é obrigatório.',
            'payment_method.required' => 'Selecione uma forma de pagamento.',
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
        $price = $services[$serviceKey]['price'] ?? 0;

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
            'forma_pagamento' => $request->input('payment_method'),
            'status_pagamento' => 'pending',
            'observacoes' => $request->input('notes'),
        ]);

        // Obtém a forma de pagamento
        $paymentMethod = $request->input('payment_method');

        // Obtém informações do barbeiro
        $barbers = Agendamento::getBarberOptions();
        $barberName = $barbers[$barber]['name'] ?? 'Qualquer Barbeiro';

        // Verifica se o pagamento é via Stripe (online)
        if (in_array($paymentMethod, ['stripe_credit', 'stripe_debit', 'stripe_pix'])) {
            return redirect()->route('agendamento')
                ->with('success', "Agendamento realizado com sucesso com o(a) {$barberName}! Em breve você receberá um link para pagamento via Stripe.");
        }

        // Para pagamentos na barbearia (dinheiro, pix, cartão)
        $paymentMessages = [
            'dinheiro' => "Agendamento realizado com sucesso! Você será atendido pelo(a) {$barberName}. Compareça à barbearia no horário agendado e efetue o pagamento em dinheiro.",
            'pix' => "Agendamento realizado com sucesso! Você será atendido pelo(a) {$barberName}. Compareça à barbearia no horário agendado e efetue o pagamento via PIX.",
            'credit_card' => "Agendamento realizado com sucesso! Você será atendido pelo(a) {$barberName}. Compareça à barbearia no horário agendado e efetue o pagamento no cartão de crédito.",
            'debit_card' => "Agendamento realizado com sucesso! Você será atendido pelo(a) {$barberName}. Compareça à barbearia no horário agendado e efetue o pagamento no cartão de débito.",
        ];

        $message = $paymentMessages[$paymentMethod] ?? "Agendamento realizado com sucesso! Você será atendido pelo(a) {$barberName}.";

        return redirect()->route('agendamento')
            ->with('success', $message);
    }

    /**
     * Exibe os agendamentos (para admin).
     */
    public function index(Request $request)
    {
        $query = Agendamento::query();

        // Filtro por data
        if ($request->has('date') && $request->date) {
            $query->where('data_agendamento', $request->date);
        }

        // Filtro por status
        if ($request->has('status') && $request->status) {
            $query->where('status', $request->status);
        }

        // Filtro por barbeiro
        if ($request->has('barber') && $request->barber) {
            $query->where('barbeiro', $request->barber);
        }

        // Ordena por data e hora
        $agendamentos = $query->orderBy('data_agendamento')
            ->orderBy('horario_agendamento')
            ->paginate(15);

        return view('admin.agendamentos.index', compact('agendamentos'));
    }

    /**
     * Confirma um agendamento.
     */
    public function confirm(Agendamento $agendamento)
    {
        if (!$agendamento->canBeConfirmed()) {
            return redirect()->back()->with('error', 'Este agendamento não pode ser confirmado.');
        }

        $agendamento->update(['status' => 'confirmed']);

        return redirect()->back()->with('success', 'Agendamento confirmado com sucesso!');
    }

    /**
     * Cancela um agendamento.
     */
    public function cancel(Request $request, Agendamento $agendamento)
    {
        if (!$agendamento->canBeCancelled()) {
            return redirect()->back()->with('error', 'Este agendamento não pode ser cancelado.');
        }

        $agendamento->update([
            'status' => 'cancelled',
            'observacoes' => $request->input('reason', 'Cancelado pelo cliente'),
        ]);

        return redirect()->back()->with('success', 'Agendamento cancelado com sucesso!');
    }

    /**
     * Marca o agendamento como concluído.
     */
    public function complete(Agendamento $agendamento)
    {
        if ($agendamento->status !== 'confirmed') {
            return redirect()->back()->with('error', 'Apenas agendamentos confirmados podem ser marcados como concluídos.');
        }

        $agendamento->update(['status' => 'completed']);

        return redirect()->back()->with('success', 'Agendamento marcado como concluído!');
    }
}

