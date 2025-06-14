<?php
namespace Controller;

use PDO;

class HomeController
{
    private $conn;

    public function __construct(PDO $conn)
    {
        $this->conn = $conn;
    }

    public function index()
    {
        $stmt = $this->conn->query("SELECT * FROM users");
        $users = $stmt->fetchAll();

        echo "<pre>";
        print_r($users);
        echo "</pre>";
    }
}