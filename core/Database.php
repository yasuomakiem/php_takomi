<?php

namespace Core;

use PDO;
use PDOException;

class Database
{
    private $config;

    public function __construct($config)
    {
        if (!is_array($config) || !isset($config['db'])) {
            throw new \Exception("Invalid database config");
        }
        $this->config = $config['db'];
    }

    public function connect()
    {
        try {
            $dsn = "mysql:host={$this->config['host']};dbname={$this->config['name']};charset={$this->config['charset']}";
            $username = $this->config['user'];
            $password = $this->config['pass'];

            $conn = new PDO($dsn, $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $conn;
        } catch (PDOException $e) {
            die("Database connection failed: " . $e->getMessage());
        }
    }
}
