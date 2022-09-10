<?php
/**
 * This File Implements course model for doing mapping with course table in the database
 *
 */
namespace app\models;

use app\models\metadata\courseEntity;
use core\models\baseModel;

/**
 * This class Implements course model for course table in db
 *
 */
class course extends baseModel
{
    /**
     * class variable used by model for doing ORM Mapping
     *
     * @var courseEntity $studentEntity
     */
    public $teacherEntity;

    /**
     * student constructor.
     */
    public function __construct()
    {
        parent::__construct('courseEntity');
    }
}