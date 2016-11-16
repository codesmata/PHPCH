<?php namespace AddressBook\Data\Persistence\Sqlite;

class SqliteConnection
{
    public $connection;
    protected $errorMessages;
    private $checkIfErrorExist = false;

    public function __construct($dbName)
    {
        try {
            $this->connection = new \SQLite3($dbName);
        } catch (\SQLiteException $e) {
            $this->checkIfErrorExist = true;
            $this->errorMessages = $e->getMessage();
        }
    }

    /**
     * Checks for any error iin connection.
     * @return bool|string
     */
    public function connectionStatus()
    {
        if ($this->checkIfErrorExist) {
            return $this->errorMessages;
        }
        return "Successful";
    }
}
