<!DOCTYPE html>
<html lang="pt-MZ" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="Descubra a revolução gastronômica moçambicana com receitas autênticas e técnicas modernas">
    <meta name="theme-color" content="#c00505">
    <title>Sabores - A Revolução Gastronômica Moçambicana</title>

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

        .card-hover {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            will-change: transform, box-shadow;
        }

        .card-hover:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-lg);
        }

        .wave-divider {
            position: relative;
            height: 50px;
            overflow: hidden;
        }

        .wave-divider::before {
            content: "";
            position: absolute;
            left: 0;
            right: 0;
            top: 0;
            height: 100%;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 1200 120' preserveAspectRatio='none'%3E%3Cpath d='M0,0V46.29c47.79,22.2,103.59,32.17,158,28,70.36-5.37,136.33-33.31,206.8-37.5C438.64,32.43,512.34,53.67,583,72.05c69.27,18,138.3,24.88,209.4,13.08,36.15-6,69.85-17.84,104.45-29.34C989.49,25,1113-14.29,1200,52.47V0Z' opacity='.25' fill='%23E2725B'%3E%3C/path%3E%3Cpath d='M0,0V15.81C13,36.92,27.64,56.86,47.69,72.05,99.41,111.27,165,111,224.58,91.58c31.15-10.15,60.09-26.07,89.67-39.8,40.92-19,84.73-46,130.83-49.67,36.26-2.85,70.9,9.42,98.6,31.56,31.77,25.39,62.32,62,103.63,73,40.44,10.79,81.35-6.69,119.13-24.28s75.16-39,116.92-43.05c59.73-5.85,113.28,22.88,168.9,38.84,30.2,8.66,59,6.17,87.09-7.5,22.43-10.89,48-26.93,60.65-49.24V0Z' opacity='.5' fill='%23E2725B'%3E%3C/path%3E%3Cpath d='M0,0V5.63C149.93,59,314.09,71.32,475.83,42.57c43-7.64,84.23-20.12,127.61-26.46,59-8.63,112.48,12.24,165.56,35.4C827.93,77.22,886,95.24,951.2,90c86.53-7,172.46-45.71,248.8-84.81V0Z' fill='%23E2725B'%3E%3C/path%3E%3C/svg%3E");
            background-size: cover;
            background-repeat: no-repeat;
        }

        /* Dark mode opcional */
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
        }

        /* Transições suaves */
        .transition-all {
            transition-property: all;
            transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
            transition-duration: 200ms;
        }

        /* Animações personalizadas */
        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        .animate-fade-in {
            animation: fadeIn 0.5s ease-in-out;
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
                    <a href="#" class="flex-shrink-0 flex items-center">
                        <span class="text-2xl text-terra">🌶️</span>
                        <span class="ml-1 text-2xl font-bold text-terra  hidden sm:block">Sabores</span>
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
                        <a href="#explorar"
                            class="px-3 py-2 text-sm font-medium border-b-2 border-transparent hover:border-terra hover:text-terra transition-colors">Explorar</a>
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
                            <option value="pt-MZ">🇲🇿 Português (MZ)</option>
                            <option value="pt-PT">🇵🇹 Português (PT)</option>
                            <option value="en">🇬🇧 English</option>
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
                <a href="#explorar"
                    class="block px-3 py-2 text-base font-medium text-gray-700 hover:bg-terra hover:text-white rounded-md transition-colors">Explorar</a>
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
            <li><a href="#" class="text-terra hover:underline">Home</a></li>
            <li>/</li>
            <li aria-current="page">Bem-vindo</li>
        </ol>
    </nav>

    <!-- Hero Section -->
    <div class="relative overflow-hidden">
        <div class="wave-divider"></div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-12 pb-24 md:pt-20 md:pb-40 animate-fade-in">
            <div class="lg:grid lg:grid-cols-2 lg:gap-8 items-center">
                <div class="mb-12 lg:mb-0">
                    <h1 class="text-4xl md:text-5xl lg:text-6xl font-display font-bold text-gray-900 mb-6">
                        <span class="text-terra">Sabores</span> que contam<br>
                        <span class="text-oceano">histórias</span> moçambicanas
                    </h1>
                    <p class="text-lg md:text-xl text-gray-600 mb-8 max-w-lg">
                        Descubra a revolução gastronômica que está a redefinir a identidade culinária de Moçambique.
                        Receitas autênticas, técnicas modernas.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4">
                        <button
                            class="bg-terra text-white px-6 py-3 rounded-full font-medium hover:bg-opacity-90 transition-all shadow-lg hover:shadow-xl flex items-center justify-center transform hover:scale-105">
                            <span class="mr-2">👨‍🍳</span> Explorar Receitas
                        </button>
                        <button
                            class="border-2 border-terra text-terra px-6 py-3 rounded-full font-medium hover:bg-terra hover:text-white transition-all flex items-center justify-center transform hover:scale-105">
                            <span class="mr-2">🎥</span> Ver Demonstrações
                        </button>
                    </div>
                </div>
                <div class="relative">
                    <div
                        class="relative z-10 w-full h-64 md:h-80 lg:h-96 bg-terra rounded-3xl overflow-hidden shadow-2xl group">
                        <img src="https://images.unsplash.com/photo-1544025162-d76694265947?auto=format&fit=crop&w=800&q=80"
                            alt="Culinária Moçambicana"
                            class="w-full h-full object-cover opacity-90 group-hover:scale-105 transition-transform duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/40 via-transparent to-transparent">
                        </div>
                        <div class="absolute bottom-6 left-6 right-6">
                            <div
                                class="bg-white/90 backdrop-blur-sm p-4 rounded-xl shadow-md hover:shadow-lg transition-shadow">
                                <p class="text-sm text-gray-700 font-medium">Receita em Destaque</p>
                                <h3 class="font-display text-xl font-bold text-terra mt-1">Matapa Reimaginada</h3>
                                <p class="text-xs text-gray-600">Chef Jamal Timbana • Maputo</p>
                            </div>
                        </div>
                    </div>
                    <div
                        class="absolute -bottom-6 -right-6 z-0 w-32 h-32 bg-sol rounded-full opacity-20 animate-pulse">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Categorias -->
    <section id="explorar" class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <span
                    class="inline-block px-3 py-1 text-sm font-medium bg-folha text-white rounded-full mb-4 animate-bounce">Explorar</span>
                <h2 class="font-display text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                    <span class="text-terra">Caminhos</span> Gastronômicos
                </h2>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                    Navegue pela diversidade culinária através de diferentes percursos de descoberta.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="bg-folha rounded-2xl overflow-hidden shadow-lg card-hover group">
                    <div
                        class="h-48 bg-[url('https://images.unsplash.com/photo-1504674900247-0877df9cc836?auto=format&fit=crop&w=600&q=80')] bg-cover bg-center relative">
                        <div class="absolute inset-0 bg-folha/70 group-hover:bg-folha/60 transition-all duration-300">
                        </div>
                        <div
                            class="relative h-full flex flex-col justify-center items-center text-center p-6 text-white">
                            <span class="text-4xl mb-3 transform group-hover:scale-110 transition-transform">🌿</span>
                            <h3 class="text-xl font-bold mb-2">Raízes Tradicionais</h3>
                            <p class="text-sm opacity-90">Receitas que resistiram ao tempo</p>
                        </div>
                    </div>
                </div>

                <div class="bg-oceano rounded-2xl overflow-hidden shadow-lg card-hover group">
                    <div
                        class="h-48 bg-[url('https://images.unsplash.com/photo-1502741338009-cac2772e18bc?auto=format&fit=crop&w=600&q=80')] bg-cover bg-center relative">
                        <div
                            class="absolute inset-0 bg-oceano/70 group-hover:bg-oceano/60 transition-all duration-300">
                        </div>
                        <div
                            class="relative h-full flex flex-col justify-center items-center text-center p-6 text-white">
                            <span class="text-4xl mb-3 transform group-hover:scale-110 transition-transform">🌊</span>
                            <h3 class="text-xl font-bold mb-2">Costa & Mar</h3>
                            <p class="text-sm opacity-90">Sabores do litoral moçambicano</p>
                        </div>
                    </div>
                </div>

                <div class="bg-sol rounded-2xl overflow-hidden shadow-lg card-hover group">
                    <div
                        class="h-48 bg-[url('https://images.unsplash.com/photo-1563805042-7684c019e1cb?auto=format&fit=crop&w=600&q=80')] bg-cover bg-center relative">
                        <div class="absolute inset-0 bg-sol/70 group-hover:bg-sol/60 transition-all duration-300">
                        </div>
                        <div
                            class="relative h-full flex flex-col justify-center items-center text-center p-6 text-white">
                            <span class="text-4xl mb-3 transform group-hover:scale-110 transition-transform">✨</span>
                            <h3 class="text-xl font-bold mb-2">Fusão Moderna</h3>
                            <p class="text-sm opacity-90">Tradição encontra inovação</p>
                        </div>
                    </div>
                </div>

                <div class="bg-terra rounded-2xl overflow-hidden shadow-lg card-hover group">
                    <div
                        class="h-48 bg-[url('https://images.unsplash.com/photo-1551024709-8f23befc6f87?auto=format&fit=crop&w=600&q=80')] bg-cover bg-center relative">
                        <div class="absolute inset-0 bg-terra/70 group-hover:bg-terra/60 transition-all duration-300">
                        </div>
                        <div
                            class="relative h-full flex flex-col justify-center items-center text-center p-6 text-white">
                            <span
                                class="text-4xl mb-3 transform group-hover:scale-110 transition-transform">🧑‍🍳</span>
                            <h3 class="text-xl font-bold mb-2">Chefs Emergentes</h3>
                            <p class="text-sm opacity-90">A nova geração de talentos</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Receitas em Destaque -->
    <section class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row justify-between items-start md:items-end mb-12">
                <div>
                    <h2 class="font-display text-3xl md:text-4xl font-bold text-gray-900 mb-2">
                        <span class="text-terra">Tesouros</span> Culinários
                    </h2>
                    <p class="text-lg text-gray-600">Receitas que definem a essência moçambicana</p>
                </div>
                <button class="mt-4 md:mt-0 flex items-center text-terra font-medium hover:underline group">
                    Ver todas receitas
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="h-5 w-5 ml-1 transform group-hover:translate-x-1 transition-transform"
                        viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z"
                            clip-rule="evenodd" />
                    </svg>
                </button>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Receita 1 -->
                <div class="bg-white rounded-2xl overflow-hidden shadow-md card-hover group">
                    <div class="relative h-48 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1504674900247-0877df9cc836?auto=format&fit=crop&w=600&q=80"
                            alt="Matapa"
                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        <div
                            class="absolute top-4 left-4 bg-terra text-white px-2 py-1 rounded-full text-xs font-medium">
                            ⭐ Clássico</div>
                        <div
                            class="absolute bottom-0 left-0 right-0 h-16 bg-gradient-to-t from-black/70 to-transparent">
                        </div>
                        <div class="absolute bottom-4 left-4 text-white font-medium">Maputo • 45 min</div>
                    </div>
                    <div class="p-6">
                        <div class="flex justify-between items-start mb-3">
                            <h3 class="text-xl font-bold text-gray-900">Matapa Gourmet</h3>
                            <span class="bg-folha/20 text-folha px-2 py-1 rounded-full text-xs">Vegetariano</span>
                        </div>
                        <p class="text-gray-600 text-sm mb-4">Folhas de mandioca reinventadas com técnicas
                            contemporâneas</p>
                        <div class="flex justify-between items-center">
                            <div class="flex items-center">
                                <img src="https://randomuser.me/api/portraits/women/42.jpg" alt="Chef Amina"
                                    class="w-6 h-6 rounded-full mr-2 border-2 border-white shadow-sm">
                                <span class="text-xs text-gray-500">Chef Amina</span>
                            </div>
                            <button class="text-terra text-sm font-medium hover:underline flex items-center group">
                                Ver receita
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="h-4 w-4 ml-1 transform group-hover:translate-x-1 transition-transform"
                                    viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                        clip-rule="evenodd" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Receita 2 -->
                <div class="bg-white rounded-2xl overflow-hidden shadow-md card-hover group">
                    <div class="relative h-48 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1502741338009-cac2772e18bc?auto=format&fit=crop&w=600&q=80"
                            alt="Camarão"
                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        <div
                            class="absolute top-4 left-4 bg-oceano text-white px-2 py-1 rounded-full text-xs font-medium">
                            🌊 Costeiro</div>
                        <div
                            class="absolute bottom-0 left-0 right-0 h-16 bg-gradient-to-t from-black/70 to-transparent">
                        </div>
                        <div class="absolute bottom-4 left-4 text-white font-medium">Inhambane • 30 min</div>
                    </div>
                    <div class="p-6">
                        <div class="flex justify-between items-start mb-3">
                            <h3 class="text-xl font-bold text-gray-900">Camarão à Zambeziana</h3>
                            <span class="bg-sol/20 text-sol px-2 py-1 rounded-full text-xs">Picante</span>
                        </div>
                        <p class="text-gray-600 text-sm mb-4">Camarões com leite de coco e piri-piri, uma explosão de
                            sabores</p>
                        <div class="flex justify-between items-center">
                            <div class="flex items-center">
                                <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Chef Carlos"
                                    class="w-6 h-6 rounded-full mr-2 border-2 border-white shadow-sm">
                                <span class="text-xs text-gray-500">Chef Carlos</span>
                            </div>
                            <button class="text-terra text-sm font-medium hover:underline flex items-center group">
                                Ver receita
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="h-4 w-4 ml-1 transform group-hover:translate-x-1 transition-transform"
                                    viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                        clip-rule="evenodd" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Receita 3 -->
                <div class="bg-white rounded-2xl overflow-hidden shadow-md card-hover group">
                    <div class="relative h-48 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1563805042-7684c019e1cb?auto=format&fit=crop&w=600&q=80"
                            alt="Sobremesa"
                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        <div
                            class="absolute top-4 left-4 bg-sol text-white px-2 py-1 rounded-full text-xs font-medium">
                            🍬 Doce</div>
                        <div
                            class="absolute bottom-0 left-0 right-0 h-16 bg-gradient-to-t from-black/70 to-transparent">
                        </div>
                        <div class="absolute bottom-4 left-4 text-white font-medium">Nampula • 60 min</div>
                    </div>
                    <div class="p-6">
                        <div class="flex justify-between items-start mb-3">
                            <h3 class="text-xl font-bold text-gray-900">Bolo de Caju Caramelizado</h3>
                            <span class="bg-terra/20 text-terra px-2 py-1 rounded-full text-xs">Sobremesa</span>
                        </div>
                        <p class="text-gray-600 text-sm mb-4">Reinvenção do clássico com cajus locais e toques modernos
                        </p>
                        <div class="flex justify-between items-center">
                            <div class="flex items-center">
                                <img src="https://randomuser.me/api/portraits/women/68.jpg" alt="Chef Luísa"
                                    class="w-6 h-6 rounded-full mr-2 border-2 border-white shadow-sm">
                                <span class="text-xs text-gray-500">Chef Luísa</span>
                            </div>
                            <button class="text-terra text-sm font-medium hover:underline flex items-center group">
                                Ver receita
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="h-4 w-4 ml-1 transform group-hover:translate-x-1 transition-transform"
                                    viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                        clip-rule="evenodd" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Seção de Destaque -->
    <section class="py-16 relative">
        <div class="absolute inset-0 bg-terra opacity-5 z-0"></div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div
                class="bg-white rounded-3xl shadow-xl overflow-hidden group hover:shadow-2xl transition-shadow duration-300">
                <div class="md:flex">
                    <div class="md:w-1/2 p-8 md:p-12 lg:p-16">
                        <span
                            class="inline-block px-3 py-1 text-sm font-medium bg-terra text-white rounded-full mb-4">Destaque</span>
                        <h2 class="font-display text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                            <span class="text-terra">Galinha à</span> Zambeziana Reimaginada
                        </h2>
                        <p class="text-lg text-gray-600 mb-6">
                            O clássico moçambicano revisitado pelo premiado Chef Jamal Timbana, combinando técnicas
                            contemporâneas com ingredientes locais.
                        </p>
                        <div class="grid grid-cols-2 gap-4 mb-8">
                            <div class="bg-gray-50 p-4 rounded-lg hover:bg-gray-100 transition-colors">
                                <p class="text-sm text-gray-500">Tempo</p>
                                <p class="font-medium">50 min</p>
                            </div>
                            <div class="bg-gray-50 p-4 rounded-lg hover:bg-gray-100 transition-colors">
                                <p class="text-sm text-gray-500">Dificuldade</p>
                                <p class="font-medium">Médio</p>
                            </div>
                        </div>
                        <button
                            class="bg-terra text-white px-6 py-3 rounded-full font-medium hover:bg-opacity-90 transition-all shadow-md hover:shadow-lg flex items-center transform hover:scale-105">
                            <span class="mr-2">👨‍🍳</span> Ver Receita Completa
                        </button>
                    </div>
                    <div class="md:w-1/2 relative">
                        <img src="https://images.unsplash.com/photo-1544025162-d76694265947?auto=format&fit=crop&w=800&q=80"
                            alt="Galinha à Zambeziana"
                            class="w-full h-full object-cover min-h-64 md:min-h-full group-hover:scale-105 transition-transform duration-500">
                        <div
                            class="absolute bottom-6 left-6 bg-white/90 backdrop-blur-sm p-3 rounded-lg shadow-md flex items-center hover:shadow-lg transition-shadow">
                            <img src="https://randomuser.me/api/portraits/men/76.jpg" alt="Chef Jamal"
                                class="w-10 h-10 rounded-full mr-3 border-2 border-terra">
                            <div>
                                <p class="text-xs text-gray-500">Receita por</p>
                                <p class="font-medium text-terra">Chef Jamal Timbana</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Comunidade -->
    <section id="comunidade" class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <span
                    class="inline-block px-3 py-1 text-sm font-medium bg-oceano text-white rounded-full mb-4">Comunidade</span>
                <h2 class="font-display text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                    <span class="text-terra">Conecte-se</span> com outros apaixonados
                </h2>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                    Partilhe experiências, tire dúvidas e descubra novas amizades na nossa vibrante comunidade.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Card 1 -->
                <div class="bg-gray-50 rounded-2xl p-8 card-hover group">
                    <div class="text-oceano text-4xl mb-6">💬</div>
                    <h3 class="text-xl font-bold mb-3">Fórum Gastronômico</h3>
                    <p class="text-gray-600 mb-6">Discuta técnicas, ingredientes e tradições com entusiastas e
                        profissionais.</p>
                    <button class="text-oceano text-sm font-medium hover:underline flex items-center group">
                        Participar
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="h-4 w-4 ml-1 transform group-hover:translate-x-1 transition-transform"
                            viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                clip-rule="evenodd" />
                        </svg>
                    </button>
                </div>

                <!-- Card 2 -->
                <div class="bg-gray-50 rounded-2xl p-8 card-hover group">
                    <div class="text-terra text-4xl mb-6">👨‍🍳</div>
                    <h3 class="text-xl font-bold mb-3">Aulas ao Vivo</h3>
                    <p class="text-gray-600 mb-6">Aprenda com chefs moçambicanos em sessões interativas semanais.</p>
                    <button class="text-terra text-sm font-medium hover:underline flex items-center group">
                        Agendar
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="h-4 w-4 ml-1 transform group-hover:translate-x-1 transition-transform"
                            viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                clip-rule="evenodd" />
                        </svg>
                    </button>
                </div>

                <!-- Card 3 -->
                <div class="bg-gray-50 rounded-2xl p-8 card-hover group">
                    <div class="text-folha text-4xl mb-6">🏆</div>
                    <h3 class="text-xl font-bold mb-3">Desafios Mensais</h3>
                    <p class="text-gray-600 mb-6">Participe dos nossos desafios culinários e mostre sua criatividade.
                    </p>
                    <button class="text-folha text-sm font-medium hover:underline flex items-center group">
                        Competir
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="h-4 w-4 ml-1 transform group-hover:translate-x-1 transition-transform"
                            viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                clip-rule="evenodd" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- Eventos -->
    <section id="eventos" class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <span
                    class="inline-block px-3 py-1 text-sm font-medium bg-sol text-white rounded-full mb-4">Eventos</span>
                <h2 class="font-display text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                    <span class="text-terra">Experiências</span> Gastronômicas
                </h2>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                    Descubra eventos, festivais e workshops que celebram a culinária moçambicana.
                </p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <!-- Evento 1 -->
                <div class="bg-white rounded-2xl overflow-hidden shadow-lg card-hover">
                    <div class="md:flex">
                        <div class="md:w-1/3 bg-terra flex items-center justify-center p-6">
                            <div class="text-center text-white">
                                <div class="text-4xl font-bold">15</div>
                                <div class="text-lg font-medium">OUT</div>
                                <div class="text-sm">2023</div>
                            </div>
                        </div>
                        <div class="md:w-2/3 p-6">
                            <h3 class="text-xl font-bold mb-2">Festival Sabores do Índico</h3>
                            <p class="text-gray-600 text-sm mb-4">Maputo • 10:00 - 20:00</p>
                            <p class="text-gray-600 mb-4">O maior festival de gastronomia costeira de Moçambique, com
                                chefs de todo o país.</p>
                            <button class="text-terra text-sm font-medium hover:underline flex items-center group">
                                Mais informações
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="h-4 w-4 ml-1 transform group-hover:translate-x-1 transition-transform"
                                    viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                        clip-rule="evenodd" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Evento 2 -->
                <div class="bg-white rounded-2xl overflow-hidden shadow-lg card-hover">
                    <div class="md:flex">
                        <div class="md:w-1/3 bg-oceano flex items-center justify-center p-6">
                            <div class="text-center text-white">
                                <div class="text-4xl font-bold">28</div>
                                <div class="text-lg font-medium">NOV</div>
                                <div class="text-sm">2023</div>
                            </div>
                        </div>
                        <div class="md:w-2/3 p-6">
                            <h3 class="text-xl font-bold mb-2">Workshop de Piri-Piri Artesanal</h3>
                            <p class="text-gray-600 text-sm mb-4">Beira • 14:00 - 17:00</p>
                            <p class="text-gray-600 mb-4">Aprenda a criar seus próprios molhos de piri-piri com
                                técnicas tradicionais.</p>
                            <button class="text-oceano text-sm font-medium hover:underline flex items-center group">
                                Mais informações
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="h-4 w-4 ml-1 transform group-hover:translate-x-1 transition-transform"
                                    viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                        clip-rule="evenodd" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="text-center mt-12">
                <button
                    class="inline-flex items-center px-6 py-3 border border-terra text-terra rounded-full font-medium hover:bg-terra hover:text-white transition-colors">
                    Ver todos eventos
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" viewBox="0 0 20 20"
                        fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v3.586L7.707 9.293a1 1 0 00-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L11 10.586V7z"
                            clip-rule="evenodd" />
                    </svg>
                </button>
            </div>
        </div>
    </section>

    <!-- Newsletter -->
    <section class="py-16 bg-terra text-white">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="font-display text-3xl md:text-4xl font-bold mb-6">
                Mantenha-se atualizado com as últimas tendências
            </h2>
            <p class="text-lg opacity-90 mb-8 max-w-2xl mx-auto">
                Subscreva nossa newsletter e receba receitas exclusivas, dicas de chefs e notícias sobre eventos
                gastronômicos.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 max-w-md mx-auto">
                <input type="email" placeholder="Seu e-mail"
                    class="flex-grow px-4 py-3 rounded-full text-gray-900 focus:outline-none focus:ring-2 focus:ring-white">
                <button
                    class="bg-white text-terra px-6 py-3 rounded-full font-medium hover:bg-opacity-90 transition-all shadow-md hover:shadow-lg">
                    Subscrever
                </button>
            </div>
            <p class="text-xs opacity-70 mt-4">
                Respeitamos sua privacidade. Nunca compartilharemos seu e-mail.
            </p>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white pt-16 pb-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8 mb-12">
                <div>
                    <h3 class="text-lg font-bold mb-4 text-terra">Sabores</h3>
                    <p class="text-gray-400 text-sm">
                        A revolução gastronômica moçambicana, celebrando tradição e inovação.
                    </p>
                </div>
                <div>
                    <h3 class="text-lg font-bold mb-4">Explorar</h3>
                    <ul class="space-y-2">
                        <li><a href="#"
                                class="text-gray-400 hover:text-white text-sm transition-colors">Receitas</a></li>
                        <li><a href="#"
                                class="text-gray-400 hover:text-white text-sm transition-colors">Chefs</a></li>
                        <li><a href="#"
                                class="text-gray-400 hover:text-white text-sm transition-colors">Técnicas</a></li>
                        <li><a href="#"
                                class="text-gray-400 hover:text-white text-sm transition-colors">Ingredientes</a></li>
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
                        <li><a href="#"
                                class="text-gray-400 hover:text-white text-sm transition-colors">Blog</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-lg font-bold mb-4">Legal</h3>
                    <ul class="space-y-2">
                        <li><a href="#"
                                class="text-gray-400 hover:text-white text-sm transition-colors">Termos</a></li>
                        <li><a href="#"
                                class="text-gray-400 hover:text-white text-sm transition-colors">Privacidade</a></li>
                        <li><a href="#"
                                class="text-gray-400 hover:text-white text-sm transition-colors">Cookies</a></li>
                        <li><a href="#"
                                class="text-gray-400 hover:text-white text-sm transition-colors">Contactos</a></li>
                    </ul>
                </div>
            </div>
            <div class="border-t border-gray-800 pt-8">
                <div class="flex flex-col md:flex-row justify-between items-center">
                    <div class="flex items-center mb-4 md:mb-0">
                        <span class="text-2xl mr-2">🌶️</span>
                        <span class="font-bold text-terra">Sabores</span>
                    </div>
                    <div class="flex space-x-6 mb-4 md:mb-0">
                        <a href="#" aria-label="Facebook"
                            class="text-gray-400 hover:text-white transition-colors">
                            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" />
                            </svg>
                        </a>
                        <a href="#" aria-label="Instagram"
                            class="text-gray-400 hover:text-white transition-colors">
                            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z" />
                            </svg>
                        </a>
                        <a href="#" aria-label="YouTube"
                            class="text-gray-400 hover:text-white transition-colors">
                            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z" />
                            </svg>
                        </a>
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

            // Toggle icon
            if (!expanded) {
                this.innerHTML = `
                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                `;
            } else {
                this.innerHTML = `
                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                `;
            }
        });

        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();

                const targetId = this.getAttribute('href');
                if (targetId === '#') return;

                const targetElement = document.querySelector(targetId);
                if (targetElement) {
                    targetElement.scrollIntoView({
                        behavior: 'smooth'
                    });

                    // Close mobile menu if open
                    const mobileMenu = document.getElementById('mobile-menu');
                    const menuButton = document.getElementById('mobile-menu-button');
                    if (!mobileMenu.classList.contains('hidden')) {
                        mobileMenu.classList.add('hidden');
                        menuButton.setAttribute('aria-expanded', 'false');
                        menuButton.innerHTML = `
                            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            </svg>
                        `;
                    }
                }
            });
        });

        // Language selector change
        document.querySelector('nav select').addEventListener('change', function() {
            // In a real app, this would change the language
            console.log('Language changed to:', this.value);
        });

        // Animation on scroll
        const animateOnScroll = () => {
            const elements = document.querySelectorAll('.animate-fade-in, .card-hover');

            elements.forEach(element => {
                const elementPosition = element.getBoundingClientRect().top;
                const screenPosition = window.innerHeight / 1.2;

                if (elementPosition < screenPosition) {
                    element.classList.add('animate__animated', 'animate__fadeInUp');
                }
            });
        };

        window.addEventListener('scroll', animateOnScroll);
        window.addEventListener('load', animateOnScroll);
    </script>
</body>

</html>
