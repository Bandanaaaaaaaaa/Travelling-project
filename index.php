<?php
$request = $_SERVER['REQUEST_URI'];
// echo $request; $viewDir = '/VIEWS/'; 
$viewDir = '/VIEWS/';
$controllerDir = '/CONTROLLERS/';

switch ($request) {
    case '':
    case '/':
        require __DIR__ . $viewDir . 'home.php';
        break;
    case '/form':
        require __DIR__ . $viewDir . 'form.php';
        break;
    case '/index':
        require __DIR__ . $viewDir . 'login.html';
        break;
    case '/signup':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // require __DIR__ . '/VIEWS/form.php';
            require __DIR__ . $controllerDir . 'form.php';

        } else {
            // maybe show the form or error
        }
        break;
    default:
        http_response_code(404);
        require __DIR__ . $viewDir . '404.php';
}
?>