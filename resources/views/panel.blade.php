<!DOCTYPE html>
<html lang="pt-MZ" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Painel do utilizador - Sabores de Moçambique">

    <style>
        :root {
            --terra: #e53e3e;
            --folha: #38a169;
            --sol: #d69e2e;
            --oceano: #3182ce;
            --transition-default: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        /* Animações */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes slideIn {
            from {
                transform: translateX(-20px);
                opacity: 0;
            }

            to {
                transform: translateX(0);
                opacity: 1;
            }
        }

        @keyframes pulse {

            0%,
            100% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.05);
            }
        }

        @keyframes bounce {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-5px);
            }
        }

        /* Estilos base */
        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            border: 2px solid var(--terra);
            transition: var(--transition-default);
        }

        .user-avatar:hover {
            transform: scale(1.1);
            box-shadow: 0 0 0 3px rgba(229, 62, 62, 0.2);
        }

        .dashboard-card {
            transition: var(--transition-default);
            border: 1px solid rgba(0, 0, 0, 0.1);
            animation: fadeIn 0.5s ease forwards;
        }

        .dashboard-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        .recipe-form input,
        .recipe-form textarea,
        .recipe-form select {
            border: 1px solid #ddd;
            border-radius: 0.5rem;
            padding: 0.75rem;
            width: 100%;
            transition: var(--transition-default);
        }

        .recipe-form input:focus,
        .recipe-form textarea:focus {
            outline: none;
            border-color: var(--terra);
            box-shadow: 0 0 0 3px rgba(229, 62, 62, 0.2);
        }

        .tab-content {
            display: none;
            opacity: 0;
        }

        .tab-content.active {
            display: block;
            animation: fadeIn 0.5s ease forwards;
        }

        /* Efeitos de hover */
        .hover-grow {
            transition: var(--transition-default);
        }

        .hover-grow:hover {
            transform: scale(1.02);
        }

        /* Botões com efeito */
        .btn-terra {
            background-color: var(--terra);
            color: white;
            transition: var(--transition-default);
        }

        .btn-terra:hover {
            background-color: #c53030;
            transform: translateY(-2px);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .btn-outline-terra {
            border: 1px solid var(--terra);
            color: var(--terra);
            transition: var(--transition-default);
        }

        .btn-outline-terra:hover {
            background-color: var(--terra);
            color: white;
        }


        /* Responsivo */
        @media (max-width: 767px) {
            .tab-nav {
                overflow-x: auto;
                white-space: nowrap;
                padding-bottom: 8px;
                -webkit-overflow-scrolling: touch;
                scrollbar-width: none;
            }

            .tab-nav::-webkit-scrollbar {
                display: none;
            }

            .tab-nav nav {
                display: inline-flex;
                min-width: 100%;
            }

            .tab-button {
                padding: 12px 8px;
                font-size: 0.875rem;
                flex-shrink: 0;
            }

            .main-content {
                padding-top: 16px;
                padding-bottom: 16px;
            }

            .dashboard-grid {
                grid-template-columns: 1fr !important;
                gap: 12px;
            }

            .recipe-form .grid {
                grid-template-columns: 1fr !important;
                gap: 12px;
            }

            .settings-grid {
                grid-template-columns: 1fr !important;
            }

            .mobile-hidden {
                display: none;
            }

            .mobile-flex-col {
                flex-direction: column;
            }
        }

        @media (min-width: 768px) and (max-width: 1023px) {
            .dashboard-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        /* Mobile menu */
        .nav-backdrop {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 40;
            opacity: 0;
            pointer-events: none;
            transition: opacity 0.3s ease;
        }

        .nav-backdrop.active {
            opacity: 1;
            pointer-events: all;
        }

        /* Menu móvel animado */
        #mobile-menu {
            transform: translateX(-100%);
            transition: transform 0.3s ease;
        }

        #mobile-menu.active {
            transform: translateX(0);
        }


        .animate-fadeIn {
            animation: fadeIn 0.3s ease-out forwards;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }


        /* IA thiking */
        /* Animação da CPU */
        .cpu-animation {
            animation: pulse 1.5s infinite ease-in-out;
        }

        /* Animação das linhas de processamento */
        .processing-1 {
            animation: processingAnim 2s infinite 0.1s;
        }

        .processing-2 {
            animation: processingAnim 2s infinite 0.3s;
        }

        .processing-3 {
            animation: processingAnim 2s infinite 0.5s;
        }

        .processing-4 {
            animation: processingAnim 2s infinite 0.2s;
        }

        .processing-5 {
            animation: processingAnim 2s infinite 0.4s;
        }

        .processing-6 {
            animation: processingAnim 2s infinite 0.6s;
        }

        /* Animação dos circuitos internos */
        .circuit-1,
        .circuit-5 {
            animation: circuitAnim 1.5s infinite;
        }

        .circuit-2,
        .circuit-6 {
            animation: circuitAnim 1.5s infinite 0.2s;
        }

        .circuit-3,
        .circuit-7 {
            animation: circuitAnim 1.5s infinite 0.4s;
        }

        .circuit-4,
        .circuit-8 {
            animation: circuitAnim 1.5s infinite 0.6s;
        }

        @keyframes pulse {

            0%,
            100% {
                transform: scale(1);
                opacity: 0.9;
            }

            50% {
                transform: scale(1.05);
                opacity: 1;
            }
        }

        @keyframes processingAnim {

            0%,
            100% {
                opacity: 0.3;
                stroke-width: 1;
            }

            50% {
                opacity: 1;
                stroke-width: 1.5;
            }
        }

        @keyframes circuitAnim {

            0%,
            100% {
                opacity: 0.2;
            }

            50% {
                opacity: 0.8;
            }
        }

        /* Animação da barra de progresso */
        .ai-progress {
            animation: progressAnim 3s infinite ease-in-out;
        }

        @keyframes progressAnim {
            0% {
                width: 0%;
            }

            50% {
                width: 80%;
            }

            100% {
                width: 100%;
            }
        }
    </style>

    @vite('resources/css/app.css')
    <title>Painel de usuário - Sabores</title>
    <link rel="shortcut icon" href="{{ asset('assets/img/ico.png') }}" type="image/png">
