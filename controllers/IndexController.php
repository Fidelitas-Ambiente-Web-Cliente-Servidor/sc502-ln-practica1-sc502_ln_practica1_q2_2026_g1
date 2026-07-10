<?php

require_once __DIR__ . '/../models/IndexModel.php';

class IndexController
{
    private IndexModel $model;

    public function __construct()
    {
        //Crear una instancia del modelo
        $this->model = new IndexModel();
    }

    //GET ?controller=index&action=index
    //Obtiene todos los cursos destacados
    //y carga la vista principal
    public function index(): void
    {
        $cursos = $this->model->getAll();

        require __DIR__ . '/../views/index/index.php';
    }
}