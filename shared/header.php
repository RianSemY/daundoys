<?php
session_start();

?>
<div class="mobileHeader">
    <button class="mobileButton activeSideHeader" onclick="toggleSideHeader()"><span class="material-symbols-outlined">menu_open</span></button>
    <img src="img/logo.png" alt="logo"/>
    <a class="mobileButton carButton" href="carrinho.php"><span class="material-symbols-outlined">store</span></a>
</div>
<div class="sideHeader" id="sideHeader">
    <div class="linksListContainer">
        <div class="linksList">
            <a href="index.php">Home</a>
            <a href="index.php?type=piteiras_e_filtros">Piteiras e filtros</a>
            <a href="index.php?type=sedas_e_blunts">Sedas e blunts</a>
            <a href="index.php?type=to_smoke">To smoke</a>
            <a href="index.php?type=acessorios">Acessórios</a>
            <a href="index.php?type=outros">Outros</a>
        </div>
        <?php
        if(!isset($_SESSION['admin']) and !isset($_SESSION['login'])){
            echo '<div class="loginList">';
                echo '<button id="loginDrop-btn"><span class="material-symbols-outlined">person</span>Usuário</button>';
                echo '<div id="loginDrop-content">';
                    echo '<a href="login.php">Logar-se</a>';
                    echo '<a href="registro.php">Registrar-se</a>';
                echo '</div>';
            echo '</div>';

        } else{
            echo '<div class="loginList">';
                echo '<button onclick="openDropbox()" id="loginDrop-btn"><span class="material-symbols-outlined">person</span>';
                    require_once 'controller/clientesController.php';
                    require_once 'controller/funcionariosController.php';
                    if (isset($_SESSION['login'])){
                        echo ''.loadNomeCliente($_SESSION['login']).'';
                    } else if (isset($_SESSION['admin'])){
                        echo ''.loadNomeFuncionario($_SESSION['admin']).'';
                    } else{
                        echo 'Conta';
                    }
                echo '</button>';
                echo '<div id="loginDrop-content">';
                    echo '<a href="controller/logout.php">Logout</a>';
                echo '</div>';
        echo '</div>';
        }
        ?>
        <?php
        echo '<div class="adminList">';
            if(isset($_SESSION['admin'])){
                echo '<a href="gerenciarPedidos.php">Gerenciar pedidos</a>';
                echo '<a href="registrarFuncionario.php">Gerenciar funcionários</a>';
                echo '<a href="registrarProduto.php">Gerenciar produtos</a>';
            }
        echo '</div>';
        ?>
        </div>
    </div>
</div>

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
            require_once 'controller/funcionariosController.php';
            if(isset($_SESSION['admin'])){
                echo '<style>.buttons{
                    width: 450px;
                    </style>';
                echo '<div class="dropdown">';
                    echo '<button class="dropdown-btn admButtom"><span class="material-symbols-outlined">admin_panel_settings </span>Opções de ADM</button>';
                    echo '<div class="dropdown-content">';
                        echo '<a href="registrarProduto.php"><span class="material-symbols-outlined">inventory</span>Gerenciar novo produto</a>';
                        echo '<a href="registrarFuncionario.php"><span class="material-symbols-outlined">manage_accounts</span>Gerenciar funcionários</a>';
                        echo '<a href="gerenciarPedidos.php"><span class="material-symbols-outlined">request_page</span>Gerenciar pedidos</a>';
                    echo '</div>';
                echo '</div>';
            }
            ?>

            <div class="dropdown">
                <div class="dropdown-btn"><span class="material-symbols-outlined" id="conta">account_circle</span>
                    <?php
                    if (isset($_SESSION['login'])){
                        echo ''.loadNomeCliente($_SESSION['login']).'';
                    } else if (isset($_SESSION['admin'])){
                        echo ''.loadNomeFuncionario($_SESSION['admin']).'';
                    } else{
                        echo 'Conta';
                    }
                    ?>
                </div>
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
            <ul class="navItem"><a href="index.php">Home</a></ul>
            <ul class="navItem"><a href="index.php?type=piteiras_e_filtros">Piteiras e filtros</a></ul>
            <ul class="navItem"><a href="index.php?type=sedas_e_blunts">Sedas e blunts</a></ul>
            <ul class="navItem"><a href="index.php?type=to_smoke">To smoke</a></ul>
            <ul class="navItem"><a href="index.php?type=acessorios">Acessórios</a></ul>
            <ul class="navItem"><a href="index.php?type=outros">Outros</a></ul>
        </li>
    </nav>
</header>