<!DOCTYPE html>
<html lang="pt-MZ" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="Explore receitas moçambicanas por categoria e região - Descubra a diversidade culinária de Moçambique">
    <meta name="theme-color" content="#c00505">
    <title>Explorar Receitas - Sabores Moçambique</title>

    <!-- Pré-carregar recursos críticos -->
    <link rel="preload"
        href="https://fonts.googleapis.com/css2?family=Afacad:wght@400;500;600;700&family=Playfair+Display:wght@700&display=swap"
        as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript>
        <link rel="stylesheet"
            href="https://fonts.googleapis.com/css2?family=Afacad:wght@400;500;600;700&family=Playfair+Display:wght@700&display=swap">
    </noscript>

    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">

    <style>
        :root {
            --terra: #ee0606;
            --oceano: #2575a7;
            --sol: #e09a40;
            --folha: #6fa05f;
            --fundo: #F5F1E6;
            --shadow-sm: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
            --shadow-md: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            --shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        }

        body {
            font-family: 'Afacad', sans-serif;
            background-color: var(--fundo);
            color: #333;
            line-height: 1.6;
        }

        .font-display {
            font-family: 'Playfair Display', serif;
        }

        .text-terra {
            color: var(--terra);
        }

        .bg-terra {
            background-color: var(--terra);
        }

        .border-terra {
            border-color: var(--terra);
        }

        .text-oceano {
            color: var(--oceano);
        }

        .bg-oceano {
            background-color: var(--oceano);
        }

        .text-sol {
            color: var(--sol);
        }

        .bg-sol {
            background-color: var(--sol);
        }

        .text-folha {
            color: var(--folha);
        }

        .bg-folha {
            background-color: var(--folha);
        }

        /* Masonry grid layout */
        .masonry-grid {
            column-count: 1;
            column-gap: 1rem;
        }

        @media (min-width: 640px) {
            .masonry-grid {
                column-count: 2;
            }
        }

        @media (min-width: 1024px) {
            .masonry-grid {
                column-count: 3;
            }
        }

        @media (min-width: 1280px) {
            .masonry-grid {
                column-count: 4;
            }
        }

        .masonry-item {
            break-inside: avoid;
            margin-bottom: 1rem;
        }

        /* Recipe card styles */
        .recipe-card {
            transition: all 0.3s ease;
            will-change: transform, box-shadow;
        }

        .recipe-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-lg);
        }

        .recipe-card-image {
            height: 0;
            padding-bottom: 100%;
            background-size: cover;
            background-position: center;
            position: relative;
        }

        .recipe-badge {
            position: absolute;
            top: 0.5rem;
            right: 0.5rem;
            backdrop-filter: blur(10px);
            background-color: rgba(255, 255, 255, 0.8);
        }

        /* Filter chips */
        .filter-chip {
            transition: all 0.2s ease;
        }

        .filter-chip.active {
            background-color: var(--terra);
            color: white;
        }

        /* Dark mode */
        @media (prefers-color-scheme: dark) {
            body {
                background-color: #111;
                color: #f3f3f3;
            }

            .bg-white {
                background-color: #222;
            }

            .text-gray-600 {
                color: #aaa;
            }

            .recipe-badge {
                background-color: rgba(0, 0, 0, 0.6);
                color: white;
            }
        }

        /* Animation classes */
        .animate-fade-in {
            animation: fadeIn 0.5s ease-in-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }
    </style>
    <link rel="shortcut icon" href="{{ asset('assets/img/ico.png') }}" type="image/png">
</head>

