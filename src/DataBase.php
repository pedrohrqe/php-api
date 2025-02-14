<?php

class DataBase
{
    private $host = "localhost";
    private $dbname = "pedro";
    private $user = "root";
    private $password = "admin123";
    private $connection;

    public function __construct()
    {

        try {
            $this->connection = new mysqli($this->host, $this->user, $this->password, $this->dbname);

            // Verifica se a conexão foi bem-sucedida
            if ($this->connection->connect_error) {
                throw new Exception("Erro na conexão: " . $this->connection->connect_error);
            }
        } catch (Exception $e) {
            die("Erro ao se conectar ao banco! Erro: " . $e->getMessage());
        }
    }

    public function query($query)
    {
        $result = $this->connection->query($query);

        if (!$result) {
            throw new Exception("Erro ao executar a query: " . $this->connection->error);
        }

        // Se for uma consulta SELECT, retorna um array associativo
        if ($result instanceof mysqli_result) {
            return $result->fetch_all(MYSQLI_ASSOC);
        }

        // Para INSERT, UPDATE e DELETE, retorna true se bem-sucedido
        return true;
    }

    public function __destruct()
    {
        if ($this->connection) {
            $this->connection->close();
        }
    }
}
