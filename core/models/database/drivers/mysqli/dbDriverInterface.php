<?php
/**
 * interface of driver is implemented in this file.
 */
namespace core\models\database\drivers\mysqli;

/**
 * Interface driverInterface
 * @package core\controllers
 */
interface dbDriverInterface
{
    /**
     * Function to be implemented by sub-classes.
     * @return mixed
     */
    public static function getInstance();

    /**
     * Function to be implemented by sub-classes.
     * @return mixed
     */
    public function connect();


    /**
     * Function to be implemented by sub-classes.
     * @return mixed
     */
    public function disconnect();

    /**
     * Function to be implemented by sub-classes.
     * @param $querystring
     * @return mixed
     */
    public function execute($querystring);
}
