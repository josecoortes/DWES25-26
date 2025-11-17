<?php
class Database
{
    public static function getConnection(): PDO
    {
        return new PDO(
            DB_DSN,          // Aquí va todo el DSN completo
            DB_USER, 
            DB_PASS,
            [ PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION ]
        );
    }
}