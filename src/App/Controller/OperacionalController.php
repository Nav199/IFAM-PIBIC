<?php

namespace App\Controller;

use App\Models\FirebaseModel;

class OperacionalController
{
    private $firebase;

    public function __construct(FirebaseModel $firebase)
    {
        $this->firebase = $firebase;
    }

    public function index()
    {
        require_once __DIR__.'/../view/operacional.php';
    }

    public function store()
    {
        $capacidadeMaxima = $_POST['capacidadeMaxima'] ?? '';
        $volumeInicial = $_POST['volumeInicial'] ?? '';

        // Obtém os dados da tabela
        $tabelaNecessidadePessoal = isset($_POST['tabelaNecessidadePessoal']) ? json_decode($_POST['tabelaNecessidadePessoal'], true) : [];

        // Processa os dados da tabela individualmente
        $dadosTabela = [];
        foreach ($tabelaNecessidadePessoal as $linha) {
            $cargo = $linha['cargo'] ?? '';
            $qualificacoes = $linha['qualificacoes'] ?? '';

            // Validações adicionais
            if (empty($cargo) || empty($qualificacoes)) {
                echo "Por favor, preencha todos os campos da tabela.";
                return;
            }

            // Armazena os dados individualmente em um array
            $dadosTabela[] = [
                'cargo' => $cargo,
                'qualificacoes' => $qualificacoes,
            ];
        }

        $data = [
            'capacidadeMaxima' => $capacidadeMaxima,
            'volumeInicial' => $volumeInicial,
            'Tabela_Necessidade' => $dadosTabela,
        ];

        // Exemplo de como você pode chamar um método do modelo Firebase para armazenar os dados
        $this->firebase->send_Operacion($data);

        // Redireciona para alguma página de sucesso ou faz qualquer outra ação necessária
        // header('Location: /sucesso');
        // exit();
        echo "Dados enviados com sucesso!";
    }
}
