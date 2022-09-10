<?php
/**
 *  query_builderTest File.
 *
 */
use core\models\database\drivers\mysqli\query_builder;

/**
 *  query_builderTest Class.
 *
 */
class query_builderTest extends \PHPUnit\Framework\TestCase
{
    /**
     * function provideaddData provides data to testactions
     * @return null
     */
    public function provideaddData()
    {
        return [
            [
                array('tablename'=>"course",'db'=>array("id","name", "hours","type"),'id'=>1213, 'name'=>'CP','hours'=>3, 'type'=>"CS"),
                "INSERT INTO course (id, name, hours, type) VALUES ('1213', 'CP', '3', 'CS')",
                "add",
            ],
            [
                array('tablename'=>"course",'db'=>array("id","name", "hours","type"),'id'=>1213, 'name'=>'CP','hours'=>3, 'type'=>"CS"),
                "UPDATE course SET id ='1213', name ='CP', hours ='3', type ='CS' WHERE id = 1213",
                "update",
            ],
            [
                array('tablename'=>"course", 'id'=>"1213"),
                "DELETE FROM course where id ='1213'",
                "delete",
            ],
            [
                array('id'=>'', 'tablename'=>"course"),
                "Select * FROM course",
                "select",
            ],
            [
                array('id'=>'', 'tablename'=>"course"),
                "Select * FROM course",
                "select",
            ],
            [
                array('id'=>'2121', 'tablename'=>"course"),
                "Select * FROM course where id ='2121'",
                "select",
            ],

        ];
    }

    /**
     * function providexceptionsData provides data to testexcepyions
     * @return null
     */
    public function providexceptionsData()
    {
        return [
            [
                "sasa",
                'add',
                true
            ],
            [
                "sasa",
                'select',
                true
            ],
            [
                "sasa",
                'delete',
                true
            ],
            [
                "sasa",
                'update',
                true
            ],
        ];
    }

    /**
     * function testclass for testing query builder class.
     * @dataProvider provideaddData
     * @param $params
     * @param $expectedQuery
     * @return null
     * @throws Exception
     */
    public function testactions($params,$expectedQuery, $methodName)
    {
        $queryObject = new query_builder();
        $i = 0;
        $entity = $this->createMock(\app\models\metadata\courseEntity::class);
        foreach ($params as $xkey => $key_value) {
            $entity = $this->enitybuilder($entity, $i, $xkey, $key_value);
            $i = $i + 1;
        }
        if ($methodName == 'update')
            $entity = $this->enitybuilder($entity, 6, 'id', 1213);
        $this->assertSame($expectedQuery, $queryObject->$methodName($entity));
    }

    /**
     * function enitybuilder.
     * @param $entity
     * @param $index
     * @param $arg
     * @param $returnvalue
     * @return object
     */
    public function enitybuilder ($entity, $index, $arg, $returnvalue)
    {
        $entity
            ->expects($this->at($index))
            ->method('getAttribute')
            ->with($arg)
            ->will($this->returnValue($returnvalue));
        return $entity;
    }

    /**
     * function testclass for testing query builder class.
     * @dataProvider providexceptionsData
     * @param $params
     * @param $methodName
     * @param $expectedQuery
     * @return null
     * @throws Exception
     */
    public function testexcepyions($params,$methodName,$expectedQuery)
    {
        $querybulder=  new query_builder();
        $this->expectException('Exception');
        $this->assertSame($expectedQuery, $querybulder->$methodName($params));
    }
}