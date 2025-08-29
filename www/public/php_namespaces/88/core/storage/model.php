<?php

namespace Core\Storage;

require_once "database.php";

class Model1
{
    public function __construct()
    {
        $database  = new Database();
    }
}