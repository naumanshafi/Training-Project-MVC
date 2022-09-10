<?php
/**
 *  This file contains tests for basemodel
 *
 */
use PHPUnit\Framework\TestCase;


/**
 * This class contains tests for basemodel
 *
 */
class baseControllerTest extends TestCase
{
    /**
     * function provideData for providing data to the testvalidcallAction.
     * @return null
     */
    public function validCallActionData()
    {
        return [
            [
                'add',
                'getIntializeModel',
                'add',
                true,
                true,
            ],
        ];
    }

    /**
     * function provideData for providing data to the testinvalidcallAction.
     * @return null
     */
    public function invalidCallActionData()
    {
        return [
            [
                'getIntializeModel',
                'sasas',
                true,
                false,
            ],
        ];
    }

    /**
     * function addActionData for providing data to the testadd function.
     * @return null
     */
    public function addActionData()
    {
        return [
            [
                'getRequestParams',
                'getViewHandlerRender',
                'getModelCallAction',
                (array) null,
                "",
                true,
                true,
            ],
            [
                'getRequestParams',
                'getViewHandlerRender',
                'getModelCallAction',
                (array) [12],
                "SuccessFully Updated",
                true,
                true,
            ],
            [
                'getRequestParams',
                'getViewHandlerRender',
                'getModelCallAction',
                (array) [12],
                "SuccessFully Updated",
                false,
                false,
            ],
        ];
    }

    /**
     * function for testing the callaction function of class Basecontroller with valid parameters.
     * @dataProvider validCallActionData
     * @param $action
     * @param $methodName
     * @param $arg
     * @param $returnValue
     * @param $expectedOutput
     * @return null
     */
    public function testValidCallAction($action, $methodName,$arg, $returnValue, $expectedOutput)
    {
        $baseController = $this->getMockBuilder(\core\controllers\baseController::class)->setMethods(array($methodName, $action))
            -> disableOriginalConstructor()->getMock();
        $baseController->expects($this->once())->method($methodName)
        ->will($this->returnValue($returnValue));
        $baseController->expects($this->once())->method($action)
            ->will($this->returnValue($returnValue));
        $this->assertSame($expectedOutput, $baseController->callAction($arg));

    }

    /**
     * function for testing the callaction function of class Basecontroller with invalid parameters.
     * @dataProvider invalidCallActionData
     * @param $methodname
     * @param $arg
     * @param $returnvalue
     * @param $expectedoutput
     * @return null
     */
    public function testInValidCallAction($methodName,$arg, $returnValue, $expectedOutput)
    {
        $baseController = $this->getMockBuilder(\core\controllers\baseController::class)->setMethods(array($methodName))
            -> disableOriginalConstructor()->getMock();
        $baseController->expects($this->once())->method($methodName)
            ->will($this->returnValue($returnValue));
        $this->expectException('Exception');
        $this->assertSame($expectedOutput, $baseController->callAction($arg));

    }

    /**
     * function for testing the callaction function of class Basecontroller with invalid parameters.
     * @dataProvider addActionData
     * @param $firstmethodname
     * @param $secondmethodname
     * @param $returnvalueformethodone
     * @param $argumentformethodtwo
     * @param $expectedoutcome
     * @return null
     */
    public function testadd($firstMethodName, $secondMethodName, $thirdMethodName, $returnValueforMethodOne, $argumentFormMthodTwo,$returnValueForMethodThree, $expectedOutcome)
    {
        $basecontroller = $this->getMockBuilder(\core\controllers\baseController::class)
            ->setMethods(array($firstMethodName, $secondMethodName,$thirdMethodName))
            -> disableOriginalConstructor()->getMock();
        $basecontroller->expects($this->any())->method($firstMethodName)
            ->will($this->returnValue($returnValueforMethodOne));
        $basecontroller->expects($this->any())->method($secondMethodName)
            ->with($argumentFormMthodTwo)
            ->will($this->returnValue($expectedOutcome));
        $basecontroller->expects($this->any())->method($thirdMethodName)
            ->will($this->returnValue($returnValueForMethodThree));
        $this->assertSame($expectedOutcome, $basecontroller->add());
    }
}
