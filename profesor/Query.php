<?php

class Query
{
    private $connection;

    public function __construct()
    {
        $servername = "localhost";
        $username = "root";
        $password = "root";
        $dbname = "tribute";

        $this->connection = new mysqli($servername, $username, $password, $dbname);

        if ($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
        }
    }

    public function execute($sql)
    {
        $result = $this->connection->query($sql);

        $rows = [];
        while($rowData = $result->fetch_assoc()) {
            $rows[] = $rowData;
        }

        $this->closeConnection();

        return $rows;
    }

    private function closeConnection()
    {
        $this->connection->close();
    }
}