<?php

namespace App\Tests\Unitary;

use PHPUnit\Framework\TestCase;

class SetUpTearDownTest extends TestCase
{
    protected $tva;

    public function setUp() {
        //$this->tva = "5.5";
        $this->tva = "6";

    }

    public function tearDown() {
        unset($this->tva);
    }

    public function testTvaExist() {
        $rule_003 = 'La tva doit être égale à 6.';

        $this->assertEquals($this->tva, "6", $rule_003);

        /**
         * Modification de la valeur de la tva
         * Mais celle-ci sera réécrasée part le setUp
         */ 
        $this->tva = "66666"; 
    }

    public function testTvaStillExist() {
        $rule_003 = 'La tva doit être égale à 6.';

        $this->assertEquals($this->tva, "6", $rule_003);
    }

}