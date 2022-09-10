<?php
/**
 * This File Implements Controller for MVC. COntroller is responsible for implmenting the request that it get from dispatcher
 * and viewing the result to the user after getting processed.
 *
 */
namespace core\controllers;

use core\models\modelFactory;
use core\request;
use core\views\viewManager;

/**
 * Simple BaseController Class for implementing MVC.
 * This class is called by dispatcher and in turn it calls model and viewmanager.
 *
 */
class baseController implements controllerInterface
{
    /**
     * class variable of viewhandler used for call render function
     *
     * @var string $viewhandler
     */
    protected $viewhandler;
    /**
     * class variable of $model used to make models of different type on the basis
     * of reqeust and for calling model functions
     *
     * @var object $model
     */
    protected $model;

    /**
     * baseController constructor.
     * @param $viewhandler
     */
    public function __construct()
    {
        $this->viewhandler = new viewManager();
    }

    /**
     * function for add that is handling add query by using add function of model class
     * and by render function of viewmanager class
     *
     * @return boolean
     * @throws \Throwable
     */
    public function add()
    {
        try {
            if (empty($this->getRequestParams())) {
                    return $this->getViewHandlerRender("");
            }
            else if ($this->getModelCallAction()) {
                    return $this->getViewHandlerRender("SuccessFully Updated");
                }
            return false;
        } catch (\Throwable $exception) {
            throw $exception;
        }

    }

    /**
     * function for update that is handling update query by using update function of
     * model class and by render function of viewmanager class
     *
     * @return boolean
     * @throws \Throwable
     */
    public function update()
    {
        try {
            if (empty(request::getInstance()->getParams())) {
                $this->viewhandler->render(request::getInstance()
                    ->getController(), request::getInstance()->getAction(), "");
            }
            else if (sizeof(request::getInstance()->getParams())==1) {
                $result = $this->model->callAction('select',request::getInstance()->getParams());
                $this->viewhandler->render(request::getInstance()
                    ->getController(), request::getInstance()->getAction(), $result);
            }
            else if (sizeof(request::getinstance()->getParams())>1) {
                $result = $this->model->callAction(request::getInstance()
                    ->getAction(),request::getInstance()->getParams());
                $this->viewhandler->render(request::getInstance()
                    ->getController(), request::getInstance()->getAction(), $result);;
            }
        } catch (\Throwable $exception) {
            throw $exception;
        }
    }

    /**
     * function for delete that is handling delete query by using delete function of
     * model class and by render function of viewmanager class
     *
     * @return boolean
     * @throws \Throwable
     */
    public function delete()
    {
        try {
            if (empty(request::getInstance()->getParams())) {
                $this->viewhandler->render(request::getInstance()
                    ->getController(), request::getInstance()->getAction(), "");
            }
            else {
                if ($this->model->callAction(request::getInstance()
                    ->getAction(),request::getInstance()->getParams()))
                    $this->viewhandler->render(request::getInstance()
                        ->getController(), request::getInstance()->getAction(),"SuccessFully Deleted");
                else
                    $this->viewhandler->render(request::getInstance()
                        ->getController(), request::getInstance()->getAction(),"Error Please Check ID");
            }
        } catch (\Throwable $exception) {
            throw $exception;
        }
    }

    /**
     * function for select that is handling select query by using select function of model class
     * and by render function of viewmanager class
     *
     * @return boolean
     * @throws \Throwable
     */
    public function select()
    {
        try {
            $result = $this->model->callAction(request::getInstance()
                ->getAction(),request::getInstance()->getParams());
            $this->viewhandler->render(request::getInstance()
                ->getController(), request::getInstance()->getAction(), $result);
        } catch (\Throwable $exception) {
            throw $exception;
        }
    }

    /**
     * function for rendering home view by using render function of viewmanager class
     *
     * @return boolean
     * @throws \Throwable
     */
    public function home()
    {
        $this->viewhandler->render("homeController", "home","");
    }

    /**
     * Function for initializing model object using modelfactroy class function and calling mapper
     * function for implementing ORM
     *
     * @return null
     * @throws \Throwable
     */
    public function initalizeModel()
    {
        try {
            $str_arr = explode("Controller", request::getInstance()->getController());
            $this->model = modelFactory::instanceGenerator($str_arr[0]);
            return true;
        } catch (\Throwable $exception) {
            throw $exception;
        }
    }

    /**
     * call action that is called by dispatcher will call functions
     * using action parameter
     * @param string $action
     * @return boolean
     * @throws \Throwable
     */
    public function callAction($action)
    {
        try {
            if ($action != 'home')
                $this->getIntializeModel();
            if (method_exists($this, $action)) {
                $this->$action();
                return true;
            }
            else {
                throw new \Exception("No Such Action Exists in BaseController");
            }
        } catch (\Throwable $exception) {

            throw $exception;
        }
    }

    /**
     * getIntializeModel that is used to initliaze model and helps in doing mocking
     * using action parameter
     * @return boolean
     * @throws \Throwable
     */
    public function getIntializeModel()
    {
        return $this->initalizeModel();
    }

    /**
     * getRequestParams that is used to initliaze model and helps in doing mocking
     * using action parameter
     * @return boolean
     * @throws \Throwable
     */
    public function getRequestParams()
    {
        return (request::getInstance()->getParams());
    }

    /**
     * getViewHandlerRender that is used to initliaze model and helps in doing mocking
     * using action parameter
     * @param $result
     * @return boolean
     * @throws \Throwable
     */
    public function getViewHandlerRender($result)
    {
        $this->viewhandler->render(request::getInstance()
            ->getController(), request::getInstance()->getAction(), $result);
    }

    /**
     * getModelCallAction that is used to initliaze model and helps in doing mocking
     * using action parameter
     * @param $result
     * @return boolean
     * @throws \Throwable
     */
    public function getModelCallAction()
    {
        return $this->model->callAction(request::getInstance()
            ->getAction(),request::getInstance()->getParams());
    }
}
