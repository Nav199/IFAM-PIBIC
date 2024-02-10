// Função para validar o CPF
function validarCPF(cpf) {
    cpf = cpf.replace(/[^\d]+/g, ''); // Remove caracteres não numéricos

    // Verifica se todos os dígitos são iguais
    if (cpf.match(/(\d)\1{10}/)) {
        return false;
    }

    // Calcula o primeiro dígito verificador
    let soma = 0;
    for (let i = 0; i < 9; i++) {
        soma += parseInt(cpf.charAt(i)) * (10 - i);
    }
    let digito1 = 11 - (soma % 11);
    if (digito1 > 9) digito1 = 0;

    // Verifica o primeiro dígito verificador
    if (parseInt(cpf.charAt(9)) !== digito1) {
        return false;
    }

    // Calcula o segundo dígito verificador
    soma = 0;
    for (let i = 0; i < 10; i++) {
        soma += parseInt(cpf.charAt(i)) * (11 - i);
    }
    let digito2 = 11 - (soma % 11);
    if (digito2 > 9) digito2 = 0;

    // Verifica o segundo dígito verificador
    if (parseInt(cpf.charAt(10)) !== digito2) {
        return false;
    }

    // Se todas as verificações passaram, o CPF é válido
    return true;
}

// Função para validar o formato do e-mail
function validarEmail(email) {
    // Expressão regular para validar o formato do e-mail
    const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return regex.test(email);
}

// Adicionando validação em tempo real para o campo de e-mail
document.addEventListener('DOMContentLoaded', function () {
    const emailInput = document.getElementById('email');
    const emailError = document.getElementById('emailHelp');

    emailInput.addEventListener('input', function () {
        const email = this.value.trim();
        if (validarEmail(email)) {
            emailError.textContent = 'Email Correto';
            emailError.style.color = 'green';
        } else {
            emailError.textContent = 'Email Incorreto';
            emailError.style.color = 'red';
        }
    });

    const nomeInput = document.getElementById('nome');
    const nomeError = document.getElementById('nomeHelp');

    nomeInput.addEventListener('input', function () {
        const nome = this.value.trim();
        if (nome !== '') {
            nomeError.textContent = 'Nome correto';
            nomeError.style.color = 'green';
        } else {
            nomeError.textContent = 'Nome incorreto';
            nomeError.style.color = 'red';
        }
    });

    const cpfInput = document.getElementById('cpf');
    const cpfError = document.getElementById('cpfHelp');

    cpfInput.addEventListener('input', function () {
        const cpf = this.value.trim();
        if (validarCPF(cpf)) {
            cpfError.textContent = 'Cpf correto';
            cpfError.style.color = 'green';
        } else {
            cpfError.textContent = 'Cpf incorreto';
            cpfError.style.color = 'red';
        }
    });
});
