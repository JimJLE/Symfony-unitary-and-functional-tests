<?php

namespace App\Tests\Unitary;

use PHPUnit\Framework\TestCase;
use Symfony\Component\Stopwatch\Stopwatch;

class SecondTest extends TestCase
{
    public function testSecondTestUnitaire() {
        $rule_001 = 'La durée d\'insertion d\'un utilisateur doit être inférieure à 6 secondes';
        $stopwatch = new Stopwatch();

        $stopwatch->start('Nom de mon évènement');
        // DO SOME STUFF
        sleep(5);
        $duration = $stopwatch->stop('Nom de mon évènement')->getDuration();

        $this->assertLessThan(10000, $duration, $rule_001);
    }
}