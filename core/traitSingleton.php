<?php
/**
 * This File Implements traits for Singleton Patterns. Used by Singleton Classes
 *
 */
namespace core;

/**
 * This traits Implements functions for Singleton Patterns. Used by Singleton Classes
 *
 */
trait traitSingleton
{
    /**
     * trait static variable implementing singleton trait.
     *
     * @var static $instance
     */
    private static $instance;

    /**
     * function getinstance that returns the singleton object of a class using trait.
     * @return object
     * @throws \Throwable
     */
    public static function getInstance()
    {
        try
        {
            if (!self::$instance) {
                self::$instance = new self();
            }
            return self::$instance;
        }
        catch (\Throwable $exception)
        {
            throw $exception;
        }
    }

    /**
     * function clone to implement proper singleton
     * @return null
     */
    private final function __clone(){}

    /**
     * function wakeup to implement proper singleton
     * @return null
     */
    private final function __wakeup(){}

    /**
     * function __sleep to implement proper singleton
     * @return null
     */
    private final function __sleep(){}
}