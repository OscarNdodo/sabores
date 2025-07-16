<!DOCTYPE html>
<html lang="pt-MZ" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Crie sua conta - Sabores Moçambique">
    <title>Criar Conta - Sabores Moçambique</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#e53e3e',
                        primaryLight: '#feb2b2',
                    }
                }
            }
        }
    </script>
</head>
<body class="min-h-screen bg-gray-100 flex items-center justify-center p-4">
    <div class="w-full max-w-md mx-auto">
        <div class="text-center mb-8">
            <h1 class="text-3xl font-bold mb-2">🌶️ Sabores</h1>
            <p class="text-gray-600">Crie sua conta para começar</p>
        </div>
        
        <div class="bg-white rounded-lg shadow-sm overflow-hidden p-6 sm:p-8">
            <form class="space-y-4">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label for="first-name" class="block text-sm font-medium text-gray-700 mb-1">Nome</label>
                        <input 
                            type="text" 
                            id="first-name" 
                            class="w-full px-4 py-3 border border-gray-200 rounded-md focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition" 
                            placeholder="Seu nome" 
                            required
                        >
                    </div>
                    <div>
                        <label for="last-name" class="block text-sm font-medium text-gray-700 mb-1">Sobrenome</label>
                        <input 
                            type="text" 
                            id="last-name" 
                            class="w-full px-4 py-3 border border-gray-200 rounded-md focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition" 
                            placeholder="Seu sobrenome" 
                            required
                        >
                    </div>
                </div>
                
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                    <input 
                        type="email" 
                        id="email" 
                        class="w-full px-4 py-3 border border-gray-200 rounded-md focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition" 
                        placeholder="seu@email.com" 
                        required
                    >
                </div>
                
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Senha</label>
                    <input 
                        type="password" 
                        id="password" 
                        class="w-full px-4 py-3 border border-gray-200 rounded-md focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition" 
                        placeholder="••••••••" 
                        required
                        oninput="updatePasswordStrength()"
                    >
                    <div class="h-1 bg-gray-200 rounded-full mt-2 overflow-hidden">
                        <div id="password-strength-bar" class="h-full bg-primary transition-all duration-300" style="width: 0%"></div>
                    </div>
                    <p class="mt-1 text-xs text-gray-500">Mínimo 8 caracteres com letras e números</p>
                </div>
                
                <div>
                    <label for="confirm-password" class="block text-sm font-medium text-gray-700 mb-1">Confirme a senha</label>
                    <input 
                        type="password" 
                        id="confirm-password" 
                        class="w-full px-4 py-3 border border-gray-200 rounded-md focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition" 
                        placeholder="••••••••" 
                        required
                    >
                </div>
                
                <div class="flex items-start">
                    <input 
                        type="checkbox" 
                        id="terms" 
                        class="mt-1 rounded text-primary focus:ring-primary" 
                        required
                    >
                    <label for="terms" class="ml-2 block text-sm text-gray-700">
                        Concordo com os <a href="#" class="text-primary font-medium hover:underline">Termos de Serviço</a> e <a href="#" class="text-primary font-medium hover:underline">Política de Privacidade</a>
                    </label>
                </div>
                
                <button 
                    type="submit" 
                    class="w-full bg-primary hover:bg-red-700 text-white font-medium py-3 px-6 rounded-md transition duration-200"
                >
                    Criar Conta
                </button>
                
                <div class="flex items-center my-4">
                    <div class="flex-grow border-t border-gray-200"></div>
                    <span class="mx-4 text-sm text-gray-500">ou</span>
                    <div class="flex-grow border-t border-gray-200"></div>
                </div>
                
                <button 
                    type="button" 
                    class="w-full flex items-center justify-center gap-2 bg-white border border-gray-300 rounded-md py-3 px-4 text-sm font-medium hover:bg-gray-50 transition"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M12.545 10.239v3.821h5.445c-0.712 2.315-2.647 3.972-5.445 3.972-3.332 0-6.033-2.701-6.033-6.032s2.701-6.032 6.033-6.032c1.498 0 2.866 0.549 3.921 1.453l2.814-2.814c-1.786-1.667-4.167-2.698-6.735-2.698-5.522 0-10 4.477-10 10s4.478 10 10 10c8.396 0 10-7.496 10-9.808 0-0.659-0.065-1.163-0.145-1.667h-9.855z"/>
                    </svg>
                    <span>Continuar com Google</span>
                </button>
            </form>
            
            <div class="mt-6 text-center text-sm">
                <p class="text-gray-600">Já tem uma conta? <a href="#" class="text-primary font-medium hover:underline">Faça login</a></p>
            </div>
        </div>
        
        <div class="mt-8 text-center text-sm text-gray-500">
            <p>© 2023 Sabores Moçambique. Todos direitos reservados.</p>
        </div>
    </div>

    <script>
        function updatePasswordStrength() {
            const password = document.getElementById('password').value;
            const strengthBar = document.getElementById('password-strength-bar');
            let strength = 0;
            
            // Verifica o comprimento da senha
            if (password.length > 7) strength += 20;
            if (password.length > 11) strength += 20;
            
            // Verifica caracteres diversos
            if (password.match(/[a-z]/)) strength += 20;
            if (password.match(/[A-Z]/)) strength += 20;
            if (password.match(/[0-9]/)) strength += 10;
            if (password.match(/[^a-zA-Z0-9]/)) strength += 10;
            
            // Limita a 100%
            strength = Math.min(strength, 100);
            
            // Atualiza a barra visual
            strengthBar.style.width = strength + '%';
            
            // Atualiza a cor baseada na força
            if (strength < 40) {
                strengthBar.style.backgroundColor = '#e53e3e'; // Vermelho
            } else if (strength < 70) {
                strengthBar.style.backgroundColor = '#ed8936'; // Laranja
            } else {
                strengthBar.style.backgroundColor = '#38a169'; // Verde
            }
        }
    </script>
</body>
</html>