<?php
/**
 * This File Implements teacherEntity for doing ORM MApping for teachers table
 *
 */
namespace app\models\metadata;

/**
 * This class Implements teacherEntity for doing ORM mapping by model
 *
 */
class teacherEntity
{
    /**
     * class variable for teacher tablename
     *
     * @var string $tablename
     */
    private $tablename;
    /**
     * class variable for teacher table attribute
     *
     * @var string $id
     */
    private $id;
    /**
     * class variable for teacher table attribute
     *
     * @var string $f_name
     */
    private $f_name;
    /**
     * class variable for teacher table attribute
     *
     * @var string $l_name
     */
    private $l_name;
    /**
     * class variable for teacher table attribute
     *
     * @var string $age
     */
    private $age;
    /**
     * class variable for teacher table attribute
     *
     * @var string $contact
     */
    private $contact;
    /**
     * class variable for teacher table attribute
     *
     * @var string $department
     */
    private $department;
    /**
     * class variable for teacher table attribute
     *
     * @var array $db
     */
    private $db;

    /**
     * studentEntity constructor.
     */
    public function __construct()
    {
        $this->tablename="teacher";
        $this->db = array("id","f_name","l_name", "age","department","contact");
    }

    /**
     * Function getAttribute for getting the attributes of this class using dynamic behaviour
     * @param string $name
     * @return null
     */
    public function getAttribute($name)
    {
        return $this->$name;
    }

    /**
     * Function setAttribute for setting the attributes of this class using dynamic behaviour
     * @param string $name
     * @param string $val
     * @return null
     */
    public function setAttribute($name, $val)
    {
        $this->$name = $val;
    }

}