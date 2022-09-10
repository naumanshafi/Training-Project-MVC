<?php
/**
 * This File Implements studentEntity for doing ORM MApping for student table
 *
 */
namespace app\models\metadata;

/**
 * This class Implements studentEntity for doing ORM mapping by model
 *
 */
class studentEntity
{
    /**
     * class variable for tablename
     *
     * @var string $tablename
     */
    private $tablename;
    /**
     * class variable for student table attribute
     *
     * @var string $id
     */
    private $id = 0;
    /**
     * class variable for student table attribute
     *
     * @var string $f_name
     */
    private $f_name;
    /**
     * class variable for student table attribute
     *
     * @var string $l_name
     */
    private $l_name;
    /**
     * class variable for student table attribute
     *
     * @var string $age
     */
    private $age;
    /**
     * class variable for student table attribute
     *
     * @var string $contact
     */
    private $contact;
    /**
     * class variable for student table attribute
     *
     * @var string $db
     */
    private $db;
    /**
     * class variable for student table attribute
     *
     * @var string $major
     */
    private $major;

    /**
     * studentEntity constructor.
     */
    public function __construct()
    {
        $this->tablename="student";
        $this->db = array("id", "f_name", "l_name","age","contact", "major");
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


