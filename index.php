<?php
$request = $_SERVER['REQUEST_URI'];
// echo $request; $viewDir = '/VIEWS/'; 
$viewDir = '/VIEWS/';
$controllerDir = '/CONTROLLERS/';

switch ($request) {
    // case '':
    case '/':
        require __DIR__ . $viewDir . 'home.php';
        break;
    case '/form':
        require __DIR__ . $viewDir . 'form.php';
        break;
    case '/signup':
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            require __DIR__ . $viewDir . 'signup.html';
        } elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
            require __DIR__ . $controllerDir . 'signup.php';
        } else {
            http_response_code(405); // Method Not Allowed
            echo "Method Not Allowed";
        }
        break;
    case '/login':
        if ($_SERVER["REQUEST_METHOD"] === 'GET') {
            require __DIR__ . $viewDir . 'login.html';
        } elseif ($_SERVER["REQUEST_METHOD"] === "POST") {
            require __DIR__ . $controllerDir . "login.php";
        }
        break;
    default:
        http_response_code(404);
        require __DIR__ . $viewDir . '404.php';
}
?>