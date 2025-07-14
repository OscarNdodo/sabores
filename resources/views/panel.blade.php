<!DOCTYPE html>
<html lang="pt-MZ" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Painel do usuário - Sabores de Moçambique">

    <style>
        :root {
            --terra: #E74C3C;
            --folha: #2ECC71;
            --sol: #F39C12;
            --oceano: #3498DB;
            --transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.1);
        }

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

        @keyframes scaleIn {
            from {
                transform: scale(0.95);
                opacity: 0;
            }

            to {
                transform: scale(1);
                opacity: 1;
            }
        }

        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            border: 2px solid var(--terra);
            transition: var(--transition);
        }

        .user-avatar:hover {
            transform: scale(1.1);
        }

        .dashboard-card {
            transition: var(--transition);
            border: 1px solid rgba(0, 0, 0, 0.05);
            transform-origin: center;
        }

        .dashboard-card:hover {
            transform: translateY(-5px) scale(1.01);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
            border-color: rgba(231, 76, 60, 0.2);
        }

        .recipe-form input,
        .recipe-form textarea,
        .recipe-form select {
            border: 1px solid #e2e8f0;
            border-radius: 0.5rem;
            padding: 0.75rem;
            width: 100%;
            transition: var(--transition);
            background-color: #f8fafc;
        }

        .recipe-form input:focus,
        .recipe-form textarea:focus,
        .recipe-form select:focus {
            outline: none;
            border-color: var(--terra);
            box-shadow: 0 0 0 3px rgba(231, 76, 60, 0.1);
            background-color: white;
        }

        .tab-content {
            display: none;
            animation: fadeIn 0.6s ease forwards;
        }

        .tab-content.active {
            display: block;
        }

        .badge {
            transition: var(--transition);
        }

        .badge:hover {
            transform: translateY(-2px);
        }

        .nav-link {
            position: relative;
        }

        .nav-link::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 0;
            height: 2px;
            background-color: var(--terra);
            transition: var(--transition);
        }

        .nav-link:hover::after {
            width: 100%;
        }

        .btn-primary {
            background-color: var(--terra);
            transition: var(--transition);
            transform-origin: center;
        }

        .btn-primary:hover {
            background-color: #c0392b;
            transform: scale(1.05);
            box-shadow: 0 10px 20px rgba(231, 76, 60, 0.2);
        }

        .btn-outline {
            transition: var(--transition);
        }

        .btn-outline:hover {
            border-color: var(--terra);
            color: var(--terra);
            transform: translateY(-2px);
        }

        .mobile-menu {
            transform: translateX(-100%);
            transition: var(--transition);
        }

        .mobile-menu.open {
            transform: translateX(0);
        }

        .backdrop {
            opacity: 0;
            visibility: hidden;
            transition: var(--transition);
        }

        .backdrop.active {
            opacity: 1;
            visibility: visible;
        }

        .stats-card {
            transition: var(--transition);
        }

        .stats-card:hover {
            background-color: white;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
        }

        .activity-item {
            transition: var(--transition);
        }

        .activity-item:hover {
            background-color: #f8fafc;
            transform: translateX(5px);
        }

        .file-upload-area {
            transition: var(--transition);
        }

        .file-upload-area:hover {
            border-color: var(--terra);
            background-color: rgba(231, 76, 60, 0.02);
        }

        @media (max-width: 768px) {
            .dashboard-grid {
                grid-template-columns: 1fr;
            }

            .recipe-form-grid {
                grid-template-columns: 1fr;
            }

            .header-content {
                flex-direction: column;
                align-items: flex-start;
            }
        }
    </style>

    @vite('resources/css/app.css')
    <title>Dashboard - Sabores</title>
    <link rel="shortcut icon" href="{{ asset('assets/img/ico.png') }}" type="image/png">
</head>

