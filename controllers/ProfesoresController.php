<?php

require_once __DIR__ . '/../models/ProfesorModel.php';

class ProfesoresController
{
    private ProfesorModel $model;

    public function __construct()
    {
        // Crear instancia del modelo
        $this->model = new ProfesorModel();
    }

    // GET ?controller=profesores&action=index
    // Obtiene todos los profesores activos y carga el listado
    public function index(): void
    {
        $profesores = $this->model->getAll();

        require __DIR__ . '/../views/profesores/profesores.php';
    }

    // GET ?controller=profesores&action=show&id=X
    // Muestra la vista de detalle de un profesor específico
    public function show(int $id): void
    {
        $profesor = $this->model->getById($id);

        // Si el id no existe en la base de datos, respondemos 404
        if ($profesor === null) {
            http_response_code(404);
            die('<h2>404 - Profesor no encontrado.</h2>');
        }

        require __DIR__ . '/../views/profesores/profesores.php';
    }
}