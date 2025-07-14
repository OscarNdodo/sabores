<!DOCTYPE html>
<html lang="pt-MZ" class="scroll-smooth">

<head>
    <!-- Meta tags e CSS existentes (manter igual) -->
    <style>
        /* Adicionar estilos específicos para a área do utilizador */
        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            border: 2px solid var(--terra);
        }

        .dashboard-card {
            transition: all 0.3s ease;
            border: 1px solid rgba(0, 0, 0, 0.1);
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
            transition: border 0.3s ease;
        }

        .recipe-form input:focus,
        .recipe-form textarea:focus {
            outline: none;
            border-color: var(--terra);
        }

        .tab-content {
            display: none;
        }

        .tab-content.active {
            display: block;
            animation: fadeIn 0.5s ease;
        }

        /* Responsive additions */
        @media (max-width: 767px) {
            .tab-nav {
                overflow-x: auto;
                white-space: nowrap;
                padding-bottom: 8px;
                -webkit-overflow-scrolling: touch;
            }
            
            .tab-nav nav {
                display: inline-flex;
                min-width: 100%;
            }
            
            .tab-button {
                padding: 12px 8px;
                font-size: 0.875rem;
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
        
        /* Mobile menu backdrop */
        .nav-backdrop {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0,0,0,0.5);
            z-index: 40;
            opacity: 0;
            pointer-events: none;
            transition: opacity 0.3s ease;
        }
        
        .nav-backdrop.active {
            opacity: 1;
            pointer-events: all;
        }
        
        /* Animation */
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
    </style>

    @vite('resources/css/app.css')
    <title>Dashboard - Sabores</title>
    <link rel="shortcut icon" href="{{ asset('assets/img/ico.png') }}" type="image/png">
</head>

<body class="antialiased">
    <!-- Navigation (modificada para área do utilizador) -->
    <nav class="fixed w-full z-50 bg-white/90 backdrop-blur-md shadow-sm" aria-label="Navegação principal">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">
                <div class="flex items-center">
                    <a href="#" class="flex-shrink-0 flex items-center">
                        <span class="text-2xl text-terra">🌶️</span>
                        <span class="ml-1 text-2xl font-bold text-terra hidden sm:block">Sabores</span>
                    </a>
                </div>

                <div class="hidden md:flex items-center space-x-4">
                    <a href="#explorar"
                        class="px-3 py-2 text-sm font-medium hover:text-terra transition-colors">Explorar</a>
                    <a href="#minhas-receitas"
                        class="px-3 py-2 text-sm font-medium hover:text-terra transition-colors">Minhas Receitas</a>
                    <button class="flex items-center gap-2 ml-4">
                        <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Utilizador" class="user-avatar">
                        <span class="hidden md:inline">Olá, Chef</span>
                    </button>
                </div>

                <div class="-mr-2 flex md:hidden">
                    <button type="button" id="mobile-menu-button" aria-label="Abrir menu móvel" aria-expanded="false"
                        class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-terra focus:outline-none">
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

        <!-- Mobile menu (atualizado) -->
        <div class="md:hidden hidden" id="mobile-menu">
            <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3 bg-white shadow-lg">
                <a href="#explorar"
                    class="block px-3 py-2 text-base font-medium text-gray-700 hover:bg-terra hover:text-white rounded-md transition-colors">Explorar</a>
                <a href="#minhas-receitas"
                    class="block px-3 py-2 text-base font-medium text-gray-700 hover:bg-terra hover:text-white rounded-md transition-colors">Minhas
                    Receitas</a>
                <a href="#configuracoes"
                    class="block px-3 py-2 text-base font-medium text-gray-700 hover:bg-terra hover:text-white rounded-md transition-colors">Configurações</a>
                <a href="#sair"
                    class="block px-3 py-2 text-base font-medium text-gray-700 hover:bg-terra hover:text-white rounded-md transition-colors">Sair</a>
            </div>
        </div>
    </nav>

    <!-- Backdrop for mobile menu -->
    <div class="nav-backdrop" id="nav-backdrop"></div>

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
            <!-- Dashboard Tab -->
            <div id="dashboard" class="tab-content active">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8 dashboard-grid">
                    <div class="dashboard-card bg-white rounded-xl shadow-sm p-6">
                        <h3 class="text-lg font-medium text-gray-900 mb-2">Receitas Publicadas</h3>
                        <p class="text-3xl font-bold text-terra">12</p>
                    </div>
                    <div class="dashboard-card bg-white rounded-xl shadow-sm p-6">
                        <h3 class="text-lg font-medium text-gray-900 mb-2">Receitas Favoritas</h3>
                        <p class="text-3xl font-bold text-terra">24</p>
                    </div>
                    <div class="dashboard-card bg-white rounded-xl shadow-sm p-6">
                        <h3 class="text-lg font-medium text-gray-900 mb-2">Seguidores</h3>
                        <p class="text-3xl font-bold text-terra">156</p>
                    </div>
                </div>

                <h2 class="font-display text-xl font-bold mb-6">Atividade Recente</h2>
                <div class="bg-white rounded-xl shadow-sm overflow-hidden">
                    <ul class="divide-y divide-gray-200">
                        <li class="p-4 hover:bg-gray-50 transition-colors">
                            <div class="flex items-center gap-3">
                                <div class="bg-folha/10 text-folha p-2 rounded-full">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                    </svg>
                                </div>
                                <div>
                                    <p class="font-medium">Você publicou "Frango à Zambeziana"</p>
                                    <p class="text-sm text-gray-500">2 dias atrás</p>
                                </div>
                            </div>
                        </li>
                        <li class="p-4 hover:bg-gray-50 transition-colors">
                            <div class="flex items-center gap-3">
                                <div class="bg-sol/10 text-sol p-2 rounded-full">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                    </svg>
                                </div>
                                <div>
                                    <p class="font-medium">Maria favoritou sua receita "Matapa Tradicional"</p>
                                    <p class="text-sm text-gray-500">5 dias atrás</p>
                                </div>
                            </div>
                        </li>
                        <li class="p-4 hover:bg-gray-50 transition-colors">
                            <div class="flex items-center gap-3">
                                <div class="bg-oceano/10 text-oceano p-2 rounded-full">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
                                    </svg>
                                </div>
                                <div>
                                    <p class="font-medium">Carlos comentou: "Adorei sua receita de Xima!"</p>
                                    <p class="text-sm text-gray-500">1 semana atrás</p>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- My Recipes Tab -->
            <div id="recipes" class="tab-content">
                <div class="flex justify-between items-center mb-6 mobile-flex-col gap-4">
                    <h2 class="font-display text-xl font-bold">Minhas Receitas</h2>
                    <button
                        class="bg-terra text-white px-4 py-2 rounded-full text-sm font-medium hover:bg-red-700 transition-colors">
                        + Adicionar Receita
                    </button>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    <!-- Recipe Card 1 -->
                    <div class="dashboard-card bg-white rounded-xl shadow-sm overflow-hidden">
                        <div
                            class="h-48 bg-[url('https://images.unsplash.com/photo-1544025162-d76694265947?auto=format&fit=crop&w=600&q=80')] bg-cover bg-center">
                        </div>
                        <div class="p-4">
                            <div class="flex justify-between items-start mb-2">
                                <h3 class="font-medium">Matapa Tradicional</h3>
                                <span class="text-xs bg-folha/20 text-folha px-2 py-1 rounded-full">Publicada</span>
                            </div>
                            <p class="text-sm text-gray-600 mb-3">Folhas de mandioca com amendoim e leite de coco</p>
                            <div class="flex justify-between text-sm text-gray-500">
                                <span>12/05/2023</span>
                                <span>156 visualizações</span>
                            </div>
                        </div>
                        <div class="border-t border-gray-200 px-4 py-2 flex justify-between">
                            <button class="text-terra text-sm font-medium">Editar</button>
                            <button class="text-gray-500 text-sm font-medium">Estatísticas</button>
                        </div>
                    </div>

                    <!-- Recipe Card 2 -->
                    <div class="dashboard-card bg-white rounded-xl shadow-sm overflow-hidden">
                        <div
                            class="h-48 bg-[url('https://images.unsplash.com/photo-1559847844-5315695dadae?auto=format&fit=crop&w=600&q=80')] bg-cover bg-center">
                        </div>
                        <div class="p-4">
                            <div class="flex justify-between items-start mb-2">
                                <h3 class="font-medium">Frango à Zambeziana</h3>
                                <span class="text-xs bg-sol/20 text-sol px-2 py-1 rounded-full">Rascunho</span>
                            </div>
                            <p class="text-sm text-gray-600 mb-3">Frango marinado em leite de coco e piri-piri</p>
                            <div class="flex justify-between text-sm text-gray-500">
                                <span>05/05/2023</span>
                                <span>—</span>
                            </div>
                        </div>
                        <div class="border-t border-gray-200 px-4 py-2 flex justify-between">
                            <button class="text-terra text-sm font-medium">Editar</button>
                            <button class="text-gray-500 text-sm font-medium">Publicar</button>
                        </div>
                    </div>

                    <!-- Add New Recipe Card -->
                    <div
                        class="dashboard-card bg-white rounded-xl shadow-sm overflow-hidden border-2 border-dashed border-gray-300 hover:border-terra transition-colors flex items-center justify-center">
                        <button
                            class="text-center p-6 w-full h-full flex flex-col items-center justify-center text-terra">
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

            <!-- Recipe Form (hidden by default) -->
            <div id="recipe-form" class="hidden">
                <div class="bg-white rounded-xl shadow-sm p-6 mb-8">
                    <h2 class="font-display text-xl font-bold mb-6">Nova Receita</h2>

                    <form class="recipe-form space-y-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="recipe-title" class="block text-sm font-medium text-gray-700 mb-1">Título
                                    da Receita</label>
                                <input type="text" id="recipe-title" placeholder="Ex: Matapa Tradicional"
                                    required>
                            </div>
                            <div>
                                <label for="recipe-category"
                                    class="block text-sm font-medium text-gray-700 mb-1">Categoria</label>
                                <select id="recipe-category">
                                    <option value="">Selecione uma categoria</option>
                                    <option value="entradas">Entradas</option>
                                    <option value="pratos-principais">Pratos Principais</option>
                                    <option value="sobremesas">Sobremesas</option>
                                    <option value="bebidas">Bebidas</option>
                                </select>
                            </div>
                        </div>

                        <div>
                            <label for="recipe-description"
                                class="block text-sm font-medium text-gray-700 mb-1">Descrição</label>
                            <textarea id="recipe-description" rows="3" placeholder="Descreva sua receita..."></textarea>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                            <div>
                                <label for="recipe-time" class="block text-sm font-medium text-gray-700 mb-1">Tempo de
                                    Preparo</label>
                                <input type="text" id="recipe-time" placeholder="Ex: 1h 30min">
                            </div>
                            <div>
                                <label for="recipe-difficulty"
                                    class="block text-sm font-medium text-gray-700 mb-1">Dificuldade</label>
                                <select id="recipe-difficulty">
                                    <option value="">Selecione</option>
                                    <option value="facil">Fácil</option>
                                    <option value="medio">Médio</option>
                                    <option value="dificil">Difícil</option>
                                </select>
                            </div>
                            <div>
                                <label for="recipe-servings"
                                    class="block text-sm font-medium text-gray-700 mb-1">Porções</label>
                                <input type="number" id="recipe-servings" placeholder="Ex: 4">
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Imagem da Receita</label>
                            <div
                                class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                                <div class="space-y-1 text-center">
                                    <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none"
                                        viewBox="0 0 48 48" aria-hidden="true">
                                        <path
                                            d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                    <div class="flex text-sm text-gray-600">
                                        <label for="file-upload"
                                            class="relative cursor-pointer bg-white rounded-md font-medium text-terra hover:text-red-500 focus-within:outline-none">
                                            <span>Carregar uma imagem</span>
                                            <input id="file-upload" name="file-upload" type="file"
                                                class="sr-only">
                                        </label>
                                        <p class="pl-1">ou arraste e solte</p>
                                    </div>
                                    <p class="text-xs text-gray-500">PNG, JPG até 5MB</p>
                                </div>
                            </div>
                        </div>

                        <div class="flex justify-end gap-3 pt-4 mobile-flex-col">
                            <button type="button"
                                class="px-4 py-2 border border-gray-300 rounded-full text-sm font-medium text-gray-700 hover:bg-gray-50">
                                Cancelar
                            </button>
                            <button type="submit"
                                class="px-6 py-2 border border-transparent rounded-full text-sm font-medium text-white bg-terra hover:bg-red-700">
                                Salvar Receita
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
                    <a href="#" class="dashboard-card bg-white rounded-xl shadow-sm overflow-hidden">
                        <div
                            class="h-48 bg-[url('https://images.unsplash.com/photo-1518779578993-ec3579fee39f?auto=format&fit=crop&w=600&q=80')] bg-cover bg-center">
                        </div>
                        <div class="p-4">
                            <div class="flex justify-between items-start mb-2">
                                <h3 class="font-medium">Caril de Camarão</h3>
                                <span class="text-xs bg-sol/20 text-sol px-2 py-1 rounded-full">🌶️ Picante</span>
                            </div>
                            <p class="text-sm text-gray-600 mb-3">Por Chef Maria</p>
                            <div class="flex items-center text-sm text-gray-500 gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span>35 min</span>
                            </div>
                        </div>
                    </a>

                    <!-- Favorite Recipe 2 -->
                    <a href="#" class="dashboard-card bg-white rounded-xl shadow-sm overflow-hidden">
                        <div
                            class="h-48 bg-[url('https://images.unsplash.com/photo-1551504734-5ee1c4a1479b?auto=format&fit=crop&w=600&q=80')] bg-cover bg-center">
                        </div>
                        <div class="p-4">
                            <div class="flex justify-between items-start mb-2">
                                <h3 class="font-medium">Xima com Feijão</h3>
                                <span class="text-xs bg-oceano/20 text-oceano px-2 py-1 rounded-full">🥗 Vegano</span>
                            </div>
                            <p class="text-sm text-gray-600 mb-3">Por Chef Carlos</p>
                            <div class="flex items-center justify-between text-sm text-gray-500 gap-2">
                                <div class="flex items-center justify-center gap-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span>1h 10min</span>
                                </div>

                                <button class="text-red-500 hover:underline">Ver Receita</button>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <!-- Settings Tab -->
            <div id="settings" class="tab-content">
                <h2 class="font-display text-xl font-bold mb-6">Configurações da Conta</h2>

                <div class="bg-white rounded-xl shadow-sm overflow-hidden">
                    <div class="p-6">
                        <form class="space-y-6">
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 settings-grid">
                                <div class="md:col-span-2">
                                    <label for="user-name"
                                        class="block text-sm font-medium text-gray-700 mb-1">Nome</label>
                                    <input type="text" id="user-name" value="João Carlos" class="w-full">
                                </div>
                                <div>
                                    <label for="user-username"
                                        class="block text-sm font-medium text-gray-700 mb-1">Nome de Utilizador</label>
                                    <input type="text" id="user-username" value="chefjoao" class="w-full">
                                </div>
                            </div>

                            <div>
                                <label for="user-email"
                                    class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                                <input type="email" id="user-email" value="joao@example.com" class="w-full">
                            </div>

                            <div>
                                <label for="user-bio"
                                    class="block text-sm font-medium text-gray-700 mb-1">Biografia</label>
                                <textarea id="user-bio" rows="3" class="w-full">Chef apaixonado pela culinária moçambicana, compartilhando receitas tradicionais com um toque moderno.</textarea>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Foto de Perfil</label>
                                <div class="flex items-center gap-4">
                                    <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Utilizador"
                                        class="w-16 h-16 rounded-full">
                                    <button type="button" class="text-sm text-terra font-medium hover:text-red-700">
                                        Alterar foto
                                    </button>
                                </div>
                            </div>

                            <div class="pt-4 border- border-gray-200 flex justify-end gap-3 mobile-flex-col">
                                <button type="button"
                                    class="px-4 py-2 border border-gray-300 rounded-full text-sm font-medium text-gray-700 hover:bg-gray-50">
                                    Cancelar
                                </button>
                                <button type="submit"
                                    class="px-6 py-2 border  rounded-full text-sm font-medium hover:bg-red-100 hover:text-red-700 ">
                                    Salvar Alterações
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- JavaScript adicional para a área do utilizador -->
    <script>
        // Tab switching
        const tabButtons = document.querySelectorAll('.tab-button');
        const tabContents = document.querySelectorAll('.tab-content');

        tabButtons.forEach(button => {
            button.addEventListener('click', () => {
                const tabId = button.getAttribute('data-tab');

                // Update active tab button
                tabButtons.forEach(btn => {
                    btn.classList.remove('border-terra', 'text-terra');
                    btn.classList.add('border-transparent', 'text-gray-500');
                });
                button.classList.add('border-terra', 'text-terra');
                button.classList.remove('border-transparent', 'text-gray-500');

                // Show corresponding content
                tabContents.forEach(content => {
                    content.classList.remove('active');
                });
                document.getElementById(tabId).classList.add('active');
            });
        });

        // New Recipe button
        const newRecipeBtn = document.querySelector('button[aria-label="Nova Receita"]');
        const recipeForm = document.getElementById('recipe-form');

        if (newRecipeBtn && recipeForm) {
            newRecipeBtn.addEventListener('click', () => {
                // Hide all tabs
                tabContents.forEach(content => {
                    content.classList.remove('active');
                });

                // Show recipe form
                recipeForm.classList.remove('hidden');

                // Update tab navigation
                tabButtons.forEach(btn => {
                    btn.classList.remove('border-terra', 'text-terra');
                    btn.classList.add('border-transparent', 'text-gray-500');
                });
            });
        }

        // Mobile menu toggle
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');
        const navBackdrop = document.getElementById('nav-backdrop');

        if (mobileMenuButton && mobileMenu) {
            mobileMenuButton.addEventListener('click', () => {
                const isExpanded = mobileMenuButton.getAttribute('aria-expanded') === 'true';
                mobileMenuButton.setAttribute('aria-expanded', !isExpanded);
                mobileMenu.classList.toggle('hidden');
                navBackdrop.classList.toggle('active');
            });

            navBackdrop.addEventListener('click', () => {
                mobileMenuButton.setAttribute('aria-expanded', 'false');
                mobileMenu.classList.add('hidden');
                navBackdrop.classList.remove('active');
            });
        }
    </script>
</body>
</html>