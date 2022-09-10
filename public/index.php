<?php
/**
 * This File Implements index for MVC. On every request first index file is called.
 *
 */
define('root',dirname(__DIR__)."/");
require_once (root."vendors/autoload.php");

try {
\core\dispatcher::dispatchRequest();
} catch (\Throwable $exception) {
    $errorhandlingcontroller = new \core\controllers\errorHandlingController();
    $errorhandlingcontroller->errorReporting("errorHandlingController" ,"errorHandling",$exception->getMessage());
};