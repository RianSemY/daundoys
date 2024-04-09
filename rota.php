<?php
// Função para lidar com rotas
function handleRoute($route)
{
    // Lista de rotas suportadas
    $routes = [
        '/' => 'index.php',
        '/login' => 'login.php',
        '/registro' => 'registro.php',
        '/carrinho' => 'carrinho.php'
    ];


    // Verifica se a rota solicitada está na lista de rotas suportadas
    if (array_key_exists($route, $routes)) {
        include $routes[$route];
        // Se a rota for encontrada, termina a execução
        exit();
    }
}

// Obtém a URL da solicitação
$route = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Manipula a rota
handleRoute($route);

// Se nenhum rota correspondente for encontrada, exibe uma página de erro 404
http_response_code(404);
include '404.php';


