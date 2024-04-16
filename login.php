<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Daundoys</title>
    <link rel="icon" href="https://images.vexels.com/media/users/3/286649/isolated/preview/31bd1b279101d861b2be48dc66d46d52-a-cone-de-chapa-u-de-duende-de-sa-o-patra-cio.png" type="image/x-icon">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php 
    require_once 'shared/header.php';
    if(isset($_SESSION['login'])){
        header('location: index.php');
    }
    ?>
    <main class="bodyLogin">
        <div class="imgLogin"><img src="img/duendeLogin.png" alt=""></div>
        <form action="controller/loginController.php" method="post" class="loginContainer">
            <div class="inputContainer">
                <span class="material-symbols-outlined loginIcons">person</span>
                <label for="email">Email: </label>
                <input  type="text" name="email" id="email" placeholder="Insira seu email" required>
                <?php
                @$cod = $_REQUEST['cod'];
                    if (isset($cod)) {
                        if ($cod == '171') {
                            echo ('<br><p class="incorrect">');
                            echo ('Verifique usuário ou senha.');
                            echo ('</p>');
                        } else if ($cod == '172') {
                            echo ('<br><p class="sessaoExpirada">');
                            echo ('Sua sessão expirou. Realize o login novamente.');
                            echo ('</p>');
                        } else if ($cod == '173'){
                            echo ('<br><p class="semPermissao">');
                            echo ('Você precisa estar logado para fazer isso');
                            echo ('</p>');
                        }
                    }
                ?>
            </div>
            <div class="inputContainer">
                <span class="material-symbols-outlined loginIcons">lock</span>
                <label for="password">Senha: </label>
                <input type="password" name="senha" id="senha" placeholder="Insira sua senha" required>
                <div class="eyeBtn"><span onclick="versenha()" class="material-symbols-outlined eye">visibility_off</span></div>
            </div>
            <div class="submitContainer">
                <span>Não tem uma conta? <a href="registro.php">Cadastre-se</a></span>
                <input type="submit" value="Logar">
            </div>
    </form>
    </main>
    <script src="js/script.js"></script>
</body>
</html>