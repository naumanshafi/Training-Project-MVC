<?php
/**
 *  This file is testing Request class
 *
 */
use PHPUnit\Framework\TestCase;

/**
 *  This class is testing Request class
 *
 */
class requestTest extends TestCase
{

    public function requestData()
    {
        return [
            [
                'POST',
            ],
            [
                '',
            ],
        ];
    }

    /**
     * function testing request class
     * @dataProvider requestData
     * @return null
     * @throws Throwable
     */
    public function testrequest($input)
    {
        $_SERVER["REQUEST_METHOD"] = $input ;
        $_REQUEST['getcontroller'] = $input;
        $_REQUEST['action'] = '' ;
        $requestobject = \core\request::getInstance();
        $requestobjecttwo = \core\request::getInstance();
        $this->assertSame($requestobject, $requestobjecttwo);
    }
}