<?php

namespace App\Tests\Unitary;

use PHPUnit\Framework\TestCase;

define('DS', DIRECTORY_SEPARATOR);
require dirname(__FILE__).DS.'..'.DS.'tools'.DS.'CsvFileIterator.php';

class DataProviderCSVTest extends TestCase
{

    /**
     * @dataProvider someProvider
     */
    public function testSomeTestUnitaire($expected, $a, $b) {
        $this->assertEquals($expected, $a + $b);
    }

    public function someProvider() {
        return new \CsvFileIterator(dirname(__FILE__).DS.'..'.DS.'data'.DS.'DixiemeData.csv');
    }
}