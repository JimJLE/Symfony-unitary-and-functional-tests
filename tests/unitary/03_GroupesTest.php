<?php

namespace App\Tests\Unitary;

use PHPUnit\Framework\TestCase;

class TroisiemeTest extends TestCase
{

    /**
     * @group Normal
     */
    public function testNormal() {
        $rule_002 = 'La phrase d\'accueil doit commencer par Hello.';

        $this->assertStringStartsWith("Hello", "Hello World", $rule_002);
    }

    /**
     * @group Autre
     */
    public function testMetier() {
        $voiture = "rouge";
        $this->assertNotNull($voiture);
    }
}