<header>
<div class="header-row">
    <div class="header-row-list">
        <div class="logoContainer">
            <img src="img/logo.png" alt="logo">
        </div>
        <div class="item">
            <input type="text" name="searchbar" id="searchbar" placeholder="O que deseja procurar?"/>
            <button  type="submit" class="searchBtn"><span class="material-symbols-outlined search">search</span></button>
        </div>
        
        <div class="buttons">
            <?php
            session_start();
            require_once 'controller/funcionariosController.php';
            if(isset($_SESSION['admin'])){
                echo '<style>.buttons{
                    width: 450px;
                    </style>';
                echo '<div class="dropdown">';
                    echo '<button class="dropdown-btn admButtom"><span class="material-symbols-outlined">admin_panel_settings </span>Opções de ADM</button>';
                    echo '<div class="dropdown-content">';
                        echo '<a href="registrarProduto.php"><span class="material-symbols-outlined">inventory</span>Adicionar novo produto</a>';
                        echo '<a href="registrarFuncionário.php"><span class="material-symbols-outlined">manage_accounts</span>Gerir funcionários</a>';
                        echo '<a href="#"></a>';
                    echo '</div>';
                echo '</div>';
            }
            ?>
            <div class="dropdown">
                <div class="dropdown-btn"><span class="material-symbols-outlined" id="conta">account_circle </span>Conta</div>
                <div class="dropdown-content">
                    <?php
                    if(!isset($_SESSION['login']) and !isset($_SESSION['admin'])){
                        echo '<a href="login.php"><span class="material-symbols-outlined">login</span> Login</a>';
                        echo '<a href="registro.php"><span class="material-symbols-outlined">person_add</span> Registrar-se</a>';
                    } else{
                        echo '<a href="#"><span class="material-symbols-outlined">settings</span> Configurações</a>';
                        echo '<a href="controller/logout.php"><span class="material-symbols-outlined">logout</span> Log out</a>';
                    }
                    
                    ?>
                </div>
            </div>
            <?php

            if(isset($_SESSION['login']) or isset($_SESSION['admin'])){
                echo '<a href="carrinho.php"><span class="material-symbols-outlined" id="carrinho">shopping_cart </span>Carrinho</a>';
            } else{
                echo '<a href="login.php?cod=173"><span class="material-symbols-outlined" id="carrinho">shopping_cart </span>Carrinho</a>';
            }                    
            ?>
        </div>
    </div>
</div>
    <nav>
        <li class="navList">
            <ul class="navItem"><a href="index.php">Home</a></a></ul>
            <ul class="navItem"><a href="index.php?type=piteiras_e_filtros">Piteiras e filtros</a></ul>
            <ul class="navItem"><a href="index.php?type=sedas_e_blunts">Sedas e blunts</a></ul>
            <ul class="navItem"><a href="index.php?type=to_smoke">To smoke</a></ul>
            <ul class="navItem"><a href="index.php?type=acessorios">Acessórios</a></ul>
            <ul class="navItem"><a href="index.php?type=outros">Outros</a></ul>
            <?php
            // if(isset($_SESSION['admin']) and loadFunction($_SESSION['admin']) == 'Dono'){
            //     echo '<ul class="navItem"><a href="registrarFuncionário.php">Registrar funcionário</a></ul>';
            // }
            ?>
        </li>
    </nav>
    <script>
        function toggleDropdown(dropdown) {
            dropdown.classList.toggle('active');
        }
    </script>
</header>