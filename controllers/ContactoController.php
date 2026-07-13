<?php

require_once __DIR__ . '/../models/ContactoModel.php';

class ContactoController
{
    private ContactoModel $model;

    public function __construct()
    {
        // Crear instancia del modelo
        $this->model = new ContactoModel();
    }

    // GET ?controller=contacto&action=index
    // Muestra el formulario de contacto
    public function index(): void
    {
        require __DIR__ . '/../views/contacto/contacto.php';
    }

    // POST ?controller=contacto&action=store
    // Valida y guarda un nuevo mensaje de contacto
    public function store(): void
    {
        $nombre   = trim($_POST['nombre'] ?? '');
        $correo   = trim($_POST['correo'] ?? '');
        $telefono = trim($_POST['telefono'] ?? '');
        $asunto   = trim($_POST['asunto'] ?? '');
        $mensaje  = trim($_POST['mensaje'] ?? '');

        if (empty($nombre) || empty($correo) || empty($asunto) || empty($mensaje)) {
            $error = 'El nombre, correo, asunto y mensaje son obligatorios.';
            require __DIR__ . '/../views/contacto/contacto.php';
            return;
        }

        if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
            $error = 'Ingresa un correo electrónico válido.';
            require __DIR__ . '/../views/contacto/contacto.php';
            return;
        }

        $datos = [
            'nombre_completo' => $nombre,
            'correo'          => $correo,
            'telefono'        => $telefono,
            'asunto'          => $asunto,
            'mensaje'         => $mensaje
        ];

        $this->model->create($datos);

        header('Location: index.php?controller=contacto&action=index&exito=1');
        exit;
    }
}