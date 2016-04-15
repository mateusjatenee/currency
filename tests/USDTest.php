<?php

namespace Mateusjatenee\Currency\Tests;

use Mateusjatenee\Currency\Currency;
use PHPUnit_Framework_TestCase as PHPUnit;

class CurrencyTest extends PHPUnit
{

    public function test10UsdReturnsEquivalentInEuros()
    {
        $currency = new Currency(10);

        $euros = $currency->base('USD')->to('EUR')->get();

        $this->assertLessThan($euros, 10);
    }
}
