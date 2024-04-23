<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="https://images.vexels.com/media/users/3/286649/isolated/preview/31bd1b279101d861b2be48dc66d46d52-a-cone-de-chapa-u-de-duende-de-sa-o-patra-cio.png" type="image/x-icon">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet" href="css/registroADM.css">
    <title>Daundoys - Gerenciar funcionário</title>
</head>
<body>
    <h1 class="pgTitle">Gerir funcionários</h1>
    <a href="index.php" class="backToThePage"><span class="material-symbols-outlined"> arrow_back </span></a>
    <div class="gerencionamentoContainer">
        <main class="gerenciarFuncionario">
            <form method="post" action="controller/registrarFuncionarioController.php" class="registroContainer">
                <?php
                session_start();
                if(!isset($_SESSION['admin'])){
                    header('location: index.php');
                    exit();
                }
                @$cod = $_REQUEST['cod'];
                if(isset($cod)){
                    if ($cod == '172') {
                        echo '<p class="errorMsg">As senhas não coincidem</p>';
                    }
                }
                ?>
                <div class="inputGroup">
                    <label for="nome">Nome de usuário <span class="redDot">*</span></label>
                    <input type="text" name="nome" id="nome" placeholder="Digite seu nome de usuário" required/>
                </div>
                <div class="inputGroup">
                    <label for="email">Endereço de email <span class="redDot">*</span></label>
                    <input type="email" name="email" id="email" placeholder="Digite seu endereço de email" required/>
                </div>
                <div class="inputGroup">
                    <label for="senha">Senha <span class="redDot">*</span></label>
                    <input type="password" name="senha" id="senha" placeholder="Digite sua senha" required>
                </div>
                <div class="inputGroup">
                    <label for="confirmarSenha">Confirme sua senha <span class="redDot">*</span></label>
                    <input type="password" name="confirmarSenha" id="confirmarSenha" placeholder="Confirme sua senha" required>
                </div>
                <div class="inputGroup">
                    <label for="cargo">Escolha o cargo de seu funcionário <span class="redDot">*</span></label>
                    <select name="cargo" id="cargo">
                        <option selected style="display:none" value="">Escolha um cargo</option>    
                        <option value="Gerente">Gerente</option>
                        <option value="Repositor">Repositor</option>
                        <option value="Entregador">Entregador</option>
                        <option value="Suporte">Suporte</option>
                    </select>
                </div>
                <div class="inputGroup">
                    <label for="telefone">Telefone <span class="redDot">*</span></label>
                    <input type="text" name="telefone" id="telefone" placeholder="Digite seu número de telefone para contato" required>
                </div>
                <div class="inputGroup">
                    <label for="cpf">Número de CPF <span class="redDot">*</span></label>
                    <input type="text" name="cpf" id="cpf" placeholder="Digite seu número de CPF" required>
                </div>
                <div class="submitContainer">
                    <input type="submit" value="Enviar informações">
                </div>
            </form>
            <div class="funcionariosManager">
                <table class="tablesFuncionarios">
                    <thead>
                        <th>ID</th>
                        <th>CPF</th>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Senha</th>
                        <th>Cargo</th>
                        <th>Número de telefone</th>
                    </thead>
                    <tbody>
                        <?php
                        require_once 'controller/funcionariosController.php';
                        $funcionariosList = loadAllFuncionarios();

                        foreach($funcionariosList as $funcionario){
                            echo '<tr>';
                                echo '<td id="idTable">';
                                    echo $funcionario['funcionario_id'];
                                echo '</td>';
                                echo '<td id="cpfTable">';
                                    echo $funcionario['cpf'];
                                echo '</td>';
                                echo '<td id="nomeTable">';
                                    echo $funcionario['nome'];
                                echo '</td>';
                                echo '<td id="emailTable">';
                                    echo $funcionario['email'];
                                echo '</td>';
                                echo '<td id="senhaTable">';
                                    echo $funcionario['senha'];
                                echo '</td>';
                                echo '<td id="cargoTable">';
                                    echo $funcionario['cargo'];
                                echo '</td>';
                                echo '<td id="telefoneTable">';
                                    echo $funcionario['telefone'];
                                echo '</td>';
                            echo '</tr>';
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </main>
    </div>
    <script>
            /* -------------------------------- mascara numero de celular -------------------------------- */
            document.getElementById('telefone').addEventListener('input', function(event){
                let input = event.target;
                let numCelular = input.value.replace(/\D/g, '');
                if (numCelular.length > 11) {
                    numCelular = numCelular.slice(0, 11);
                }
                numCelular = numCelular.replace(/^(\d{2})(\d)/g, '($1) $2');
                numCelular = numCelular.replace(/(\d{1})(\d{4})(\d{4})$/, '$1 $2-$3');
                input.value = numCelular
            });

        /* -------------------------------- mascara numero de cpf -------------------------------- */
            document.getElementById('cpf').addEventListener('input', function(event){
                let input = event.target;
                let cpf = input.value.replace(/\D/g, '');
                if (cpf.length > 11) {
                    cpf = cpf.slice(0, 11);
                }
                cpf = cpf.replace(/(\d{3})(\d)/, '$1.$2');
                cpf = cpf.replace(/(\d{3})(\d)/, '$1.$2');
                cpf = cpf.replace(/(\d{3})(\d{1,2})$/, '$1-$2');
                input.value = cpf;
            });
        </script>
</body>
</html>