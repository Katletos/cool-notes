<?php
class Database
{
    public PDO $connection;
    public PDOStatement | bool $statement;
    public function __construct($config, $username = 'root', $password = 'root')
    {
        $dsn = 'mysql:' . http_build_query($config,'', ';');

        $this->connection = new PDO($dsn, $username, $password, [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ]);
    }
    public function query(string $query, array $params = []): static
    {
        $this->statement = $this->connection->prepare($query);
        $this->statement->execute($params);

        return $this;
    }

    public function find()
    {
        return $this->statement->fetch();
    }

    public function findOrFail()
    {
        $result = $this->find();

        if (! $result)
        {
            abort();
        }

        return $result;
    }

    public function get(): bool|array
    {
        return $this->statement->fetchAll();
    }
}