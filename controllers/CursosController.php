<?php

require_once __DIR__ . '/../models/CursoModel.php';

class CursosController
{
    private CursoModel $model;

    public function __construct()
    {
        // Crear instancia del modelo
        $this->model = new CursoModel();
    }

    // GET ?controller=cursos&action=index
    // Obtiene todos los cursos o los filtra por categoría
    public function index(): void
    {
        $categoria = $_GET['categoria'] ?? '';

        if ($categoria !== '') {
            $cursos = $this->model->getByCategoria($categoria);
        } else {
            $cursos = $this->model->getAll();
        }

        require __DIR__ . '/../views/cursos/cursos.php';
    }
}