<?php
/**
 * This File Implements courseentity for doing ORM MApping for courses table
 *
 */
namespace app\models\metadata;

/**
 * This class Implements courseEntity for doing ORM mapping by model
 *
 */
class courseEntity
{
    /**
     * class variable for tablename
     *
     * @var string $tablename
     */
    private $tablename;
    /**
     * class variable courses table attribute
     *
     * @var string $id
     */
    private $id;
    /**
     * class variable courses table attribute
     *
     * @var string $name
     */
    private $name;
    /**
     * class variable courses table attribute
     *
     * @var string $hours
     */
    private $hours;
    /**
     * class variable courses table attribute
     *
     * @var string $type
     */
    private $type;
    /**
     * class variable courses table attribute
     *
     * @var array $db
     */
    private $db;

    /**
     * studentEntity constructor.
     */
    public function __construct()
    {
        $this->tablename="course";
        $this->db = array("id","name", "hours","type");
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