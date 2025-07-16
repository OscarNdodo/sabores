<!DOCTYPE html>
<html lang="pt-MZ" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="Matapa Tradicional - Receita moçambicana autêntica com folhas de mandioca, amendoim e leite de coco">
    <meta name="theme-color" content="#c00505">
    <title>Matapa Tradicional - Sabores Moçambique</title>

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

        /* Recipe header */
        .recipe-header {
            height: 60vh;
            min-height: 400px;
            max-height: 600px;
        }

        @media (min-width: 768px) {
            .recipe-header {
                height: 70vh;
            }
        }

        /* Recipe meta */
        .recipe-meta-item {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        /* Ingredients checklist */
        .ingredient-item {
            position: relative;
            padding-left: 1.75rem;
        }

        .ingredient-item input[type="checkbox"] {
            position: absolute;
            left: 0;
            top: 0.25rem;
            width: 1.25rem;
            height: 1.25rem;
            border: 2px solid var(--folha);
            border-radius: 0.25rem;
            appearance: none;
            outline: none;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .ingredient-item input[type="checkbox"]:checked {
            background-color: var(--folha);
            border-color: var(--folha);
        }

        .ingredient-item input[type="checkbox"]:checked::after {
            content: "✓";
            position: absolute;
            color: white;
            font-size: 0.75rem;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
        }

        /* Steps navigation */
        .step-nav-item {
            position: relative;
        }

        .step-nav-item.active::after {
            content: "";
            position: absolute;
            bottom: -0.5rem;
            left: 0;
            width: 100%;
            height: 2px;
            background-color: var(--terra);
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

        /* Floating action button */
        .fab {
            position: fixed;
            bottom: 1.5rem;
            right: 1.5rem;
            width: 3.5rem;
            height: 3.5rem;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: var(--shadow-lg);
            z-index: 50;
            transition: all 0.3s ease;
        }

        .fab:hover {
            transform: translateY(-3px) scale(1.05);
            box-shadow: 0 15px 20px -5px rgba(0, 0, 0, 0.3);
        }

        /* Backdrop for mobile nav */
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
                        <span class="text-2xl font-bold text-terra">Sabores</span>
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
                        <a href="/explorar"
                            class="px-3 py-2 text-sm font-medium border-b-2 border-transparent hover:border-terra hover:text-terra transition-colors">Explorar</a>
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
                        <div class="absolute right-1 top-1/2 transform -translate-y-1/2 pointer-events-none">
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
            <li><a href="/explorar" class="text-terra hover:underline">Explorar</a></li>
            <li>/</li>
            <li aria-current="page">Receita</li>
        </ol>
    </nav>

    <!-- Backdrop for mobile menu -->
    <div class="nav-backdrop" id="nav-backdrop"></div>

    <!-- Main Content -->
    <main class="md:pt-16 pb-20">
        <!-- Recipe Header -->
        <header class="recipe-header relative">
            <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-black/20 z-10"></div>
            <div
                class="absolute inset-0 bg-[url('https://images.unsplash.com/photo-1544025162-d76694265947?auto=format&fit=crop&w=1200&q=80')] bg-cover bg-center">
            </div>

            <div class="relative z-20 h-full flex flex-col justify-end p-6">
                <div class="max-w-3xl mx-auto w-full">
                    <div class="flex items-center gap-2 mb-4">
                        <span
                            class="bg-folha/20 text-folha px-3 py-1 rounded-full text-xs font-medium">Vegetariano</span>
                        <span class="bg-white/90 text-gray-800 px-3 py-1 rounded-full text-xs font-medium">⭐
                            Clássico</span>
                    </div>

                    <h1 class="font-display text-3xl md:text-4xl font-bold text-white mb-2">Matapa Tradicional</h1>
                    <p class="text-white/90 mb-4">Folhas de mandioca com amendoim e leite de coco - um prato emblemático
                        de Moçambique</p>

                    <div class="flex flex-wrap gap-4 text-white/90 text-sm">
                        <div class="recipe-meta-item">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span>1h 30min</span>
                        </div>
                        <div class="recipe-meta-item">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                            </svg>
                            <span>Médio</span>
                        </div>
                        <div class="recipe-meta-item">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                            <span>4 porções</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Back button -->
            <a href="/explorar"
                class="absolute top-4 left-4 z-20 bg-white/90 p-2 rounded-full shadow-md hover:bg-white transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
            </a>

            <!-- Favorite button -->
            <button
                class="absolute top-4 right-4 z-20 bg-white/90 p-2 rounded-full shadow-md hover:bg-white transition-colors"
                aria-label="Adicionar aos favoritos">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-terra" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                </svg>
            </button>
        </header>

        <!-- Recipe Content -->
        <div class="max-w-3xl mx-auto px-4 sm:px-6 mt-4">
            <!-- Author & Region -->
            <div class="bg-white -mt-8 rounded-xl shadow-md p-4 mb-6 relative z-30">
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-3">
                        <img src="https://randomuser.me/api/portraits/women/42.jpg" alt="Chef Amina"
                            class="w-12 h-12 rounded-full border-2 border-white shadow-md">
                        <div>
                            <h3 class="font-medium">Chef Amina</h3>
                            <p class="text-gray-600 text-sm">Especialista em culinária tradicional</p>
                        </div>
                    </div>
                    <div class="text-right">
                        <p class="text-sm text-gray-600">Origem</p>
                        <p class="font-medium">Maputo</p>
                    </div>
                </div>
            </div>

            <!-- Recipe Tabs -->
            <div class="sticky top-16 bg-white z-20 shadow-sm mb-6">
                <div class="flex border-b border-gray-200">
                    <button class="step-nav-item flex-1 py-3 px-4 text-sm font-medium text-center active"
                        data-tab="ingredients">
                        Ingredientes
                    </button>
                    <button class="step-nav-item flex-1 py-3 px-4 text-sm font-medium text-center"
                        data-tab="instructions">
                        Preparação
                    </button>
                    <button class="step-nav-item flex-1 py-3 px-4 text-sm font-medium text-center" data-tab="tips">
                        Dicas
                    </button>
                </div>
            </div>

            <!-- Ingredients Section -->
            <section id="ingredients" class="recipe-section block">
                <div class="mb-8">
                    <h2 class="font-display text-xl font-bold mb-4">Ingredientes</h2>

                    <div class="mb-6">
                        <h3 class="font-medium text-gray-900 mb-3">Para a Matapa</h3>
                        <ul class="space-y-3">
                            <li class="ingredient-item">
                                <input type="checkbox" id="ing1">
                                <label for="ing1">1 kg de folhas de mandioca frescas (ou congeladas)</label>
                            </li>
                            <li class="ingredient-item">
                                <input type="checkbox" id="ing2">
                                <label for="ing2">2 xícaras de amendoim torrado e moído</label>
                            </li>
                            <li class="ingredient-item">
                                <input type="checkbox" id="ing3">
                                <label for="ing3">2 latas de leite de coco (400ml cada)</label>
                            </li>
                            <li class="ingredient-item">
                                <input type="checkbox" id="ing4">
                                <label for="ing4">1 cebola grande picada</label>
                            </li>
                            <li class="ingredient-item">
                                <input type="checkbox" id="ing5">
                                <label for="ing5">3 dentes de alho picados</label>
                            </li>
                            <li class="ingredient-item">
                                <input type="checkbox" id="ing6">
                                <label for="ing6">2 colheres de sopa de óleo</label>
                            </li>
                            <li class="ingredient-item">
                                <input type="checkbox" id="ing7">
                                <label for="ing7">Sal a gosto</label>
                            </li>
                            <li class="ingredient-item">
                                <input type="checkbox" id="ing8">
                                <label for="ing8">Piri-piri a gosto (opcional)</label>
                            </li>
                        </ul>
                    </div>

                    <div>
                        <h3 class="font-medium text-gray-900 mb-3">Para Acompanhar</h3>
                        <ul class="space-y-3">
                            <li class="ingredient-item">
                                <input type="checkbox" id="ing9">
                                <label for="ing9">Arroz branco</label>
                            </li>
                            <li class="ingredient-item">
                                <input type="checkbox" id="ing10">
                                <label for="ing10">Camarões grelhados (opcional)</label>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Cooking Tools -->
                <div class="bg-gray-50 rounded-xl p-4 mb-8">
                    <h3 class="font-medium text-gray-900 mb-3">Utensílios Necessários</h3>
                    <div class="grid grid-cols-2 gap-3">
                        <div class="flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-terra" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3" />
                            </svg>
                            <span>Faca afiada</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-terra" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                            </svg>
                            <span>Tábua de corte</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-terra" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                            </svg>
                            <span>Panela grande</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-terra" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4" />
                            </svg>
                            <span>Moedor/processador</span>
                        </div>
                    </div>
                </div>

                <!-- Nutrition Info -->
                <div class="bg-white rounded-xl shadow-sm p-4 mb-8">
                    <h3 class="font-medium text-gray-900 mb-3">Informação Nutricional (por porção)</h3>
                    <div class="grid grid-cols-3 gap-4 text-center">
                        <div>
                            <p class="text-2xl font-bold text-terra">420</p>
                            <p class="text-xs text-gray-600">Calorias</p>
                        </div>
                        <div>
                            <p class="text-2xl font-bold text-terra">18g</p>
                            <p class="text-xs text-gray-600">Proteínas</p>
                        </div>
                        <div>
                            <p class="text-2xl font-bold text-terra">32g</p>
                            <p class="text-xs text-gray-600">Carboidratos</p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Instructions Section -->
            <section id="instructions" class="recipe-section hidden">
                <h2 class="font-display text-xl font-bold mb-6">Modo de Preparo</h2>

                <div class="space-y-8">
                    <!-- Step 1 -->
                    <div class="flex gap-4">
                        <div
                            class="flex-shrink-0 w-10 h-10 rounded-full bg-terra text-white flex items-center justify-center font-bold">
                            1</div>
                        <div class="flex-1">
                            <h3 class="font-medium text-gray-900 mb-2">Preparar as folhas</h3>
                            <p class="text-gray-700">Lave bem as folhas de mandioca em água corrente. Retire os talos
                                mais grossos e pique as folhas finamente. Se estiver usando folhas congeladas,
                                descongele e escorra o excesso de água.</p>
                            <div class="mt-3 bg-transparent rounded-lg overflow-hidden flex ">
                                <img src="https://images.unsplash.com/photo-1542838132-92c53300491e?auto=format&fit=crop&w=600&q=80"
                                    alt="Folhas de mandioca picadas"
                                    class="w-full max-w-[400px] h-56 object-cover object-center rounded-lg">
                            </div>
                        </div>
                    </div>

                    <!-- Step 2 -->
                    <div class="flex gap-4">
                        <div
                            class="flex-shrink-0 w-10 h-10 rounded-full bg-terra text-white flex items-center justify-center font-bold">
                            2</div>
                        <div class="flex-1">
                            <h3 class="font-medium text-gray-900 mb-2">Preparar o tempero</h3>
                            <p class="text-gray-700">Em uma panela grande, aqueça o óleo em fogo médio. Refogue a
                                cebola e o alho até ficarem dourados e perfumados.</p>
                            <div class="mt-3 bg-gray-50 rounded-lg overflow-hidden flex justify-start">
                                <img src="https://images.unsplash.com/photo-1504674900247-0877df9cc836?auto=format&fit=crop&w=600&q=80"
                                    alt="Refogando cebola e alho"
                                    class="w-full max-w-[400px] h-84 object-cover object-center rounded-lg">
                            </div>
                        </div>
                    </div>

                    <!-- Step 3 -->
                    <div class="flex gap-4">
                        <div
                            class="flex-shrink-0 w-10 h-10 rounded-full bg-terra text-white flex items-center justify-center font-bold">
                            3</div>
                        <div class="flex-1">
                            <h3 class="font-medium text-gray-900 mb-2">Cozinhar as folhas</h3>
                            <p class="text-gray-700">Adicione as folhas picadas à panela e mexa bem para misturar com o
                                tempero. Deixe cozinhar por cerca de 10 minutos, mexendo ocasionalmente.</p>
                            <div class="mt-3 bg-gray-50 rounded-lg overflow-hidden flex justify-center">
                                <img src="https://images.unsplash.com/photo-1464306076886-debca5e8a6b0?auto=format&fit=crop&w=600&q=80"
                                    alt="Cozinhando folhas de mandioca"
                                    class="w-full max-w-[400px] h-56 object-cover object-center rounded-lg">
                            </div>
                        </div>
                    </div>

                    <!-- Step 4 -->
                    <div class="flex gap-4">
                        <div
                            class="flex-shrink-0 w-10 h-10 rounded-full bg-terra text-white flex items-center justify-center font-bold">
                            4</div>
                        <div class="flex-1">
                            <h3 class="font-medium text-gray-900 mb-2">Adicionar amendoim e coco</h3>
                            <p class="text-gray-700">Incorpore o amendoim moído e o leite de coco, mexendo bem. Tempere
                                com sal e piri-piri a gosto. Reduza o fogo para baixo e deixe cozinhar por
                                aproximadamente 1 hora, mexendo de vez em quando para não grudar no fundo da panela.</p>
                            <div class="mt-3 bg-gray-50 rounded-lg overflow-hidden flex justify-center">
                                <img src="https://images.unsplash.com/photo-1550583724-b2692b85b150?auto=format&fit=crop&w=600&q=80"
                                    alt="Misturando ingredientes"
                                    class="w-full max-w-[400px] h-56 object-cover object-center rounded-lg">
                            </div>
                        </div>
                    </div>

                    <!-- Step 5 -->
                    <div class="flex gap-4">
                        <div
                            class="flex-shrink-0 w-10 h-10 rounded-full bg-terra text-white flex items-center justify-center font-bold">
                            5</div>
                        <div class="flex-1">
                            <h3 class="font-medium text-gray-900 mb-2">Ajustar o tempero</h3>
                            <p class="text-gray-700">Prove e ajuste o sal e o piri-piri se necessário. Se a mistura
                                estiver muito grossa, pode adicionar um pouco de água quente.</p>
                            <div class="mt-3 bg-gray-50 rounded-lg overflow-hidden flex justify-center">
                                <img src="https://images.unsplash.com/photo-1519864600265-abb23847ef2c?auto=format&fit=crop&w=600&q=80"
                                    alt="Ajustando tempero"
                                    class="w-full max-w-[400px] h-56 object-cover object-center rounded-lg">
                            </div>
                        </div>
                    </div>

                    <!-- Step 6 -->
                    <div class="flex gap-4">
                        <div
                            class="flex-shrink-0 w-10 h-10 rounded-full bg-terra text-white flex items-center justify-center font-bold">
                            6</div>
                        <div class="flex-1">
                            <h3 class="font-medium text-gray-900 mb-2">Servir</h3>
                            <p class="text-gray-700">Sirva quente acompanhado de arroz branco e, se desejar, camarões
                                grelhados. Tradicionalmente, a matapa tem uma consistência cremosa, mas não muito
                                líquida.</p>
                            <div class="mt-3 bg-gray-50 rounded-lg overflow-hidden flex justify-center">
                                <img src="https://images.unsplash.com/photo-1544025162-d76694265947?auto=format&fit=crop&w=600&q=80"
                                    alt="Matapa pronta para servir"
                                    class="w-full max-w-[400px] h-56 object-cover object-center rounded-lg">
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Tips Section -->
            <section id="tips" class="recipe-section hidden">
                <h2 class="font-display text-xl font-bold mb-6">Dicas do Chef</h2>

                <div class="space-y-6">
                    <div class="bg-white rounded-xl shadow-sm p-4">
                        <div class="flex items-start gap-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-terra flex-shrink-0"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <div>
                                <h3 class="font-medium text-gray-900 mb-1">Folhas frescas vs congeladas</h3>
                                <p class="text-gray-700 text-sm">Se usar folhas frescas, lave-as muito bem para remover
                                    qualquer resíduo de terra. Folhas congeladas são uma ótima alternativa e economizam
                                    tempo.</p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-xl shadow-sm p-4">
                        <div class="flex items-start gap-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-terra flex-shrink-0"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
                            </svg>
                            <div>
                                <h3 class="font-medium text-gray-900 mb-1">Tempero perfeito</h3>
                                <p class="text-gray-700 text-sm">O segredo está no amendoim bem torrado antes de moer.
                                    Torre no forno a 180°C por 10-15 minutos até ficarem dourados e aromáticos.</p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-xl shadow-sm p-4">
                        <div class="flex items-start gap-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-terra flex-shrink-0"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                            </svg>
                            <div>
                                <h3 class="font-medium text-gray-900 mb-1">Armazenamento</h3>
                                <p class="text-gray-700 text-sm">A matapa pode ser guardada na geladeira por até 3
                                    dias. Reaqueça em banho-maria ou no microondas, adicionando um pouco de água se
                                    necessário.</p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-xl shadow-sm p-4">
                        <div class="flex items-start gap-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-terra flex-shrink-0"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 11a7 7 0 01-7 7m0 0a7 7 0 01-7-7m7 7v4m0 0H8m4 0h4m-4-8a3 3 0 01-3-3V5a3 3 0 116 0v6a3 3 0 01-3 3z" />
                            </svg>
                            <div>
                                <h3 class="font-medium text-gray-900 mb-1">Variantes regionais</h3>
                                <p class="text-gray-700 text-sm">No norte de Moçambique, é comum adicionar caranguejo
                                    ou camarão seco. Em Maputo, muitas famílias preferem uma versão mais cremosa com
                                    mais leite de coco.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Video Embed -->
                <div class="mt-8 bg-white rounded-xl shadow-sm overflow-hidden">
                    <div class="p-4 border-b border-gray-200">
                        <h3 class="font-medium text-gray-900">Vídeo Tutorial</h3>
                    </div>
                    <div class="aspect-w-16 aspect-h-9 bg-black">
                        <div class="flex items-center justify-center h-full bg-gray-100 text-gray-400">
                            <iframe width="560" height="315" src="https://www.youtube.com/embed/U3xpEBeRTlg?si=OlHdBPvsFRJtLBHV" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                            <span class="sr-only">Vídeo tutorial</span>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <!-- Related Recipes -->
        <section class="max-w-7xl mx-auto px-4 sm:px-6 py-12">
            <h2 class="font-display text-2xl font-bold mb-6 px-4">Receitas Relacionadas</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Recipe Card 1 -->
                <a href="#"
                    class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-shadow">
                    <div
                        class="h-48 bg-[url('https://images.unsplash.com/photo-1559847844-5315695dadae?auto=format&fit=crop&w=600&q=80')] bg-cover bg-center">
                    </div>
                    <div class="p-4">
                        <div class="flex justify-between items-start mb-2">
                            <h3 class="font-medium">Frango à Zambeziana</h3>
                            <span class="text-xs bg-folha/20 text-folha px-2 py-1 rounded-full">⭐ Popular</span>
                        </div>
                        <div class="flex items-center text-sm text-gray-600 gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span>50 min</span>
                        </div>
                    </div>
                </a>

                <!-- Recipe Card 2 -->
                <a href="#"
                    class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-shadow">
                    <div
                        class="h-48 bg-[url('https://images.unsplash.com/photo-1518779578993-ec3579fee39f?auto=format&fit=crop&w=600&q=80')] bg-cover bg-center">
                    </div>
                    <div class="p-4">
                        <div class="flex justify-between items-start mb-2">
                            <h3 class="font-medium">Caril de Camarão</h3>
                            <span class="text-xs bg-sol/20 text-sol px-2 py-1 rounded-full">🌶️ Picante</span>
                        </div>
                        <div class="flex items-center text-sm text-gray-600 gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span>35 min</span>
                        </div>
                    </div>
                </a>

                <!-- Recipe Card 3 -->
                <a href="#"
                    class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-shadow">
                    <div
                        class="h-48 bg-[url('https://images.unsplash.com/photo-1551504734-5ee1c4a1479b?auto=format&fit=crop&w=600&q=80')] bg-cover bg-center">
                    </div>
                    <div class="p-4">
                        <div class="flex justify-between items-start mb-2">
                            <h3 class="font-medium">Xima com Feijão</h3>
                            <span class="text-xs bg-oceano/20 text-oceano px-2 py-1 rounded-full">🥗 Vegano</span>
                        </div>
                        <div class="flex items-center text-sm text-gray-600 gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span>1h 10min</span>
                        </div>
                    </div>
                </a>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div class="md:col-span-2">
                    <div class="flex items-center">
                        <span class="text-2xl">🌶️</span>
                        <span class="ml-1 text-2xl font-bold">Sabores Moçambique</span>
                    </div>
                    <p class="mt-4 text-gray-400">Preservando e compartilhando os sabores tradicionais de Moçambique.
                        Receitas autênticas para todas as ocasiões.</p>
                </div>
                <div>
                    <h3 class="text-sm font-semibold uppercase tracking-wider">Explorar</h3>
                    <ul class="mt-4 space-y-2">
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Receitas</a>
                        </li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Chefs</a></li>
                        <li><a href="#"
                                class="text-gray-400 hover:text-white transition-colors">Ingredientes</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Técnicas</a>
                        </li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-sm font-semibold uppercase tracking-wider">Sobre</h3>
                    <ul class="mt-4 space-y-2">
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Nossa
                                História</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Contribuir</a>
                        </li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Contato</a>
                        </li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Termos</a></li>
                    </ul>
                </div>
            </div>
            <div class="mt-12 pt-8 border-t border-gray-700 flex flex-col md:flex-row justify-between items-center">
                <p class="text-gray-400 text-sm">© 2023 Sabores Moçambique. Todos os direitos reservados.</p>
                <div class="mt-4 md:mt-0 flex space-x-6">
                    <a href="#" class="text-gray-400 hover:text-white transition-colors">
                        <span class="sr-only">Facebook</span>
                        <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"
                                clip-rule="evenodd" />
                        </svg>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-white transition-colors">
                        <span class="sr-only">Instagram</span>
                        <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z"
                                clip-rule="evenodd" />
                        </svg>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-white transition-colors">
                        <span class="sr-only">YouTube</span>
                        <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M19.812 5.418c.861.23 1.538.907 1.768 1.768C21.998 8.746 22 12 22 12s0 3.255-.418 4.814a2.504 2.504 0 0 1-1.768 1.768c-1.56.419-7.814.419-7.814.419s-6.255 0-7.814-.419a2.505 2.505 0 0 1-1.768-1.768C2 15.255 2 12 2 12s0-3.255.417-4.814a2.507 2.507 0 0 1 1.768-1.768C5.744 5 11.998 5 11.998 5s6.255 0 7.814.418ZM15.194 12 10 15V9l5.194 3Z"
                                clip-rule="evenodd" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Floating Action Button -->
    <button class="fab bg-terra text-white hover:bg-red-700" aria-label="Compartilhar receita">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
            stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z" />
        </svg>
    </button>

    <!-- JavaScript -->
    <script>
        // Mobile menu toggle
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');
        const navBackdrop = document.getElementById('nav-backdrop');

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

        // Tab switching
        const tabButtons = document.querySelectorAll('[data-tab]');
        const recipeSections = document.querySelectorAll('.recipe-section');
        const stepNavItems = document.querySelectorAll('.step-nav-item');

        tabButtons.forEach(button => {
            button.addEventListener('click', () => {
                const tabId = button.getAttribute('data-tab');

                // Update active tab button
                stepNavItems.forEach(item => {
                    item.classList.remove('active');
                });
                button.classList.add('active');

                // Show corresponding section
                recipeSections.forEach(section => {
                    section.classList.add('hidden');
                });
                document.getElementById(tabId).classList.remove('hidden');
            });
        });

        // Checkbox animation
        const checkboxes = document.querySelectorAll('.ingredient-item input[type="checkbox"]');
        checkboxes.forEach(checkbox => {
            checkbox.addEventListener('change', function() {
                const label = this.nextElementSibling;
                if (this.checked) {
                    label.style.textDecoration = 'line-through';
                    label.style.opacity = '0.7';
                } else {
                    label.style.textDecoration = 'none';
                    label.style.opacity = '1';
                }
            });
        });

        // Scroll to top button
        const scrollToTop = document.createElement('button');
        scrollToTop.innerHTML = `
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18" />
            </svg>
        `;
        scrollToTop.className =
            'fixed bottom-20 right-4 z-50 bg-white/90 p-2 rounded-full shadow-md hover:bg-white transition-colors hidden';
        scrollToTop.setAttribute('aria-label', 'Voltar ao topo');
        document.body.appendChild(scrollToTop);

        window.addEventListener('scroll', () => {
            if (window.pageYOffset > 300) {
                scrollToTop.classList.remove('hidden');
            } else {
                scrollToTop.classList.add('hidden');
            }
        });

        scrollToTop.addEventListener('click', () => {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    </script>
</body>

</html>
