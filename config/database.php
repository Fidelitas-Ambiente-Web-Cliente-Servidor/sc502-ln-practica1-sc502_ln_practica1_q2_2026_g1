<?php

class Database
{
    // Configuración de la base de datos
    private static string $host = 'db'; //Nombre del servicio MySQL en Docker
    private static string $dbname = 'learnify'; //Nombre de nuestra base de datos
    private static string $user = 'root';
    private static string $password = 'root';

    //Instancia única de PDO
    private static ?PDO $instance = null;

    private function __construct() {}

    //Devuelve la conexión a la base de datos
    public static function getConnection(): PDO
    {
        if (self::$instance === null) {

            $dsn = "mysql:host=" . self::$host .
                   ";dbname=" . self::$dbname .
                   ";charset=utf8mb4";

            try {

                self::$instance = new PDO(
                    $dsn,
                    self::$user,
                    self::$password,
                    [
                        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                        PDO::ATTR_EMULATE_PREPARES => false,
                    ]
                );

            } catch (PDOException $e) {

                http_response_code(500);

                die(
                    '<h2>Error con la conexión a la base de datos.</h2>
                    <p>' . $e->getMessage() . '</p>'
                );
            }
        }

        return self::$instance;
    }
}