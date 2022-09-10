<?php
/**
 *Autoloader file finds out the file in the directory and return the path.
 *
 */

/**
 * namespace core is used to find the path of autoloader.
 */
namespace core;


spl_autoload_register (
    /**
 * generate the path
 * @param $class
 */function ($class)
{
    $file = root . '/' . str_replace('\\', '/', $class) . '.php';
    echo $file;
    if (is_readable($file)) {
        require_once $file;
    }
   else
       {
       throw new \Exception('Autoload did not find any such file');
   }
});
?>


















