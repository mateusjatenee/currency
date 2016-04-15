<?php

use Mateusjatenee\Currency\Currency;
use PHPUnit_Framework_TestCase as PHPUnit;

class CurrencyTest extends PHPUnit
{
    public function testAllMethodReturnsAnArray()
    {
        $currency = new Currency(10);

        $currency = $currency->all('USD');

        $this->assertArrayHasKey('BRL', $currency);
        $this->assertArrayNotHasKey('USD', $currency);
    }
}
