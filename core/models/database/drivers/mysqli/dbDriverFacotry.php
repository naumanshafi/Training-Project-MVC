<?php
/**
 * This File Implements dbDriverFacotry and generate Database objects
 *
 */
namespace core\models\database\drivers\mysqli;

/**
 * dbDriverFacotry class for generating Database classes using static method on the
 * basis of $driverName parameter.
 *
 */
class dbDriverFacotry
{
    /**
     * Function instanceGenerator for Creating Databases Objects
     * @param string $driverName
     * @return mysqli_driver
     * @throws \Exception
     */
    public static function instanceGenerator($driverName)
    {
        try
        {
            $driverName = "\\core\\models\\database\\drivers\\mysqli\\$driverName";
            return $driverName::getInstance();
        }
        catch (\Throwable $exception)
        {
            throw new \Exception('No Such Database Driver Is Availabe');
        }
    }
}