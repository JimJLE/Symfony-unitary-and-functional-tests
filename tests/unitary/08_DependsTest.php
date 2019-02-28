<?php

namespace App\Tests\Unitary;

use PHPUnit\Framework\TestCase;
use Symfony\Component\Stopwatch\Stopwatch;

class DependsTest extends TestCase
{
    public $tva = '5.5';

    public function testTvaExist() {
        $rule_003 = 'La tva doit être égale à 5,5.';

        $this->assertEquals($this->tva, "5.5", $rule_003);
    }

    /**
     * @depends testTvaExist
     */
    public function testMetier() {
        $total = $this->tva * 23;
        $this->assertGreaterThan(10, $total);
    }
}