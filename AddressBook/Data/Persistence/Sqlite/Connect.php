<?php namespace AddressBook\Data\Persistence\Sqlite;

trait Connect
{
    /**
     * This function returns an instance of the sqlite connection
     * @return SqliteConnection
     */
    private function createSqliteInstance()
    {
        if (isset(self::$sqlite)) {
            return self::$sqlite;
        }
        return new SqliteConnection("app.db");
    }
}
