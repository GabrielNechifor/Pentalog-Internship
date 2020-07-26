<?php
require '.' . DIRECTORY_SEPARATOR . 'Models' . DIRECTORY_SEPARATOR . 'Book.php';

class QueryBuilder
{
    private ?PDO $databaseConnection = null;

    public function __construct(PDO $connection)
    {
        $this->databaseConnection = $connection;
    }

    public function getAll(string $sqlQuery, string $class, ?array $bindParameters = null): array
    {
        try {
            $statement = $this->databaseConnection->prepare($sqlQuery);
            $statement->execute($bindParameters);
            $results = $statement->fetchAll(PDO::FETCH_CLASS, $class);
            return $results;
        } catch (Error $e) {
            throw new Exception('400');
        }
    }

    public function getOne(string $sqlQuery, $class, ?array $bindParameters = null): Object
    {

        try {
            $statement = $this->databaseConnection->prepare($sqlQuery);
            $statement->execute($bindParameters);
            $result = $statement->fetchAll(PDO::FETCH_CLASS, $class)[0];
            return $result;
        } catch (Error $e) {
            throw new Exception('400');
        }
    }

    public function execute(string $sqlQuery, ?array $bindParameters = null): void
    {
        try {
            $statement = $this->databaseConnection->prepare($sqlQuery);
            $statement->execute($bindParameters);
        } catch (Error $e) {
            throw new Exception('400');
        }
    }

    public function exists(string $sqlQuery, ?array $bindParameters = null): bool
    {
        $statement = $this->databaseConnection->prepare($sqlQuery);
        try {
            $statement->execute($bindParameters);
        } catch (Exception $e) {
            return false;
            /*
            deoarece am setat PDO::ATTR_ERRMODE si PDO::ERRMODE_EXCEPTION in DatabaseConnection.php
            in cazul in care dam ca parametru o coloana care nu exista in tabela va arunca exceptie in loc de false
            */
        } catch (Error $e) {
            throw new Exception('400');
        }
        if ($statement->rowCount() == 0) {
            return false;
        }
        return true;
    }

    public function insert(string $sqlQuery, ?array $bindParameters = null): string
    {
        try {
            $statement = $this->databaseConnection->prepare($sqlQuery);
            $statement->execute($bindParameters);
            return $this->databaseConnection->lastInsertId();
        } catch (Error $e) {
            throw new Exception('400');
        }
    }
}
