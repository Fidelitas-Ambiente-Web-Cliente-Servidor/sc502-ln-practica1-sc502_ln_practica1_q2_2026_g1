<?php

require_once __DIR__ . '/../config/database.php';

class CursoModel
{
    private PDO $db;

    public function __construct()
    {
        // Obtener la conexión compartida
        $this->db = Database::getConnection();
    }

    // READ:Obtener todos los cursos
    public function getAll(): array
    {
        $stmt = $this->db->query(
            'SELECT *
             FROM cursos
             ORDER BY categoria, nombre'
        );

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // READ:Obtener cursos por categoría
    public function getByCategoria(string $categoria): array
    {
        $stmt = $this->db->prepare(
            'SELECT *
             FROM cursos
             WHERE categoria = :categoria
             ORDER BY nombre'
        );

        $stmt->execute([
            ':categoria' => $categoria
        ]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}