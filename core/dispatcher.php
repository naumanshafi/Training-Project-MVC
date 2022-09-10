<?php
/**
 * This File Implements Dispatcher. Dispatcher is responsible for dispatching the request.
 *
 */
namespace core;

use core\controllers\controllerFactory;
use core\controllers\errorHandlingController;
use Exception;

/**
 *  Dispatcher Class called by index that will give commands to request class
 * and then call controller
 *
 */
class dispatcher
{
    /**
     * function dispatchRequest is responsible for dispatching the request and calling the error controller when
     * exceptions occur
     * @return boolean
     * @throws \Throwable
     */
    public static function dispatchRequest()
    {
        try {
            if (\core\request::getInstance()->getPostrequestflag()){
                $controller=controllerFactory::instancegenerator(request::getinstance()->getController());
                $controller->callAction(request::getinstance()->getAction());
            }
            else {
                $controller = \core\controllers\controllerFactory::instanceGenerator("homeController");
                $controller->callAction("home");
            }
        } catch (Exception $exception) {
            echo $exception->getMessage();
            $errorhandlingcontroller = new errorHandlingController();
            $errorhandlingcontroller->errorReporting("errorHandlingController" ,"errorHandling",$exception->getMessage());
        }
    }
}
