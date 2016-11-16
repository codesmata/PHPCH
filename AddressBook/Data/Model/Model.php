<?php namespace AddressBook\Data\Model;

use AddressBook\Data\Persistence\Persistence;
use AddressBook\Data\Persistence\Sqlite\SqlitePersistence;

abstract class Model
{
    protected $persistence;

    public function __construct(Persistence $persistence = null )
    {
        $tableName = $this->getSubClassName();
        $this->persistence = $persistence ?: new SqlitePersistence($tableName);
    }

    /**
     *  This function gets the class name of a child class for use by the query builder for table resolution.
     * @param bool $ignorePluralization
     * @return string
     */
    private function getSubClassName($ignorePluralization = false)
    {
        $reflection = new \ReflectionClass($this); //Gets the class name of the child class
        $className = $reflection->getShortName();
        if ($ignorePluralization) {
            if ($className === "CaseClass")
                return "case";
            return  $className;
        }

        if ($className === "CaseClass")
            return "cases";
        return $className = strtolower($className) . "s";
    }

    /**
     * This function returns the persistence object to gain access to top level apis.
     * @return PDOPersistence
     */
    public function getOriginalPersistenceObject()
    {
        return $this->persistence;
    }
}
