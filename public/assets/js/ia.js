// Modal para gerar receita com IA
const aiRecipeModal = document.getElementById('ai-recipe-modal');
const generateAiBtn = document.getElementById('generate-ai-recipe-btn');
const closeAiModal = document.getElementById('close-ai-modal');
const generateRecipeBtn = document.getElementById('generate-recipe-btn');

// Abrir modal
generateAiBtn.addEventListener('click', () => {
    aiRecipeModal.classList.remove('hidden');
});

// Fechar modal
closeAiModal.addEventListener('click', () => {
    aiRecipeModal.classList.add('hidden');
});


document.addEventListener('click', (event) => {
    if (event.target === aiRecipeModal) {
        aiRecipeModal.classList.add('hidden');
    }
});



// Loading animation
// Dicas aleatórias para mostrar enquanto a IA "pensa"
const aiTips = [
    "Analisando combinações de sabores tradicionais...",
    "Calculando tempos de cozimento perfeitos...",
    "Selecionando os melhores ingredientes locais...",
    "Revisando técnicas culinárias moçambicanas...",
    "Criando um toque especial para sua receita...",
    "Adaptando para o seu gosto pessoal..."
];

// Função para mostrar o loading com animação
function showAILoading() {
    const aiLoading = document.getElementById('ai-loading');
    const progressBar = document.querySelector('.ai-progress');
    const aiTipElement = document.getElementById('ai-tip');

    // Resetar animação
    progressBar.style.width = '0%';
    progressBar.style.animation = 'none';
    void progressBar.offsetWidth; // Trigger reflow
    progressBar.style.animation = 'progressAnim 3s infinite ease-in-out';

    // Mostrar dica aleatória
    aiTipElement.textContent = aiTips[Math.floor(Math.random() * aiTips.length)];

    // Mudar dica a cada 3 segundos
    const tipInterval = setInterval(() => {
        aiTipElement.textContent = aiTips[Math.floor(Math.random() * aiTips.length)];
    }, 3000);

    aiLoading.classList.remove('hidden');

    return {
        hide: () => {
            clearInterval(tipInterval);
            aiLoading.classList.add('hidden');
        }
    };
}

// Atualize a função de gerar receita para usar o novo loading
// generateRecipeBtn.addEventListener('click', () => {
//     const recipeTitle = document.getElementById('ai-recipe-title').value.trim();

//     if (!recipeTitle) {
//         showNotification('Por favor', 'Digite o que deseja cozinhar', 'error');
//         return;
//     }

//     // Mostrar loading
//     generateRecipeBtn.disabled = true;
//     aiRecipeModal.classList.add('hidden');
// });


// Show loading when the page is submiting something.
document.getElementById("generate-recipe-form").addEventListener("submit", () => {
    showAILoading();
});
