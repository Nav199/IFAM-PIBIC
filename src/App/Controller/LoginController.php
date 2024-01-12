<?php
namespace App\Controller;
use App\Models\FirebaseModel;

class LoginController
{
    private $firebase;

    public function __construct(FirebaseModel $firebase)
    {
        $this->firebase = $firebase;
    }

    public function login()
    {
        $user = $_POST['login'] ?? '';
        $senha = $_POST['senha'] ?? '';
    
        // Verificar login
        $verificar = $this->verificar_login($user,$senha);

    
        if ($verificar) {
            // Redirecionar para a página home
            header('Location:  /Home');
            exit;            
        } else {
            // Se o login falhar, redirecionar de volta para a página de login
            echo 'Redirecionando para login';
            header('Location:  /login');
            exit(); // Certifique-se de usar exit() após o redirecionamento
        }
        
    }

    public function verificar_login($user,$senha)
    {
        $user_id = $this->firebase->getUserId($user);
        if($user_id)
        {
            $user_data = $this->firebase->getdados();
            $userDetails = $user_data[$user_id] ?? null;

            if ($userDetails && isset($userDetails['senha'])) {
                // Comparar a senha fornecida com a senha armazenada no Firebase
                if ($senha == $userDetails['senha']) {
                    // Senha correta, o login é bem-sucedido
                    return true;
                }
            }
        }
        return false;
    }

    public function index()
    {
        require_once __DIR__.'/../view/login.php';
    }
}
