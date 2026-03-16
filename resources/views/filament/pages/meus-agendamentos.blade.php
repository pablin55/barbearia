<x-filament-panels::page>
    <x-filament::header>
        <x-slot name="heading">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-full bg-primary-100 dark:bg-primary-900 flex items-center justify-center">
                    <svg class="w-6 h-6 text-primary-600 dark:text-primary-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                </div>
                <div>
                    <h2 class="text-xl font-bold text-gray-900 dark:text-white">Meus Agendamentos</h2>
                    <p class="text-sm text-gray-500 dark:text-gray-400">Visualize e gerencie seus agendamentos</p>
                </div>
            </div>
        </x-slot>
    </x-filament::header>

    {{-- Filtros --}}
    <div class="mb-6">
        <div class="flex flex-wrap gap-2">
            <button 
                wire:click="$set('filtroData', 'todos')"
                class="px-4 py-2 rounded-lg text-sm font-medium transition-all {{ $filtroData === 'todos' ? 'bg-primary-600 text-white' : 'bg-gray-100 dark:bg-gray-800 text-gray-700 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-700' }}"
            >
                <svg class="w-4 h-4 inline-block mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                </svg>
                Todos
            </button>
            <button 
                wire:click="$set('filtroData', 'hoje')"
                class="px-4 py-2 rounded-lg text-sm font-medium transition-all {{ $filtroData === 'hoje' ? 'bg-primary-600 text-white' : 'bg-gray-100 dark:bg-gray-800 text-gray-700 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-700' }}"
            >
                <svg class="w-4 h-4 inline-block mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                Hoje
            </button>
            <button 
                wire:click="$set('filtroData', 'amanha')"
                class="px-4 py-2 rounded-lg text-sm font-medium transition-all {{ $filtroData === 'amanha' ? 'bg-primary-600 text-white' : 'bg-gray-100 dark:bg-gray-800 text-gray-700 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-700' }}"
            >
                <svg class="w-4 h-4 inline-block mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                </svg>
                Amanhã
            </button>
            <button 
                wire:click="$set('filtroData', 'semana')"
                class="px-4 py-2 rounded-lg text-sm font-medium transition-all {{ $filtroData === 'semana' ? 'bg-primary-600 text-white' : 'bg-gray-100 dark:bg-gray-800 text-gray-700 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-700' }}"
            >
                <svg class="w-4 h-4 inline-block mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                </svg>
                Esta Semana
            </button>
            <button 
                wire:click="$set('filtroData', 'pendentes')"
                class="px-4 py-2 rounded-lg text-sm font-medium transition-all {{ $filtroData === 'pendentes' ? 'bg-primary-600 text-white' : 'bg-gray-100 dark:bg-gray-800 text-gray-700 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-700' }}"
            >
                <svg class="w-4 h-4 inline-block mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                Pendentes
            </button>
        </div>
    </div>

    {{-- Estatísticas Rápidas --}}
    @php
        $agendamentosAgrupados = $agendamentos;
        $totalAgendamentos = collect($agendamentosAgrupados)->flatten()->count();
        $agendamentosPendentes = collect($agendamentosAgrupados)->flatten()->whereIn('status', ['pending', 'confirmed'])->count();
        $agendamentosConcluidos = collect($agendamentosAgrupados)->flatten()->where('status', 'completed')->count();
        $faturamentoEstimado = collect($agendamentosAgrupados)->flatten()->whereIn('status', ['completed', 'confirmed'])->sum('preco');
    @endphp

    <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
        <div class="bg-white dark:bg-gray-800 rounded-xl p-4 shadow-sm border border-gray-200 dark:border-gray-700">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-lg bg-primary-100 dark:bg-primary-900 flex items-center justify-center">
                    <svg class="w-5 h-5 text-primary-600 dark:text-primary-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                </div>
                <div>
                    <p class="text-sm text-gray-500 dark:text-gray-400">Total</p>
                    <p class="text-xl font-bold text-gray-900 dark:text-white">{{ $totalAgendamentos }}</p>
                </div>
            </div>
        </div>
        <div class="bg-white dark:bg-gray-800 rounded-xl p-4 shadow-sm border border-gray-200 dark:border-gray-700">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-lg bg-warning-100 dark:bg-warning-900 flex items-center justify-center">
                    <svg class="w-5 h-5 text-warning-600 dark:text-warning-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <div>
                    <p class="text-sm text-gray-500 dark:text-gray-400">Pendentes</p>
                    <p class="text-xl font-bold text-gray-900 dark:text-white">{{ $agendamentosPendentes }}</p>
                </div>
            </div>
        </div>
        <div class="bg-white dark:bg-gray-800 rounded-xl p-4 shadow-sm border border-gray-200 dark:border-gray-700">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-lg bg-success-100 dark:bg-success-900 flex items-center justify-center">
                    <svg class="w-5 h-5 text-success-600 dark:text-success-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <div>
                    <p class="text-sm text-gray-500 dark:text-gray-400">Concluídos</p>
                    <p class="text-xl font-bold text-gray-900 dark:text-white">{{ $agendamentosConcluidos }}</p>
                </div>
            </div>
        </div>
        <div class="bg-white dark:bg-gray-800 rounded-xl p-4 shadow-sm border border-gray-200 dark:border-gray-700">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-lg bg-gray-100 dark:bg-gray-700 flex items-center justify-center">
                    <svg class="w-5 h-5 text-gray-600 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <div>
                    <p class="text-sm text-gray-500 dark:text-gray-400">Faturamento</p>
                    <p class="text-xl font-bold text-gray-900 dark:text-white">R$ {{ number_format($faturamentoEstimado, 2, ',', '.') }}</p>
                </div>
            </div>
        </div>
    </div>

    {{-- Cards de Agendamentos por Data --}}
    @forelse($agendamentos as $data => $agendamentosDoDia)
        <div class="mb-8">
            {{-- Cabeçalho do Dia --}}
            <div class="flex items-center gap-3 mb-4">
                <div class="flex-1 h-px bg-gray-200 dark:bg-gray-700"></div>
                <div class="flex items-center gap-2 px-4 py-2 bg-white dark:bg-gray-800 rounded-full shadow-sm border border-gray-200 dark:border-gray-700">
                    <svg class="w-5 h-5 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                    <span class="font-semibold text-gray-900 dark:text-white">
                        @if(\Carbon\Carbon::parse($data)->isToday())
                            Hoje - {{ \Carbon\Carbon::parse($data)->format('d/m/Y') }}
                        @elseif(\Carbon\Carbon::parse($data)->isTomorrow())
                            Amanhã - {{ \Carbon\Carbon::parse($data)->format('d/m/Y') }}
                        @else
                            {{ \Carbon\Carbon::parse($data)->format('d/m/Y') }}
                        @endif
                    </span>
                    <span class="text-sm text-gray-500">({{ count($agendamentosDoDia) }} agendamentos)</span>
                </div>
                <div class="flex-1 h-px bg-gray-200 dark:bg-gray-700"></div>
            </div>

            {{-- Grid de Cards --}}
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4">
                @foreach($agendamentosDoDia as $agendamento)
                    @php
                        $statusColors = [
                            'pending' => 'border-l-warning-500 bg-warning-50 dark:bg-warning-900/20',
                            'confirmed' => 'border-l-info-500 bg-info-50 dark:bg-info-900/20',
                            'completed' => 'border-l-success-500 bg-success-50 dark:bg-success-900/20',
                            'cancelled' => 'border-l-danger-500 bg-danger-50 dark:bg-danger-900/20',
                            'no_show' => 'border-l-gray-500 bg-gray-50 dark:bg-gray-800',
                        ];
                        $statusLabels = [
                            'pending' => 'Pendente',
                            'confirmed' => 'Confirmado',
                            'completed' => 'Concluído',
                            'cancelled' => 'Cancelado',
                            'no_show' => 'Não Compareceu',
                        ];
                    @endphp
                    
                    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 border-l-4 {{ $statusColors[$agendamento->status] ?? 'border-l-gray-500' }} overflow-hidden hover:shadow-md transition-shadow">
                        {{-- Card Header --}}
                        <div class="p-4 border-b border-gray-100 dark:border-gray-700">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center gap-2">
                                    <div class="w-8 h-8 rounded-full bg-primary-100 dark:bg-primary-900 flex items-center justify-center">
                                        <span class="text-sm font-bold text-primary-600 dark:text-primary-400">
                                            {{ \Carbon\Carbon::parse($agendamento->horario_agendamento)->format('H:i') }}
                                        </span>
                                    </div>
                                    <span class="text-lg font-bold text-gray-900 dark:text-white">
                                        {{ \Carbon\Carbon::parse($agendamento->horario_agendamento)->format('H:i') }}
                                    </span>
                                </div>
                                <span class="px-2 py-1 text-xs font-medium rounded-full 
                                    @switch($agendamento->status)
                                        @case('pending') bg-warning-100 text-warning-700 dark:bg-warning-900 dark:text-warning-300 @break
                                        @case('confirmed') bg-info-100 text-info-700 dark:bg-info-900 dark:text-info-300 @break
                                        @case('completed') bg-success-100 text-success-700 dark:bg-success-900 dark:text-success-300 @break
                                        @case('cancelled') bg-danger-100 text-danger-700 dark:bg-danger-900 dark:text-danger-300 @break
                                        @default bg-gray-100 text-gray-700 dark:bg-gray-700 dark:text-gray-300
                                    @endswitch
                                ">
                                    {{ $statusLabels[$agendamento->status] ?? $agendamento->status }}
                                </span>
                            </div>
                        </div>

                        {{-- Card Body --}}
                        <div class="p-4 space-y-3">
                            {{-- Cliente --}}
                            <div>
                                <p class="text-xs text-gray-500 dark:text-gray-400 uppercase tracking-wide">Cliente</p>
                                <p class="font-semibold text-gray-900 dark:text-white">{{ $agendamento->nome_cliente }}</p>
                            </div>

                            {{-- Contato --}}
                            <div class="flex items-center gap-2">
                                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                </svg>
                                <a href="tel:{{ $agendamento->telefone }}" class="text-sm text-primary-600 dark:text-primary-400 hover:underline">
                                    {{ $agendamento->telefone }}
                                </a>
                            </div>

                            {{-- Serviço --}}
                            <div>
                                <p class="text-xs text-gray-500 dark:text-gray-400 uppercase tracking-wide">Serviço</p>
                                <p class="text-sm font-medium text-gray-900 dark:text-white">
                                    {{ ucwords(str_replace('_', ' ', $agendamento->servico)) }}
                                </p>
                            </div>

                            {{-- Valor --}}
                            <div class="flex items-center justify-between pt-2 border-t border-gray-100 dark:border-gray-700">
                                <span class="text-xs text-gray-500 dark:text-gray-400">Valor</span>
                                <span class="text-lg font-bold text-success-600 dark:text-success-400">
                                    R$ {{ number_format($agendamento->preco, 2, ',', '.') }}
                                </span>
                            </div>

                            {{-- Pagamento --}}
                            @if($agendamento->pago)
                                <div class="flex items-center gap-2 text-success-600 dark:text-success-400">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    <span class="text-sm font-medium">Pago</span>
                                </div>
                            @else
                                <div class="flex items-center gap-2 text-warning-600 dark:text-warning-400">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    <span class="text-sm font-medium">Pendente</span>
                                </div>
                            @endif
                        </div>

                        {{-- Card Actions --}}
                        @if(in_array($agendamento->status, ['pending', 'confirmed']))
                            <div class="p-3 bg-gray-50 dark:bg-gray-700/50 border-t border-gray-100 dark:border-gray-700">
                                <div class="flex gap-2">
                                    @if($agendamento->status === 'pending')
                                        <button 
                                            wire:click="confirmarAgendamento({{ $agendamento->id }})"
                                            class="flex-1 px-3 py-2 text-xs font-medium text-white bg-info-600 hover:bg-info-700 rounded-lg transition-colors flex items-center justify-center gap-1"
                                        >
                                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                            </svg>
                                            Confirmar
                                        </button>
                                    @endif
                                    <button 
                                        wire:click="concluirAgendamento({{ $agendamento->id }})"
                                        class="flex-1 px-3 py-2 text-xs font-medium text-white bg-success-600 hover:bg-success-700 rounded-lg transition-colors flex items-center justify-center gap-1"
                                    >
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        Concluir
                                    </button>
                                </div>
                                <div class="flex gap-2 mt-2">
                                    <button 
                                        wire:click="naoCompareceu({{ $agendamento->id }})"
                                        class="flex-1 px-3 py-2 text-xs font-medium text-gray-700 bg-gray-200 hover:bg-gray-300 dark:bg-gray-600 dark:text-gray-200 dark:hover:bg-gray-500 rounded-lg transition-colors"
                                    >
                                        Não Compareceu
                                    </button>
                                    <button 
                                        wire:click="cancelarAgendamento({{ $agendamento->id }})"
                                        class="flex-1 px-3 py-2 text-xs font-medium text-danger-700 bg-danger-100 hover:bg-danger-200 dark:bg-danger-900 dark:text-danger-300 dark:hover:bg-danger-800 rounded-lg transition-colors"
                                    >
                                        Cancelar
                                    </button>
                                </div>
                            </div>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
    @empty
        {{-- Empty State --}}
        <div class="flex flex-col items-center justify-center py-16">
            <div class="w-20 h-20 rounded-full bg-gray-100 dark:bg-gray-800 flex items-center justify-center mb-4">
                <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                </svg>
            </div>
            <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">Nenhum agendamento encontrado</h3>
            <p class="text-gray-500 dark:text-gray-400 text-center max-w-md">
                @switch($filtroData)
                    @case('hoje')
                        Você não tem agendamentos marcados para hoje.
                        @break
                    @case('amanha')
                        Você não tem agendamentos marcados para amanhã.
                        @break
                    @case('semana')
                        Você não tem agendamentos esta semana.
                        @break
                    @case('pendentes')
                        Você não tem agendamentos pendentes.
                        @break
                    @default
                        Você não tem agendamentos futuros agendados.
                @endswitch
            </p>
        </div>
    @endforelse
</x-filament-panels::page>

