<?php
/**
 * This File Implements tests for dbDriverFactory
 *
 */
use PHPUnit\Framework\TestCase;

/**
 * This class Implements tests for dbDriverFactory
 *
 */
class dbDriverFactoryTest extends TestCase
{
    /**
     * function provideData for providing testinstanceGenerator
     * @return null
     */
    public function provideData()
    {
        return [
            [
                'mysqli_driver',
                \core\models\database\drivers\mysqli\mysqli_driver::class,
            ],
            [
                "abcd",
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
    public function testinstanceGenerator($input,$expectedResult)
    {
        if($expectedResult == false)
            $this->expectException('Exception');
        $this->assertInstanceOf($expectedResult, \core\models\database\drivers\mysqli\dbDriverFacotry::instanceGenerator($input));
    }
}