<?php
/**
 *  This file implemets tests for  baseModel Class.
 *
 */
use PHPUnit\Framework\TestCase;


/**
 *  This class implemets tests for  baseModel Class.
 *
 */
class baseMmodelTest extends TestCase
{
    /**
     * function provideData for providing data to the testActions.
     * @return null
     */
    public function provideData()
    {
        return [
            [
                'getQuery',
                'executeQuery',
                'add',
                "INSERT INTO student (id, f_name, l_name, age, contact, major) VALUES ('1', 'Moiz', 'Farasat', '23', '03224', 'CS')",
                true,
                true,
            ],
            [
                'getQuery',
                'executeQuery',
                'add',
                "INSERT INTO student (id, f_name, l_name, age, contact, major) VALUES ('1', 'Moiz', 'Farasat', '23', '03224', 'CS')",
                false,
                false,
            ],
            [
                'getQuery',
                'executeQuery',
                'update',
                "UPDATE student SET id ='121', f_name ='Moiz', l_name ='Ahmed', age ='23', contact ='0322', major ='CS' WHERE id = 121",
                true,
                true,
            ],
            [
                'getQuery',
                'executeQuery',
                'update',
                "UPDATE student SET id ='121', f_name ='Moiz', l_name ='Ahmed', age ='23', contact ='0322', major ='CS' WHERE id = 121",
                false,
                false,
            ],
            [
                'getQuery',
                'executeQuery',
                'delete',
                "DELETE FROM student where id ='121'",
                true,
                true,
            ],
            [
                'getQuery',
                'executeQuery',
                'delete',
                "DELETE FROM student where id ='121'",
                false,
                false,
            ],
            [
                'getQuery',
                'executeQuery',
                'select',
                "Select * FROM student where id ='121'",
                true,
                true,
            ],
            [
                'getQuery',
                'executeQuery',
                'select',
                "Select * FROM student where id ='121'",
                false,
                false,
            ],
        ];
    }

    /**
     * function provideDatatoMapper for providing data to the testmapper.
     * @return null
     */
    public function provideDatatoMapper()
    {
        return [
            [
                array('id'=>1213, 'name'=>'CP','hours'=>3, 'type'=>"CS"),
                true,
            ],
            [
                array('idd'=>1213, 'name'=>'CP','hours'=>3, 'type'=>"CS"),
                true,
            ],
        ];
    }

    /**
     * function for testing the whole class of BaseModel.
     * @dataProvider provideData
     * @return null
     */
    public function testActions($firstMethodName, $thirdMethodName,$argumentFormMthodOne, $returnValueOne, $returnValueThree, $expectedOutput)
    {
        $basemodel = $this->getMockBuilder(\core\models\baseModel::class)->setMethods(array($firstMethodName,$thirdMethodName))
            -> disableOriginalConstructor()->getMock();
        $basemodel->expects($this->once())->method($firstMethodName)
            ->with($argumentFormMthodOne)
            ->will($this->returnValue($returnValueOne));
        $basemodel->expects($this->once())->method($thirdMethodName)
            ->with($returnValueOne)
            ->will($this->returnValue($returnValueThree));
        $this->assertSame($expectedOutput, $basemodel->$argumentFormMthodOne());
    }

    /**
     * function for testing the whole class of BaseModel.
     * @dataProvider provideDatatoMapper
     * @return null
     * @throws Exception
     */
    public function testmapper($params,$expectedOutput)
    {
        $model = \core\models\modelFactory::instanceGenerator('course');
        $this->assertSame($expectedOutput,  $model->mapper($params));
    }
}
