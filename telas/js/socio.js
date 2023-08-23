let contadorSocios = 0;
const SociosData = [];
function adicionarSocio() {
  const sociosContainer = document.getElementById('sociosContainer');

  const divSocio = document.createElement('div');
  divSocio.className = 'card mb-3';
  divSocio.innerHTML = `
    <div class="card-header">
      Sócio
    </div>
    <div class="card-body">
      <div class="form-row">
        <div class="col-md-4 mb-3">
          <label for="idUsuario">ID do Usuário</label>
          <input type="text" class="form-control" id="idUsuario" name="idUsuario" value=<?php echo isset($_GET['id']) ? $_GET['id'] : ''; ?> readonly>
        </div>
        <div class="col-md-4 mb-3">
          <label for="nomeSocio${contadorSocios}">Nome</label>
          <input type="text" class="form-control" id="nomeSocio${contadorSocios}" name="nomeSocio${contadorSocios}" required>
        </div>
        <div class="col-md-4 mb-3">
          <label for="telefoneSocio${contadorSocios}">Telefone</label>
          <input type="text" class="form-control" id="telefoneSocio${contadorSocios}" name="telefoneSocio${contadorSocios}" required>
        </div>
      </div>
      <div class="form-row">
        <div class="col-md-6 mb-3">
          <label for="ruaSocio${contadorSocios}">Rua</label>
          <input type="text" class="form-control" id="ruaSocio${contadorSocios}" name="ruaSocio${contadorSocios}" required>
        </div>
        <div class="col-md-3 mb-3">
          <label for="cidadeSocio${contadorSocios}">Cidade</label>
          <input type="text" class="form-control" id="cidadeSocio${contadorSocios}" name="cidadeSocio${contadorSocios}" required>
        </div>
        <div class="col-md-3 mb-3">
          <label for="estadoSocio${contadorSocios}">Estado</label>
          <input type="text" class="form-control" id="estadoSocio${contadorSocios}" name="estadoSocio${contadorSocios}" required>
        </div>
      </div>
      <div class="form-row">
        <div class="col-md-6 mb-3">
          <label for="capitalSocio${contadorSocios}">Capital</label>
          <input type="number" class="form-control" id="capitalSocio${contadorSocios}" name="capitalSocio${contadorSocios}" step="0.01" min="0" required>
        </div>
        <div class="col-md-6 mb-3">
          <label for="curriculoSocio${contadorSocios}">Currículo</label>
          <input type="text" class="form-control" id="curriculoSocio${contadorSocios}" name="curriculoSocio${contadorSocios}" required>
        </div>
      </div>
    </div>
  `;


  sociosContainer.appendChild(divSocio);
  const socio = {
    nome: document.getElementById(`nomeSocio${contadorSocios}`).value,
    telefone: document.getElementById(`telefoneSocio${contadorSocios}`).value,
    rua: document.getElementById(`ruaSocio${contadorSocios}`).value,
    cidade: document.getElementById(`cidadeSocio${contadorSocios}`).value,
    estado: document.getElementById(`estadoSocio${contadorSocios}`).value,
    capital: parseFloat(document.getElementById(`capitalSocio${contadorSocios}`).value),
    curriculo: document.getElementById(`curriculoSocio${contadorSocios}`).value,
    id_usuario: document.getElementById(`idUsuario`).value
  };
  SociosData.push(socio)
  contadorSocios++;
}
function calcularCapitalSocial() {
  const inputsCapital = document.querySelectorAll('input[name^="capitalSocio"]');
  let totalCapitalSocial = 0;
  let porcentagens = [];

  inputsCapital.forEach(input => {
    const capital = parseFloat(input.value);
    totalCapitalSocial += capital;
  });

  inputsCapital.forEach(input => {
    const capital = parseFloat(input.value);
    const porcentagem = (capital / totalCapitalSocial) * 100;
    porcentagens.push(porcentagem.toFixed(2));
  });

  document.getElementById('porcentagemSocios').value = porcentagens.join(';');
  console.log("Total do capital social: " + totalCapitalSocial.toFixed(2));

}


function direcionamento(jsonData) {
  let url = "http://localhost/api/telas/index.php";
  fetch(url, {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
    },
    body: jsonData,
  })
    .then((response) => response.json())
    .then((data) => {
      console.log(data);
  
    })
    .catch((error) => {
      console.error("Erro:", error);
    });
}
function Enviar() {
  let json = JSON.stringify(SociosData);
  direcionamento(json);
}