<body class="antialiased">
    <!-- Navigation -->
    <nav class="fixed w-full top-0 z-50 bg-white/90 backdrop-blur-md shadow-sm" aria-label="Navegação principal">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">
                <div class="flex items-center">
                    <a href="/" class="flex-shrink-0 flex items-center">
                        <span class="text-2xl text-terra">🌶️</span>
                        <span class="text-2xl font-bold text-terra ">Sabores</span>
                    </a>
                </div>

                <div class="hidden md:flex items-center space-x-6">
                    <div class="relative flex items-center justify-between">
                        <input type="text" placeholder="Pesquisar receitas..."
                            class="pl-10 px-4 py-2 rounded-full border border-gray-300 focus:outline-none focus:ring-2 focus:ring-terra focus:border-transparent w-64 transition-all duration-300">
                        <svg class="absolute right-2 top-2.5 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>

                    <div class="ml-6 flex items-center space-x-6">
                        <a href="/"
                            class="px-3 py-2 text-sm font-medium border-b-2 border-transparent hover:border-terra hover:text-terra transition-colors">Home</a>
                        <a href="#comunidade"
                            class="px-3 py-2 text-sm font-medium border-b-2 border-transparent hover:border-terra hover:text-terra transition-colors">Comunidade</a>
                        <a href="#eventos"
                            class="px-3 py-2 text-sm font-medium border-b-2 border-transparent hover:border-terra hover:text-terra transition-colors">Eventos</a>
                        <a href="#sobre"
                            class="px-3 py-2 text-sm font-medium border-b-2 border-transparent hover:border-terra hover:text-terra transition-colors">Sobre</a>
                    </div>

                    <div class="relative ml-4">
                        <select
                            class="appearance-none bg-transparent border border-gray-300 rounded px-3 py-1 text-sm focus:outline-none focus:ring-1 focus:ring-terra transition-all">
                            <option value="pt">Português</option>
                            <option value="en">English</option>
                        </select>
                        <div class="absolute right-2 top-1/2 transform -translate-y-1/2 pointer-events-none">
                            <svg class="h-4 w-4 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                    </div>

                    <button
                        class="ml-6 bg-terra text-white px-4 py-2 rounded-full text-sm font-medium hover:bg-opacity-90 transition-all shadow-md hover:shadow-lg">
                        Partilhar Receita
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

        <!-- Mobile menu -->
        <div class="md:hidden hidden" id="mobile-menu">
            <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3 bg-white shadow-lg">
                <a href="/"
                    class="block px-3 py-2 text-base font-medium text-gray-700 hover:bg-terra hover:text-white rounded-md transition-colors">Home</a>
                <a href="#comunidade"
                    class="block px-3 py-2 text-base font-medium text-gray-700 hover:bg-terra hover:text-white rounded-md transition-colors">Comunidade</a>
                <a href="#eventos"
                    class="block px-3 py-2 text-base font-medium text-gray-700 hover:bg-terra hover:text-white rounded-md transition-colors">Eventos</a>
                <a href="#sobre"
                    class="block px-3 py-2 text-base font-medium text-gray-700 hover:bg-terra hover:text-white rounded-md transition-colors">Sobre</a>
                <button
                    class="w-full mt-2 bg-terra text-white px-4 py-2 rounded-full text-base font-medium hover:bg-opacity-90 transition-all shadow-md">
                    Partilhar Receita
                </button>
            </div>
        </div>
    </nav>

    <!-- Breadcrumbs -->
    <nav class="bg-gray-100 py-2 px-4 mt-16" aria-label="Navegação secundária">
        <ol class="flex space-x-2 text-sm">
            <li><a href="/" class="text-terra hover:underline">Home</a></li>
            <li>/</li>
            <li aria-current="page">Explorar</li>
        </ol>
    </nav>

    <!-- Main Content -->
    <main class="pt-16 pb-8">
        <!-- Hero Section -->
        <section class="bg-gradient-to-r from-terra/10 to-oceano/10 md:py-12 px-4 sm:px-6 lg:px-8">
            <div class="max-w-4xl mx-auto text-center">
                <h1 class="font-display text-3xl md:text-4xl font-bold text-gray-900 mb-4 ">
                    <span class="text-terra">Explore</span> a diversidade culinária de Moçambique
                </h1>
                <p class="text-lg text-gray-600 mb-6">
                    Descubra receitas tradicionais e contemporâneas organizadas por categoria e região.
                </p>
                <div class="relative max-w-md mx-auto pb-10 md:pb-0">
                    <input type="text" placeholder="Pesquisar receitas..."
                        class="w-full pl-10 pr-4 py-3 rounded-full border border-gray-300 focus:outline-none focus:ring-2 focus:ring-terra focus:border-transparent">
                    <svg class="absolute left-3 top-3.5 h-5 w-4 text-gray-400" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                            clip-rule="evenodd" />
                    </svg>
                </div>
            </div>
        </section>

        <!-- Filter Section -->
        <section class="py-6 px-4 sm:px-6 lg:px-8 bg-white sticky top-16 z-40 shadow-sm">
            <div class="max-w-7xl mx-auto">
                <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                    <h2 class="font-medium text-gray-900">Filtrar por:</h2>

                    <div class="flex-1 overflow-x-auto pb-2">
                        <div class="flex space-x-2">
                            <!-- Category Filters -->
                            <button
                                class="filter-chip px-4 py-2 rounded-full bg-gray-100 text-sm whitespace-nowrap active">
                                Todas categorias
                            </button>
                            <button class="filter-chip px-4 py-2 rounded-full bg-gray-100 text-sm whitespace-nowrap">
                                Entradas
                            </button>
                            <button class="filter-chip px-4 py-2 rounded-full bg-gray-100 text-sm whitespace-nowrap">
                                Pratos principais
                            </button>
                            <button class="filter-chip px-4 py-2 rounded-full bg-gray-100 text-sm whitespace-nowrap">
                                Sobremesas
                            </button>
                            <button class="filter-chip px-4 py-2 rounded-full bg-gray-100 text-sm whitespace-nowrap">
                                Vegetariano
                            </button>
                            <button class="filter-chip px-4 py-2 rounded-full bg-gray-100 text-sm whitespace-nowrap">
                                Marisco
                            </button>
                        </div>
                    </div>

                    <button class="md:ml-4 text-terra text-sm font-medium flex items-center whitespace-nowrap">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M3 3a1 1 0 011-1h12a1 1 0 011 1v3a1 1 0 01-.293.707L12 11.414V15a1 1 0 01-.293.707l-2 2A1 1 0 018 17v-5.586L3.293 6.707A1 1 0 013 6V3z"
                                clip-rule="evenodd" />
                        </svg>
                        Mais filtros
                    </button>
                </div>
            </div>
        </section>

        <!-- Regional Filters -->
        <section class="py-4 px-4 sm:px-6 lg:px-8 bg-gray-50">
            <div class="max-w-7xl mx-auto">
                <div class="flex overflow-x-auto pb-2 space-x-2">
                    <button
                        class="filter-chip px-4 py-2 rounded-full bg-white text-sm whitespace-nowrap shadow-sm active">
                        Todo Moçambique
                    </button>
                    <button class="filter-chip px-4 py-2 rounded-full bg-white text-sm whitespace-nowrap shadow-sm">
                        Maputo
                    </button>
                    <button class="filter-chip px-4 py-2 rounded-full bg-white text-sm whitespace-nowrap shadow-sm">
                        Gaza
                    </button>
                    <button class="filter-chip px-4 py-2 rounded-full bg-white text-sm whitespace-nowrap shadow-sm">
                        Inhambane
                    </button>
                    <button class="filter-chip px-4 py-2 rounded-full bg-white text-sm whitespace-nowrap shadow-sm">
                        Sofala
                    </button>
                    <button class="filter-chip px-4 py-2 rounded-full bg-white text-sm whitespace-nowrap shadow-sm">
                        Manica
                    </button>
                    <button class="filter-chip px-4 py-2 rounded-full bg-white text-sm whitespace-nowrap shadow-sm">
                        Tete
                    </button>
                    <button class="filter-chip px-4 py-2 rounded-full bg-white text-sm whitespace-nowrap shadow-sm">
                        Zambézia
                    </button>
                    <button class="filter-chip px-4 py-2 rounded-full bg-white text-sm whitespace-nowrap shadow-sm">
                        Nampula
                    </button>
                    <button class="filter-chip px-4 py-2 rounded-full bg-white text-sm whitespace-nowrap shadow-sm">
                        Cabo Delgado
                    </button>
                    <button class="filter-chip px-4 py-2 rounded-full bg-white text-sm whitespace-nowrap shadow-sm">
                        Niassa
                    </button>
                </div>
            </div>
        </section>

        <!-- Recipes Grid -->
        <section class="py-8 px-4 sm:px-6 lg:px-8">
            <div class="max-w-7xl mx-auto">
                <div class="masonry-grid">
                    <!-- Recipe 1 -->
                    <a href="/explorar/receita" class="masonry-item block">
                        <div class="recipe-card block bg-white rounded-xl overflow-hidden shadow-md">
                            <div class="recipe-card-image"
                                style="background-image: url('https://images.unsplash.com/photo-1544025162-d76694265947?auto=format&fit=crop&w=600&q=80')">
                                <span class="recipe-badge px-3 py-1 rounded-full text-xs font-medium">⭐ Clássico</span>
                            </div>
                            <div class="p-4">
                                <div class="flex justify-between items-start mb-2">
                                    <h3 class="font-bold text-gray-900">Matapa Tradicional</h3>
                                    <span
                                        class="bg-folha/20 text-folha px-2 py-1 rounded-full text-xs">Vegetariano</span>
                                </div>
                                <p class="text-gray-600 text-sm mb-3">Folhas de mandioca com amendoim e leite de coco
                                </p>
                                <div class="flex justify-between items-center">
                                    <div class="flex items-center">
                                        <img src="https://randomuser.me/api/portraits/women/42.jpg" alt="Chef Amina"
                                            class="w-6 h-6 rounded-full mr-2 border-2 border-white shadow-sm">
                                        <span class="text-xs text-gray-500">Chef Amina</span>
                                    </div>
                                    <span class="text-xs text-gray-500">Maputo</span>
                                </div>
                            </div>
                        </div>
                    </a>

                    <!-- Recipe 2 -->
                    <a href="/explorar/receita" class="masonry-item block">
                        <div class="recipe-card  bg-white rounded-xl overflow-hidden shadow-md">
                            <div class="recipe-card-image"
                                style="background-image: url('https://images.unsplash.com/photo-1504674900247-0877df9cc836?auto=format&fit=crop&w=600&q=80')">
                                <span class="recipe-badge px-3 py-1 rounded-full text-xs font-medium">🌊
                                    Costeiro</span>
                            </div>
                            <div class="p-4">
                                <div class="flex justify-between items-start mb-2">
                                    <h3 class="font-bold text-gray-900">Camarão à Zambeziana</h3>
                                    <span class="bg-sol/20 text-sol px-2 py-1 rounded-full text-xs">Picante</span>
                                </div>
                                <p class="text-gray-600 text-sm mb-3">Camarões grelhados com molho de piri-piri e coco
                                </p>
                                <div class="flex justify-between items-center">
                                    <div class="flex items-center">
                                        <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Chef Carlos"
                                            class="w-6 h-6 rounded-full mr-2 border-2 border-white shadow-sm">
                                        <span class="text-xs text-gray-500">Chef Carlos</span>
                                    </div>
                                    <span class="text-xs text-gray-500">Zambézia</span>
                                </div>
                            </div>
                        </div>
                    </a>

                    <!-- Recipe 3 -->
                    <div class="masonry-item">
                        <div class="recipe-card bg-white rounded-xl overflow-hidden shadow-md">
                            <div class="recipe-card-image"
                                style="background-image: url('https://images.unsplash.com/photo-1563805042-7684c019e1cb?auto=format&fit=crop&w=600&q=80')">
                                <span class="recipe-badge px-3 py-1 rounded-full text-xs font-medium">🍬 Doce</span>
                            </div>
                            <div class="p-4">
                                <div class="flex justify-between items-start mb-2">
                                    <h3 class="font-bold text-gray-900">Bolo de Caju</h3>
                                    <span
                                        class="bg-terra/20 text-terra px-2 py-1 rounded-full text-xs">Sobremesa</span>
                                </div>
                                <p class="text-gray-600 text-sm mb-3">Delicioso bolo feito com cajus moçambicanos</p>
                                <div class="flex justify-between items-center">
                                    <div class="flex items-center">
                                        <img src="https://randomuser.me/api/portraits/women/68.jpg" alt="Chef Luísa"
                                            class="w-6 h-6 rounded-full mr-2 border-2 border-white shadow-sm">
                                        <span class="text-xs text-gray-500">Chef Luísa</span>
                                    </div>
                                    <span class="text-xs text-gray-500">Nampula</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Recipe 4 -->
                    <div class="masonry-item">
                        <div class="recipe-card bg-white rounded-xl overflow-hidden shadow-md">
                            <div class="recipe-card-image"
                                style="background-image: url('https://images.unsplash.com/photo-1559847844-5315695dadae?auto=format&fit=crop&w=600&q=80')">
                                <span class="recipe-badge px-3 py-1 rounded-full text-xs font-medium">✨ Fusão</span>
                            </div>
                            <div class="p-4">
                                <div class="flex justify-between items-start mb-2">
                                    <h3 class="font-bold text-gray-900">Frango com Amendoim</h3>
                                    <span
                                        class="bg-oceano/20 text-oceano px-2 py-1 rounded-full text-xs">Popular</span>
                                </div>
                                <p class="text-gray-600 text-sm mb-3">Combinação perfeita de sabores tradicionais</p>
                                <div class="flex justify-between items-center">
                                    <div class="flex items-center">
                                        <img src="https://randomuser.me/api/portraits/men/76.jpg" alt="Chef Jamal"
                                            class="w-6 h-6 rounded-full mr-2 border-2 border-white shadow-sm">
                                        <span class="text-xs text-gray-500">Chef Jamal</span>
                                    </div>
                                    <span class="text-xs text-gray-500">Maputo</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Recipe 5 -->
                    <div class="masonry-item">
                        <div class="recipe-card bg-white rounded-xl overflow-hidden shadow-md">
                            <div class="recipe-card-image"
                                style="background-image: url('https://images.unsplash.com/photo-1502741338009-cac2772e18bc?auto=format&fit=crop&w=600&q=80')">
                                <span class="recipe-badge px-3 py-1 rounded-full text-xs font-medium">🌿
                                    Tradicional</span>
                            </div>
                            <div class="p-4">
                                <div class="flex justify-between items-start mb-2">
                                    <h3 class="font-bold text-gray-900">Xiguinha</h3>
                                    <span
                                        class="bg-folha/20 text-folha px-2 py-1 rounded-full text-xs">Vegetariano</span>
                                </div>
                                <p class="text-gray-600 text-sm mb-3">Prato típico do norte feito com milho e feijão
                                    nhemba</p>
                                <div class="flex justify-between items-center">
                                    <div class="flex items-center">
                                        <img src="https://randomuser.me/api/portraits/women/24.jpg" alt="Chef Marta"
                                            class="w-6 h-6 rounded-full mr-2 border-2 border-white shadow-sm">
                                        <span class="text-xs text-gray-500">Chef Marta</span>
                                    </div>
                                    <span class="text-xs text-gray-500">Cabo Delgado</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Recipe 6 -->
                    <div class="masonry-item">
                        <div class="recipe-card bg-white rounded-xl overflow-hidden shadow-md">
                            <div class="recipe-card-image"
                                style="background-image: url('https://images.unsplash.com/photo-1551024709-8f23befc6f87?auto=format&fit=crop&w=600&q=80')">
                                <span class="recipe-badge px-3 py-1 rounded-full text-xs font-medium">🧑‍🍳 Chef</span>
                            </div>
                            <div class="p-4">
                                <div class="flex justify-between items-start mb-2">
                                    <h3 class="font-bold text-gray-900">Risoto de Marisco</h3>
                                    <span
                                        class="bg-oceano/20 text-oceano px-2 py-1 rounded-full text-xs">Marisco</span>
                                </div>
                                <p class="text-gray-600 text-sm mb-3">Fusão italiana com ingredientes moçambicanos</p>
                                <div class="flex justify-between items-center">
                                    <div class="flex items-center">
                                        <img src="https://randomuser.me/api/portraits/men/45.jpg" alt="Chef Tiago"
                                            class="w-6 h-6 rounded-full mr-2 border-2 border-white shadow-sm">
                                        <span class="text-xs text-gray-500">Chef Tiago</span>
                                    </div>
                                    <span class="text-xs text-gray-500">Inhambane</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Recipe 7 -->
                    <div class="masonry-item">
                        <div class="recipe-card bg-white rounded-xl overflow-hidden shadow-md">
                            <div class="recipe-card-image"
                                style="background-image: url('https://images.unsplash.com/photo-1601050690597-df0568f70950?auto=format&fit=crop&w=600&q=80')">
                                <span class="recipe-badge px-3 py-1 rounded-full text-xs font-medium">🔥 Picante</span>
                            </div>
                            <div class="p-4">
                                <div class="flex justify-between items-start mb-2">
                                    <h3 class="font-bold text-gray-900">Piri-Piri Chicken</h3>
                                    <span class="bg-terra/20 text-terra px-2 py-1 rounded-full text-xs">Famoso</span>
                                </div>
                                <p class="text-gray-600 text-sm mb-3">Frango grelhado com molho de piri-piri artesanal
                                </p>
                                <div class="flex justify-between items-center">
                                    <div class="flex items-center">
                                        <img src="https://randomuser.me/api/portraits/men/68.jpg" alt="Chef Rui"
                                            class="w-6 h-6 rounded-full mr-2 border-2 border-white shadow-sm">
                                        <span class="text-xs text-gray-500">Chef Rui</span>
                                    </div>
                                    <span class="text-xs text-gray-500">Gaza</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Recipe 8 -->
                    <div class="masonry-item">
                        <div class="recipe-card bg-white rounded-xl overflow-hidden shadow-md">
                            <div class="recipe-card-image"
                                style="background-image: url('https://images.unsplash.com/photo-1512621776951-a57141f2eefd?auto=format&fit=crop&w=600&q=80')">
                                <span class="recipe-badge px-3 py-1 rounded-full text-xs font-medium">🥗
                                    Saudável</span>
                            </div>
                            <div class="p-4">
                                <div class="flex justify-between items-start mb-2">
                                    <h3 class="font-bold text-gray-900">Salada Tropical</h3>
                                    <span
                                        class="bg-folha/20 text-folha px-2 py-1 rounded-full text-xs">Vegetariano</span>
                                </div>
                                <p class="text-gray-600 text-sm mb-3">Mistura de frutas e vegetais com molho de
                                    maracujá</p>
                                <div class="flex justify-between items-center">
                                    <div class="flex items-center">
                                        <img src="https://randomuser.me/api/portraits/women/56.jpg" alt="Chef Sofia"
                                            class="w-6 h-6 rounded-full mr-2 border-2 border-white shadow-sm">
                                        <span class="text-xs text-gray-500">Chef Sofia</span>
                                    </div>
                                    <span class="text-xs text-gray-500">Sofala</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Load More Button -->
                <div class="text-center mt-12">
                    <button
                        class="bg-terra text-white px-6 py-3 rounded-full font-medium hover:bg-opacity-90 transition-all shadow-md hover:shadow-lg">
                        Carregar mais receitas
                    </button>
                </div>
            </div>
        </section>

        <!-- Regional Highlights -->
        <section class="py-12 px-4 sm:px-6 lg:px-8 bg-gray-50">
            <div class="max-w-7xl mx-auto">
                <div class="text-center mb-12">
                    <h2 class="font-display text-2xl md:text-3xl font-bold text-gray-900 mb-2">
                        <span class="text-terra">Sabores</span> Regionais
                    </h2>
                    <p class="text-gray-600">Descubra as especialidades de cada região de Moçambique</p>
                </div>

                <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                    <div class="bg-white rounded-xl overflow-hidden shadow-sm hover:shadow-md transition-shadow">
                        <div
                            class="h-32 bg-[url('https://images.unsplash.com/photo-1544025162-d76694265947?auto=format&fit=crop&w=300&q=80')] bg-cover bg-center relative">
                            <div class="absolute inset-0 bg-black/30 flex items-center justify-center">
                                <h3 class="text-white font-bold">Maputo</h3>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white rounded-xl overflow-hidden shadow-sm hover:shadow-md transition-shadow">
                        <div
                            class="h-32 bg-[url('https://images.unsplash.com/photo-1502741338009-cac2772e18bc?auto=format&fit=crop&w=300&q=80')] bg-cover bg-center relative">
                            <div class="absolute inset-0 bg-black/30 flex items-center justify-center">
                                <h3 class="text-white font-bold">Inhambane</h3>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white rounded-xl overflow-hidden shadow-sm hover:shadow-md transition-shadow">
                        <div
                            class="h-32 bg-[url('https://images.unsplash.com/photo-1563805042-7684c019e1cb?auto=format&fit=crop&w=300&q=80')] bg-cover bg-center relative">
                            <div class="absolute inset-0 bg-black/30 flex items-center justify-center">
                                <h3 class="text-white font-bold">Nampula</h3>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white rounded-xl overflow-hidden shadow-sm hover:shadow-md transition-shadow">
                        <div
                            class="h-32 bg-[url('https://images.unsplash.com/photo-1551024709-8f23befc6f87?auto=format&fit=crop&w=300&q=80')] bg-cover bg-center relative">
                            <div class="absolute inset-0 bg-black/30 flex items-center justify-center">
                                <h3 class="text-white font-bold">Zambézia</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white pt-12 pb-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8 mb-8">
                <div>
                    <h3 class="text-lg font-bold mb-4 text-terra">Sabores</h3>
                    <p class="text-gray-400 text-sm">
                        Celebrando a diversidade culinária de Moçambique.
                    </p>
                </div>
                <div>
                    <h3 class="text-lg font-bold mb-4">Explorar</h3>
                    <ul class="space-y-2">
                        <li><a href="#"
                                class="text-gray-400 hover:text-white text-sm transition-colors">Receitas</a></li>
                        <li><a href="#"
                                class="text-gray-400 hover:text-white text-sm transition-colors">Categorias</a></li>
                        <li><a href="#"
                                class="text-gray-400 hover:text-white text-sm transition-colors">Regiões</a></li>
                        <li><a href="#"
                                class="text-gray-400 hover:text-white text-sm transition-colors">Chefs</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-lg font-bold mb-4">Comunidade</h3>
                    <ul class="space-y-2">
                        <li><a href="#"
                                class="text-gray-400 hover:text-white text-sm transition-colors">Fórum</a></li>
                        <li><a href="#"
                                class="text-gray-400 hover:text-white text-sm transition-colors">Eventos</a></li>
                        <li><a href="#"
                                class="text-gray-400 hover:text-white text-sm transition-colors">Desafios</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-lg font-bold mb-4">Sobre</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-400 hover:text-white text-sm transition-colors">Nossa
                                Missão</a></li>
                        <li><a href="#"
                                class="text-gray-400 hover:text-white text-sm transition-colors">Contactos</a></li>
                        <li><a href="#"
                                class="text-gray-400 hover:text-white text-sm transition-colors">Termos</a></li>
                        <li><a href="#"
                                class="text-gray-400 hover:text-white text-sm transition-colors">Privacidade</a></li>
                    </ul>
                </div>
            </div>
            <div class="border-t border-gray-800 pt-8">
                <div class="flex flex-col md:flex-row justify-between items-center">
                    <div class="flex items-center mb-4 md:mb-0">
                        <span class="text-2xl mr-2">🌶️</span>
                        <span class="font-bold text-terra">Sabores Moçambique</span>
                    </div>
                    <div class="text-gray-400 text-sm">
                        © 2023 Sabores Moçambique. Todos direitos reservados.
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    @vite('resources/js/app.js')
    <script>
        // Mobile menu toggle
        document.getElementById('mobile-menu-button').addEventListener('click', function() {
            const menu = document.getElementById('mobile-menu');
            const expanded = this.getAttribute('aria-expanded') === 'true';

            this.setAttribute('aria-expanded', !expanded);
            menu.classList.toggle('hidden');
        });

        // Filter chips functionality
        document.querySelectorAll('.filter-chip').forEach(chip => {
            chip.addEventListener('click', function() {
                // Remove active class from all chips in the same container
                this.parentNode.querySelectorAll('.filter-chip').forEach(c => {
                    c.classList.remove('active');
                });

                // Add active class to clicked chip
                this.classList.add('active');
            });
        });

        // Lazy loading for images
        if ('loading' in HTMLImageElement.prototype) {
            const lazyImages = document.querySelectorAll('img[loading="lazy"]');
            lazyImages.forEach(img => {
                img.src = img.dataset.src;
            });
        } else {
            // Fallback for browsers that don't support lazy loading
            const script = document.createElement('script');
            script.src = 'https://cdnjs.cloudflare.com/ajax/libs/lazysizes/5.3.2/lazysizes.min.js';
            script.async = true;
            document.body.appendChild(script);
        }

        // Smooth scroll for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });

        // Recipe card hover effects for touch devices
        function setupCardHover() {
            const cards = document.querySelectorAll('.recipe-card');
            cards.forEach(card => {
                card.addEventListener('touchstart', function() {
                    this.classList.add('hover');
                }, {
                    passive: true
                });

                card.addEventListener('touchend', function() {
                    setTimeout(() => {
                        this.classList.remove('hover');
                    }, 100);
                }, {
                    passive: true
                });
            });
        }

        setupCardHover();

        // Load more recipes functionality
        document.querySelector('button[aria-label="Carregar mais receitas"]').addEventListener('click', function() {
            this.textContent = 'Carregando...';
            this.disabled = true;

            // Simulate API call
            setTimeout(() => {
                // In a real app, you would fetch more recipes here
                const masonryGrid = document.querySelector('.masonry-grid');

                // Clone existing recipes to simulate new content
                const newRecipes = [];
                document.querySelectorAll('.masonry-item').forEach((item, index) => {
                    if (index < 4) { // Only clone first 4 recipes
                        const clone = item.cloneNode(true);
                        clone.classList.add('animate-fade-in');
                        newRecipes.push(clone);
                    }
                });

                // Append new recipes
                newRecipes.forEach(recipe => {
                    masonryGrid.appendChild(recipe);
                });

                this.textContent = 'Carregar mais receitas';
                this.disabled = false;
            }, 1000);
        });
    </script>
</body>

</html>
