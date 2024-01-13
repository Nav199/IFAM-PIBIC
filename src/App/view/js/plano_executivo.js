var contadorSocios = 0;

function adicionarSocio() {
    contadorSocios++;
    var sociosContainer = document.getElementById("sociosContainer");

    var novoSocio = document.createElement("div");
    novoSocio.innerHTML = `
        <div class="form-group mb-3">
            <label for="nomeSocio${contadorSocios}" class="white-label">Nome do Sócio</label>
            <input type="text" class="form-control custom-input" id="nomeSocio${contadorSocios}" name="nomeSocio${contadorSocios}" placeholder="Nome do Sócio">
        </div>
        <div class="form-group mb-3">
            <label for="cidadeSocio${contadorSocios}" class="white-label">Cidade do Sócio</label>
            <input type="text" class="form-control custom-input" id="cidadeSocio${contadorSocios}" name="cidadeSocio${contadorSocios}" placeholder="Cidade do Sócio">
        </div>
        <div class="form-group mb-3">
            <label for="estadoSocio${contadorSocios}" class="white-label">Estado do Sócio</label>
            <input type="text" class="form-control custom-input" id="estadoSocio${contadorSocios}" name="estadoSocio${contadorSocios}" placeholder="Estado do Sócio">
        </div>
        <div class="form-group mb-3">
            <label for="capitalInvestido${contadorSocios}" class="white-label">Capital Investido pelo Sócio</label>
            <input type="text" class="form-control custom-input" id="capitalInvestido${contadorSocios}" name="capitalInvestido${contadorSocios}" placeholder="Capital Investido pelo Sócio">
        </div>
    `;

    sociosContainer.appendChild(novoSocio);
    document.getElementById("formularioSocios").style.display = "block";
}