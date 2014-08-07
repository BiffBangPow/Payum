<?php
namespace Payum\Core\Tests\Request;

use Payum\Core\Request\SecuredNotify;
use Payum\Core\Model\Token;

class SecuredNotifyTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function shouldBeSubClassOfCapture()
    {
        $rc = new \ReflectionClass('Payum\Core\Request\SecuredNotify');

        $this->assertTrue($rc->isSubclassOf('Payum\Core\Request\Notify'));
    }

    /**
     * @test
     */
    public function shouldImplementsSecuredInterface()
    {
        $rc = new \ReflectionClass('Payum\Core\Request\SecuredNotify');

        $this->assertTrue($rc->implementsInterface('Payum\Core\Request\SecuredInterface'));
    }

    /**
     * @test
     */
    public function couldBeConstructedWithNotificationAndTokenAsModel()
    {
        new SecuredNotify(array(), $this->getMock('Payum\Core\Security\TokenInterface'));
    }

    /**
     * @test
     */
    public function shouldAllowGetTokenSetInConstructor()
    {
        $expectedToken = new Token;
        
        $request = new SecuredNotify($notification = array(), $expectedToken);
        
        $this->assertSame($expectedToken, $request->getToken());
        $this->assertSame($expectedToken, $request->getModel());
    }

    /**
     * @test
     */
    public function shouldAllowSetModelAndKeepTokenSame()
    {
        $token = new Token;

        $request = new SecuredNotify($notification = array(), $token);

        //guard
        $this->assertSame($token, $request->getToken());
        $this->assertSame($token, $request->getModel());

        $newModel = new \stdClass;
            
        $request->setModel($newModel);

        $this->assertSame($token, $request->getToken());
        $this->assertSame($newModel, $request->getModel());
    }
}