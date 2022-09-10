<?php
/**
 * This File Implements modelInterface for MVC. The purpose of this file is to give blueprint of the project
 *
 */
namespace core\models;

/**
 * This Class Implements modelInterface. All the model classes will have to implment the below functions.
 *
 */
interface modelInterface
{
    /**
     * add function to be implemented by sub-classes to add data from db..
     *
     * @return null
     */
    public function add();

    /**
     * update function to be implemented by sub-classes to update data from db.
     *
     * @return null
     */
    public function update();

    /**
     * Delete function to be implemented by sub-classes to delete data from db.
     *
     * @return null
     */
    public function delete();

    /**
     * select function to be implemented by sub-classes to select data from db.
     *
     * @return null
     */
    public function select();

    /**
     * Function to be implemented by sub-classes.
     * @param string $action
     * @param string $params
     * @return null
     */
    public function callAction($action, $params);
}