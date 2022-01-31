<?php
namespace App;
use \PDO;

class Connection{
    public static function getPDO():PDO{
        return new PDO('mysql:dbname=site_radia;host:localhost:8000','root','',[
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    }
}