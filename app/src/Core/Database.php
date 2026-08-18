<?php
namespace App\Core;

class Database {
    private static ?\PDO $instance = null;

    private function __construct() {}

    public static function getInstance(): ?\PDO {
        if (self::$instance === null) {
            try {
                $dsn = "pgsql:host=localhost;dbname=nouveaubd";
                self::$instance = new \PDO($dsn, "postgres", "config295");
                self::$instance->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            } catch (\PDOException $e) {
                 die("Connexion PostgreSQL échouée : " . $e->getMessage());
            }
        }
        return self::$instance;
    }

    public static function query(string $sql, bool $single = true): mixed {
        $query = self::getInstance()->query($sql);
        return $single ? $query->fetch() : $query->fetchAll(\PDO::FETCH_OBJ);
    }

    private static function prepare(string $sql, array $datas): \PDOStatement {
        $prepare = self::getInstance()->prepare($sql);
        $prepare->execute($datas);
        return $prepare;
    }

    public static function executeQuery(string $sql, array $datas, bool $single = true): mixed {
        $statement = self::prepare($sql, $datas);
        return $single ? $statement->fetch() : $statement->fetchAll(\PDO::FETCH_OBJ);
    }

    public static function executeUpdate(string $sql, array $datas): int|string {
        $statement = self::prepare($sql, $datas);
        return (str_starts_with(strtoupper(trim($sql)), 'INSERT'))
            ? self::getInstance()->lastInsertId()
            : $statement->rowCount();
    }

    public static function getAllData(string $tableName): array {
        $sql = "SELECT * FROM $tableName";
        return self::query($sql, false);
    }
}