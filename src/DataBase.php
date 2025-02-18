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
        $lastID = $this->connection->insert_id;
        $affected = $this->connection->affected_rows;
        $executed = false;

        if (!$result) {
            throw new Exception("Erro ao executar a query: " . $this->connection->error);
        } else if ($result instanceof mysqli_result) {
            $result = $result->fetch_all(MYSQLI_ASSOC);
            $executed = true;
        } else {
            if ($affected != 0) $result = "Sucess in execution";
            else $result = "No data affected";
            $executed = true;
        }

        $arr = [
            "executed" => $executed,
            "affected_rows" => $affected,
            "id" => $lastID != 0 ? $lastID : null,
            "result" => empty($result) ? null : $result
        ];

        return $arr;
    }

    public function __destruct()
    {
        if ($this->connection) {
            $this->connection->close();
        }
    }
}
