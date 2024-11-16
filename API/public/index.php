<?php
set_include_path(__DIR__ . '/../src');
require_once 'controllers/MarcaController.php';

$marcaController = new MarcaController();

// Ruta para obtener todas las marcas o una específica por ID
if ($_SERVER['REQUEST_METHOD'] === 'GET' && parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) === '/API/public/index.php/marcas') {
    $marcaController->getMarcas();
}

// Ruta para crear una nueva marca
if ($_SERVER['REQUEST_METHOD'] === 'POST' && parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) === '/API/public/index.php/marcas') {
    $marcaController->createMarca();
}

// Ruta para actualizar una marca
if ($_SERVER['REQUEST_METHOD'] === 'PUT' && parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) === '/API/public/index.php/marcas') {
    $marcaController->updateMarca();
}

// Ruta para eliminar una marca
if ($_SERVER['REQUEST_METHOD'] === 'DELETE' && parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) === '/API/public/index.php/marcas') {
    $marcaController->deleteMarca();
}
?>
