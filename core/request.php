<?php
/**
 * This File Implements requests for MVC. Request class is called by dispatcher and sets the request parameters for
 * controller use.
 *
 */
namespace core;

/**
 *  Request Class called by disptacher and set the parameters if some request hits the server.
 *
 */
class request
{
    use traitSingleton;

    /**
     * class variable for storing controller extracted from the form
     *
     * @var string $controller
     */
    private $controller;
    /**
     * class variable for storing action extracted from the form
     *
     * @var $action
     */
    private $action;
    /**
     * class variable for storing params extracted from the form
     *
     * @var $params
     */
    protected $params;
    /**
     * class variable for setting the bool when the setter function sets the request
     *
     * @var $params
     */
    protected $postRequestFlag;

    /**
     * request constructor where the request setter function is called to set the request parameters.
     */
    private function __construct()
    {
        $this->postRequestFlag=false;
        $this->setrequest();
    }

    /**
     * function setrequest is responsible for setting the request when a form is submitted
     * @return boolean
     */
    private function setrequest()
    {
        if (isset($_SERVER["REQUEST_METHOD"] ) && $_SERVER["REQUEST_METHOD"] == "POST") {
            $this->postRequestFlag = true;
            $this->controller = $_REQUEST['getcontroller'];
            $this->action = $_REQUEST['action'];
            unset($_REQUEST['getcontroller']);
            unset($_REQUEST['action']);
            unset($_REQUEST['url']);
            $this->params=$_REQUEST;
            unset($_REQUEST);
            return true;
        }
        return false;
    }

    /**
     * function get controller
     * @return string
     */
    public function getController()
    {
        return $this->controller;
    }

    /**
     * function getAction
     * @return string
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * function getter
     * @return array
     */
    public function getParams()
    {
        return $this->params;
    }

    /**
     * function getter for getting request flag
     * @return boolean
     */
    public function getPostrequestflag()
    {
        return $this->postRequestFlag;
    }
}

