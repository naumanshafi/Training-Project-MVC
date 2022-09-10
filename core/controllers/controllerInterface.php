<?php
/**
 * This File Implements Controllerinterface and create abstraction and blueprint of controller functions
 * and all the subclasses has to create that functions
 *
 */
namespace core\controllers;

/**
 * This Class Implements Controllerinterface and gives blueprint of functions to its sub classes
 *
 */
interface controllerInterface
{
    /**
     * Function to be implemented by sub-classes.
     *
     * @return null
     */
    public function add();

    /**
     * Function to be implemented by sub-classes.
     *
     * @return null
     */
    public function update();

    /**
     * Function to be implemented by sub-classes.
     *
     * @return null
     */
    public function delete();

    /**
     * Function to be implemented by sub-classes.
     *
     * @return null
     */
    public function select();

    /**
     * Function to be implemented by sub-classes.
     * @param string $action
     * @return null
     */
    public function callAction($action);
}