<body class="antialiased bg-gray-50">
    <!-- Navigation -->
    <nav class="fixed w-full z-50 bg-white/95 backdrop-blur-md shadow-sm" aria-label="Navegação principal">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">
                <div class="flex items-center">
                    <a href="#" class="flex-shrink-0 flex items-center">
                        <span class="text-2xl text-terra transform transition duration-500 hover:rotate-45">🌶️</span>
                        <span class="ml-1 text-2xl font-bold text-terra hidden sm:block">Sabores</span>
                    </a>
                </div>

                <div class="hidden md:flex items-center space-x-4">
                    <a href="#explorar"
                        class="px-3 py-2 text-sm font-medium text-gray-600 hover:text-terra transition-colors nav-link">Explorar</a>
                    <a href="#minhas-receitas"
                        class="px-3 py-2 text-sm font-medium text-gray-600 hover:text-terra transition-colors nav-link">Minhas
                        Receitas</a>
                    <button class="flex items-center gap-2 ml-4 group">
                        <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Utilizador"
                            class="user-avatar group-hover:border-amber-500">
                        <span class="hidden md:inline text-gray-700 group-hover:text-terra">Olá, Chef</span>
                    </button>
                </div>

                <div class="-mr-2 flex md:hidden">
                    <button type="button" id="mobile-menu-button" aria-label="Abrir menu móvel" aria-expanded="false"
                        class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-terra focus:outline-none transition-colors">
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
        <div class="md:hidden mobile-menu fixed inset-y-0 left-0 w-64 z-50 bg-white shadow-lg" id="mobile-menu">
            <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
                <div class="flex items-center px-4 py-4 border-b border-gray-200">
                    <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Utilizador"
                        class="w-10 h-10 rounded-full mr-3">
                    <div>
                        <p class="font-medium">Chef João</p>
                        <p class="text-xs text-gray-500">Conta Premium</p>
                    </div>
                </div>
                <a href="#explorar"
                    class="block px-3 py-3 text-base font-medium text-gray-700 hover:bg-terra hover:text-white rounded-md transition-colors">Explorar</a>
                <a href="#minhas-receitas"
                    class="block px-3 py-3 text-base font-medium text-gray-700 hover:bg-terra hover:text-white rounded-md transition-colors">Minhas
                    Receitas</a>
                <a href="#configuracoes"
                    class="block px-3 py-3 text-base font-medium text-gray-700 hover:bg-terra hover:text-white rounded-md transition-colors">Configurações</a>
                <a href="#sair"
                    class="block px-3 py-3 text-base font-medium text-gray-700 hover:bg-terra hover:text-white rounded-md transition-colors">Sair</a>
            </div>
        </div>
    </nav>

    <!-- Backdrop for mobile menu -->
    <div class="backdrop fixed inset-0 z-40 bg-black/50" id="nav-backdrop"></div>

    <!-- Main Content -->
    <main class="pt-16 pb-20 min-h-screen">
        <!-- Dashboard Header -->
        <header class="bg-gradient-to-r from-terra to-amber-600 text-white py-12 shadow-lg">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex flex-col md:flex-row items-start md:items-center justify-between header-content">
                    <div class="flex items-center gap-4 mb-6 md:mb-0 transform hover:scale-105 transition-transform">
                        <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Utilizador"
                            class="w-16 h-16 rounded-full border-4 border-white shadow-md">
                        <div>
                            <h1 class="font-display text-2xl md:text-3xl font-bold">Bem-vindo, Chef João</h1>
                            <p class="text-white/90 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                Membro desde Maio 2023
                            </p>
                        </div>
                    </div>
                    <button class="btn-primary px-6 py-3 rounded-full font-medium flex items-center gap-2 shadow-lg"
                        id="new-recipe-btn">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                        </svg>
                        Nova Receita
                    </button>
                </div>
            </div>
        </header>

        <!-- Dashboard Tabs -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-8">
            <div class="border-b border-gray-200">
                <nav class="-mb-px flex space-x-8 overflow-x-auto pb-2 scrollbar-hide">
                    <button data-tab="dashboard"
                        class="tab-button whitespace-nowrap border-b-2 border-terra text-terra font-medium py-4 px-1 text-sm">
                        Painel
                    </button>
                    <button data-tab="recipes"
                        class="tab-button whitespace-nowrap border-b-2 border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 font-medium py-4 px-1 text-sm">
                        Minhas Receitas
                    </button>
                    <button data-tab="favorites"
                        class="tab-button whitespace-nowrap border-b-2 border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 font-medium py-4 px-1 text-sm">
                        Favoritos
                    </button>
                    <button data-tab="settings"
                        class="tab-button whitespace-nowrap border-b-2 border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 font-medium py-4 px-1 text-sm">
                        Configurações
                    </button>
                </nav>
            </div>
        </div>

        <!-- Dashboard Content -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <!-- Dashboard Tab -->
            <div id="dashboard" class="tab-content active">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8 dashboard-grid">
                    <div class="stats-card bg-white rounded-xl shadow-sm p-6 transform hover:scale-[1.02]">
                        <div class="flex items-center justify-between">
                            <div>
                                <h3 class="text-lg font-medium text-gray-900 mb-2">Receitas Publicadas</h3>
                                <p class="text-3xl font-bold text-terra">12</p>
                            </div>
                            <div class="bg-terra/10 p-3 rounded-full">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-terra" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                </svg>
                            </div>
                        </div>
                        <div class="mt-4 pt-4 border-t border-gray-100">
                            <p class="text-sm text-gray-500 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1 text-green-500"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                                </svg>
                                +2 na última semana
                            </p>
                        </div>
                    </div>
                    <div class="stats-card bg-white rounded-xl shadow-sm p-6 transform hover:scale-[1.02]">
                        <div class="flex items-center justify-between">
                            <div>
                                <h3 class="text-lg font-medium text-gray-900 mb-2">Receitas Favoritas</h3>
                                <p class="text-3xl font-bold text-terra">24</p>
                            </div>
                            <div class="bg-amber-100/50 p-3 rounded-full">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-amber-500" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                </svg>
                            </div>
                        </div>
                        <div class="mt-4 pt-4 border-t border-gray-100">
                            <p class="text-sm text-gray-500 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1 text-green-500"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                                </svg>
                                +5 no último mês
                            </p>
                        </div>
                    </div>
                    <div class="stats-card bg-white rounded-xl shadow-sm p-6 transform hover:scale-[1.02]">
                        <div class="flex items-center justify-between">
                            <div>
                                <h3 class="text-lg font-medium text-gray-900 mb-2">Seguidores</h3>
                                <p class="text-3xl font-bold text-terra">156</p>
                            </div>
                            <div class="bg-blue-100/50 p-3 rounded-full">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-500" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                                </svg>
                            </div>
                        </div>
                        <div class="mt-4 pt-4 border-t border-gray-100">
                            <p class="text-sm text-gray-500 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1 text-green-500"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                                </svg>
                                +12 novos seguidores
                            </p>
                        </div>
                    </div>
                </div>

                <h2 class="font-display text-xl font-bold mb-6 flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-terra" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                    </svg>
                    Atividade Recente
                </h2>
                <div class="bg-white rounded-xl shadow-sm overflow-hidden">
                    <ul class="divide-y divide-gray-100">
                        <li class="activity-item p-4">
                            <div class="flex items-center gap-3">
                                <div
                                    class="bg-folha/10 text-folha p-2 rounded-full transform hover:rotate-12 transition-transform">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <p class="font-medium">Você publicou "Frango à Zambeziana"</p>
                                    <p class="text-sm text-gray-500">2 dias atrás</p>
                                </div>
                                <button class="text-terra hover:text-red-700 transition-colors">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                </button>
                            </div>
                        </li>
                        <li class="activity-item p-4">
                            <div class="flex items-center gap-3">
                                <div
                                    class="bg-sol/10 text-sol p-2 rounded-full transform hover:rotate-12 transition-transform">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <p class="font-medium">Maria favoritou sua receita "Matapa Tradicional"</p>
                                    <p class="text-sm text-gray-500">5 dias atrás</p>
                                </div>
                                <button class="text-terra hover:text-red-700 transition-colors">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                </button>
                            </div>
                        </li>
                        <li class="activity-item p-4">
                            <div class="flex items-center gap-3">
                                <div
                                    class="bg-oceano/10 text-oceano p-2 rounded-full transform hover:rotate-12 transition-transform">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <p class="font-medium">Carlos comentou: "Adorei sua receita de Xima!"</p>
                                    <p class="text-sm text-gray-500">1 semana atrás</p>
                                </div>
                                <button class="text-terra hover:text-red-700 transition-colors">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                </button>
                            </div>
                        </li>
                    </ul>
                    <div class="px-4 py-3 bg-gray-50 text-right">
                        <a href="#"
                            class="text-sm font-medium text-terra hover:text-red-700 transition-colors">Ver toda
                            atividade</a>
                    </div>
                </div>
            </div>

            <!-- My Recipes Tab -->
            <div id="recipes" class="tab-content">
                <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6 gap-4">
                    <h2 class="font-display text-xl font-bold flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-terra" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                        </svg>
                        Minhas Receitas
                    </h2>
                    <button class="btn-primary px-4 py-2 rounded-full text-sm font-medium flex items-center gap-1"
                        id="add-recipe-btn">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                        </svg>
                        Adicionar Receita
                    </button>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    <!-- Recipe Card 1 -->
                    <div class="dashboard-card bg-white rounded-xl shadow-sm overflow-hidden">
                        <div
                            class="h-48 bg-[url('https://images.unsplash.com/photo-1544025162-d76694265947?auto=format&fit=crop&w=600&q=80')] bg-cover bg-center relative group">
                            <div
                                class="absolute inset-0 bg-black/20 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                                <button
                                    class="bg-white/90 text-terra px-4 py-2 rounded-full font-medium transform translate-y-4 group-hover:translate-y-0 transition-transform">
                                    Ver Receita
                                </button>
                            </div>
                        </div>
                        <div class="p-4">
                            <div class="flex justify-between items-start mb-2">
                                <h3 class="font-medium">Matapa Tradicional</h3>
                                <span
                                    class="badge text-xs bg-folha/20 text-folha px-2 py-1 rounded-full">Publicada</span>
                            </div>
                            <p class="text-sm text-gray-600 mb-3">Folhas de mandioca com amendoim e leite de coco</p>
                            <div class="flex justify-between text-sm text-gray-500">
                                <span class="flex items-center gap-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                    12/05/2023
                                </span>
                                <span class="flex items-center gap-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                    156
                                </span>
                            </div>
                        </div>
                        <div class="border-t border-gray-200 px-4 py-2 flex justify-between">
                            <button
                                class="text-terra text-sm font-medium hover:text-red-700 transition-colors">Editar</button>
                            <button
                                class="text-gray-500 text-sm font-medium hover:text-terra transition-colors">Estatísticas</button>
                        </div>
                    </div>

                    <!-- Recipe Card 2 -->
                    <div class="dashboard-card bg-white rounded-xl shadow-sm overflow-hidden">
                        <div
                            class="h-48 bg-[url('https://images.unsplash.com/photo-1559847844-5315695dadae?auto=format&fit=crop&w=600&q=80')] bg-cover bg-center relative group">
                            <div
                                class="absolute inset-0 bg-black/20 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                                <button
                                    class="bg-white/90 text-terra px-4 py-2 rounded-full font-medium transform translate-y-4 group-hover:translate-y-0 transition-transform">
                                    Ver Receita
                                </button>
                            </div>
                        </div>
                        <div class="p-4">
                            <div class="flex justify-between items-start mb-2">
                                <h3 class="font-medium">Frango à Zambeziana</h3>
                                <span class="badge text-xs bg-sol/20 text-sol px-2 py-1 rounded-full">Rascunho</span>
                            </div>
                            <p class="text-sm text-gray-600 mb-3">Frango marinado em leite de coco e piri-piri</p>
                            <div class="flex justify-between text-sm text-gray-500">
                                <span class="flex items-center gap-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                    05/05/2023
                                </span>
                                <span>—</span>
                            </div>
                        </div>
                        <div class="border-t border-gray-200 px-4 py-2 flex justify-between">
                            <button
                                class="text-terra text-sm font-medium hover:text-red-700 transition-colors">Editar</button>
                            <button
                                class="text-gray-500 text-sm font-medium hover:text-terra transition-colors">Publicar</button>
                        </div>
                    </div>

                    <!-- Add New Recipe Card -->
                    <div class="dashboard-card bg-white rounded-xl shadow-sm overflow-hidden border-2 border-dashed border-gray-300 hover:border-terra transition-colors flex items-center justify-center min-h-[300px] cursor-pointer"
                        id="add-new-recipe-card">
                        <div class="text-center p-6">
                            <div
                                class="mx-auto bg-terra/10 text-terra p-3 rounded-full w-12 h-12 flex items-center justify-center mb-3">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                </svg>
                            </div>
                            <h3 class="font-medium text-gray-900 mb-1">Adicionar Nova Receita</h3>
                            <p class="text-sm text-gray-500">Compartilhe sua receita moçambicana</p>
                        </div>
                    </div>
                </div>
            </div>



                        <div class="text-center p-6">
                            <div class="mx-auto bg-terra/10 text-terra p-3 rounded-full w-12 h-12 flex items-center justify-center mb-3">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                </svg>
                            </div>
                            <h3 class="font-medium text-gray-900 mb-1">Adicionar Nova Receita</h3>
                            <p class="text-sm text-gray-500">Compartilhe sua receita moçambicana</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Favorites Tab -->
            <div id="favorites" class="tab-content">
                <h2 class="font-display text-xl font-bold mb-6 flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-terra" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                    </svg>
                    Receitas Favoritas
                </h2>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    <!-- Favorite Recipe 1 -->
                    <div class="dashboard-card bg-white rounded-xl shadow-sm overflow-hidden">
                        <div class="h-48 bg-[url('https://images.unsplash.com/photo-1546069901-ba9599a7e63c?auto=format&fit=crop&w=600&q=80')] bg-cover bg-center relative group">
                            <div class="absolute inset-0 bg-black/20 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                                <button class="bg-white/90 text-terra px-4 py-2 rounded-full font-medium transform translate-y-4 group-hover:translate-y-0 transition-transform">
                                    Ver Receita
                                </button>
                            </div>
                        </div>
                        <div class="p-4">
                            <div class="flex justify-between items-start mb-2">
                                <h3 class="font-medium">Caril de Camarão</h3>
                                <span class="text-xs text-gray-500">Por: Chef Maria</span>
                            </div>
                            <p class="text-sm text-gray-600 mb-3">Camarão fresco em molho de caril com leite de coco</p>
                            <div class="flex justify-between text-sm text-gray-500">
                                <span class="flex items-center gap-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    45 min
                                </span>
                                <span class="flex items-center gap-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-amber-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                                    </svg>
                                    4.8
                                </span>
                            </div>
                        </div>
                        <div class="border-t border-gray-200 px-4 py-2 flex justify-center">
                            <button class="text-terra text-sm font-medium hover:text-red-700 transition-colors flex items-center gap-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                                Remover dos Favoritos
                            </button>
                        </div>
                    </div>

                    <!-- Favorite Recipe 2 -->
                    <div class="dashboard-card bg-white rounded-xl shadow-sm overflow-hidden">
                        <div class="h-48 bg-[url('https://images.unsplash.com/photo-1512621776951-a57141f2eefd?auto=format&fit=crop&w=600&q=80')] bg-cover bg-center relative group">
                            <div class="absolute inset-0 bg-black/20 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                                <button class="bg-white/90 text-terra px-4 py-2 rounded-full font-medium transform translate-y-4 group-hover:translate-y-0 transition-transform">
                                    Ver Receita
                                </button>
                            </div>
                        </div>
                        <div class="p-4">
                            <div class="flex justify-between items-start mb-2">
                                <h3 class="font-medium">Feijão com Arroz</h3>
                                <span class="text-xs text-gray-500">Por: Chef Carlos</span>
                            </div>
                            <p class="text-sm text-gray-600 mb-3">Receita tradicional com toque especial</p>
                            <div class="flex justify-between text-sm text-gray-500">
                                <span class="flex items-center gap-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    30 min
                                </span>
                                <span class="flex items-center gap-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-amber-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                                    </svg>
                                    4.5
                                </span>
                            </div>
                        </div>
                        <div class="border-t border-gray-200 px-4 py-2 flex justify-center">
                            <button class="text-terra text-sm font-medium hover:text-red-700 transition-colors flex items-center gap-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                                Remover dos Favoritos
                            </button>
                        </div>
                    </div>

                    <!-- Favorite Recipe 3 -->
                    <div class="dashboard-card bg-white rounded-xl shadow-sm overflow-hidden">
                        <div class="h-48 bg-[url('https://images.unsplash.com/photo-1490645935967-10de6ba17061?auto=format&fit=crop&w=600&q=80')] bg-cover bg-center relative group">
                            <div class="absolute inset-0 bg-black/20 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                                <button class="bg-white/90 text-terra px-4 py-2 rounded-full font-medium transform translate-y-4 group-hover:translate-y-0 transition-transform">
                                    Ver Receita
                                </button>
                            </div>
                        </div>
                        <div class="p-4">
                            <div class="flex justify-between items-start mb-2">
                                <h3 class="font-medium">Bolo Polana</h3>
                                <span class="text-xs text-gray-500">Por: Chef Ana</span>
                            </div>
                            <p class="text-sm text-gray-600 mb-3">O clássico bolo de batata-doce</p>
                            <div class="flex justify-between text-sm text-gray-500">
                                <span class="flex items-center gap-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    1h 15min
                                </span>
                                <span class="flex items-center gap-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-amber-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                                    </svg>
                                    4.9
                                </span>
                            </div>
                        </div>
                        <div class="border-t border-gray-200 px-4 py-2 flex justify-center">
                            <button class="text-terra text-sm font-medium hover:text-red-700 transition-colors flex items-center gap-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                                Remover dos Favoritos
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Settings Tab -->
            <div id="settings" class="tab-content">
                <h2 class="font-display text-xl font-bold mb-6 flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-terra" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    Configurações da Conta
                </h2>

                <div class="bg-white rounded-xl shadow-sm overflow-hidden">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-0">
                        <!-- Settings Sidebar -->
                        <div class="bg-gray-50 p-6 border-r border-gray-200">
                            <nav class="space-y-1">
                                <a href="#" class="bg-terra/10 text-terra group rounded-md px-3 py-2 flex items-center text-sm font-medium">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                    Perfil
                                </a>
                                <a href="#" class="text-gray-600 hover:bg-gray-100 hover:text-gray-900 group rounded-md px-3 py-2 flex items-center text-sm font-medium">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                    </svg>
                                    Notificações
                                </a>
                                <a href="#" class="text-gray-600 hover:bg-gray-100 hover:text-gray-900 group rounded-md px-3 py-2 flex items-center text-sm font-medium">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                    </svg>
                                    Segurança
                                </a>
                                <a href="#" class="text-gray-600 hover:bg-gray-100 hover:text-gray-900 group rounded-md px-3 py-2 flex items-center text-sm font-medium">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                                    </svg>
                                    Assinatura
                                </a>
                            </nav>
                        </div>

                        <!-- Settings Content -->
                        <div class="p-6 md:col-span-2">
                            <div class="md:grid md:grid-cols-3 md:gap-6">
                                <div class="md:col-span-1">
                                    <h3 class="text-lg font-medium leading-6 text-gray-900">Informações Pessoais</h3>
                                    <p class="mt-1 text-sm text-gray-500">
                                        Atualize suas informações de perfil e foto.
                                    </p>
                                </div>
                                <div class="mt-5 md:mt-0 md:col-span-2">
                                    <form class="space-y-6">
                                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                                            <div>
                                                <label for="first-name" class="block text-sm font-medium text-gray-700">Nome</label>
                                                <input type="text" name="first-name" id="first-name" autocomplete="given-name" value="João" class="recipe-form mt-1">
                                            </div>
                                            <div>
                                                <label for="last-name" class="block text-sm font-medium text-gray-700">Sobrenome</label>
                                                <input type="text" name="last-name" id="last-name" autocomplete="family-name" value="Mabjaia" class="recipe-form mt-1">
                                            </div>
                                        </div>
                                        <div>
                                            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                                            <input type="email" name="email" id="email" autocomplete="email" value="joao.mabjaia@example.com" class="recipe-form mt-1">
                                        </div>
                                        <div>
                                            <label for="bio" class="block text-sm font-medium text-gray-700">Biografia</label>
                                            <textarea id="bio" name="bio" rows="3" class="recipe-form mt-1">Chef moçambicano apaixonado por compartilhar os sabores tradicionais do meu país.</textarea>
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700">Foto</label>
                                            <div class="mt-2 flex items-center">
                                                <span class="inline-block h-12 w-12 rounded-full overflow-hidden bg-gray-100">
                                                    <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Foto do perfil" class="h-full w-full object-cover">
                                                </span>
                                                <div class="file-upload-area ml-4 flex items-center">
                                                    <label for="file-upload" class="btn-outline cursor-pointer border border-gray-300 rounded-md py-2 px-3 text-sm font-medium text-gray-700 hover:border-terra hover:text-terra transition-colors">
                                                        <span>Alterar</span>
                                                        <input id="file-upload" name="file-upload" type="file" class="sr-only">
                                                    </label>
                                                    <button type="button" class="ml-3 text-sm font-medium text-gray-500 hover:text-gray-700 transition-colors">Remover</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flex justify-end">
                                            <button type="button" class="btn-outline border border-gray-300 rounded-md py-2 px-4 text-sm font-medium text-gray-700 mr-3">Cancelar</button>
                                            <button type="submit" class="btn-primary py-2 px-4 text-sm font-medium text-white">Salvar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- New Recipe Modal -->
    <div class="fixed inset-0 z-50 hidden" id="recipe-modal">
        <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
            </div>
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
            <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-2xl sm:w-full">
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="sm:flex sm:items-start">
                        <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left w-full">
                            <div class="flex justify-between items-center mb-4">
                                <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                                    Nova Receita
                                </h3>
                                <button type="button" id="close-modal" class="text-gray-400 hover:text-gray-500 transition-colors">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>
                            </div>
                            <div class="mt-2">
                                <form class="recipe-form space-y-4">
                                    <div>
                                        <label for="recipe-name" class="block text-sm font-medium text-gray-700">Nome da Receita</label>
                                        <input type="text" name="recipe-name" id="recipe-name" class="recipe-form mt-1" placeholder="Ex: Frango à Zambeziana">
                                    </div>
                                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 recipe-form-grid">
                                        <div>
                                            <label for="recipe-category" class="block text-sm font-medium text-gray-700">Categoria</label>
                                            <select id="recipe-category" name="recipe-category" class="recipe-form mt-1">
                                                <option>Entrada</option>
                                                <option>Prato Principal</option>
                                                <option>Sobremesa</option>
                                                <option>Bebida</option>
                                            </select>
                                        </div>
                                        <div>
                                            <label for="recipe-time" class="block text-sm font-medium text-gray-700">Tempo de Preparo</label>
                                            <input type="text" name="recipe-time" id="recipe-time" class="recipe-form mt-1" placeholder="Ex: 45 minutos">
                                        </div>
                                        <div>
                                            <label for="recipe-difficulty" class="block text-sm font-medium text-gray-700">Dificuldade</label>
                                            <select id="recipe-difficulty" name="recipe-difficulty" class="recipe-form mt-1">
                                                <option>Fácil</option>
                                                <option>Médio</option>
                                                <option>Difícil</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div>
                                        <label for="recipe-ingredients" class="block text-sm font-medium text-gray-700">Ingredientes</label>
                                        <textarea id="recipe-ingredients" name="recipe-ingredients" rows="3" class="recipe-form mt-1" placeholder="Liste os ingredientes, um por linha"></textarea>
                                    </div>
                                    <div>
                                        <label for="recipe-instructions" class="block text-sm font-medium text-gray-700">Modo de Preparo</label>
                                        <textarea id="recipe-instructions" name="recipe-instructions" rows="5" class="recipe-form mt-1" placeholder="Descreva passo a passo como preparar a receita"></textarea>
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700">Foto da Receita</label>
                                        <div class="file-upload-area mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                                            <div class="space-y-1 text-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                </svg>
                                                <div class="flex text-sm text-gray-600">
                                                    <label for="file-upload" class="relative cursor-pointer bg-white rounded-md font-medium text-terra hover:text-red-700 focus-within:outline-none transition-colors">
                                                        <span>Carregar uma imagem</span>
                                                        <input id="file-upload" name="file-upload" type="file" class="sr-only">
                                                    </label>
                                                    <p class="pl-1">ou arraste e solte</p>
                                                </div>
                                                <p class="text-xs text-gray-500">
                                                    PNG, JPG, GIF até 5MB
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <button type="button" class="btn-primary px-4 py-2 text-sm font-medium">
                        Salvar Receita
                    </button>
                    <button type="button" id="cancel-modal" class="btn-outline mt-3 sm:mt-0 sm:ml-3 sm:w-auto px-4 py-2 text-sm font-medium border border-gray-300">
                        Cancelar
                    </button>
                </div>
            </div>
        </div>
    </div>


                <!-- My Recipes Tab -->
            <div id="my-recipes" class="tab-content">
                <h2 class="font-display text-xl font-bold mb-6 flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-terra" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                    </svg>
                    Minhas Receitas
                </h2>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    <!-- My Recipe 1 -->
                    <div class="dashboard-card bg-white rounded-xl shadow-sm overflow-hidden">
                        <div class="h-48 bg-[url('https://images.unsplash.com/photo-1547592180-85f173990554?auto=format&fit=crop&w=600&q=80')] bg-cover bg-center relative group">
                            <div class="absolute inset-0 bg-black/20 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                                <button class="bg-white/90 text-terra px-4 py-2 rounded-full font-medium transform translate-y-4 group-hover:translate-y-0 transition-transform">
                                    Ver Receita
                                </button>
                            </div>
                            <div class="absolute top-2 right-2 flex gap-2">
                                <button class="bg-white/90 text-gray-800 p-2 rounded-full hover:bg-terra hover:text-white transition-colors">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                </button>
                                <button class="bg-white/90 text-gray-800 p-2 rounded-full hover:bg-red-500 hover:text-white transition-colors">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <div class="p-4">
                            <div class="flex justify-between items-start mb-2">
                                <h3 class="font-medium">Matapa</h3>
                                <span class="text-xs text-gray-500">Publicado: 15/06/2023</span>
                            </div>
                            <p class="text-sm text-gray-600 mb-3">Folhas de mandioca com camarão e amendoim</p>
                            <div class="flex justify-between text-sm text-gray-500">
                                <span class="flex items-center gap-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    1h 30min
                                </span>
                                <span class="flex items-center gap-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-amber-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                                    </svg>
                                    4.7 (23)
                                </span>
                            </div>
                        </div>
                    </div>

                    <!-- My Recipe 2 -->
                    <div class="dashboard-card bg-white rounded-xl shadow-sm overflow-hidden">
                        <div class="h-48 bg-[url('https://images.unsplash.com/photo-1565557623262-b51c2513a641?auto=format&fit=crop&w=600&q=80')] bg-cover bg-center relative group">
                            <div class="absolute inset-0 bg-black/20 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                                <button class="bg-white/90 text-terra px-4 py-2 rounded-full font-medium transform translate-y-4 group-hover:translate-y-0 transition-transform">
                                    Ver Receita
                                </button>
                            </div>
                            <div class="absolute top-2 right-2 flex gap-2">
                                <button class="bg-white/90 text-gray-800 p-2 rounded-full hover:bg-terra hover:text-white transition-colors">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                </button>
                                <button class="bg-white/90 text-gray-800 p-2 rounded-full hover:bg-red-500 hover:text-white transition-colors">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <div class="p-4">
                            <div class="flex justify-between items-start mb-2">
                                <h3 class="font-medium">Xiguinha</h3>
                                <span class="text-xs text-gray-500">Publicado: 02/05/2023</span>
                            </div>
                            <p class="text-sm text-gray-600 mb-3">Doce tradicional de amendoim</p>
                            <div class="flex justify-between text-sm text-gray-500">
                                <span class="flex items-center gap-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    50 min
                                </span>
                                <span class="flex items-center gap-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-amber-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                                    </svg>
                                    4.9 (31)
                                </span>
                            </div>
                        </div>
                    </div>

                    <!-- Empty State for Adding More Recipes -->
                    <div class="dashboard-card bg-white rounded-xl shadow-sm overflow-hidden border-2 border-dashed border-gray-300 hover:border-terra transition-colors flex items-center justify-center min-h-[300px] cursor-pointer">
                        <div class="text-center p-6">
                            <div class="mx-auto bg-terra/10 text-terra p-3 rounded-full w-12 h-12 flex items-center justify-center mb-3">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                </svg>
                            </div>
                            <h3 class="font-medium text-gray-900 mb-1">Adicionar Nova Receita</h3>
                            <p class="text-sm text-gray-500">Compartilhe mais uma receita moçambicana</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script>
        // Tab switching functionality
        document.querySelectorAll('.tab-button').forEach(button => {
            button.addEventListener('click', () => {
                // Remove active class from all buttons and content
                document.querySelectorAll('.tab-button').forEach(btn => {
                    btn.classList.remove('active');
                    btn.classList.remove('text-terra');
                    btn.classList.add('text-gray-500');
                });
                
                // Hide all tab contents
                document.querySelectorAll('.tab-content').forEach(content => {
                    content.classList.add('hidden');
                });
                
                // Add active class to clicked button
                button.classList.add('active');
                button.classList.remove('text-gray-500');
                button.classList.add('text-terra');
                
                // Show corresponding tab content
                const tabId = button.getAttribute('data-tab');
                document.getElementById(tabId).classList.remove('hidden');
            });
        });

        // Recipe modal functionality
        const addRecipeCard = document.getElementById('add-new-recipe-card');
        const recipeModal = document.getElementById('recipe-modal');
        const closeModal = document.getElementById('close-modal');
        const cancelModal = document.getElementById('cancel-modal');

        if (addRecipeCard) {
            addRecipeCard.addEventListener('click', () => {
                recipeModal.classList.remove('hidden');
            });
        }

        if (closeModal) {
            closeModal.addEventListener('click', () => {
                recipeModal.classList.add('hidden');
            });
        }

        if (cancelModal) {
            cancelModal.addEventListener('click', () => {
                recipeModal.classList.add('hidden');
            });
        }

        // Close modal when clicking outside
        recipeModal.addEventListener('click', (e) => {
            if (e.target === recipeModal) {
                recipeModal.classList.add('hidden');
            }
        });
    </script>
</body>
</html>
