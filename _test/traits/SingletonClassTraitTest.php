<?php
namespace asbamboo\helper\_test\traits;

use PHPUnit\Framework\TestCase;
use asbamboo\helper\traits\SingletonClassTrait;

class SingletonClassTraitTest extends TestCase
{
    public function testConstruct()
    {
        $this->expectExceptionMessage("Call to protected asbamboo\\helper\\_test\\traits\\Temp::__construct() from context 'asbamboo\\helper\\_test\\traits\\SingletonClassTraitTest'");

        $temp   = new Temp();
    }

    public function testInstance()
    {
        $temp   = Temp::instance();

        $this->assertInstanceOf(Temp::class, $temp);

        return $temp;
    }

    /**
     * @depends testInstance
     */
    public function testSleep($temp)
    {
        try
        {
            $temp   = serialize($temp);
        }catch(\Throwable $e){
            $this->assertEquals(
                $e->getMessage(),
                "Invalid callback asbamboo\\helper\\_test\\traits\\Temp::__sleep, cannot access private method asbamboo\\helper\\_test\\traits\\Temp::__sleep()"
            );
        }
    }


    public function testWakeup()
    {
        try
        {
            $temp2   = Temp2::instance();
            $temp2   = serialize($temp2);
            $temp2   = unserialize($temp2);
        }catch(\Throwable $e){
            $this->assertEquals(
                $e->getMessage(),
                "Invalid callback asbamboo\\helper\\_test\\traits\\Temp2::__wakeup, cannot access private method asbamboo\\helper\\_test\\traits\\Temp2::__wakeup()"
            );
        }
    }

    /**
     * @depends testInstance
     */
    public function testClone($temp)
    {
        $this->expectExceptionMessage("Call to private asbamboo\\helper\\_test\\traits\\Temp::__clone() from context 'asbamboo\\helper\\_test\\traits\\SingletonClassTraitTest'");
        $temp2  = clone $temp;
    }
}

class Temp
{
    use SingletonClassTrait;
}

class Temp2
{
    use SingletonClassTrait;

    final public function __sleep()
    {
        return [];
    }
}