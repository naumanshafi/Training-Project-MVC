<?php
/**
 * This File Implements testing for controllerFactory class
 *
 */
use PHPUnit\Framework\TestCase;

/**
 * This class Implements tests for controllerFactory
 *
 */
class controllerFactoryTest extends TestCase
{
    /**
     * function for providing data to testinstanceGenerator function
     * @return null
     */
    public function provideData()
    {
        return [
            [
                'studentController',
                 \app\controllers\studentController::class,
            ],
            [
                'courseController',
                \app\controllers\courseController::class,
            ],
            [
                'teacherController',
                \app\controllers\teacherController::class,
            ],
            [
                array("abcd","sss"),
                 false,
            ],
            [
                'abss',
                false,
            ],
        ];
    }

    /**
     * function testinstanceGenerator for testing instance generator function of controller factory
     * @dataProvider provideData
     * @param string $input
     * @param object $expectedResult
     * @return null
     * @throws Exception
     */
    public function testInstanceGenerator($input,$expectedResult)
    {
        if($expectedResult == false)
            $this->expectException('Exception');
      $this->assertInstanceOf($expectedResult, \core\controllers\controllerFactory::instanceGenerator($input));
    }

}