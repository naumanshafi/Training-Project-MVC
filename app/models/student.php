<?php
/**
 * This File Implements student model for doing mapping with student table in the database
 *
 */
namespace app\models;

use app\models\metadata\studentEntity;
use core\models\baseModel;

/**
 * This class Implements student model for student table in db and entity for doing ORM mapping
 *
 */
class student extends baseModel
{
    /**
     * class variable used by model for doing ORM Mapping
     *
     * @var studentEntity $studentEntity
     */
    public $studentEntity;

    /**
     * student constructor.
     */
    public function __construct()
    {
        parent::__construct('studentEntity');
    }
}