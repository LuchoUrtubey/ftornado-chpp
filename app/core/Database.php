<?php

namespace App\Database;

use App\Models\Connect;
use PDO;
use PDOException;

trait Database
{
    protected PDO $connection;

    public function __construct()
    {
        $connect = new Connect();
        $this->connection = $connect->getConnection();
    }

    public function query(string $query, array $data = []): array|false
    {
        try {
            $statement = $this->connection->prepare($query);
            $check = $statement->execute($data);
            if ($check) {
                $result = $statement->fetchAll(PDO::FETCH_OBJ);
                return is_array($result) ? $result : [];
            }
            return false;
        } catch (PDOException $e) {
            // Handle the exception or log the error
            throw new \Exception("Database query error: {$e->getMessage()}", 1630813027);
        }
    }

    public function getRow(string $query, array $data = []): object|false
    {
        try {
            $statement = $this->connection->prepare($query);
            $check = $statement->execute($data);
            if ($check) {
                $result = $statement->fetch(PDO::FETCH_OBJ);
                return $result ? $result : false;
            }
            return false;
        } catch (PDOException $e) {
            // Handle the exception or log the error
            throw new \Exception("Database query error: {$e->getMessage()}", 1630813027);
        }
    }
}
