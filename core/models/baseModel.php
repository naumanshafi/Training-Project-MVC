<?php
/**
 * This File Implements model file for MVC. Model is responsible for handling databases and returning results to
 * to controller
 *
 */
namespace core\models;

use core\models\database\drivers\mysqli\query_builder;
use core\models\database\drivers\mysqli;

/**
 * This Class Implements baseModel for MVC. This class is called by Base Controller
 * and in turn it callsquery builder and sql driver for implementing the query and return
 * results to controller
 *
 */
class baseModel implements modelInterface
{
    /**
     * class variable for creating query builder object to call query_builder functions
     *
     * @var object $queryBuilder
     */
    private $queryBuilder;
    /**
     * class variable for creating entity of model type oject to use for ORM
     *
     * @var  $entity
     */
    private $entity;
    /**
     * class variable for accessing databases by creating object of sqlidriver
     *
     * @var  $sqliDriver
     */
    private $sqliDriver;

    /**
     * baseModel constructor intiliazing entity, query builder and slidriver objects
     * @param $entity
     * @throws \Throwable
     */
    public function __construct($entity)
    {
        try {
            $className = "\\app\\models\\metadata\\".$entity;
            $this->entity = new $className();
        } catch (\Throwable $exception) {
            throw $exception;
        }
    }

    /**
     * Getter for getting entity object
     * @return mixed
     */
    public function getEntity()
    {
        return $this->entity;
    }

    /**
     * Add function called by controller to exectue the query by using
     * query builder and sqli driver
     *
     * @return bool
     * @throws \Throwable
     */
    public function add()
    {
        $queryString = $this->getQuery('add');
        if ($this->executeQuery($queryString) == True) {
            return true;
        }
        return false;
    }

    /**
     * update function called by controller to exectue the query by using
     * query builder and sqli driver
     *
     * @return bool
     * @throws \Throwable
     */
    public function update()
    {
        $queryString = $this->getQuery('update');
        if ($this->executeQuery($queryString) == True) {
            return true;
        }
        return false;
    }

    /**
     * delete function called by controller to exectue the query by using
     * query builder and sqli driver
     *
     * @return bool
     * @throws \Throwable
     */
    public function delete()
    {
        $queryString = $this->getQuery('delete');
        if ($this->executeQuery($queryString) == True) {
            return true;
        }
        return false;
    }

    /**
     * select function called by controller to exectue the query by using
     * query builder and sqli driver
     *
     * @return mixed
     * @throws \Throwable
     */
    public function select()
    {
        $queryString = $this->getQuery('select');
        $result = $this->executeQuery($queryString);
        return $result;
    }

    /**
     * getquery function called by action functions of same class to build the query
     *
     * @param string $action
     * @return string
     * @throws \Throwable
     */
    public function getQuery ($action)
    {
       return $this->queryBuilder->$action($this->entity);
    }

    /**
     * getdbconnection function called by action functions of same class to connect with the database
     *
     * @param string $action
     * @return string
     * @throws \Throwable
     */
    public function getConnection ()
    {
        return $this->sqliDriver->connect();
    }

    /**
     * executequery function called by action functions of same class to execute the query.
     *
     * @param string $querystring
     * @return array
     * @return bool
     * @throws \Throwable
     */
    public function executeQuery($queryString)
    {
        return $this->sqliDriver->execute($queryString);
    }

    /**
     * databaseSetUp instantiate the database driver and querybuilder and connect it to database.
     *
     * @return boolean
     * @throws \Throwable
     */
    public function databaseSetUp()
    {
        try
        {
            $this->queryBuilder = new query_builder();
            $this->sqliDriver = mysqli\dbDriverFacotry::instanceGenerator("mysqli_driver");
            $this->getConnection();
        } catch (\Throwable $exception) {
            throw $exception;
        }
    }

    /**
     * Call action function to call the actions of the class for doing changes in the databases
     *
     * @param string $action
     * @param string $params
     * @return array
     * @return bool
     * @throws \Throwable
     */
    public function callAction($action, $params)
    {
        $this->databaseSetUp();
        $this->mapper($params);
        return $this->$action();
    }

    /**
     * Mapper for implmenting the ORM using entity. Mapping is done with the help of params array.
     *
     * @param array $params
     * @return null
     * @throws \Throwable
     */
    public function mapper($params)
    {
        try {
            $fields =  $this->getEntity()->getAttribute("db");
            foreach($fields as $key) {
                if (isset($params[$key]))
                    $this->getEntity()->setAttribute($key, $params[$key]);
            }
            return true;
        } catch (\Throwable $exception) {
            throw $exception;
        }

    }
}