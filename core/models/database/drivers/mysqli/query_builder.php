<?php
/**
 * This File Implements query_builder for MVC that is called by base model and is responsible for generating query strings
 * of databases
 *
 */
namespace core\models\database\drivers\mysqli;

/**
 * This Class Implements query builder functions like insert,delete, update and select and return the query string.
 *
 */
class query_builder
{
    /**
     * function that will make query for insert by using entity ORM Mapping and return the string
     * @param object $entity
     * @return string
     * @throws \Exception
     */
    public function add($entity)
    {
        try
        {
            $queryfirstpart = "INSERT INTO " . $entity->getAttribute('tablename') . " (";
            $querysecondpart = " VALUES (";
            foreach ($entity->getAttribute('db') as $x => $x_value) {
                $queryfirstpart = $queryfirstpart . $x_value . ", ";
                $querysecondpart = $querysecondpart . "'" . $entity->getAttribute($x_value) . "'" . ", ";
            }
            $queryfirstpart = substr($queryfirstpart, 0, -2);
            $querysecondpart = substr($querysecondpart, 0, -2);
            $queryfirstpart = $queryfirstpart . ')';
            $querysecondpart = $querysecondpart . ')';
                return $queryfirstpart . $querysecondpart;
        } catch (\Throwable $exception) {
            throw new \Exception('No Entity Object is Found ');
        }
    }

    /**
     * function that will make query for update by using entity ORM Mapping and return the string
     * @param object $entity
     * @return string
     * @throws \Exception
     */
    public function update($entity)
    {
        try {
            $query="UPDATE ".$entity->getAttribute('tablename'). " SET ";
            foreach( $entity->getAttribute('db') as $x => $x_value) {
                $query = $query . $x_value . " =" . "'" .  $entity->getAttribute($x_value) . "'" . ", ";
            }
            $query = substr($query, 0, -3);
            $query = $query. "'" . " WHERE id = ".$entity->getAttribute('id');
            return $query;
        } catch (\Throwable $exception) {
            throw new \Exception('No Entity Object is Found ');
        }
    }

    /**
     * function that will make query for delete by using entity ORM Mapping and return the string.
     * @param object $entity
     * @return string
     * @throws \Exception
     */
    public function delete($entity)
    {
        try {
            $query="DELETE FROM ".$entity->getAttribute('tablename'). " where id ="."'".$entity->getAttribute('id')."'";
            return $query;
        } catch (\Throwable $exception) {
            throw new \Exception('No Entity Object is Found ');
        }
    }

    /**
     * function that will make query for select by using entity ORM Mapping and return the string.
     * @param object $entity
     * @return string
     * @throws \Exception
     */
    public function select($entity)
    {
        try {
            $id = $entity->getAttribute('id');
            if ($id)
                $query="Select * FROM ".$entity->getAttribute('tablename'). " where id ="."'".$id."'";
            else
                $query="Select * FROM ".$entity->getAttribute('tablename');
            return $query;
        } catch (\Throwable $exception) {
            throw new \Exception('No Entity Object is Found ');
        }
    }
}