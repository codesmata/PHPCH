<?php namespace AddressBook\Data\Persistence\Sqlite;

use AddressBook\Data\Persistence\Persistence as Persistence;

class SqlitePersistence implements Persistence
{
    use Connect;

    private static $sqlite;
    private $builder;
    private $query = "";

    public function __construct($table = null)
    {
        if ($table)
            $this->builder = new QueryBuilder($table);
        self::$sqlite = $this->createSqliteInstance();
    }

    /**
     * This persists data to DB.
     * @param $data
     */
    public function persist($data)
    {
        $sql = $this->builder->insert($data)->getQuery();
        $this->query = $sql;
        $result = self::$sqlite->connection->exec($sql);
        return $this->getResult($result);
    }

    /**
     * THis enable client (Calling code) to write custom queries.
     * @param $query
     * @return array
     */
    public function customQuery($query)
    {
        return self::$sqlite->connection->query($query);
    }

    /**
     * THis enable client (Calling code) to write custom queries.
     * @param $query
     * @return array
     */
    public function customQueryWithExec($query)
    {
        return self::$sqlite->connection->exec($query);
    }

    /**
     * This function returns a result set as an array of associative arrays
     * @param $queryResult
     * @return array
     */
    public function getResult($queryResult)
    {
        $i = 0;
        $resultArray = array();
        while($res = $queryResult->fetchArray(SQLITE3_ASSOC)) {
            $resultArray[] = $res;
            $i++;
        }
        return $resultArray;
    }

    public function persistWithTransaction($query){}
    public function retrieveAll($columns = false){}
    public function retrieveBy(){}
    public function retrieve($needle){}
    public function update($data, $id){}
    public function remove($id){}

}
