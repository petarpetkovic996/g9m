<?php

class Query
{
    /**
     * @var mysqli
     */
    private mysqli $connection;

    /**
     * @var string
     */
    private string $server = 'localhost';

    /**
     * @var string
     */
    private string $dbUsername = 'root';

    /**
     * @var string
     */
    private string $dbPassword = 'root';

    /**
     * @var string
     */
    private string $database = 'tribute';

    public function __construct()
    {
        $this->connection = new mysqli(
            $this->server,
            $this->dbUsername,
            $this->dbPassword,
            $this->database
        );

        if ($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
        }
    }

    /**
     * Execute the SQL query
     *
     * @param $sql
     * @return array
     */
    public function execute($sql): array
    {
        $result = $this->connection->query($sql);

        if (!$result) {
            return [];
        }

        $rows = [];
        while($rowData = $result->fetch_assoc()) {
            $rows[] = $rowData;
        }

        $this->closeConnection();

        return $rows;
    }

    /**
     * Close the active DB connection
     *
     * @return void
     */
    private function closeConnection(): void
    {
        $this->connection->close();
    }
}