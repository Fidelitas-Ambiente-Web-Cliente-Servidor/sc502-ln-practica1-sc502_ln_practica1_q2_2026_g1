<?php

require_once __DIR__ . '/../config/database.php';

class IndexModel
{
    private PDO $db;

    public function __construct()
    {
        //Obtener la conexión compartida a la base de datos
        $this->db = Database::getConnection();
    }

    //READ: Para obtener todos los cursos destacados
    public function getAll(): array
    {
        $stmt = $this->db->query(
            "SELECT imagen, nombre, descripcion
             FROM cursos_destacados
             WHERE disponible = 1
             ORDER BY nombre ASC"
        );

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}