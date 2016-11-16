<?php namespace AddressBook\Tests\SqlitePersistenceTest;

require_once "../../Data/Persistence/Persistence.php";
require_once "../../Data/Persistence/Sqlite/SqliteConnection.php";
require_once "../../Data/Persistence/Sqlite/QueryBuilder.php";
require_once "../../Data/Persistence/Sqlite/Connect.php";
require_once "../../Data/Persistence/Sqlite/Result.php";
require_once "../../Data/Persistence/Sqlite/SqlitePersistence.php";

use AddressBook\Data\Persistence\Sqlite\SqliteConnection;
use AddressBook\Data\Persistence\Sqlite\SqlitePersistence;
use AddressBook\Data\Persistence\Sqlite\QueryBuilder;
use AddressBook\Data\Persistence\Sqlite\Connect;

class SqliteTest extends \PHPUnit_Framework_TestCase
{
    use Connect;

    private $persistence;

    public function setUp()
    {
        $this->persistence = new SqlitePersistence();
    }

   /* public function testConnectionStatus()
    {
        $this->assertEquals("Successful", $this->createSqliteInstance()->connectionStatus());
    }*/

    public function testCustomQueryWithExec()
    {
        $this->assertTrue($this->persistence->customQueryWithExec("CREATE TABLE CONTACT (ID INT PRIMARY KEY NOT NULL, NAME char(100) not null, EMAIL char(100) not null)"), "True...");
    }

    public function testPersistQuery()
    {
        $this->assertTrue($this->persistence->customQueryWithExec("insert into CONTACT (ID, NAME, EMAIL) values(1, 'b', 'akddkd'), (2, 'c', 'another')"), "True...");
    }

    public function testRetrieveQuery()
    {
       $this->assertEquals(array(), $this->persistence->getResult($this->persistence->customQuery("select * from CONTACT")));
    }
}
