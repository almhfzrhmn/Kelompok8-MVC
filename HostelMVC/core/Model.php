<?php

namespace Core;

class Model
{
    protected $db;

    public function __construct()
    {
        $config = require '../config/config.php';
        $this->db = new \PDO('mysql:host=' . $config['database']['host'] . ';dbname=' . $config['database']['dbname'], $config['database']['username'], $config['database']['password']);
    }
}
