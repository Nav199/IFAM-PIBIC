
function buscarEndereco() {
    const cep = document.getElementById('cep').value;
    if (cep.length === 8) {
        axios.get(`https://viacep.com.br/ws/${cep}/json/`)
        .then(response => {
            const data = response.data;
            if (!data.erro) {
                document.getElementById('localidade').value = `${data.localidade}/${data.uf}`;
                document.getElementById('bairroDistrito').value = data.bairro;
                document.getElementById('logradouro').value = data.logradouro;
                document.getElementById('numero').focus();
            } else {
                alert('CEP não encontrado');
            }
        })
        .catch(error => {
            console.error(error);
        });
    }
}

function validateForm() {
    var nomeEmpresa = document.getElementById('nomeEmpresa');
    var cnpjCpf = document.getElementById('cnpjCpf');
    var setorAtividade = document.getElementById('setorAtividade');
    var formaJuridica = document.getElementById('FormaJuridica');
    var enquadramentoTributario = document.getElementById('enquadramentoTributario');
    var cep = document.getElementById('cep');
    var localidade = document.getElementById('localidade');
    var bairroDistrito = document.getElementById('bairroDistrito');
    var logradouro = document.getElementById('logradouro');
    var numero = document.getElementById('numero');
    var missaoEmpresa = document.getElementById('missaoEmpresa');
    var valoresEmpresa = document.getElementById('valoresEmpresa');
    var visaoEmpresa = document.getElementById('visaoEmpresa');
    var fonteRecursos = document.getElementById('fonteRecursos');

    // Remove a classe de erro de todos os campos
    var allFields = [nomeEmpresa, cnpjCpf, setorAtividade, formaJuridica, enquadramentoTributario, cep, localidade, bairroDistrito, logradouro, numero, missaoEmpresa, valoresEmpresa, visaoEmpresa, fonteRecursos];
    allFields.forEach(function (field) {
        field.classList.remove('error');
    });

    var hasError = false;

    // Verifica se cada campo obrigatório está preenchido
    if (nomeEmpresa.value === '') {
        nomeEmpresa.classList.add('error');
        hasError = true;
    }
    if (cnpjCpf.value === '') {
        cnpjCpf.classList.add('error');
        hasError = true;
    }
    if (setorAtividade.value === '') {
        setorAtividade.classList.add('error');
        hasError = true;
    }
    if (formaJuridica.value === 'Forma Jurídica') {
        formaJuridica.classList.add('error');
        hasError = true;
    }
    if (enquadramentoTributario.value === 'Optante pelo Simples') {
        enquadramentoTributario.classList.add('error');
        hasError = true;
    }
    if (cep.value === '') {
        cep.classList.add('error');
        hasError = true;
    }
    if (localidade.value === '') {
        localidade.classList.add('error');
        hasError = true;
    }
    if (bairroDistrito.value === '') {
        bairroDistrito.classList.add('error');
        hasError = true;
    }
    if (logradouro.value === '') {
        logradouro.classList.add('error');
        hasError = true;
    }
    if (numero.value === '') {
        numero.classList.add('error');
        hasError = true;
    }
    if (missaoEmpresa.value === '') {
        missaoEmpresa.classList.add('error');
        hasError = true;
    }
    if (valoresEmpresa.value === '') {
        valoresEmpresa.classList.add('error');
        hasError = true;
    }
    if (visaoEmpresa.value === '') {
        visaoEmpresa.classList.add('error');
        hasError = true;
    }
    if (fonteRecursos.value === '') {
        fonteRecursos.classList.add('error');
        hasError = true;
    }

    if (hasError) {
        alert('Por favor, preencha todos os campos do formulário.');
        return false; // Impede o envio do formulário
    }
    return true; // Permite o envio do formulário se todos os campos estiverem preenchidos
}