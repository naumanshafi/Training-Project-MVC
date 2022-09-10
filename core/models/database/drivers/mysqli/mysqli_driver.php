<?php
/**
 * This File Implements mysqli_driver using the singleton trait and will allow the programmer to connect to mysqli databases
 * and do other functions
 *
 */
namespace core\models\database\drivers\mysqli;

use core\traitSingleton;
use Exception;

/**
 * This Class Implements singleton driver for mysqli having connect disconnect and exectue qeury functions.
 *
 */
class mysqli_driver implements dbDriverInterface
{
    use traitSingleton;

    /**
     * class variable for creating connection with database
     *
     * @var $connection
     */
    private $connection;
    /**
     * class variable for declaring server name.
     *
     * @var  $serverName
     */
    private $serverName;
    /**
     * class variable for declaring username.
     *
     * @var $username
     */
    private $username ;
    /**
     * class variable for declaring passworf.
     *
     * @var $password
     */
    private $password ;
    /**
     * class variable for declaring dbname.
     *
     * @var $dbname
     */
    private $dbName;

    /**
     * mysqli_driver constructor.
     */
    private function __construct()
    {
        $this->serverName= 'localhost';
        $this->username = "root";
        $this->password = "123";
        $this->dbName = "myphp";
    }

    /**
     * function connect to connect with databases
     * @return null
     */
    public function connect()
    {
        $this->connection = new \mysqli($this->serverName, $this->username, $this->password, $this->dbName);
        if ($this->connection->connect_error) {
            throw new Exception('Connection Cannot be Made');
        }
        return true;
    }

    /**
     * function disconnect to disconnect from databases
     * @return null
     */
    public function disconnect()
    {
        mysqli_close($this->connection);
    }

    /**
     * function execute to execute the query given and return the result.
     * @param string $sql_query
     * @return boolean
     * @return array
     * @throws \Throwable
     */
    public function execute($sql_query)
    {
        try {
            $result = $this->connection->query($sql_query);
            if (mysqli_affected_rows( $this->connection) < 0) {
                throw new Exception('Query Is Wrong');
            }
            if (gettype($result) =='object')
            {
                $data = array();
                while ($row = mysqli_fetch_assoc($result))
                {
                    $data[] = $row;
                }
                return $data;
            }
            return $result;
        } catch (\Throwable $exception) {
            throw $exception;
        }
    }
}