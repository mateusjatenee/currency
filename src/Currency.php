<?php

namespace Mateusjatenee\Currency;

use GuzzleHttp\Client;

class Currency
{

    protected $value;
    protected $base;
    protected $to;
    protected $convertion;

    protected $api = 'http://api.fixer.io/latest';

    /**
     * Initialize.
     *
     * @return void
     */
    public function __construct($value)
    {
        $this->value = $value;
    }

    public function base($base = 'USD')
    {
        $this->base = $base;
        return $this;
    }

    public function to(string $to)
    {
        $this->to = $to;
        $exchange = $this->exchange($this->value, $this->base, $this->to);

        $this->value = $this->value * $exchange;

        return $this;
    }

    public function get()
    {
        return $this->value;
    }

    protected function exchange($value, $base, $to)
    {
        $guzzle = new Client();

        $request = $guzzle->get($this->api, ['query' => ['base' => $base]]);

        $request = json_decode($request->getBody(), true);

        return $request['rates'][$to];
    }
}
