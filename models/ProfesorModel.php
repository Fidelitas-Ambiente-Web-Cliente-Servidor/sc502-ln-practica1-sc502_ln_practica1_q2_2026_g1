<?php

require_once __DIR__ . '/../config/database.php';

class ProfesorModel
{
    private PDO $db;

    public function __construct()
    {
        // Obtener la conexión compartida (Singleton)
        $this->db = Database::getConnection();
    }

    // READ: Obtener todos los profesores activos
    public function getAll(): array
    {
        $stmt = $this->db->query(
            'SELECT *
             FROM profesores
             WHERE activo = 1
             ORDER BY nombre'
        );

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // READ: Obtener un profesor por su id
    // Devuelve null si no existe
    public function getById(int $id): ?array
    {
        $stmt = $this->db->prepare(
            'SELECT *
             FROM profesores
             WHERE id = :id
             LIMIT 1'
        );

        $stmt->execute([
            ':id' => $id
        ]);

        $profesor = $stmt->fetch(PDO::FETCH_ASSOC);

        // fetch() devuelve false cuando no hay resultados,
        // lo convertimos a null para que sea más claro
        return $profesor !== false ? $profesor : null;
    }
}