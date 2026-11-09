function toggleForms() {
    const loginForm = document.getElementById('loginForm');
    const registerForm = document.getElementById('registerForm');

    if (loginForm.style.display === 'none') {
        loginForm.style.display = 'flex';
        registerForm.style.display = 'none';
        loginForm.style.backgroundColor = '#1F2B13'; // Cor de fundo do login
        registerForm.style.backgroundColor = '#d1caca'; // Cor de fundo do registro
    } else {
        loginForm.style.display = 'none';
        registerForm.style.display = 'flex';
        loginForm.style.backgroundColor = '#d1caca'; // Cor de fundo do login
        registerForm.style.backgroundColor = '#1F2B13'; // Cor de fundo do registro
    }
}

// ----------------------Remove Senha incorreta-----------------------------
const errorMessage = document.getElementById('error-message');

const submit = document.getElementById('submit');

if (!submit && errorMessage) {
    errorMessage.style.display = 'none'; // Faz a mensagem desaparecer gradualmente
} else {
    // Define um temporizador para remover a mensagem após 5 segundos
    setTimeout(() => {
        errorMessage.style.opacity = '0'; // Faz a mensagem desaparecer gradualmente
        setTimeout(() => {
            errorMessage.remove(); // Remove o elemento do DOM
        }, 500); // Tempo para a animação de desaparecimento
    }, 5000); // 5 segundos
}