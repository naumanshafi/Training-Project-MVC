<?php
/**
 * This File Implements modelfactory and responsilbe for generating model objects
 *
 */
namespace core\models;

/**
 * modelFactory class for generating model objects using static method on the
 * basis of model parameter.
 *
 */
class modelFactory
{
    /**
     * Function factorymethod for Creating Objects of basemodel subclasses
     * @param string $action
     * @return mixed
     * @throws \Exception
     */
    public static function instanceGenerator($model)
    {
        try {
            $model = "\\app\\models\\$model";
            if (get_parent_class($model) == 'core\models\baseModel') {
                return new $model();
            }
            else throw new \Exception();
        }
        catch (\Throwable $exception) {
            throw new \Exception('Error in the Parameter given to model Factory');
        }
    }
}