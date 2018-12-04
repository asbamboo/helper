<?php
namespace asbamboo\helper\_test\env;

use PHPUnit\Framework\TestCase;
use asbamboo\helper\arr\ArrayHelper;
class ArrayHelperTest extends TestCase
{
    public function testResetKey()
    {
        $array  = [
            ['id' => 'id1', 'value' => 'value1'],
            ['id' => 'id2', 'value' => 'value2'],
            ['id' => 'id3', 'value' => 'value3'],
        ];
        $array  = ArrayHelper::resetKey($array, ['id']);

        $this->assertEquals('value1', $array['id1']['value']);
        $this->assertEquals('value2', $array['id2']['value']);
        $this->assertEquals('value3', $array['id3']['value']);
    }
}
