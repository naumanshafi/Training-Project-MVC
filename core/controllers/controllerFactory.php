<?php
/**
 * This File Implements ControllerFactory that is responsible for generating controller objects
 *
 */
namespace core\controllers;

use app\controllers\courseController;
use app\controllers\studentController;
use app\controllers\teacherController;

/**
 * ControllerFactory class for generating controller classes using static method on the
 * basis of type parameter.
 *
 */
class controllerFactory
{
    /**
     * Function instanceGenerator for Creating base-controller subclasses Objects
     * @param string $controller
     * @return studentController
     * @return courseController
     * @return teacherController
     * @throws \Exception
     */
    public static function instanceGenerator($controller)
    {
        try {
            $controller = "\\app\\controllers\\$controller";
            if (get_parent_class($controller) == 'core\controllers\baseController') {
                return new $controller();
            }
            else throw new \Exception();
        }
        catch (\Throwable $exception) {
            throw new \Exception('Error in controller Factory');
        }
    }
}
