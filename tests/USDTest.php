<?php

use Mateusjatenee\Currency\Currency;
use PHPUnit_Framework_TestCase as PHPUnit;

class CurrencyTest extends PHPUnit
{

    public function test10UsdReturnsEquivalentInEuros()
    {
        $currency = new Currency(10);

        $euros = $currency->from('USD')->to('EUR')->get();

        $this->assertGreaterThan($euros, 10);
    }

    public function test10UsdIsLessThanItsEquivalentInGbp()
    {
        $currency = new Currency(10);

        $gbp = $currency->from('USD')->to('GBP')->get();

        $this->assertGreaterThan($gbp, 10);
    }
}
