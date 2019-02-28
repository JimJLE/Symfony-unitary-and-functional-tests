<?php

namespace App\Tests\Unitary;

use PHPUnit\Framework\TestCase;

class BeforeAndAfterClassTest extends TestCase
{
    protected static $tva;

    public static function setUpBeforeClass() {
        //$this->tva = "5.5";
        self::$tva = "6";
    }

    public static function tearDownAfterClass() {
        self::$tva = null;
    }

    public function testTvaExist() {
        $rule_003 = 'La tva doit être égale à 6.';

        $this->assertEquals(self::$tva, "6", $rule_003);
        self::$tva = 9;
    }

    
    public function testTvaStillExist() {
        $rule_003 = 'La tva doit être égale à 6.';

        $this->assertEquals(self::$tva, "6", $rule_003);
    }

}