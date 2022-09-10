<?php
/**
 * This File Implements error Handling Controller. This COntroller is responsible for passing exceptions to the
 * view manager
 *
 */
namespace core\controllers;

use core\views\viewManager;

/**
 * This class Implements error Handling Controller. This COntroller is responsible for passing exceptions to the
 * view manager using the view manager object and render function
 *
 */
class errorHandlingController
{
    /**
     * class variable of viewhandler used for call render function
     *
     * @var object $viewhandler
     */
    private $viewManager;

    /**
     * errorHandlingController constructor.
     * @param $viewManager
     */
    public function __construct()
    {
        $this->viewManager = new viewManager();
    }

    /**
     * This functions is called by dispatcher when an exception occurs and used to send the exception to the view manager
     * @param string $controller
     * @param string $action
     * @param string $errordata
     * @return boolean
     * @throws \Throwable
     */
    public function errorReporting($controller, $action, $errordata)
    {
        $this->viewManager->render($controller, $action, $errordata);

    }
}