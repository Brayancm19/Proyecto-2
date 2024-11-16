<?php
class Marca {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Obtener todas las marcas o una específica por ID
    public function getMarcas($id = null) {
        if ($id === null) {
            $query = "SELECT * FROM marcas";
            $stmt = $this->conn->prepare($query);
        } else {
            $query = "SELECT * FROM marcas WHERE id = :id";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        }

        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Crear nueva marca
    public function create() {
        $query = "INSERT INTO marcas (nombre) VALUES (:nombre)";
        $stmt = $this->conn->prepare($query);

        $this->nombre = htmlspecialchars(strip_tags($this->nombre));

        $stmt->bindParam(':nombre', $this->nombre);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    // Actualizar marca
    public function update() {
        $query = "UPDATE marcas SET nombre = :nombre WHERE id = :id";
        $stmt = $this->conn->prepare($query);

        $this->nombre = htmlspecialchars(strip_tags($this->nombre));
        $this->id = htmlspecialchars(strip_tags($this->id));

        $stmt->bindParam(':nombre', $this->nombre);
        $stmt->bindParam(':id', $this->id);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    // Eliminar marca
    public function delete() {
        $query = "DELETE FROM marcas WHERE id = :id";
        $stmt = $this->conn->prepare($query);

        $this->id = htmlspecialchars(strip_tags($this->id));

        $stmt->bindParam(':id', $this->id);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
}
?>
