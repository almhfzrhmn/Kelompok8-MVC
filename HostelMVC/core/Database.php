<?php

namespace Core;

use PDO;

class Database
{
    private static $instance = null;
    private $pdo;

    private function __construct()
    {
        $config = require '../config/config.php';
        $this->pdo = new PDO('mysql:host=' . $config['database']['host'] . ';dbname=' . $config['database']['dbname'], $config['database']['username'], $config['database']['password']);
    }

    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new Database();
        }

        return self::$instance;
    }

    public function getConnection()
    {
        return $this->pdo;
    }
}
