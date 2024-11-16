<?php
set_include_path(__DIR__ . '/../src');
require_once 'controllers/UsuarioController.php';

$usuarioController = new UsuarioController();

if ($_SERVER['REQUEST_METHOD'] === 'GET' && parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) === '/practica3/public/index.php/usuarios') {
    $usuarioController->getUsuarios();
}
?>
