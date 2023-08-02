<?php

namespace App\Models;

use PDO;
use PDOException;

class Connect
{
    protected $connection;

    public function __construct()
    {
        $this->connection();
    }

    public function connection()
    {
        require_once "../../settings/config.php";

        try {
            $dsn = "mysql:host=" . DBHOST . ";dbname=" . DBNAME . ";charset=utf8mb4";
            $this->connection = new PDO($dsn, DBUSER, DBPASS);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die('Error de conexión: ' . $e->getMessage());
        }
    }

    public function getConnection(): PDO
    {
        return $this->connection;
    }
}