</head>

<body class="antialiased bg-gray-50">
    <!-- Notificação (oculta por padrão) -->
    <div id="notification" class="notification fixed top-4 right-4 z-50 hidden">
        <div class="bg-white rounded-lg shadow-lg p-4 max-w-sm border-l-4 border-terra">
            <div class="flex items-start">
                <div class="flex-shrink-0">
                    <svg class="h-6 w-6 text-terra" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <div class="ml-3">
                    <h3 id="notification-title" class="text-sm font-medium text-gray-900"></h3>
                    <p id="notification-message" class="mt-1 text-sm text-gray-500"></p>
                </div>
                <button onclick="hideNotification()"
                    class="ml-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex h-8 w-8">
                    <span class="sr-only">Fechar</span>
                    <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Navigation -->
    <nav class="fixed w-full z-50 bg-white/90 backdrop-blur-md shadow-sm" aria-label="Navegação principal">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">
                <div class="flex items-center">
                    <a href="#" class="flex-shrink-0 flex items-center hover-grow">
                        <span class="text-2xl text-terra">🌶️</span>
                        <span class="text-2xl font-bold text-terra ">Sabores</span>
                    </a>
                </div>

                <div class="hidden md:flex items-center space-x-4">
                    <a href="/explorar"
                        class="px-3 py-2 text-sm font-medium hover:text-terra transition-colors hover-grow">Explorar</a>
                    <a href="#minhas-receitas"
                        class="px-3 py-2 text-sm font-medium hover:text-terra transition-colors hover-grow">Minhas
                        Receitas</a>
                    <button id="user-menu-button" class="flex items-center gap-2 ml-4 hover-grow">
                        <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Utilizador" class="user-avatar">
                        <span class="hidden md:inline">Olá, Chef {{ auth()->user()->name }}</span>
                    </button>
                </div>

                <div class="-mr-2 flex md:hidden">
                    <button type="button" id="mobile-menu-button" aria-label="Abrir menu móvel" aria-expanded="false"
                        class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-terra focus:outline-none hover-grow">
                        <span class="sr-only">Abrir menu principal</span>
                        <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile menu -->
        <div class="md:hidden hidden fixed inset-y-0 left-0 z-50 w-64 bg-white shadow-lg transform transition-transform duration-300 ease-in-out"
            id="mobile-menu">
            <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3 bg-white h-full overflow-y-auto">
                <div class="flex items-center px-4 py-3 border-b border-gray-200">
                    <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Utilizador" class="user-avatar mr-3">
                    <span class="font-medium">Olá, Chef {{ auth()->user()->name }}</span>
                </div>
                <a href="#explorar"
                    class="block px-3 py-2 text-base font-medium text-gray-700 hover:bg-terra hover:text-white rounded-md transition-colors">Explorar</a>
                <a href="#minhas-receitas"
                    class="block px-3 py-2 text-base font-medium text-gray-700 hover:bg-terra hover:text-white rounded-md transition-colors">Minhas
                    Receitas</a>
                <a href="#favoritos"
                    class="block px-3 py-2 text-base font-medium text-gray-700 hover:bg-terra hover:text-white rounded-md transition-colors">Favoritos</a>
                <a href="#configuracoes"
                    class="block px-3 py-2 text-base font-medium text-gray-700 hover:bg-terra hover:text-white rounded-md transition-colors">Configurações</a>
                <a href="#sair"
                    class="block px-3 py-2 text-base font-medium text-gray-700 hover:bg-terra hover:text-white rounded-md transition-colors">Sair</a>
            </div>
        </div>
    </nav>

    <!-- Backdrop for mobile menu -->
    <div class="nav-backdrop" id="nav-backdrop"></div>

    <!-- User dropdown menu (hidden by default) -->
    <div id="user-menu"
        class="hidden absolute right-4 mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 z-50">
        <div class="py-1" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button">
            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Perfil</a>
            <a href="#configuracoes" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                role="menuitem">Configurações</a>
            <a href="#sair" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                role="menuitem">Sair</a>
        </div>
    </div>

    <!-- Main Content -->
    <main class="pt-16 pb-20 main-content">
        <!-- Dashboard Tabs -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-6">
            <div class="border-b border-gray-200 tab-nav">
                <nav class="-mb-px flex space-x-8">
                    <button data-tab="dashboard"
                        class="tab-button border-b-2 border-terra text-terra font-medium py-4 px-1 text-sm">
                        Painel
                    </button>
                    <button data-tab="recipes"
                        class="tab-button border-b-2 border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 font-medium py-4 px-1 text-sm">
                        Minhas Receitas
                    </button>
                    <button data-tab="favorites"
                        class="tab-button border-b-2 border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 font-medium py-4 px-1 text-sm">
                        Favoritos
                    </button>
                    <button data-tab="settings"
                        class="tab-button border-b-2 border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 font-medium py-4 px-1 text-sm">
                        Configurações
                    </button>
                </nav>
            </div>
        </div>

        <!-- Dashboard Content -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">

            <button id="generate-ai-recipe-btn"
                class="w-full flex items-center justify-center space-x-2 border rounded-md py-3 px-4 text-sm font-medium transition border-red-300 hover:scale-105 hover:opacity-80 active:scale-95 bg-gradient-to-r from-red-500 to-yellow-500 mb-6 text-white hover:text-white/90">
                <img src="https://www.svgrepo.com/show/200720/cpu-processor.svg" class="h-8 w-8">
                <span>Gere uma receita com nossa IA</span>
            </button>

            {{-- Modal pata IA --}}
            <div id="ai-recipe-modal"
                class="fixed inset-0 z-50 hidden flex items-center justify-center p-4 bg-black bg-opacity-50 backdrop-blur-sm">
                <div class="bg-white rounded-xl shadow-lg w-full max-w-sm animate-fadeIn">
                    <div class="p-6">
                        <div class="flex justify-between items-center mb-4">
                            <h3 class="text-xl font-bold text-gray-900">Gerar Receita com IA</h3>
                            <button id="close-ai-modal" class="text-gray-400 hover:text-gray-500">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>

                        <form id="generate-recipe-form" class="space-y-4" method="get"
                            action="{{ route('panel.recipes.ai') }}">

                            <div>
                                <label for="ai-recipe-title" class="block text-sm font-medium text-gray-700 mb-1">
                                    O que deseja cozinhar ?
                                </label>
                                <input type="text" name="title" id="ai-recipe-title"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-terra focus:border-terra transition"
                                    placeholder="Ex: Folhas de mandioca com camarão e leite de coco">
                                <p class="mt-1 text-xs text-gray-500">
                                    Simplifique a receita para melhor resultados.
                                </p>
                            </div>

                            <div class="pt-2">
                                <button id="generate-recipe-btn" type="submit"
                                    class="w-full flex items-center justify-center space-x-2 bg-gradient-to-r from-red-500 to-yellow-500 text-white py-3 px-4 rounded-lg font-medium hover:opacity-90 transition">
                                    <img src="https://www.svgrepo.com/show/200720/cpu-processor.svg" class="h-5 w-5">
                                    <span>Gerar Receita</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


            {{-- <div class="w-screen h-screen fixed top-0 left-0 bg-black/20 backdrop-blur-sm z-50 flex items-center justify-center">
                <form action="">
                    <div class="bg-white rounded-lg shadow-lg p-6 max-w-md w-full">
                        <h2 class="text-xl font-bold mb-4">Geração de Receita</h2>
                        <p class="text-gray-600 mb-4">Aguarde enquanto nossa IA gera uma receita deliciosa para você!</p>
                        <div class="flex items-center justify-between">
                            <button type="button" id="cancel-generate-btn"
                                class="btn-terra bg-red-500 text-white hover:bg-red-600 transition-colors px-4 py-2 rounded-md">
                                Cancelar
                            </button>
                            <button type="submit"
                                class="btn-terra bg-green-500 text-white hover:bg-green-600 transition-colors px-4 py-2 rounded-md">
                                Continuar
                            </button>
                        </div>
                    </div>
                </form>
            </div> --}}
            <!-- Dashboard Tab -->
            <div id="dashboard" class="tab-content active">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8 dashboard-grid">
                    <div class="dashboard-card bg-white rounded-xl shadow-sm p-6 hover-grow">
                        <div class="flex items-center justify-between">
                            <div>
                                <h3 class="text-lg font-medium text-gray-900 mb-2">Receitas Publicadas</h3>
                                <p class="text-3xl font-bold text-terra">
                                    {{ $recipes->count() > 10 ? $recipes->count() : '0' . $recipes->count() }}</p>
                            </div>
                            <div class="bg-terra/10 text-terra p-3 rounded-full">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                </svg>
                            </div>
                        </div>
                        <div class="mt-4">
                            <div class="h-1 w-full bg-gray-200 rounded-full overflow-hidden">
                                <div class="h-full bg-terra" style="width: 70%"></div>
                            </div>
                            <p class="text-xs text-gray-500 mt-1">Quanto mais receitas você tiver, mais visualizações
                                você terá.</p>
                        </div>
                    </div>
                    <div class="dashboard-card bg-white rounded-xl shadow-sm p-6 hover-grow">
                        <div class="flex items-center justify-between">
                            <div>
                                <h3 class="text-lg font-medium text-gray-900 mb-2">Taxa de Cliques</h3>
                                <p class="text-3xl font-bold text-terra">{{ $views > 10 ? $views : '0' . $views }}</p>
                            </div>
                            <div class="bg-sol/10 text-sol p-3 rounded-full">
                                <img src="https://www.svgrepo.com/show/488858/click.svg" alt="Ícone de clique"
                                    class="h-8 w-8" />
                            </div>
                        </div>
                        <div class="mt-4">
                            <div class="h-1 w-full bg-gray-200 rounded-full overflow-hidden">
                                <div class="h-full bg-sol" style="width: 45%"></div>
                            </div>
                            <p class="text-xs text-gray-500 mt-1">Monitoramos sempre que alguém clica em suas receitas.
                            </p>
                        </div>
                    </div>
                    <div class="dashboard-card bg-white rounded-xl shadow-sm p-6 hover-grow">
                        <div class="flex items-center justify-between">
                            <div>
                                <h3 class="text-lg font-medium text-gray-900 mb-2">Ranking <strong
                                        class="text-red-600 uppercase">Top Chef</strong></h3>
                                <p class="text-3xl font-bold text-terra">156</p>
                            </div>
                            <div class="bg-oceano/10 text-oceano p-3 rounded-full">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" class="h-8 w-8 font-black">
                                    <circle cx="12" cy="8" r="4" stroke="currentColor"
                                        stroke-width="2" fill="#fff" />
                                    <path d="M6 20v-2a4 4 0 014-4h4a4 4 0 014 4v2" stroke="currentColor"
                                        stroke-width="2" fill="none" />
                                    <circle cx="9" cy="8" r="1" fill="currentColor" />
                                    <circle cx="15" cy="8" r="1" fill="currentColor" />
                                    <path d="M8 6a4 4 0 018 0" stroke="currentColor" stroke-width="2"
                                        fill="none" />
                                </svg>
                            </div>
                        </div>
                        <div class="mt-4">
                            <div class="h-1 w-full bg-gray-200 rounded-full overflow-hidden">
                                <div class="h-full bg-oceano" style="width: 30%"></div>
                            </div>
                            <p class="text-xs text-gray-500 mt-1">Quanto mais visualizações tiver, mais chances terá de
                                aparecer no ranking dos Top Chef.</p>
                        </div>
                    </div>
                </div>













                <h2 class="font-display text-xl font-bold mb-6">Atividade Recente</h2>
                <div class="bg-white rounded-xl shadow-sm overflow-hidden">
                    <ul class="divide-y divide-gray-200">

                        @foreach ($recent_recipes as $item)
                            <li class="p-4 hover:bg-gray-50 transition-colors hover-grow">
                                <div class="flex items-center gap-3">
                                    <div class="bg-folha/10 text-folha p-2 rounded-full">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="font-medium">Você publicou <cite
                                                class="text-red-700">{{ $item->title }}</cite></p>
                                        <p class="text-sm text-gray-500">{{ $item->created_at->diffForHumans() }}</p>
                                    </div>
                                    <a href="{{ route('explore.recipe', $item->id * now()->format('dmy')) }}"
                                        class="ml-auto text-terra hover:underline text-sm">Visualizar</a>
                                </div>
                            </li>
                        @endforeach

                        @foreach ($recent_views as $item)
                            
                        <li class="p-4 hover:bg-gray-50 transition-colors hover-grow">
                            <div class="flex items-center gap-3">
                                <div class="bg-sol/10 text-sol p-2 rounded-full">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 15C13.6569 15 15 13.6569 15 12C15 10.3431 13.6569 9 12 9C10.3431 9 9 10.3431 9 12C9 13.6569 10.3431 15 12 15Z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M2 12C2 12 5 7 12 7C19 7 22 12 22 12C22 12 19 17 12 17C5 17 2 12 2 12Z" />
                                    </svg>
                                </div>
                                <div>
                                    <p class="font-medium">A receita <cite
                                                class="text-red-700">{{ $item->recipe->title }}</cite> recebeu uma visualização.</p>
                                    <p class="text-sm text-gray-500">{{ $item->created_at->diffForHumans() }}</p>
                                </div>
                                <button class="ml-auto text-terra hover:underline text-sm">Analisar</button>
                            </div>
                        </li>
                        @endforeach
                       
                    </ul>
                    <div class="px-4 py-3 bg-gray-50 text-right">
                        <button class="text-terra text-sm font-medium hover:underline">Ver analise de actividade</button>
                    </div>
                </div>
            </div>

            <!-- My Recipes Tab -->
            <div id="recipes" class="tab-content">
                <div class="flex justify-between items-center mb-6 mobile-flex-col gap-4">
                    <h2 class="font-display text-xl font-bold">Minhas Receitas</h2>

                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    <!-- Recipe Card -->


                    @forelse ($recipes as $item)
                        <div class="dashboard-card bg-white rounded-xl shadow-sm overflow-hidden hover-grow">
                            <div class="relative h-48  bg-cover bg-center">
                                <img src="{{ asset('files/' . $item->image) ?? asset('assets/img/no-image.png') }}"
                                    class="object-cover w-full h-full" alt="{{ $item->title }}">
                                <div class="absolute top-2 right-2 bg-white/90 rounded-full p-1 shadow-sm">
                                    <button class="text-terra hover:text-red-700 p-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                            <div class="p-4">
                                <div class="flex justify-between items-start mb-2">
                                    <h3 class="font-medium">{{ $item->title }}</h3>
                                    <span
                                        class="text-xs bg-folha/20 text-folha px-2 py-1 rounded-full">Publicada</span>
                                </div>
                                <p class="text-sm text-gray-600 mb-3">{{ $item->description }}</p>
                                <div class="flex justify-between text-sm text-gray-500">
                                    <span>{{ $item->created_at->format('d/m/Y') }}</span>
                                    <div class="flex items-center gap-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                        </svg>
                                        <span>156</span>
                                    </div>
                                </div>
                            </div>
                            <div class="border-t border-gray-200 px-4 py-2 flex justify-between">
                                <button class="text-terra text-sm font-medium hover:underline">Editar</button>
                                <button class="text-gray-500 text-sm font-medium hover:underline">Estatísticas</button>
                            </div>
                        </div>
                    @empty
                    @endforelse



                    <!-- Add New Recipe Card -->
                    <div
                        class="dashboard-card bg-white rounded-xl shadow-sm overflow-hidden border-2 border-dashed border-gray-300 hover:border-terra transition-colors flex items-center justify-center hover-grow">
                        <button id="new-recipe-card-btn"
                            class="text-center p-6 w-full h-full md:py-20 flex flex-col items-center justify-center text-terra hover:text-red-700">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 mb-2" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                            </svg>
                            <span class="font-medium">Nova Receita</span>
                        </button>
                    </div>
                </div>
            </div>

            {{-- @dd($ia_recipe) --}}
            <!-- Recipe Form (hidden by default) -->
            <div id="recipe-form" @if ($ia == false) class="hidden" @endif>
                <div class="bg-white rounded-xl shadow-sm p-6 mb-8 mt-10">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="font-display text-xl font-bold">Nova Receita</h2>
                        <button id="close-recipe-form" class="text-gray-400 hover:text-gray-500">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>

                    <form id="recipe-form-data" class="recipe-form space-y-6" method="POST"
                        action="{{ route('panel.recipes.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                            <div>
                                <label for="recipe-title" class="block text-sm font-medium text-gray-700 mb-1">Título
                                    da Receita</label>

                                @if ($ia)
                                    <input type="text" id="recipe-title" name="title"
                                        placeholder="Ex: Matapa Tradicional" value="{{ $ia_recipe['title'] ?? '' }}"
                                        required>
                                @else
                                    <input type="text" id="recipe-title" name="title"
                                        placeholder="Ex: Matapa Tradicional" required>
                                @endif
                            </div>

                            <div>
                                <label for="recipe-time" class="block text-sm font-medium text-gray-700 mb-1">Tempo de
                                    Preparo</label>
                                @if ($ia)
                                    <input type="text" id="recipe-time" name="duration"
                                        value="{{ $ia_recipe['duracao'] ?? '' }}" placeholder="Ex: 1h 30min">
                                @else
                                    <input type="text" id="recipe-time" name="duration"
                                        placeholder="Ex: 1h 30min">
                                @endif
                            </div>
                            <div>
                                <label for="recipe-difficulty"
                                    class="block text-sm font-medium text-gray-700 mb-1">Dificuldade</label>
                                <select id="recipe-difficulty" name="level">
                                    <option value="">Selecione</option>

                                    @if ($ia && isset($ia_recipe['level']))
                                        <option @if ($ia_recipe['level'] == 'low') selected @endif value="low">Fácil
                                        </option>
                                        <option @if ($ia_recipe['level'] == 'medium') selected @endif value="medium">Médio
                                        </option>
                                        <option @if ($ia_recipe['level'] == 'high') selected @endif value="high">
                                            Difícil</option>
                                    @else
                                        <option value="low">Fácil</option>
                                        <option value="medium">Médio</option>
                                        <option value="high">Difícil</option>
                                    @endif

                                </select>
                            </div>

                        </div>





                        <div class="grid grid-cols-1 gap-6">
                            <div>
                                <label for="recipe-description"
                                    class="block text-sm font-medium text-gray-700 mb-1">Descrição</label>
                                @if ($ia)
                                    <textarea id="recipe-description" name="description" rows="3" placeholder="Descreva sua receita..." required>{{ $ia_recipe['descricao'] }}</textarea>
                                @else
                                    <textarea id="recipe-description" name="description" rows="3" placeholder="Descreva sua receita..." required></textarea>
                                @endif
                            </div>

                        </div>

                        <div id="recipe-ingredients" class="space-y-4 mt-5 border-b border-gray-200 pb-5">
                            <label class="block text-sm font-medium text-gray-700 mb-1">Ingredientes</label>
                            <div id="ingredients-container" class="space-y-2">
                                @if ($ia)
                                    @foreach ($ia_recipe['ingredientes'] as $key => $item)
                                        <div class="flex items-center gap-2">
                                            <span class="text-sm text-gray-500">{{ $key + 1 }}</span>
                                            <input type="text" name="item-{{ $key + 1 }}"
                                                class="flex-1 first-letter:capitalize"
                                                placeholder="Ex: 1 colheres de óleo" value="{{ $item }}">
                                            <button type="button"
                                                class="text-terra hover:text-red-700 remove-ingredient">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                            </button>
                                        </div>
                                    @endforeach
                                @else
                                    <div id="ingredients-container" class="space-y-2">
                                        <div class="flex items-center gap-2">
                                            <span class="text-sm text-gray-500">1</span>
                                            <input type="text" name="item-1"
                                                class="flex-1 first-letter:capitalize"
                                                placeholder="Ex: 1 colheres de óleo">
                                            <button type="button"
                                                class="text-terra hover:text-red-700 remove-ingredient">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                @endif
                            </div>
                            <button type="button" id="add-ingredient"
                                class="mt-2 text-sm text-terra hover:underline flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                </svg>
                                Adicionar ingrediente
                            </button>
                        </div>

                        <div id="recipe-instructions" class="space-y-4 mt-5">
                            <label
                                class="block text-sm font-medium text-gray-700 my-5 border-b border-gray-200 pb-5">Modo
                                de Preparo</label>
                            <div id="instructions-container" class="space-y-2">
                                @if ($ia)
                                    @foreach ($ia_recipe['preparo'] as $key => $item)
                                        <div class="flex items-start gap-2">
                                            <span class="mt-1 text-sm text-gray-500">{{ $key + 1 }}.</span>
                                            <textarea rows="2" name="step-{{ $key + 1 }}" class="flex-1 first-letter:capitalize"
                                                placeholder="Ex: Corte os vegetais em cubos pequenos">{{ $item }}</textarea>
                                            <button type="button"
                                                class="text-terra hover:text-red-700 remove-instruction mt-1">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                            </button>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="flex items-start gap-2">
                                        <span class="mt-1 text-sm text-gray-500">1.</span>
                                        <textarea rows="2" name="step-1" class="flex-1 first-letter:capitalize"
                                            placeholder="Ex: Corte os vegetais em cubos pequenos"></textarea>
                                        <button type="button"
                                            class="text-terra hover:text-red-700 remove-instruction mt-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </button>
                                    </div>
                                @endif
                            </div>
                            <button type="button" id="add-instruction"
                                class="mt-2 text-sm text-terra hover:underline flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                </svg>
                                Adicionar passo
                            </button>
                        </div>


                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="recipe-category"
                                    class="block text-sm font-medium text-gray-700 mb-1">Categoria</label>
                                <select id="recipe-category" name="category" required>
                                    <option value="">Selecione uma categoria</option>
                                    <option value="Mata-Bicho">Mata-Bicho</option>
                                    <option value="Almoço">Almoço</option>
                                    <option value="Jantar">Jantar</option>
                                    <option value="Sobremesa">Sobremesa</option>
                                    <option value="Bebida">Bebida</option>
                                    <option value="Salada">Salada</option>
                                    <option value="Sopa">Sopa</option>
                                    <option value="Petisco">Petisco</option>
                                    <option value="Lanche">Lanche</option>
                                    <option value="Outro">Outro</option>
                                </select>
                            </div>
                            <div>
                                <label for="recipe-type"
                                    class="block text-sm font-medium text-gray-700 mb-1">Tipo</label>
                                <select id="recipe-type" name="type" required>
                                    <option value="">Selecione</option>
                                    <option value="Vegetariano">Vegetariano</option>
                                    <option value="Vegano">Vegano</option>
                                    <option value="Sem Glúten">Sem Glúten</option>
                                    <option value="Sem Lactose">Sem Lactose</option>
                                    <option value="Carne">Carne</option>
                                    <option value="Peixe">Peixe</option>
                                    <option value="Frutos do Mar">Frutos do Mar</option>
                                    <option value="Outro">Outro</option>
                                </select>
                            </div>
                        </div>

                        <div class="mt-6 border-b border-gray-200 pb-5">
                            <label class="block text-sm font-medium text-gray-700 mb-1">Foto da Receita</label>
                            <div class="mt-1 flex items-center">
                                <div class="relative group">
                                    <div
                                        class="w-32 h-32 rounded-lg bg-gray-100 border-2 border-dashed border-gray-300 flex items-center justify-center overflow-hidden">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="h-10 w-10 text-gray-400 group-hover:text-terra transition-colors"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                    </div>
                                    <input type="file" id="recipe-photo" name="image" accept="image/*"
                                        class="absolute inset-0 w-full h-full opacity-0 cursor-pointer">
                                </div>
                                <div class="ml-4 text-sm text-gray-600">
                                    <p>Envie uma foto apetitosa da sua receita</p>
                                    <p class="text-xs text-gray-500 mt-1">Formatos: JPG, PNG, SVG, JPEG (máx. 5MB)</p>
                                </div>
                            </div>
                        </div>


                        <div class="grid grid-cols-1 gap-6">
                            <div>
                                <label for="recipe-link" class="block text-sm font-medium text-gray-700 mb-1">Link de
                                    Tutorial</label>
                                <input id="recipe-link" name="youtube_video" type="text"
                                    placeholder="ex. https://www.youtube.com/watch?v=12345">
                            </div>
                        </div>
                        <div class="pt-4 border-t border-gray-200 flex justify-end space-x-3">
                            <button type="button" id="cancel-recipe-form"
                                class="btn-outline-terra px-4 py-2 rounded-full text-sm font-medium">
                                Cancelar
                            </button>
                            <button type="submit" class="btn-terra px-4 py-2 rounded-full text-sm font-medium">
                                Publicar Receita
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Favorites Tab -->
            <div id="favorites" class="tab-content">
                <h2 class="font-display text-xl font-bold mb-6">Receitas Favoritas</h2>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    <!-- Favorite Recipe 1 -->
                    <div class="dashboard-card bg-white rounded-xl shadow-sm overflow-hidden hover-grow">
                        <div
                            class="relative h-48 bg-[url('https://images.unsplash.com/photo-1547592180-85f173990554?auto=format&fit=crop&w=600&q=80')] bg-cover bg-center">
                            <button
                                class="absolute top-2 right-2 bg-white/90 rounded-full p-2 shadow-sm text-terra hover:animate-bounce">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z"
                                        clip-rule="evenodd" />
                                </svg>
                            </button>
                        </div>
                        <div class="p-4">
                            <h3 class="font-medium mb-1">Galinha à Cafreal</h3>
                            <p class="text-sm text-gray-600 mb-3">Por <a href="#"
                                    class="text-terra hover:underline">Chef Carlos</a></p>
                            <div class="flex items-center text-sm text-gray-500 gap-4">
                                <span class="flex items-center gap-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    1h 20min
                                </span>
                                <span class="flex items-center gap-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                                    </svg>
                                    4.8
                                </span>
                            </div>
                        </div>
                        <div class="border-t border-gray-200 px-4 py-2">
                            <button class="w-full btn-outline-terra px-4 py-1 rounded-full text-sm font-medium">
                                Ver Receita
                            </button>
                        </div>
                    </div>

                    <!-- Favorite Recipe 2 -->
                    <div class="dashboard-card bg-white rounded-xl shadow-sm overflow-hidden hover-grow">
                        <div
                            class="relative h-48 bg-[url('https://images.unsplash.com/photo-1518779578993-ec3579fee39f?auto=format&fit=crop&w=600&q=80')] bg-cover bg-center">
                            <button
                                class="absolute top-2 right-2 bg-white/90 rounded-full p-2 shadow-sm text-terra hover:animate-bounce">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z"
                                        clip-rule="evenodd" />
                                </svg>
                            </button>
                        </div>
                        <div class="p-4">
                            <h3 class="font-medium mb-1">Caril de Camarão</h3>
                            <p class="text-sm text-gray-600 mb-3">Por <a href="#"
                                    class="text-terra hover:underline">Chef Ana</a></p>
                            <div class="flex items-center text-sm text-gray-500 gap-4">
                                <span class="flex items-center gap-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    45min
                                </span>
                                <span class="flex items-center gap-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                                    </svg>
                                    4.5
                                </span>
                            </div>
                        </div>
                        <div class="border-t border-gray-200 px-4 py-2">
                            <button class="w-full btn-outline-terra px-4 py-1 rounded-full text-sm font-medium">
                                Ver Receita
                            </button>
                        </div>
                    </div>

                    <!-- Favorite Recipe 3 -->
                    <div class="dashboard-card bg-white rounded-xl shadow-sm overflow-hidden hover-grow">
                        <div
                            class="relative h-48 bg-[url('https://images.unsplash.com/photo-1601050690597-df0568f70950?auto=format&fit=crop&w=600&q=80')] bg-cover bg-center">
                            <button
                                class="absolute top-2 right-2 bg-white/90 rounded-full p-2 shadow-sm text-terra hover:animate-bounce">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z"
                                        clip-rule="evenodd" />
                                </svg>
                            </button>
                        </div>
                        <div class="p-4">
                            <h3 class="font-medium mb-1">Bolo de Mandioca</h3>
                            <p class="text-sm text-gray-600 mb-3">Por <a href="#"
                                    class="text-terra hover:underline">Chef Maria</a></p>
                            <div class="flex items-center text-sm text-gray-500 gap-4">
                                <span class="flex items-center gap-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    1h 10min
                                </span>
                                <span class="flex items-center gap-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                                    </svg>
                                    4.9
                                </span>
                            </div>
                        </div>
                        <div class="border-t border-gray-200 px-4 py-2">
                            <button class="w-full btn-outline-terra px-4 py-1 rounded-full text-sm font-medium">
                                Ver Receita
                            </button>
                        </div>
                    </div>
                </div>

                <div class="mt-8 flex justify-center">
                    <button class="btn-outline-terra px-4 py-2 rounded-full text-sm font-medium">
                        Carregar mais receitas
                    </button>
                </div>
            </div>

            <!-- Settings Tab -->
            <div id="settings" class="tab-content">
                <h2 class="font-display text-xl font-bold mb-6">Configurações da Conta</h2>

                <div class="bg-white rounded-xl shadow-sm overflow-hidden">
                    <div class="p-6">
                        <form class="space-y-6">
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                                <div class="md:col-span-2">
                                    <label for="user-name"
                                        class="block text-sm font-medium text-gray-700 mb-1">Nome</label>
                                    <input type="text" id="user-name" value="{{ auth()->user()->name }}"
                                        class="w-full">
                                </div>
                                <div>
                                    <label for="user-username"
                                        class="block text-sm font-medium text-gray-700 mb-1">Nome de Utilizador</label>
                                    <input type="text" id="user-username" value="{{ auth()->user()->username }}"
                                        class="w-full">
                                </div>
                            </div>

                            <div>
                                <label for="user-email"
                                    class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                                <input type="email" id="user-email" value="{{ auth()->user()->email }}"
                                    class="w-full">
                            </div>

                            <div>
                                <label for="user-bio"
                                    class="block text-sm font-medium text-gray-700 mb-1">Biografia</label>
                                <textarea id="user-bio" rows="3" class="w-full">{{ auth()->user()->bio }}</textarea>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Foto de Perfil</label>
                                <div class="flex items-center gap-4">
                                    <img src="{{ auth()->user()->profile_photo_url ?? url('https://www.svgrepo.com/show/228291/user-profile.svg') }}"
                                        alt="Utilizador" class="w-16 h-16 rounded-full">
                                    <button type="button" class="text-sm text-terra font-medium hover:text-red-700">
                                        Alterar foto
                                    </button>
                                </div>
                            </div>

                            <div class="pt-4 border-t border-gray-200 flex justify-end gap-3">
                                <button type="button"
                                    class="px-4 py-2 border border-gray-300 rounded-full text-sm font-medium text-gray-700 hover:bg-gray-50">
                                    Cancelar
                                </button>
                                <button type="submit"
                                    class="px-6 py-2 border border-transparent rounded-full text-sm font-medium text-white bg-red-700 hover:bg-red-800">
                                    Salvar Alterações
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>




        {{-- IA Thinking --}}
        <div id="ai-loading"
            class="fixed inset-0 z-50 hidden flex items-center justify-center p-4 bg-black/30 bg-opacity-50 backdrop-blur-sm">
            <div class="bg-white rounded-xl shadow-lg w-full max-w-sm p-6 text-center">
                <!-- CPU animado -->
                <div class="cpu-animation mx-auto mb-6 w-16 h-16 relative w-full flex items-center justify-center">
                    <img src="https://www.svgrepo.com/show/200720/cpu-processor.svg" class="h-full w-full">
                </div>

                <h3 class="text-lg font-medium text-gray-900 mb-2">Processando...</h3>
                <p id="ai-tip" class="text-sm text-gray-600 mb-4">Buscando inspiração em receitas tradicionais
                    moçambicanas...</p>

                <!-- Barra de progresso animada -->
                <div class="w-full bg-gray-200 rounded-full h-2.5">
                    <div class="ai-progress bg-gradient-to-r from-red-500 to-yellow-500 h-2.5 rounded-full"
                        style="width: 0%"></div>
                </div>

                <!-- Dicas aleatórias -->
                <div class="mt-4 text-xs text-gray-500 italic">
                    <p class="">Aguarde, enquanto criamos uma receita incrível para você</p>
                </div>
            </div>
        </div>




    </main>

    <!-- Footer -->
    <footer class="bg-swhite h-full border-t border-gray-200 py-6">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <div class="flex items-center">
                    <span class="text-2xl text-terra">🌶️</span>
                    <span class="ml-1 text-xl font-bold text-terra">Sabores</span>
                </div>
                <div class="mt-4 md:mt-0">
                    <p class="text-sm text-gray-500">&copy; 2023 Sabores de Moçambique. Todos direitos reservados.</p>
                </div>
                <div class="mt-4 md:mt-0 flex space-x-6">
                    <a href="#" class="text-gray-400 hover:text-terra">
                        <span class="sr-only">Facebook</span>
                        <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"
                                clip-rule="evenodd" />
                        </svg>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-terra">
                        <span class="sr-only">Instagram</span>
                        <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 3.807.058h.468c2.456 0 2.784-.011 3.807-.058.975-.045 1.504-.207 1.857-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.023.058-1.351.058-3.807v-.468c0-2.456-.011-2.784-.058-3.807-.045-.975-.207-1.504-.344-1.857a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z"
                                clip-rule="evenodd" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </footer>




    <script src="{{ asset('assets/js/ia.js') }}"></script>
    <script>
        // Mobile menu toggle
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');
        const navBackdrop = document.getElementById('nav-backdrop');

        mobileMenuButton.addEventListener('click', () => {
            const isOpen = mobileMenu.classList.contains('active');

            if (isOpen) {
                mobileMenu.classList.remove('active');
                navBackdrop.classList.remove('active');
            } else {
                mobileMenu.classList.add('active');
                navBackdrop.classList.add('active');
            }
        });

        navBackdrop.addEventListener('click', () => {
            mobileMenu.classList.remove('active');
            navBackdrop.classList.remove('active');
        });

        // User menu toggle
        const userMenuButton = document.getElementById('user-menu-button');
        const userMenu = document.getElementById('user-menu');

        if (userMenuButton && userMenu) {
            userMenuButton.addEventListener('click', (e) => {
                e.stopPropagation();
                userMenu.classList.toggle('hidden');
            });

            document.addEventListener('click', (e) => {
                if (!userMenu.contains(e.target)) {
                    userMenu.classList.add('hidden');
                }
            });
        }

        // Tab switching
        const tabButtons = document.querySelectorAll('.tab-button');
        const tabContents = document.querySelectorAll('.tab-content');

        tabButtons.forEach(button => {
            button.addEventListener('click', () => {
                const tabId = button.getAttribute('data-tab');
                document.getElementById("recipe-form").classList.add("hidden");
                // Update tab buttons
                tabButtons.forEach(btn => {
                    btn.classList.remove('border-terra', 'text-terra');
                    btn.classList.add('border-transparent', 'text-gray-500',
                        'hover:text-gray-700', 'hover:border-gray-300');
                });

                button.classList.add('border-terra', 'text-terra');
                button.classList.remove('border-transparent', 'text-gray-500', 'hover:text-gray-700',
                    'hover:border-gray-300');

                // Update tab contents
                tabContents.forEach(content => {
                    content.classList.remove('active');
                    content.classList.add('hidden');
                });

                const activeTab = document.getElementById(tabId);
                if (activeTab) {
                    activeTab.classList.add('active');
                    activeTab.classList.remove('hidden');
                }
            });
        });

        // Dynamic ingredient fields
        const ingredientsContainer = document.getElementById('ingredients-container');
        const addIngredientButton = document.getElementById('add-ingredient');

        addIngredientButton.addEventListener('click', () => {
            const ingredientCount = ingredientsContainer.children.length + 1;
            const newIngredient = document.createElement('div');
            newIngredient.className = 'flex items-center gap-2';
            newIngredient.innerHTML = `
                <span class="text-sm text-gray-500">${ingredientCount}.</span>
                <input type="text" class="flex-1" name="item-${ingredientCount}" placeholder="Ex: ${ingredientCount} colheres de óleo">
                <button type="button" class="text-terra hover:text-red-700 remove-ingredient">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                    </svg>
                </button>
            `;
            ingredientsContainer.appendChild(newIngredient);

            // Add event listener to the new remove button
            newIngredient.querySelector('.remove-ingredient').addEventListener('click', () => {
                newIngredient.remove();
                updateIngredientNumbers();
            });
        });



        // Forms
        //OPEN FORM
        document.getElementById("new-recipe-card-btn").addEventListener("click", function() {
            document.getElementById("recipe-form").classList.remove("hidden");
        });
        //CLOSE FORM
        document.getElementById("close-recipe-form").addEventListener("click", function() {
            document.getElementById("recipe-form").classList.add("hidden");
        });
        document.getElementById("cancel-recipe-form").addEventListener("click", function() {
            document.getElementById("recipe-form").classList.add("hidden");
        });

        // Dynamic instruction fields
        const instructionsContainer = document.getElementById('instructions-container');
        const addInstructionButton = document.getElementById('add-instruction');

        addInstructionButton.addEventListener('click', () => {
            const instructionCount = instructionsContainer.children.length + 1;
            const newInstruction = document.createElement('div');
            newInstruction.className = 'flex items-start gap-2';
            newInstruction.innerHTML = `
                <span class="mt-1 text-sm text-gray-500">${instructionCount}.</span>
                <textarea rows="2" name="step-${instructionCount}" class="flex-1" placeholder="Ex: Corte os vegetais em cubos pequenos"></textarea>
                <button type="button" class="text-terra hover:text-red-700 remove-instruction mt-1">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                    </svg>
                </button>
            `;
            instructionsContainer.appendChild(newInstruction);

            // Add event listener to the new remove button
            newInstruction.querySelector('.remove-instruction').addEventListener('click', () => {
                newInstruction.remove();
                updateInstructionNumbers();
            });
        });

        // Function to update ingredient numbers
        function updateIngredientNumbers() {
            const ingredients = ingredientsContainer.children;
            for (let i = 0; i < ingredients.length; i++) {
                ingredients[i].querySelector('span').textContent = `${i + 1}.`;
                const input = ingredients[i].querySelector('input');
                if (input) {
                    input.placeholder = `Ex: ${i + 1} colheres de óleo`;
                }
                console.log(input);
            }
        }

        // Function to update instruction numbers
        function updateInstructionNumbers() {
            const instructions = instructionsContainer.children;
            for (let i = 0; i < instructions.length; i++) {
                instructions[i].querySelector('span').textContent = `${i + 1}.`;
                const textarea = instructions[i].querySelector('textarea');
                console.log(textarea);
            }
        }

        // Add event listeners to existing remove buttons
        document.querySelectorAll('.remove-ingredient').forEach(button => {
            button.addEventListener('click', function() {
                this.closest('.flex.items-center').remove();
                updateIngredientNumbers();
            });
        });

        document.querySelectorAll('.remove-instruction').forEach(button => {
            button.addEventListener('click', function() {
                this.closest('.flex.items-start').remove();
                updateInstructionNumbers();
            });
        });

        // Image preview for recipe photo
        const recipePhotoInput = document.getElementById('recipe-photo');
        const recipePhotoPreview = document.querySelector('.bg-gray-100.border-2');

        recipePhotoInput.addEventListener('change', function() {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    recipePhotoPreview.innerHTML =
                        `<img src="${e.target.result}" class="w-full h-full object-cover" alt="Preview">`;
                }
                reader.readAsDataURL(file);
            }
        });
    </script>

</body>

</html>
