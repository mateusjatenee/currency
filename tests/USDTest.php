<?php

use Mateusjatenee\Currency\Currency;
use PHPUnit_Framework_TestCase as PHPUnit;

class USDTest extends PHPUnit
{
    /** @test */
    public function ten_usd_should_return_equivalent_in_euros()
    {
        $currency = new Currency(10);

        $euros = $currency->from('USD')->to('EUR')->get();

        $this->assertGreaterThan($euros, 10);
    }

    /** @test */
    public function ten_usd_should_be_less_than_its_equivalent_in_gbp()
    {
        $currency = new Currency(10);

        $gbp = $currency->from('USD')->to('GBP')->get();

        $this->assertGreaterThan($gbp, 10);
    }

    /** @test */
    public function ten_usd_should_be_more_than_its_equivalent_in_brl()
    {
        $currency = new Currency(10);

        $brl = $currency->from('USD')->to('BRL')->get();

        $this->assertLessThan($brl, 10);
    }
}
