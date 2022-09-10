<?php
/**
 *  viewManagerTest is Test File.
 *
 */
use PHPUnit\Framework\TestCase;

/**
 *  viewManagerTest is Test Class.
 *
 */
class viewManagerTest extends TestCase
{
    /**
     * function provideData providing data to testpath
     * @return null
     */
    public function provideData()
    {
        return [
            [
                'studentController',
                'add',
                root."/app/views/student/add.php",
            ],
            [
                'studentController',
                'delete',
                root."/app/views/student/delete.php",
            ],
            [
                'studentController',
                'update',
                root."/app/views/student/update.php",
            ],
            [
                'studentController',
                'select',
                root."/app/views/student/select.php",
            ],
        ];
    }

    /**
     * function provideRenderdataData providing data to testrender
     * @return null
     */
    public function provideRenderdataData()
    {
        return [
            [
                'studentController',
                'add',
                root."/app/views/student/add.php",
                true,
            ],
            [
                'studentController',
                'add',
                root."/app/views/student/sss.php",
                false,
            ],

        ];
    }

    /**
     * function testing path function of viewManager
     * @dataProvider provideData
     * @param $entity
     * @param $view
     * @param $expected
     * @return null
     * @throws Exception
     */
    public function testpath($entity, $view, $expected)
    {
        $viewManagerInstance = new core\views\viewManager();
        $this->assertSame($expected, $viewManagerInstance->path($entity, $view));
    }

    /**
     * function testing render function of viewManager
     * @dataProvider provideRenderdataData
     * @param $entity
     * @param $view
     * @param $expected
     * @return null
     * @throws Exception
     */
    public function testrender($entity, $view,$returnvalue, $expected)
    {
        $viewManager = $this->getMockBuilder(\core\views\viewManager::class)
            ->setMethods(array('path'))
            -> disableOriginalConstructor()->getMock();
        $viewManager->expects($this->once())->method('path')
            ->with($entity,$view)
            ->will($this->returnValue($returnvalue));
        if($expected == false)
            $this->expectException('Exception');
        $this->assertSame($expected, $viewManager->render($entity, $view, ''));
    }
}