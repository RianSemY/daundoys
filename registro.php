    <!DOCTYPE html>
    <html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Registro de usuário - Daundoys</title>
        <link rel="stylesheet" href="css/style.css">
        <link rel="icon" href="https://images.vexels.com/media/users/3/286649/isolated/preview/31bd1b279101d861b2be48dc66d46d52-a-cone-de-chapa-u-de-duende-de-sa-o-patra-cio.png" type="image/x-icon">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    </head>
    <body>
        <?php 
        require_once 'shared/header.php'; 
        if(isset($_SESSION['login'])){
            header('location: index.php');
        }
        ?>
        <main class="registrarBody">
            <form method="post" action="controller/registroClientesController.php" class="registroContainer">
                <?php
                @$cod = $_REQUEST['cod'];
                if(isset($cod)){
                    if ($cod == '172') {
                        echo '<p class="errorMsg">As senhas não coincidem</p>';
                    }
                }
                ?>
                <div class="inputReg">
                    <label for="nome">Nome de usuário <span class="redDot">*</span></label>
                    <input type="text" name="nome" id="nome" placeholder="Digite seu nome de usuário" required/>
                </div>
                <div class="inputReg">
                    <label for="email">Endereço de email <span class="redDot">*</span></label>
                    <input type="email" name="email" id="email" placeholder="Digite seu endereço de email" required/>
                </div>
                <div class="inputReg">
                    <label for="senha">Senha <span class="redDot">*</span></label>
                    <input type="password" name="senha" id="senha" placeholder="Digite sua senha" required>
                </div>
                <div class="inputReg">
                    <label for="confirmarSenha">Confirme sua senha <span class="redDot">*</span></label>
                    <input type="password" name="confirmarSenha" id="confirmarSenha" placeholder="Confirme sua senha" required>
                </div>
                <div class="inputReg">
                    <label for="endereco">Endereço para entrega <span class="redDot">*</span></label>
                    <input type="text" name="endereco" id="endereco" placeholder="Digite seu endereço para entrega" required>
                </div>
                <div class="inputReg">
                    <label for="telefone">Telefone <span class="redDot">*</span></label>
                    <input type="text" name="telefone" id="telefone" placeholder="Digite seu número de telefone para contato" required>
                </div>
                <div class="inputReg">
                    <label for="cpf">Número de CPF <span class="redDot">*</span></label>
                    <input type="text" name="cpf" id="cpf" placeholder="Digite seu número de CPF" required>
                </div>
                <div class="submitContainer">
                    <span>Já tem uma conta? <a href="login.php">Entrar</a></span>
                    <input type="submit" value="Enviar informações">
                </div>
            </form>
        </main>
        <script src="js/script.js"></script>
    </body>
    </html>