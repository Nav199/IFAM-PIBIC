
  function Enviar() {
    const socio_array = [];
  
    const forms = document.querySelectorAll('form');
  
    forms.forEach(form => {
      let socio = {};
  
      let nomeElement = form.querySelector('[name="nome"]');
      if (nomeElement) {
        socio.nome = nomeElement.value;
      }
  
      let telefoneElement = form.querySelector('[name="telefone"]');
      if (telefoneElement) {
        socio.telefone = telefoneElement.value;
      }
  
      let curriculoElement = form.querySelector('[name="curriculo"]');
      if (curriculoElement) {
        socio.curriculo = curriculoElement.value;
      }
  
      let enderecoElement = form.querySelector('[name="endereco"]');
      if (enderecoElement) {
        socio.endereco = enderecoElement.value;
      }
  
      let estadoElement = form.querySelector('[name="estado"]');
      if (estadoElement) {
        socio.estado = estadoElement.value;
      }
  
      let cidadeElement = form.querySelector('[name="cidade"]');
      if (cidadeElement) {
        socio.cidade = cidadeElement.value;
      }
  
      let capitalElement = form.querySelector('[name="capital"]');
      if (capitalElement) {
        socio.capital = capitalElement.value;
      }
  
      socio_array.push(socio);
    });
  
    let json = JSON.stringify(socio_array);
    console.log(json)
    Dados(json);
    return json;
  }
  
  function Dados(jsonData) {
    let url = "/../index.php";
    fetch(url, {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: jsonData,
    })
      .then((response) => {
        if (!response.ok) {
          throw new Error(`Erro na solicitação: ${response.status} ${response.statusText}`);
        }
        return response.json(); // Consuma o corpo da resposta apenas uma vez aqui
      })
      .then((data) => {
        console.log(data);
      })
      .catch((error) => {
        console.error("Erro:", error);
      });
  }
  
  