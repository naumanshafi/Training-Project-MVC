<?php
/**
 * This File Implements teacher model for doing mapping with teacher table in the database
 *
 */
namespace app\models;

use app\models\metadata\teacherEntity;
use core\models\baseModel;

/**
 * This class Implements teacher model for teacher table in db and entity for doing ORM mapping
 *
 */
class teacher extends baseModel
{
    /**
     * class variable used by model for doing ORM Mapping
     *
     * @var teacherEntity $teacherEntity
     */
    public $teacherEntity;

    /**
     * student constructor.
     */
    public function __construct()
    {
        parent::__construct('teacherEntity');
    }
}