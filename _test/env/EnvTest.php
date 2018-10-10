<?php
namespace asbamboo\helper\_test\env;

use PHPUnit\Framework\TestCase;
use asbamboo\helper\env\Env;

class EnvTest extends TestCase
{
    public static $org_env;

    public static  function setUpBeforeClass()
    {
        static::$org_env    = $_ENV;
        $_ENV               = [];
    }

    public static function tearDownAfterClass()
    {
        $_ENV   = static::$org_env;
    }

    public function testSet()
    {
        Env::set('a', 'a');
        $this->assertEquals('a', $_ENV['a']);
    }

    public function testHas()
    {
        $this->assertTrue(Env::has('a'));
        $this->assertFalse(Env::has('b'));
    }

    public function testGet()
    {
        $this->assertEquals('a', Env::get('a'));
        $this->assertEmpty(Env::get('b'));
    }
}
