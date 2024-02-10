<!DOCTYPE html>
<html>

<head>
    <title>Criar Plano de Negócios</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        body {
            background-color: #123456;
        }
        
        .login-form label {
            color: white; /* Defina a cor do label */
        }
        
        .login-form .form-control {
            background-color: transparent; 
            border-color: white; /* Defina a cor da borda */
            color: white; /* Defina a cor do texto */
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <!-- Imagem aqui -->
                <img src="src\App\view\img\Login.png" alt="Imagem" class="image">
            </div>
            <div class="col-md-6">
                <!-- Formulário de login -->
                <form class="login-form" method="POST" action="/login">
                    <div class="form-group">
                        <label for="login">Email</label>
                        <input type="text" class="form-control" id="login" name="login" required>
                    </div>
                    <div class="form-group">
                        <label for="senha">Senha</label>
                        <div class="input-group">
                            <input type="password" class="form-control" id="senha" name="senha">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Entrar</button>
                    <hr>
                    <!-- Adicione a chamada à função loginWithGoogle() -->
                    <button type="button" class="btn btn-danger btn-block" onclick="loginWithGoogle()">Entrar com Google</button>
                </form>
                <p>Esqueceu sua senha? <a href="#">Recuperar senha</a></p>
                <p>Ainda não tem uma conta? <a href="/">Criar uma conta</a></p>
            </div>
        </div>
    </div>
   <!-- Scripts do Firebase -->
   <script src="https://www.gstatic.com/firebasejs/8.9.1/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.9.1/firebase-auth.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.9.1/firebase-firestore.js"></script>

    <!-- Seu script personalizado -->
    <script>
       const firebaseConfig = {

        apiKey: "AIzaSyBYbrbCxa4Iz_lnYuxtT2VX6sVXC04_Idw",

        authDomain: "plano-31f6d.firebaseapp.com",

        databaseURL: "https://plano-31f6d-default-rtdb.firebaseio.com/Usuário.json",

        projectId: "plano-31f6d",

        storageBucket: "plano-31f6d.appspot.com",

        messagingSenderId: "508677726560",

        appId: "1:508677726560:web:e8ebea1d277411d6667e05",

        measurementId: "G-8ZEFKH6KQK"

        };

        firebase.initializeApp(firebaseConfig);

        // Configurar o provedor do Google
        var provider = new firebase.auth.GoogleAuthProvider();

        // Função para fazer login com o Google
        function loginWithGoogle() {
            firebase.auth().signInWithPopup(provider)
                .then((result) => {
                    // Sucesso ao fazer login com o Google
                    var user = result.user;
                    alert('Login com o Google bem-sucedido!');
                    // Redirecione ou faça qualquer outra coisa após o login
                })
                .catch((error) => {
                    // Handle errors aqui
                    var errorCode = error.code;
                    var errorMessage = error.message;
                    alert('Erro ao fazer login com o Google: ' + errorMessage);
                });
        }
    </script>
</body>

</html>
