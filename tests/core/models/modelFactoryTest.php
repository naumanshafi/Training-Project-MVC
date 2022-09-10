<?php
/**
 *  modelFactoryTest File.
 *
 */
use PHPUnit\Framework\TestCase;

/**
 *  modelFactoryTest Class.
 *
 */
class modelFactoryTest extends TestCase
{
    /**
     * function provideData for providing data to the testinstanceGenerator.
     * @return null
     */
    public function provideData()
    {
        return [
            [
                'student',
                \app\models\student::class,
            ],
            [
                'course',
                \app\models\course::class,
            ],
            [
                'teacher',
                \app\models\teacher::class,
            ],
            [
                array("abcd","sss"),
                false,
            ],
        ];
    }

    /**
     * function testinstanceGenerator.
     * @dataProvider provideData
     * @param string $input
     * @param object $expectedResult
     * @return null
     * @throws Exception
     */
    public function testinstanceGenerator($input, $expectedResult)
    {
        if($expectedResult == false)
            $this->expectException('Exception');
        $this->assertInstanceOf($expectedResult, \core\models\modelFactory::instanceGenerator($input));
    }
}