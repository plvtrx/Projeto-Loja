let slideIndex = 0; // Índice do slide atual
let startX = 0; // Posição inicial do toque
let endX = 0; // Posição final do toque

function showSlides() {
    const slides = document.getElementsByClassName("carrossel-item");
    const bolinhas = document.getElementsByClassName("bolinha");

    // Verifica se há slides e bolinhas
    if (slides.length === 0 || bolinhas.length === 0) {
        console.error("Nenhum slide ou bolinha encontrada.");
        return; // Sai da função se não houver slides ou bolinhas
    }

    // Esconde todos os slides e remove a classe ativa das bolinhas
    for (let i = 0; i < slides.length; i++) {
        slides[i].style.display = "none"; // Esconde todos os slides instantaneamente
        bolinhas[i].classList.remove("active"); // Remove a classe ativa de todas as bolinhas
    }

    // Mostra o slide atual
    slides[slideIndex].style.display = "flex"; // Mostra o slide atual
    bolinhas[slideIndex].classList.add("active"); // Adiciona a classe ativa à bolinha atual
}

// Mover para o próximo ou anterior
function moveSlide(n) {
    const slides = document.getElementsByClassName("carrossel-item");
    
    // Atualiza o índice do slide
    slideIndex += n;

    // Verificação para manter o slideIndex dentro do intervalo
    if (slideIndex >= slides.length) {
        slideIndex = 0; // Retorna ao primeiro slide
    } else if (slideIndex < 0) {
        slideIndex = slides.length - 1; // Retorna ao último slide
    }

    showSlides(); // Atualiza os slides e as bolinhas
}

// Inicializa o carrossel
showSlides();

// Muda automaticamente a cada 10 segundos
setInterval(() => {
    moveSlide(1); // Muda para o próximo slide
}, 10000); // Muda a cada 10 segundos

// Funções para detectar o arrasto
const carrosselContainer = document.querySelector('.carrossel-container');

carrosselContainer.addEventListener('touchstart', (event) => {
    startX = event.touches[0].clientX; // Captura a posição inicial do toque
});

carrosselContainer.addEventListener('touchmove', (event) => {
    endX = event.touches[0].clientX; // Captura a posição final do toque
});

carrosselContainer.addEventListener('touchend', () => {
    if (startX > endX + 50) {
        moveSlide(1); // Move para o próximo slide
    } else if (startX + 50 < endX) {
        moveSlide(-1); // Move para o slide anterior
    }
});
