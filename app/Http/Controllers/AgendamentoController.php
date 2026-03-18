<?php

namespace App\Http\Controllers;

use App\Models\Agendamento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Mail\ConfirmacaoAgendamento;
use Illuminate\Support\Facades\Mail;

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

        // Se a validação falhar
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Obtém o preço do serviço selecionado
        $services = Agendamento::getServiceOptions();
        $serviceKey = $request->input('service');
        $price = $services[$serviceKey]['preco'] ?? 0;

        if (!$price) {
            return redirect()->back()
                ->with('error', 'Serviço inválido.')
                ->withInput();
        }

        // Obtém barbeiro selecionado
        $barber = $request->input('barber', 'any');

        // Buscar barbeiro na tabela barbeiros
        $barberOptions = Agendamento::getBarberOptions();
        $barbeiroId = null;

        if ($barber !== 'any' && isset($barberOptions[$barber])) {

            $barberName = $barberOptions[$barber]['name'];
            $searchName = str_replace(['"', "'"], '', $barberName);

            $barbeiro = \App\Models\Barbeiro::where('nome', 'like', '%' . $searchName . '%')->first();

            if ($barbeiro) {
                $barbeiroId = $barbeiro->id;
            }
        }

        // Verificar se o horário já está ocupado
        $query = Agendamento::where('data_agendamento', $request->input('date'))
            ->where('horario_agendamento', $request->input('time'))
            ->whereIn('status', ['pending', 'confirmed']);

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

        // Criar agendamento
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

        // Enviar email de confirmação
        if ($agendamento->email) {
            Mail::to($agendamento->email)
                ->send(new ConfirmacaoAgendamento($agendamento));
        }

        // Nome do barbeiro para mensagem
        $barbers = Agendamento::getBarberOptions();
        $barberName = $barbers[$barber]['name'] ?? 'Qualquer Barbeiro';

        // Nome do barbeiro para resposta
        $barbers = Agendamento::getBarberOptions();
        $barberName = $barbers[$barber]['name'] ?? 'Qualquer Barbeiro';
        $serviceName = $services[$serviceKey]['name'] ?? $serviceKey;

        // JSON response para AJAX
        if ($request->ajax || $request->has('ajax')) {
            return response()->json([
                'success' => true,
                'nome_cliente' => $request->input('name'),
                'servico_nome' => $serviceName,
                'barbeiro_nome' => $barberName,
                'data' => date('d/m/Y', strtotime($request->input('date'))),
                'hora' => $request->input('time'),
                'preco' => 'R$ ' . number_format($price, 2, ',', '.')
            ]);
        }

        // Normal redirect
        return redirect()->route('agendamento')
            ->with('success', "Agendamento realizado com sucesso! Você será atendido pelo(a) {$barberName}. Compareça à barbearia no horário agendado.");
    }

    /**
     * Verifica se um horário já está ocupado (usado via AJAX)
     */
    public function verificarHorario(Request $request)
    {
        $existe = Agendamento::where('data_agendamento', $request->date)
            ->where('horario_agendamento', $request->time)
            ->whereIn('status', ['pending', 'confirmed'])
            ->exists();

        return response()->json([
            'ocupado' => $existe
        ]);
    }
}