<?php
/**
 * This File Implements viewManager for MVC
 *
 */
namespace core\views;

/**
 * This Class Implements viewManager for MVC and it is called by base controller for updating the view.
 *
 */
class viewManager
{
    /**
     * function that will render
     * @param object $entity
     * @param string $view
     * @param object $result
     * @return bool
     * @throws \Throwable
     */
    public function render($entity, $view, $result)
    {
        try
        {
            $phppath = $this->path($entity, $view);
            if (file_exists($phppath))
            require $phppath;
            else
                throw new \Exception('No File found by ViewManager Render Function ');
            return true;
        }
        catch (\Throwable $exception)
        {
            throw $exception;
        }
    }

    /**
     * function that will make path of the view file using $entity and $view paramters
     * @return string
     */
    public function path($entity, $view)
    {
        $entity = explode("Controller", $entity);
        $fileNameWithExtension = $view . ".php";
        $path = root."/app/views/$entity[0]/$fileNameWithExtension";
        return $path;
    }
}