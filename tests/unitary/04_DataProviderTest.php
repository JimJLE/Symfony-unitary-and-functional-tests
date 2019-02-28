<?php

namespace App\Tests\Unitary;

use PHPUnit\Framework\TestCase;

class DataProviderTest extends TestCase
{

    /**
     * @dataProvider someProvider
     */
    public function testSomeTestUnitaire($expected, $a, $b) {
        $this->assertSame($expected, $a + $b);
    }

    public function someProvider() {
        return [
            "One plus One"      => [2, 1, 1],
            "One plus zero"     => [1, 1, 9],
            "Zero plus zero"    => [0, 0, 0]
        ];
    }
}