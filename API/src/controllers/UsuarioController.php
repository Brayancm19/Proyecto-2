<?php
require_once __DIR__ . '/../models/Usuario.php';
require_once __DIR__ . '/../config/database.php';

class UsuarioController {
    private $usuario;

    public function __construct() {
        $database = new Database();
        $db = $database->getConnection();
        $this->usuario = new Usuario($db);
    }

    public function getUsuarios() {
        $id = isset($_GET['id']) ? $_GET['id'] : null;

        $result = $this->usuario->getUsuarios($id);

        header('Content-Type: application/json');
        echo json_encode($result);
    }
}
?>
